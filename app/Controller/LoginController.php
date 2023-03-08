<?php
require __DIR__ . '/../DAL/UserService.php';
require __DIR__ . '/../Model/User.php';
require __DIR__ . '/MainController.php';
require __DIR__ . '/../mailTemplates.php';
require __DIR__ . '/../DAL/TokenService.php';
require __DIR__ . '/../Model/Token.php';
require __DIR__ . '/../generalFunctions.php';

class LoginController extends Controller {
    private $UserService;
    public $header;
    public $footer;
    private $TokenService;


    function __construct() {
        $this->UserService = new UserService();
        $this->header =  __DIR__ . "/../View/header.php"; 
        $this->footer =  __DIR__ . "/../View/footer.php"; 
        $this->TokenService = new TokenService();
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
                        if (!$user->getVerificationStatus()) {
                            echo 'Please verify your email address before logging in.';
                        }
                        else {
                        $_SESSION["loggedin"] = true;
                        $_SESSION["User"] = json_encode($user);
                        echo '<script type="text/javascript">
                            window.location = "/"
                        </script>';
                        }
                    }
                    else {
                        echo $user->getVerificationStatus();
                        echo 'Invalid password.';
                    }    
                } else {
                    echo 'User does not exist!';
                }
                // Close statement
               }
        }
        // Register
        if (isset($_POST['register'])) {
            $regEmail = $_POST["register-email"];          
            $regName = $_POST["register-name"];
            $regPassword = $_POST["register-password"];
            $regConfirmPassword = $_POST["register-confirm-password"];
            createUser($regEmail, $regName, $regPassword, $regConfirmPassword);

                    /*} else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Robot verification failed, please try again."
                        );
                    }       
            } else{ 
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Plese check on the reCAPTCHA box."
                );*/
            } 
        
        
        $body = __DIR__ . "/../View/Login/index.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php '); 
    }
}
?>