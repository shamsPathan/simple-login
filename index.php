<?php
require 'vendor/autoload.php';
use Shams\Simple\controller\AuthController;

// simple route
$path = (string)trim(filter_var($_SERVER["REQUEST_URI"], FILTER_SANITIZE_URL));

switch ($path) {
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
    
}

use Shams\Simple\middleware\AuthMiddleware;

$middleware = new AuthMiddleware();

if ($middleware->authCheck()) {
    include("src/view/home.html");
} else {
    include("src/view/login.html");
}
