<?php
// Initialize the session
require __DIR__ . '/MainController.php';


class AdminController extends Controller {
    public $navbar;
    function __construct() {
        require __DIR__ . '/../generalFunctions.php';
        $this->navbar =  __DIR__ . "/../View/Admin/adminNav.php"; 
    }
 
    public function index() {
       $color = "red";
       $body = __DIR__ . "/../View/Admin/index.php";
       echo generateContent($this->navbar, $body);
       require "generatedOutput.php"; 

    }
    public function users() {
       $color = "yellow";
       $body = __DIR__ . "/../View/Admin/users.php";
       echo generateContent($this->navbar, $body);
       require "generatedOutput.php"; 
    }
    public function visitHaarlem() {
        $color = "green";
        $body = __DIR__ . "/../View/Admin/visitHaarlem.php";
        echo generateContent($this->navbar, $body);
        require "generatedOutput.php"; 
    }
    public function festival() {
        $color = "blue";
        $body = __DIR__ . "/../View/Admin/festival.php";
        echo generateContent($this->navbar, $body);
        require "generatedOutput.php";      
    }
}
?>