<?php
include('database.php');
class Dish{
    public $id;
    public $name;
    public $price;

    function __construct($d_name, $d_price,$d_id=0) {
        $this->id =$d_id;
        $this->name = $d_name;
        $this->price = $d_price;
    }
}
class DishRepository{

    public static function create($name, $price) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("INSERT INTO dishes (name, price) VALUES ('$name', '$price')");
    }
    
    public static function read() {
        $response = [];
        $mysqli = ConnectionDB::getInstance();
        $result = $mysqli->query("SELECT * FROM dishes");
        foreach ($result as $row){
            $response[count($response)] = new Dish($row['name'], $row['price'], $row['ID']);
        }
        return $response;
    }
    
    public static function update($id, $name, $price) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("UPDATE dishes SET name = '$name', price = '$price' WHERE id = '$id'");
    }
    
    public static function delete($id) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("DELETE FROM dishes where id = '$id'");
    }
}
?>