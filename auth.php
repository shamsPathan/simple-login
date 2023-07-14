<?php

$type = filter_var($_POST['submit'] ?? "", FILTER_SANITIZE_STRING);

use Shams\Simple\controller\AuthController;

switch ($type) {
    case "login":

        break;

    case "register":
        $email = filter_var($_POST['email'] ?? "", FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'] ?? "", FILTER_SANITIZE_STRING);
        $password_c = filter_var($_POST['password_c'] ?? "", FILTER_SANITIZE_STRING);

        if (strcmp($password, $password_c) !== 0) {
            header('Location: /register?error="Please enter same password twice"');
            die();
        }

        $auth = new AuthController();
        $auth->register($email, $password);

        header('Location: /');
        die();

        break;
}
