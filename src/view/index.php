<?php

// unused codes(Draft)
require 'vendor/autoload.php';

use Shams\Simple\middleware\AuthMiddleware;

$middleware = new AuthMiddleware();

if ($middleware->authCheck()) {
    include("src/view/home.html");
} else {
    include("src/view/login.html");
}
