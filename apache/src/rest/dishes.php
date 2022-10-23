<?php
include('db/dish-repository.php');

// необходимые HTTP-заголовки
header("Content-Type: application/json; charset=UTF-8");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(DishRepository::read());
        break;
    case 'POST':
        $newDish = json_decode(file_get_contents('php://input'));
        DishRepository::create($newDish->name, $newDish->price);
        break;
    case 'PUT':
        $newDish = json_decode(file_get_contents('php://input'));
        echo DishRepository::update($newDish->id, $newDish->name, $newDish->price);
        break;
    case 'DELETE':
        $oldDish = json_decode(file_get_contents('php://input'));
        echo DishRepository::delete($oldDish->id);
        break;
    }
    ?>