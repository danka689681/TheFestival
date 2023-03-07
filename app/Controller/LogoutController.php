<?php
require __DIR__ . '/MainController.php';
require __DIR__ . '/../generalFunctions.php';

class LogoutController extends Controller {

    function __construct() {

    }
    public function index() {
        session_destroy();
        echo '<script type="text/javascript">
                window.location = "/"
            </script>';
    }
}
?>