<?php

namespace Shams\Simple\model;

use Shams\Simple\entity\User;

class UserModel
{
    private $user;

    private $database = "simple-login";
    private $db_host = "127.0.0.1";
    private $db_user = "root";
    private $db_password = "sz1";

    private $db = null;

    function __construct()
    {

        try {
            $conn = new \PDO(
                "mysql:host=$this->db_host;dbname=$this->database",
                $this->db_user,
                $this->db_password
            );
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db = $conn;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    function save(User $user): bool
    {
        try {
            $sql = "INSERT INTO users (email, password) VALUES (?,?)";
            $this->db->prepare($sql)->execute([$user->email, $user->password]);
        } catch (\PDOException $e) {
            print_r($e->getMessage());
            die();
        }
        return true;
    }

    function findByEmail(string $email): User | null
    {
        try {
            $sql = "SELECT * FROM users where email= ?";
            $statement = $this->db->prepare($sql);
            $statement->execute([$email]);
            $result = $statement->fetch(\PDO::FETCH_ASSOC);

            if (!$result) return null;

            $user = new User();
            $user->email = $result['email'];
            $user->password = $result['password'];

            return $user;
        } catch (\PDOException $e) {
            print_r($e->getMessage());
            die();
        }

        return true;
    }
}
