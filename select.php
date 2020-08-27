<?php

header("Access-Control-Allow-Origin: *");
header('content-type: application/json');

require "config/Connection.php";
require "config/core.php";
require "models/Customer.php";
require "repositories/CustomerRepository.php";

$cpf = $_POST['cpf'];

$customer = new Customer();

$customer->__set('cpf', $cpf);

$customersRepository = new CustomerRepository($customer);

//retorna um fetch assoc
$customersRepository->load();

if(!empty($customersRepository->load())){

    echo json_encode(

        $customersRepository->load()

    );

} else {

    http_response_code(404);

    echo json_encode(

        array("message" => "Item not found")

    );

}