<?php
session_start();
require __DIR__ . '/../Router.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');
$urlArray = explode('/', $uri, 3);
$controller = ucfirst($urlArray[0]) . 'Controller';
$method = count($urlArray) < 2 ? "index" : $urlArray[1] ;
$method = str_contains($method, "?") ? substr($method, 0, strpos($method, "?")) : $method;
$router = new Router($controller, $method);
