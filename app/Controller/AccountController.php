<?php
// Initialize the session
require __DIR__ . '/MainController.php';

class AccountController extends Controller{

    function __construct() {
    }

    public function index(){
       // require __DIR__ . "/../View/header.php";  
        require __DIR__ . "/../View/Account/index.php";  
        require __DIR__ . "/../View/footer.php";  
    }
    public function changePassword(){
        //require __DIR__ . "/../View/header.php";  
        require __DIR__ . "/../View/Account/changePassword.php";  
        require __DIR__ . "/../View/footer.php";  
    }
} 