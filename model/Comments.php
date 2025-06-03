<?php
require_once __DIR__ . '/../langLoader.php';

class Comments {
    public static function insertComment($c, $id) {
        $query = "INSERT INTO comments (entity_id, textt, date_added) VALUES ('".$id."', '".$c."', CURRENT_TIMESTAMP)";
        $db = new Database();
        $q = $db->executeRun($query);
        return $q;
    }

    public static function getCommentByEntitiesID($id) {
        $query = "SELECT * FROM comments WHERE entity_id = ".(string)$id." ORDER BY id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getCommentsCountByEntitiesID($id) {
        $query = "select count(id) as 'count' from comments where entity_id=".(string)$id;
        $db = new Database();
        $c = $db->getOne($query);
        return $c;
    }
    
}
?>
