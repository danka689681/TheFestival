<?php
// Initialize the session
require __DIR__ . '/MainController.php';
require __DIR__ . '/../generalFunctions.php';


class AdminController extends Controller {
    public $header;
    public $footer;

    function __construct() {
        $this->header =  __DIR__ . "/../View/Admin/adminHeader.php"; 
        $this->footer =  __DIR__ . "/../View/Admin/adminFooter.php"; 
    }
 
    public function index() {
       $color = "red";
       $body = __DIR__ . "/../View/Admin/index.php";
       eval(' ?>'. generateContent($this->header, $body, $this->footer) .'<?php ');
    }
    public function users() {
       $color = "yellow";
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