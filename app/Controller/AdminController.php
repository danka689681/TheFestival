<?php
// Initialize the session
require __DIR__ . '/MainController.php';
require __DIR__ . '/../generalFunctions.php';
require __DIR__ . '/../mailTemplates.php';
require __DIR__ . '/../DAL/UserService.php';
require __DIR__ . '/../Model/User.php';
require __DIR__ . '/../Model/Venue.php';
require __DIR__ . '/../DAL/TokenService.php';
require __DIR__ . '/../Model/Token.php';
require __DIR__ . '/../Enum/Role.php';
require __DIR__ . '/../Enum/Password.php';
require __DIR__ . '/../Model/Artist.php';
require __DIR__ . '/../DAL/ArtistService.php';
require __DIR__ . '/../DAL/ImageService.php';
require __DIR__ . '/../DAL/VenueService.php';
class AdminController extends Controller {
    public $header;
    public $footer;
    private $UserService;
    private $TokenService;
    private $ArtistService;
    private $ImageService;
    private $VenueService;

    function __construct() {
        $this->header =  __DIR__ . "/../View/Admin/adminHeader.php"; 
        $this->footer =  __DIR__ . "/../View/Admin/adminFooter.php"; 
        $this->UserService = new UserService();
        $this->TokenService = new TokenService();
        $this->ArtistService = new ArtistService();
        $this->ImageService = new ImageService();
        $this->VenueService = new VenueService();
    }
 
