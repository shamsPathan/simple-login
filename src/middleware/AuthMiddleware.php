<?php

namespace Shams\Simple\middleware;

class AuthMiddleware
{

    public function __construct()
    {
        session_start();
    }

    public function authCheck(): bool | Object
    {
        return $_SESSION['user'] ?? false;
    }

    public function __destruct()
    {
        session_destroy();
    }
}
