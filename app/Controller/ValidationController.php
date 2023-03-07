<?php
// Initialize the session
require __DIR__ . '/MainController.php';
require __DIR__ . '/../DAL/TokenService.php';
require __DIR__ . '/../DAL/UserService.php';
require __DIR__ . '/../Model/User.php';
require __DIR__ . '/../generalFunctions.php';
require __DIR__ . '/../mailTemplates.php';


class ValidationController extends Controller {
    public $header;
    public $footer;
    private $TokenService;
    private $UserService;


    function __construct() {
        $this->header =  __DIR__ . "/../View/header.php"; 
        $this->footer =  __DIR__ . "/../View/footer.php"; 
        $this->TokenService = new TokenService();
        $this->UserService = new UserService();
    }


    public function resetpsswd() {
        $errMsg = "";
        if(isset($_POST['changePsswd'])) {
            $newPassword = $_POST['newPsswd'];
            $confirmNewPassword = $_POST['confirmNewPsswd'];
            if (isset($_GET['selector']) && isset($_GET['validator'])) {
                $selector = $_GET['selector'];
                $validator = $_GET['validator'];
                $UserEmail = $this->TokenService->verifyTokenGetUserEmail($selector, $validator);
                $this->TokenService->deleteTokenBySelector($selector);
                
                if ($newPassword == $confirmNewPassword) {
                    if ($UserEmail) {
                        $this->UserService->updateUsersPassword($UserEmail, password_hash($newPassword, PASSWORD_DEFAULT));
                        echo '<script>alert("User updated")</script>';
                        echo '<script type="text/javascript">
                            window.location = "/login"
                        </script>';
                    } else {
                        echo '<script>alert("Link expired")</script>';
                    }
                } else {
                    $errMsg = "Passwords do not match!";
                }
            }
        }

        require __DIR__ . '/../generalFunctions.php';
        $body = __DIR__ . "/../View/Validation/resetPsswd.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');

    }
    public function validateEmail() {
        if (isset($_GET['selector']) && isset($_GET['validator'])) {
            $selector = $_GET['selector'];
            $validator = $_GET['validator'];
            $UserEmail = $this->TokenService->verifyTokenGetUserEmail($selector, $validator);
            $this->TokenService->deleteTokenBySelector($selector);
            if ($UserEmail) {
                $this->UserService->verifyUser($UserEmail);
            } else {
                echo '<script>alert("Link expired")</script>';
            }
        }
        require __DIR__ . '/../generalFunctions.php';
        $body = __DIR__ . "/../View/Validation/validateEmail.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }

    public function forgotPassword() {
        if (isset($_GET['email'])) { 
            $recepientMail =  trim($_GET['email']);
            echo $recepientMail;
            $recepientName =  $this->UserService->getUserByEmail($recepientMail)->getName();
            echo $recepientName;
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
            } else {
                echo '<script>alert("Sending mail failed")</script>';
            }
        }
        echo '<script type="text/javascript">
                window.location = "/login"
            </script>';
    }
    
}
?>