<?php

require "../config/Connection.php";

class CustomerRepository {

    private $customer;

    function __construct($customer) {

        $this->customer = $customer;

    }

    public function save() {

        $pdo = Connection::connect();

        if($pdo instanceof PDO) {

            $stmt = $pdo->prepare("INSERT INTO customers (name, cpf, data_nascimento) VALUES (:nome, :cpf, :date)");
            $stmt->bindParam(':name', $this->customer->__get("name"));
            $stmt->bindParam(':cpf', $this->customer->__get("cpf"));
            $stmt->bindParam(':date', $this->customer->__get("birth_date"));
            
            return $stmt->execute();

        }
        return false;

    }
    public function load() {

        $pdo = Connection::connect();

        if($pdo instanceof PDO) {

            $sql = "SELECT
                        id,
                        name,
                        cpf,
                        data_nascimento
                    FROM
                        customers
                    WHERE
                        cpf = :cpf";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':cpf', $this->customer->__get("cpf"));
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_BOTH);

        }
        return array(
            
            0 => "A query retornou um conjunto vazio de registros.",
            "message" => "A query retornou um conjunto vazio de registros."
        
        );

    }
    public function update() {

        $pdo = Connection::connect();

        if($pdo instanceof PDO) {

            $sql = "UPDATE 
                        customer 
                    SET
                        name = :name
                    WHERE 
                        id = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $this->customer->__get("id"));
            $stmt->bindParam(':name', $this->customer->__get("name"));

            return $stmt->execute();
        
        }
        return false;

    }
    public function remove() {

        $pdo = Connection::connect();

        if($pdo instanceof PDO) {

            $stmt = $pdo->prepare("DELETE FROM APONTAMENTOS WHERE id = :id");
            $stmt->bindParam(':id', $this->customer->__get("id"));
        
            return $stmt->execute();
        
        }
        return false;

    }

}