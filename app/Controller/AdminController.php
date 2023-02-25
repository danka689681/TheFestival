<?php
// Initialize the session
require __DIR__ . '/MainController.php';
require __DIR__ . '/../generalFunctions.php';
require __DIR__ . '/../DAL/UserService.php';
require __DIR__ . '/../Model/User.php';

class AdminController extends Controller {
    public $header;
    public $footer;
    private $UserService;
    function __construct() {
        $this->header =  __DIR__ . "/../View/Admin/adminHeader.php"; 
        $this->footer =  __DIR__ . "/../View/Admin/adminFooter.php"; 
        $this->UserService = new UserService();

    }
 
    public function index() {
       $color = "red";
       $body = __DIR__ . "/../View/Admin/index.php";
       eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }
    public function users() {
       $color = "yellow";
       $DESCName = "btnVisible";
       $ASCName = "btnHidden";
       $users = $this->UserService->getAllUsers();
       $displayUsers = $users;

       if(isset($_POST['searchUsers'])) {
        $searchInput = trim($_POST["searchUsers"]);
          foreach ($displayUsers as $displayUser) {
            if (!str_contains(strtolower($displayUser->getName()), strtolower($searchInput)) 
                 && !str_contains(strtolower($displayUser->getEmail()), strtolower($searchInput))) {
                    unset($displayUsers[array_search($searchInput, $displayUsers)]);                
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
                        $row->setIsAdmin($role);
                    } 
                }
            } else {
                echo '<script>alert("Something went wrong, user not updated.")</script>';

            }
        }
        if(isset($_POST['reset'])) {
            echo "reset";
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
        if (isset($_POST['sort'])) {
            $sort = array();
            foreach ($displayUsers as $key => $row)
            {
                $sort[$key] = $row->getName();
            }
            if (count($sort) >= 2) {
                if (strnatcmp($sort[0], $sort[1]) == 1) {
                    array_multisort($sort, SORT_ASC, $displayUsers);

                    echo "changed to asc";
                } else {
                    array_multisort($sort, SORT_DESC, $displayUsers);
                    echo "changed to desc";
                }
            }
           
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