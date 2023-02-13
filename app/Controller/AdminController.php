<?php
// Initialize the session
require __DIR__ . '/MainController.php';


class AdminController extends Controller {

    function __construct() {
    }

    public function index() {
       $color = "red";
       require __DIR__ . "/../View/Admin/adminNav.php";  
       require __DIR__ . "/../View/Admin/index.php";  
  

          
    }
    public function users() {
        $color = "yellow";
        require __DIR__ . "/../View/Admin/adminNav.php";    
        require __DIR__ . "/../View/Admin/users.php";        
    }
    public function visitHaarlem() {
        $color = "green";
        require __DIR__ . "/../View/Admin/adminNav.php";    
        require __DIR__ . "/../View/Admin/visitHaarlem.php";        
    }
    public function festival() {
        $color = "blue";
        require __DIR__ . "/../View/Admin/adminNav.php";    
        require __DIR__ . "/../View/Admin/festival.php";        
    }
}
?>