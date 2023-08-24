<?php
require 'vendor/autoload.php';
use Shams\Simple\controller\AuthController;

// simple route
$path = (string)trim(filter_var($_SERVER["REQUEST_URI"], FILTER_SANITIZE_URL));

use Shams\Simple\middleware\AuthMiddleware;

$middleware = new AuthMiddleware();

if ($middleware->authCheck()) {
    
    switch ($path) {
        case "/":
            include("src/view/home.html");
            die();
        case "/about":
            include("src/view/about.html");
            die();
        case "/logout":
            $auth = new AuthController();
            $auth->logout();
            return header('Location: /');
        default:
            include("src/view/404.html");
            die();
        
    }
} else {
    switch ($path) {
        case "/":
        case "/login":
            include("src/view/login.html");
            die();
            
        case "/register":
            include("src/view/register.html");
            die();
    
        case "/logout":
            $auth = new AuthController();
            $auth->logout();
            return header('Location: /');
        default:
            return header('Location: /');
        
    }
}
