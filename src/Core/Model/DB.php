<?php

namespace Shams\Simple\Core\Model;

class DB
{
    protected $database = "simple-login";
    protected $db_host = "127.0.0.1";
    protected $db_user = "root";
    protected $db_password = "sz1";

    protected $db = null;

    public function __construct()
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
}
