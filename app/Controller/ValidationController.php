<?php
// Initialize the session
require __DIR__ . '/MainController.php';
require __DIR__ . '/../DAL/TokenService.php';
require __DIR__ . '/../DAL/UserService.php';


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
                $UserID = $this->TokenService->verifyTokenGetUserID($selector, $validator);
                $this->TokenService->deleteTokenBySelector($selector);
                
                if ($newPassword == $confirmNewPassword) {
                    if ($UserID) {
                        $this->UserService->updateUsersPassword($UserID, password_hash($newPassword, PASSWORD_DEFAULT));
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
}
?>