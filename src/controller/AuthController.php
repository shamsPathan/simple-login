<?php

namespace Shams\Simple\Controller;

use Shams\Simple\entity\User;
use Shams\Simple\model\UserModel;

class AuthController
{

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
        $user = new User();
        $user->email = $email;
        $user->password = $password;

        $model = new UserModel();

        return $model->save($user);
    }

    function __destruct()
    {
        session_destroy();
    }
}
