<?php
// Initialize the session
require __DIR__ . '/MainController.php';


class HomeController extends Controller {
    public $header;
    public $footer;

    function __construct() {
        $this->header =  __DIR__ . "/../View/header.php"; 
        $this->footer =  __DIR__ . "/../View/footer.php"; 
    }


    public function index() {
        require __DIR__ . '/../generalFunctions.php';
        $body = __DIR__ . "/../View/Home/index.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }

    public function history(){
        $body = __DIR__ . "/../View/History/index.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }

    public function yummy(){
        $body = __DIR__ . "/../View/Yummy/index.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }

    public function dance(){
        $body = __DIR__ . "/../View/Dance/index.php";
        eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }
}
?>