    public function index() {
       $color = "red";
       $body = __DIR__ . "/../View/Admin/index.php";
       eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }
    public function users() {
       $color = "yellow";
       $users = $this->UserService->getAllUsers();
       $displayUsers = $users;
       $filterBy = "";
       $group = "";
       $setSort = "";
       $setSortType = "";
       $searchInput = "";
       if(isset($_POST['searchUsers'])) {
        $searchInput = trim($_POST["searchUsers"]);
          foreach ($displayUsers as $displayUser) {
            if (!str_contains(strtolower($displayUser->getName()), strtolower($searchInput)) 
                 && !str_contains(strtolower($displayUser->getEmail()), strtolower($searchInput))) {
                    unset($displayUsers[array_search($displayUser, $displayUsers)]);                
            }
          }
            
        }
        
        if(isset($_GET['filter'])) {
            $filterBy = $_GET['filter'];
            $group = $_GET['group'];
            if ($filterBy != "" && $group != "undefined") {
                if ($group == "Role") {
                    foreach ($displayUsers as $displayUser) {
                        $role = $displayUser->getRole() == "" ? "User" : $displayUser->getRole();
                        if (Role::from($role)->name != $filterBy) {
                                unset($displayUsers[array_search($displayUser, $displayUsers)]);                
                        }  
                    }
                } elseif ($group == "Password") {
                    foreach ($displayUsers as $displayUser) {
                        $password = $displayUser->getPassword() == null ? "notSet" : "set";
                        if (Password::from($password)->name != $filterBy) {
                                unset($displayUsers[array_search($displayUser, $displayUsers)]);                
                        }  
                    }
                } 
            }
        }
        if(isset($_POST['updateUser'])) {
            $id = trim($_POST["userID"]);
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $role = trim($_POST["role"]);
            $updated = $this->UserService->updateUserByID($id, $name, $email, $role);
            if ($updated) {
                foreach ($displayUsers as $key => $row)
                {
                    if ($id == $row->getID()) {
                        $row->setName($name);
                        $row->setEmail($email);
                        $row->setRole($role);
                    } 
                }
            } else {
                echo '<script>alert("Something went wrong, user not updated.")</script>';

            }
        }

        if(isset($_POST['createUser'])) {
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $password = $confirmPassword = "";
            $created = createUser($email, $name, $password, $confirmPassword);
            if ($created) {
                foreach ($displayUsers as $key => $row)
                {
                    if ($email == $row->getEmail()) {
                        $row->setName($name);
                        $row->setEmail($email);
                        $row->setIsAdmin($role);
                    } 
                }
            } else {
                echo '<script>alert("Something went wrong, user not updated.")</script>';

            }
        }
        if(isset($_POST['deleteUser'])) {
            $id = trim($_POST["userID"]);
            $deleted = $this->UserService->deleteUserByID($id);
            if ($deleted) {
                foreach ($displayUsers as $key => $row)
                {
                    if ($id == $row->getID()) {
                        unset($displayUsers[$key]);
                    } 
                }
            } else {
                echo '<script>alert("Something went wrong, user not deleted.")</script>';

            }
        }
        
        if (isset($_GET['pswdReset'])) { 
            $recepientMail =  $_GET['pswdReset'];
            $recepientName =  $_GET['pswdResetName'];
            $subject = "Musiva - Reset Password";
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);
            $urlToEmail = getHostingURL() . 'validation/resetpsswd?'.http_build_query([
                'selector' => $selector,
                'validator' => bin2hex($token)
            ]);
            $timezone = new DateTimeZone("Europe/Prague");
            $expires = new DateTime();
            $expires->setTimezone($timezone);
            $expires->add(new DateInterval('PT10M')); // 10 min
            if ($this->TokenService->tokenExists($recepientMail)) {
                $this->TokenService->updateTokenByUserEmail($recepientMail, hash('sha256', $token), $selector, $expires);
            } else {
                $this->TokenService->createToken($recepientMail, $selector, hash('sha256', $token), $expires, 1);
             }
        
            $htmlString = resetPasswordMailTemplate($recepientName, $urlToEmail);
            $mailSent = sendMail($subject, $htmlString, $bodyPlainText=$htmlString, $recepientMail, $recepientName);
            if ($mailSent) {
                echo '<script>alert("Mail sent")</script>';
                echo '<script type="text/javascript">
                window.location = "/admin/users"
            </script>';

            } else {
                echo '<script>alert("Sending mail failed")</script>';
            }
        }
        if (isset($_GET['dir'])) {
            $setSort = $_GET['sort'];
            $setSortType = $_GET['dir'];
            $sort = array();
            foreach ($displayUsers as $key => $row)
            {
                switch($_GET['sort']) {
                    case 'name': 
                        $sort[$key] = $row->getName();
                        break;
                    case 'date': 
                        $sort[$key] = $row->getRegistrationDate();
                        break;
                    case 'email': 
                        $sort[$key] = $row->getEmail();
                        break;
                    case 'role': 
                        $sort[$key] = $row->getIsAdmin();
                        break;
                    default:
                        $sort[$key] = $row->getName();
                        break;
                }
               
            }
            $sortType = SORT_ASC;
            if ($_GET['dir'] == 'asc') {
                $sortType = SORT_ASC;
            } else {
                $sortType = SORT_DESC;
            }
            array_multisort($sort, $sortType, $displayUsers);
            
           
        }
       $body = __DIR__ . "/../View/Admin/users.php";
       eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }
    public function visitHaarlem() {
        $color = "green";
        $body = __DIR__ . "/../View/Admin/visitHaarlem.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }
    public function dance() {
        $color = "blue";
        $body = __DIR__ . "/../View/Admin/Festival-Dance/dance.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');    
    }
    public function artists() {
        $color = "blue";
        $displayArtists = $this->ArtistService->getAllArtists();
        $searchInput = "";
        if(isset($_POST['searchArtists'])) {
         $searchInput = trim($_POST["searchArtists"]);
         $displayArtists = searchListByName($searchInput, $displayArtists);       
         }
        
        if(isset($_POST['deleteArtist'])) {
            $ID = trim($_POST["artistID"]);
            $deleted = $this->ArtistService->deleteArtistByID($ID);
            if ($deleted) {
                echo '<script type="text/javascript">
                window.location = "/admin/artists"
                </script>';
              
            } else {
                echo '<script>alert("Something went wrong, artist not updated.")</script>';

            }
        }

        $body = __DIR__ . "/../View/Admin/Festival-Dance/artists.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');    
    }

    public function editArtist() {
        $color = "blue";
        $artist = "";
        if(isset($_GET['id'])) {
            $artistID = $_GET['id'];
            if ($artistID) {
                $artist = $this->ArtistService->getArtistByID($artistID)[0];
            } 
        }

        if(isset($_GET['deleteImage'])) {
            $ID = trim($_GET["deleteImage"]);
            $deleted = $this->ImageService->deleteArtistImageByID($ID);
            if ($deleted) {
                echo '<script type="text/javascript">
                window.location = "/admin/editartist?id=' . trim($_GET["id"]) . '"
                </script>';
              
            } else {
                echo '<script>alert("Something went wrong, user not updated.")</script>';

            }
        }
        if(isset($_POST['updateArtist'])) {
            if (isset($_POST['artistID'])) {
                $artistID = trim($_POST['artistID']);
            }
            $artistName = trim($_POST['artistName']);
            $artistDescription = trim($_POST['artistDescription']);
            $artistYoutube = trim($_POST['artistYoutube']);
            $artistSpotify = trim($_POST['artistSpotify']);
            $artistDemoSong= trim($_POST['artistDemoSong']);
           
            $artistLogo = isset($_FILES['artistLogo']) ? $_FILES['artistLogo'] : null;
            $artistImages = isset($_FILES['artistImages']) ? $_FILES['artistImages'] : null;
            $logoUpdated = true;
            $imagesUpdated = true;

            if ($artistID) {
                $updated = $this->ArtistService->updateArtistByID($artistID, $artistName, $artistDescription, $artistYoutube, $artistSpotify, $artistDemoSong);
            } else {
                $artistID = $this->ArtistService->createArtist($artistName, $artistDescription, $artistYoutube, $artistSpotify, $artistDemoSong);
                $updated = $artistID == false ? false : true;
            }
        
            if ($artistLogo && $artistID) {
                $type = substr($artistLogo['type'], strpos($artistLogo['type'], "/") + 1);
                $logoUpdated = $this->ImageService->createArtistImage($artistLogo['name'], $artistID,  $type, 1, file_get_contents($artistLogo['tmp_name']));
            }
            if ($artistImages && $artistID) {
                $files = array_filter($artistImages['name']); 
                $total_count = count($artistImages['name']);
                for( $i=0 ; $i < $total_count ; $i++ ) {
                    if ($artistImages['name'][$i] != '') {
                        $name = $artistImages['name'][$i];
                        $type = substr($artistImages['type'][$i], strpos($artistImages['type'][$i], "/") + 1);    
                        $data = file_get_contents($artistImages['tmp_name'][$i]);
                        $isLogo = 0;
                        $imagesUpdated = $this->ImageService->createArtistImage($name, $artistID, $type, $isLogo, $data);
                    }
                }
            }
            if ($updated && $logoUpdated && $imagesUpdated) {
                echo '<script type="text/javascript">
               window.location = "/admin/artists"
               </script>'; 
           } else {
               echo '<script>alert("Something went wrong, artist not updated.")</script>';
           }
        
         }
   
        $body = __DIR__ . "/../View/Admin/Festival-Dance/editartist.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');    
    }

    public function venues() {
        $color = "blue";
        $body = __DIR__ . "/../View/Admin/Festival-Dance/venues.php";
        $displayVenues = $this->VenueService->getAllVenues();
        $searchInput = "";
        if(isset($_POST['searchVenues'])) {
         $searchInput = trim($_POST["searchVenues"]);
         $displayVenues = searchListByName($searchInput, $displayVenues);       
         }
        if(isset($_POST['deleteVenue'])) {
            $ID = trim($_POST["venueID"]);
            $deleted = $this->VenueService->deleteVenueByID($ID);
            if ($deleted) {
                echo '<script type="text/javascript">
                window.location = "/admin/venues"
                </script>';
              
            } else {
                echo '<script>alert("Something went wrong, venue not updated.")</script>';

            }
        }
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');    
    }
    public function editVenue() {
        $color = "blue";
        $venue = "";
        if(isset($_GET['id'])) {
            $venueID = $_GET['id'];
            if ($venueID) {
                $venue = $this->VenueService->getVenueByID($venueID);
            } 
        }

        if(isset($_POST['updateVenue'])) {
            if (isset($_POST['venueID'])) {
                $venueID = trim($_POST['venueID']);
            }
            $venueName = trim($_POST['venueName']);
            $venueMapURL = trim($_POST['venueMapURL']);

            if ($venueID) {
                $updated = $this->VenueService->updateVenueByID($venueID, $venueName, $venueMapURL);
            } else {
                $venueID = $this->VenueService->createVenue($venueName, $venueMapURL);
                $updated = $venueID == false ? false : true;
            }
        
           
            if ($updated) {
                echo '<script type="text/javascript">
               window.location = "/admin/venues"
               </script>'; 
           } else {
               echo '<script>alert("Something went wrong, venue not updated.")</script>';
           }
        
         }
   
        $body = __DIR__ . "/../View/Admin/Festival-Dance/editvenue.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');    
    }
}
?>