<?php
// Initialize the session
require __DIR__ . '/MainController.php';
require __DIR__ . '/../DAL/UserService.php';
require __DIR__ . '/../Model/User.php';
require __DIR__ . '/../generalFunctions.php';


class AccountController extends Controller{
    public $header;
    public $footer;
    private $UserService;

    function __construct() {
        $this->header =  __DIR__ . "/../View/header.php"; 
        $this->footer =  __DIR__ . "/../View/footer.php"; 
        $this->UserService = new UserService();
    }

    public function index(){
        $body = __DIR__ . "/../View/Account/index.php";  
        $currentUser = $this->UserService->getUserByEmail("test@test.com");
        $userName = $currentUser->getName();
        $userEmail = $currentUser->getEmail();
        $userId = $currentUser->getId();

        if(isset($_POST['btnChanges'])) {
            echo '<script>  document.getElementById("name").disabled = false;
                            document.getElementById("name").disabled = false;
                    </script>';
            $id = $currentUser->getId();
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $roleBool = $currentUser->getIsAdmin();
            $role = 0;
            if($roleBool == true){
                $role = 1;
            }

            $updated = $this->UserService->updateUserByID($id, $name, $email, $role);
            if ($updated) {
                echo '<script>window.location.href = window.location.href;</script>';

            } else {
                echo '<script>alert("Something went wrong, user not updated.")</script>';
            }
        }

        //delete account 
        if(isset($_POST['deleteAccount'])) {
            $deleted = $this->UserService->deleteUserByID($userId);
            if ($deleted) {
                echo '<script>alert("Your account has been logged out and deleted.")</script>';
                //logout logic
                //navigate to login
            } else {
                echo '<script>alert("Something went wrong, user not updated.")</script>';

            }
        }
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }
    public function changePassword(){
        $body = __DIR__ . "/../View/Account/changePassword.php";  
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }
} 