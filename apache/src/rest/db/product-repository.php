<?php
include('database.php');
class Product{
    public $id;
    public $name;
    public $caloric;

    function __construct($p_name, $p_caloric,$p_id=0) {
        $this->id =$p_id;
        $this->name = $p_name;
        $this->caloric = $p_caloric;
    }
}
class ProductRepository{

    public static function create($name, $caloric) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("INSERT INTO products (name, caloric) VALUES ('$name', '$caloric')");
    }
    
    public static function read() {
        $response = [];
        $mysqli = ConnectionDB::getInstance();
        $result = $mysqli->query("SELECT * FROM products");
        foreach ($result as $row){
            $response[count($response)] = new Product($row['name'], $row['caloric'], $row['ID']);
        }
        return $response;
    }
    
    public static function update($id, $name, $caloric) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("UPDATE products SET name = '$name', caloric = '$caloric' WHERE id = '$id'");
    }
    
    public static function delete($id) {
        $mysqli = ConnectionDB::getInstance();
        return $mysqli->query("DELETE FROM products where id = '$id'");
    }
}
?>