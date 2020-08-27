<?php

header("Access-Control-Allow-Origin: *");
header('content-type: application/json');

require "config/Connection.php";
require "config/core.php";
require "models/Customer.php";
require "repositories/CustomerRepository.php";

$name = $_POST['name'];
$birth = $_POST['birth_date'];
$cpf = $_POST['cpf'];

$customer = new Customer();

$customer->__set("name", "$name");
$customer->__set("bith_date", "$birth_date");
$customer->__set("cpf", "$cpf");


$customersRepository = new CustomerRepository($customer);

if($customersRepository->save()) {

    echo json_encode(

        array("message" => "Item successfully created")

    );

} else {

    http_response_code(404);

    echo json_encode(

        array("message" => "Item not found")

    );

}
