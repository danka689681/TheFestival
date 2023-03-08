<?php
// Initialize the session
require __DIR__ . '/MainController.php';
require __DIR__ . '/../generalFunctions.php';
require __DIR__ . '/../mailTemplates.php';
require __DIR__ . '/../DAL/UserService.php';
require __DIR__ . '/../Model/User.php';
require __DIR__ . '/../DAL/TokenService.php';
require __DIR__ . '/../Model/Token.php';
require __DIR__ . '/../Enum/Role.php';
require __DIR__ . '/../Enum/Password.php';

class AdminController extends Controller {
    public $header;
    public $footer;
    private $UserService;
    private $TokenService;

    function __construct() {
        $this->header =  __DIR__ . "/../View/Admin/adminHeader.php"; 
        $this->footer =  __DIR__ . "/../View/Admin/adminFooter.php"; 
        $this->UserService = new UserService();
        $this->TokenService = new TokenService();

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
       $descArrowClass = "fa-thin fa-sort-down btnHidden";
       $ascArrowClass = "fa-duotone fa-sort btnVisible";
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
                echo '<script>alert("Something went wrong, user not updated.")</script>';

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
                $descArrowClass = 'fa-solid fa-sort-up btnVisible';
                $ascArrowClass = 'btnHidden';
            } else {
                $sortType = SORT_DESC;
                $descArrowClass = "btnHidden";
                $ascArrowClass = 'fa-solid fa-sort-down btnVisible';
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
    public function festival() {
        $color = "blue";
        $body = __DIR__ . "/../View/Admin/festival.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');    
    }
}
?>