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
            case 'account':
                require __DIR__ . '/Controller/AccountController.php';
                $controller = new AccountController();
                $controller->index();
                break;            
            case 'account/changePassword':
                require __DIR__ . '/Controller/AccountController.php';
                $controller = new AccountController();
                $controller->changePassword();
            case 'login': 
                require __DIR__ . '/Controller/LoginController.php';
                $controller = new LoginController();
                $controller->index();
                break;
            default:
                http_response_code(404);
                break;
        }
    }
}
?>