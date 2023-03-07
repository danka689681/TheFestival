<?php
class Router {
    protected $controller = 'HomeController';
    protected $method = 'index';

    public function __construct($controller, $method) {
        if (!file_exists(__DIR__ . '/Controller/' . $controller . '.php')) {
            $controller = $this->controller;
        } 

        $this->route($controller, $method);
    }
    public function route($controller, $method) {   
        require __DIR__ . '/Controller/' . $controller . '.php';
        $controller = new $controller();
        if (!method_exists($controller, $method)) {
            $method = $this->method;
        }
        $controller->$method();
    }
}
?>