<?php
require_once __DIR__ . '/../langLoader.php';

Class Category{
    public static function getAllCategory(){
        $query = "SELECT * FROM category";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }
}