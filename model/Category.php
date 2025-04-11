<<<<<<< HEAD
<?php
Class Category{
    public static function getAllCategory(){
        $query = "SELECT * FROM category";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }
=======
<?php
Class Category{
    public static function getAllCategory(){
        $query = "SELECT * FROM category";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }
>>>>>>> 2668641d4a3fcce24fb699128d4709ca82e17a9e
}