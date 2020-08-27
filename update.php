<?php

header("Access-Control-Allow-Origin: *");
header('content-type: application/json');

require "config/Connection.php";
require "config/core.php";
require "models/Customer.php";
require "repositories/CustomerRepository.php";
//Update record in database

$name = $_POST['name'];
$id = $_POST['id'];

$customer = new Customer();

$customer->__set("id", $id);
$customer->__set("name", $name);

$customerRep = new CustomerRepository($customer);

if($customerRep->update()) {

    echo json_encode(

        array("message", "Item successfully updated")

    );

} else {

    http_response_code(404);

    echo json_encode(

        array("message", "Item not found")

    );

}