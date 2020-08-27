<?php

class Connection {

    private $dsn = "mysql:host=localhost;dbname=simplecrudapi";
    private $user = "root";
    private $password = "";

    public static function connect() {

        try {

            $conn = new \PDO($this->dsn, $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(\PDOException $e) {

            echo $e->getMessage();

        }
        return $conn;

    }

}
