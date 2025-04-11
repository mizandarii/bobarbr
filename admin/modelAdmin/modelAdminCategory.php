<<<<<<< HEAD
<?php
class modelAdminCategory{
    public static function getCategoryList(){
        $sql = "select * from category order by category.name asc";
        $db = new Database();
        $rows = $db->getAll($sql);
        return $rows;
    }
}
=======
<?php
class modelAdminCategory{
    public static function getCategoryList(){
        $sql = "select * from category order by category.name asc";
        $db = new Database();
        $rows = $db->getAll($sql);
        return $rows;
    }
}
>>>>>>> 2668641d4a3fcce24fb699128d4709ca82e17a9e
?>