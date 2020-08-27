<?php

header("Access-Control-Allow-Origin: *");
header('content-type: application/json');

require "config/Connection.php";
require "config/core.php";
require "models/Customer.php";
require "repositories/CustomerRepository.php";
//Delete record from database

$id = $_POST['id'];

$customer = new Customer();

$customer->__set('id', $id);

$customersRepository = new CustomerRepository($customer);

if($aptRep->remove()) {

    echo json_encode(

        array("message" => "Item removed")

    );

} else {

    http_response_code(404);

    echo json_encode(

        array("message" => "Item not found")

    );

}

