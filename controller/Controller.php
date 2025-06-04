<?php
// ... other includes
//require_once __DIR__ . '/../view/entities.php'; 
//require_once __DIR__ . '/../view/comments.php';




class Controller {
    public static function StartSite() {
        $arr = Entities::getLast10Entities();
        include_once 'view/start.php';
    }

    public static function AllCategory() {
        $arr = Category::getAllCategory();
        include_once 'view/category.php'; 
    }

    public static function AllEntities() {
        $arr = Entities::getAllEntities();
        include_once 'view/allentities.php';
    }

    public static function EntitiesByCatID($id) {
        $arr = Entities::getEntitiesByCategoryID($id);
        include_once 'view/catentities.php';
    }

    public static function EntitiesByID($id) {
        $n = Entities::getEntitiesByID($id);
        include_once 'view/readentities.php';
    }

    public static function error404() {
        header("HTTP/1.1 404 Not Found");
        include_once 'view/error404.php';
        exit();
    }

    public static function InsertComment($c, $id) {
        Comments::InsertComment($c, $id);
        header('Location: entities?id=' . $id . '#ctable');
    }

    public static function BookApartment() {
        $userId = $_POST['user'];
        $objectId = $_POST['object'];
        $startDate = $_POST['start'];
        $endDate = $_POST['end'];
    
        if (Booking::insertBooking($userId, $objectId, $startDate, $endDate)) {
            header("Location: entities?id=$objectId&booking_success=true");
            exit;
        } else {
            echo "Tekkis viga broneeringu salvestamisel.";
        }
    }

    public static function Comments($entitiesId) {
        $arr = Comments::getCommentByEntitiesID($entitiesId);
        ViewComments::CommentsByEntitiesID($arr);
    }

    public static function CommentsCount($entitiesId) {

        if (isset($entitiesId) && !empty($entitiesId)) {
            $arr = Comments::getCommentsCountByEntitiesID($entitiesId);
            ViewComments::CommentsCount($arr);
        } else {
            echo "Kommentaarid puuduvad.";
        }
    }

    public static function CommentsCountWithAncor($entitiesId) {
        $arr = Comments::getCommentsCountByEntitiesID($entitiesId);
        ViewComments::CommentsCountWithAncor($arr);
    }

public function registerForm() {
    ob_start();
    include 'view/formRegister.php';
    return ob_get_clean(); // Возвращаем HTML как $content
}



    public function registerUser() {
        $register = new Register();
        $result = $register->registerUser();
        include_once('view/answerRegister.php');
    }
}
?>
 