<?php
require __DIR__ . '/../DAL/UserService.php';
require __DIR__ . '/../Model/User.php';
require __DIR__ . '/MainController.php';

class LoginController extends Controller {
    private $UserService;
    function __construct() {
        $this->UserService = new UserService();
    }
    public function index() {

        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: /");
        }

        $email = $password = "";
        $email_err = $password_err = $login_err = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);
            // Check if email is empty
            if(empty(trim($_POST["email"]))){
                $email_err = "Please enter email.";
            } else{
                $email = trim($_POST["email"]);
            }
            // Check if password is empty
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter your password.";
            } else{
                $password = trim($_POST["password"]);
            }
            // Validate credentials
            if(empty($email_err) && empty($password_err)){
                $UserService = new UserService();
                $user = $UserService->getUserByEmail($email);

                if(!empty($user)){  
                        if (password_verify($password, $user->getPassword())) {
                            session_start();
                            $_SESSION["loggedin"] = true;
                            header("location: /");


                        } else {
                            echo 'Invalid password.';
                        }
                    
                } else {
                    echo 'User does not exist!';
                }

            // Close statement
           }
        }
    require __DIR__ . "/../View/Login/index.php";

}
}
