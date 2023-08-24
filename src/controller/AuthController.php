<?php

namespace Shams\Simple\controller;

use Shams\Simple\entity\User;
use Shams\Simple\model\UserModel;

class AuthController
{

    function __construct()
    {
        session_start();
    }

    function login(string $email, string $password): bool
    {
        // get user from database
        $userModel = new UserModel();
        $user  = $userModel->findByEmail($email);

        if (!$user) return false;

        if (password_verify($password, $user->password)) {
            $user->password = null;
            $_SESSION['user'] = $user;
            return true;
        } else {
            return false;
        }
    }


    function logout(): bool
    {
            $_SESSION['user'] = null;
            return true;
    }

    function register(string $email, string $password): bool
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
        // session_destroy();
    }
}
