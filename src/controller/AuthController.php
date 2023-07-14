<?php

namespace Shams\Simple\controller;


class AuthController
{

    private $salt = "shamsPathan";

    function __construct()
    {
        session_start();
    }

    function login(string $email, string $password)
    {
    }

    function register(string $email, string $password)
    {
        // hash password
        $password = password_hash($password, PASSWORD_DEFAULT);
        // save hash password ad email to user model
        
    }

    function __destruct()
    {
        session_destroy();
    }
}
