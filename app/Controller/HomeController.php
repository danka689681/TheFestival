<?php
// Initialize the session
require __DIR__ . '/MainController.php';
require __DIR__ . '/../generalFunctions.php';


class HomeController extends Controller {
    public $navbar;
    public $footer;

    function __construct() {
        $this->navbar =  __DIR__ . "/../View/header.php"; 
        $this->footer =  __DIR__ . "/../View/footer.php"; 
    }


    public function index() {
        $body = __DIR__ . "/../View/Home/index.php";
        echo generateContent($this->navbar, $body, $this->footer);
        require "generatedOutput.php";  
          
    }
}
?>