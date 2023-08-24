<?php

namespace Shams\Simple\model;

use Shams\Simple\Core\Model\DB;

use Shams\Simple\entity\User;

class UserModel extends DB
{
    protected $user;

    function __construct()
    {
        parent::__construct();
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
