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
        protectedRoute("/account");  
        if (isset($_SESSION["User"])) {
            $currentUser = json_decode($_SESSION["User"]);
        
        $body = __DIR__ . "/../View/Account/index.php";  
        $userName = $currentUser->{'Name'};
        $userEmail = $currentUser->{'Email'};
        $userId = $currentUser->{'ID'};

        if(isset($_POST['btnChanges'])) {
            echo '<script>  document.getElementById("name").disabled = false;
                            document.getElementById("name").disabled = false;
                    </script>';
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $currentUser->{'Name'} = $name;
            $currentUser->{'Email'} = $email;
            $_SESSION["User"] = json_encode($currentUser);
            $roleBool = $currentUser->{'IsAdmin'};
            $role = 0;
            if($roleBool == true){
                $role = 1;
            }

            $updated = $this->UserService->updateUserByID($userId, $name, $email, $role);
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
    }
    public function changePassword(){
      

        $newPassword = "";
        $currentPassword_err = "";

        $currentUser = json_decode($_SESSION["User"]);
        $userEmail = $currentUser->{'Email'};
        
        if(isset($_POST['btnSubmit'])) {

            $currentPassword = trim($_POST["currentPassword"]);
            $newPassword = trim($_POST["password"]);
            $confirmPassword = trim($_POST["confirmPassword"]);
            if (!password_verify($currentPassword, $currentUser->{'password'})) {
                $currentPassword_err = "Current Password incorrect!";
                echo "Here 1";
            } else {
                echo "Here 2";

                if($newPassword != $confirmPassword){
                    $confirmPassword_err = "Passwords do not match!";
                    echo "Here 3";

                } else{
                    echo "Here 4";

                    //update the password in the database
                    $this->UserService->updateUsersPassword($userEmail, password_hash($newPassword, PASSWORD_DEFAULT));
                    echo '<script>alert("Password updated")</script>';
                }
            } 
        }
        $body = __DIR__ . "/../View/Account/changePassword.php";  
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }

} 