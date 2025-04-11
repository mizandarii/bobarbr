<<<<<<< HEAD
<?php
class News{
    public static function getLast10News(){
        $query = "SELECT * from rentals order by id desc limit 3";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }

    public static function getAllNews(){
        $query = "SELECT * from rentals order by id desc";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }

    public static function getNewsByCategoryID($id){
        $query = "SELECT * from rentals where category_id = ".(string)$id." order by id desc";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }

    public static function getNewsByID($id){
        $query = "SELECT * from rentals where id = ".(string)$id;
        $db = new Database();
        $n = $db -> getOne($query);
        return $n;
    }


=======
<?php
class News{
    public static function getLast10News(){
        $query = "SELECT * from news order by id desc limit 3";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }

    public static function getAllNews(){
        $query = "SELECT * from news order by id desc";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }

    public static function getNewsByCategoryID($id){
        $query = "SELECT * from news where category_id = ".(string)$id." order by id desc";
        $db = new Database();
        $arr = $db -> getAll($query);
        return $arr;
    }

    public static function getNewsByID($id){
        $query = "SELECT * from news where id = ".(string)$id;
        $db = new Database();
        $n = $db -> getOne($query);
        return $n;
    }


>>>>>>> 2668641d4a3fcce24fb699128d4709ca82e17a9e
}