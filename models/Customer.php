<?php

class Customer{

    private $id;
    private $name;
    private $cpf;
    private $birth_date;

    public function __get($attr) {

        return $this->$attr;

    }

    public function __set($attr, $value) {

        $this->$attr = $value;

    }

}