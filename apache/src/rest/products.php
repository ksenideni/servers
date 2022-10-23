<?php
include('db/product-repository.php');

// необходимые HTTP-заголовки
header("Content-Type: application/json; charset=UTF-8");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(ProductRepository::read());
        break;
    case 'POST':
        $newProduct = json_decode(file_get_contents('php://input'));
        ProductRepository::create($newProduct->name, $newProduct->caloric);
        break;
    case 'PUT':
        $newProduct = json_decode(file_get_contents('php://input'));
        echo ProductRepository::update($newProduct->id, $newProduct->name, $newProduct->caloric);
        break;
    case 'DELETE':
        $oldProduct = json_decode(file_get_contents('php://input'));
        echo ProductRepository::delete($oldProduct->id);
        break;
    }
    ?>