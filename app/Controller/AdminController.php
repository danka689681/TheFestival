<?php
// Initialize the session
require __DIR__ . '/MainController.php';
require __DIR__ . '/../generalFunctions.php';
require __DIR__ . '/../DAL/UserService.php';
require __DIR__ . '/../Model/User.php';

class AdminController extends Controller {
    public $header;
    public $footer;
    private $UserService;
    function __construct() {
        $this->header =  __DIR__ . "/../View/Admin/adminHeader.php"; 
        $this->footer =  __DIR__ . "/../View/Admin/adminFooter.php"; 
        $this->UserService = new UserService();

    }
 
    public function index() {
       $color = "red";
       $body = __DIR__ . "/../View/Admin/index.php";
       echo generateContent($this->header, $body, $this->footer);
       require "generatedOutput.php"; 

    }
    public function users() {
       $color = "yellow";
       $users = $this->UserService->getAllUsers();
       $body = __DIR__ . "/../View/Admin/users.php";
       echo generateContent($this->header, $body, $this->footer);
       require "generatedOutput.php"; 
    }
    public function visitHaarlem() {
        $color = "green";
        $body = __DIR__ . "/../View/Admin/visitHaarlem.php";
        echo generateContent($this->header, $body, $this->footer);
        require "generatedOutput.php"; 
    }
    public function festival() {
        $color = "blue";
        $body = __DIR__ . "/../View/Admin/festival.php";
        echo generateContent($this->header, $body, $this->footer);
        require "generatedOutput.php";      
    }
}
?>