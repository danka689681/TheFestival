<?php
require __DIR__ . '/../DAL/UserService.php';
require __DIR__ . '/../Model/User.php';
require __DIR__ . '/MainController.php';

class LoginController extends Controller {
    private $UserService;
    public $header;
    public $footer;

    function __construct() {
        $this->UserService = new UserService();
        $this->header =  __DIR__ . "/../View/header.php"; 
        $this->footer =  __DIR__ . "/../View/footer.php"; 
    }
    public function index() {
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            echo '<script type="text/javascript">
                window.location = "/"
            </script>';
        } 
        $email = $password = "";
        $email_err = $password_err = $login_err = "";
        // Login
        if (isset($_POST['login'])) {
             // Check if email is empty
            if(empty($_POST["email"])) {
                $email_err = "Please enter email.";
            } else{
                $email = $_POST["email"];
            }
               // Check if password is empty
            if(empty($_POST["password"])) {
                $password_err = "Please enter your password.";
            } else {
                $password = $_POST["password"];
            }
            if(empty($email_err) && empty($password_err)){
                $user = $this->UserService->getUserByEmail($email);
    
                if(!empty($user)){  
                    if (password_verify($password, $user->getPassword())) {
                        $_SESSION["loggedin"] = true;
                        echo '<script type="text/javascript">
                            window.location = "/"
                        </script>';
                    } else {
                        echo 'Invalid password.';
                    }    
                } else {
                    echo 'User does not exist!';
                }
                // Close statement
               }
        }
        // Register
        require __DIR__ . '/../generalFunctions.php';
        $body = __DIR__ . "/../View/Login/index.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
        
    }


}
