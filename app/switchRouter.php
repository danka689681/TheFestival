<?php
class SwitchRouter {
    public function route($uri) {    
        // using a simple switch statement to route URL's to controller methods
        switch($uri) {

            case '': 
                require __DIR__ . '/Controller/HomeController.php';
                $controller = new HomeController();
                $controller->index();
                break;
            case 'admin': 
                require __DIR__ . '/Controller/AdminController.php';
                $controller = new AdminController();
                $controller->index();
                break;
            case 'admin/users': 
                require __DIR__ . '/Controller/AdminController.php';
                $controller = new AdminController();
                $controller->users();
                break;  
            case 'test': 
                    require __DIR__ . '/Controller/AdminController.php';
                    $dConroller = 'AdminController';
                    $dMethod = 'index';
                    $controller = new $dConroller;
                    $controller->$dMethod();
                    break; 
            case 'admin/visitHaarlem': 
                require __DIR__ . '/Controller/AdminController.php';
                $controller = new AdminController();
                $controller->visitHaarlem();
                break;
            case 'admin/festival': 
                require __DIR__ . '/Controller/AdminController.php';
                $controller = new AdminController();
                $controller->festival();
                break;
            case 'login': 
                require __DIR__ . '/Controller/LoginController.php';
                $controller = new LoginController();
                $controller->index();
                break;
            case 'history': 
                require __DIR__ . '/Controller/HistoryController.php';
                $controller = new HistoryController();
                $controller->index();
                break;
            default:
                http_response_code(404);
                break;
        }
    }
}
?>