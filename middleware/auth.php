<?php

namespace middleware;

class AuthMiddleware
{

    public function __construct()
    {
        session_start();
    }

    public function authCheck()
    {
        return $_SESSION('user') ? count(array_keys((array)$_SESSION('user'))) : false;
    }

    public function __destruct()
    {
        session_destroy();
    }
}
