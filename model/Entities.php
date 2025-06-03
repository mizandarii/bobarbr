<?php
require_once __DIR__ . '/../langLoader.php';

class Entities{
    public static function getLast10Entities(){
        $query = "SELECT * from rentals order by id desc limit 3";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }

    public static function getAllEntities(){
        $query = "SELECT * from rentals order by id desc";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }

    public static function getEntitiesByCategoryID($id){
        $query = "SELECT * from rentals where category_id = ".(string)$id." order by id desc";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }

    // public static function getCategoryNameByID($id){
    //     $query = "SELECT name from category where category_id = ".(string)$id." order by id desc";
    //     $db = new Database();
    //     $catName = $db -> getOne($query);
    //     return $catName;
    // }

    public static function getEntitiesByID($id){
        $query = "SELECT * from rentals where id = ".(string)$id;
        $db = new Database();
        $n = $db -> getOne($query);
        return $n;
    }


}