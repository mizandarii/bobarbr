<?php 
class modelAdminNews{
    public static function getNewsList(){
        $query = "SELECT rentals.*, category.name, users.username from rentals, category, users WHERE rentals.category_id=category.id AND rentals.user_id=users.id ORDER BY 'rentals', 'id' DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr; 
    }


    public static function getNewsAdd(){
        $test=false;
        if(isset($_POST['save'])){
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory'])){
                $title=$_POST['title'];
                $text=$_POST['text'];
                $idCategory=$_POST['idCategory'];

                $image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                $sql="INSERT into `rentals` (`id`, `title`, `text`, `picture`, `category_id`, `user_id`) values (null, '$title', '$text', '$image', '$idCategory', '1')";
                $db = new Database();
                $item = $db->executeRun($sql);
                if($item==true){
                    $test=true;
                }
                
            }
        }
        return $test;
    }


    public static function getNewsDetail($id){
        $query = "SELECT rentals.*, category.name, users.username from rentals, category, users
        where rentals.category_id = category.id and rentals.user_id = users.id and rentals.id = ".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }

    public static function getNewsEdit($id){
        $test=false;
        if(isset($_POST['save'])){
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory'])){
                $title=$_POST['title'];
                $text=$_POST['text'];
                $category_id=$_POST['idCategory'];

                $image=$_FILES['picture']['name'];
                if($image!=""){
                    $image=addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                }
                if($image==''){
                    $sql="update `rentals` set `title` = '$title', `text` = '$text', `picture` = '$image', `category_id`='$category_id' where `rentals`.`id` =".$id;
                }
                else{
                    $sql = "update `rentals` set `title` = '$title', `text` = '$text', 
                    `picture` = '$image', `category_id`='$category_id' where `rentals`.`id`=".$id;
                }
                $db = new Database();
                $item=$db->executeRun($sql);
                if($item==true){
                    $test=true;
                }
            }
        }
        return $test;
    }

    public static function getNewsDelete($id){
        $test=false;
        if(isset($_POST['save'])){
            $sql="delete from `rentals` where `rentals`.`id` = ".$id;
            $db = new Database();
            $item=$db->executeRun($sql);
            if($item==true){
                $test=true;
            }
        }
        return $test;
    }
}