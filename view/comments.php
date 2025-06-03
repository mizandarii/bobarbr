<?php
class ViewComments {
    public static function CommentsForm() {
        $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : 0;
        echo '<form action="insertcomment">
        <input type="hidden" name="id" value="' . $id . '">
        Teie kommentaar: <input type="text" name="comment">
        <input type="submit" value="Saada"></form>';
    }

    public static function CommentsByEntitiesID($arr) {
        if ($arr != null) {
            echo '<div style="width: 33%; min-width: 300px;">';
            echo '<table id="ctable"><th style="background-color: #503168; color:white;">Kommentaar</th><th style="background-color: #503168; color:white;">Kuupäev</th>';
            foreach ($arr as $value) {
                echo '<tr><td>' . htmlspecialchars($value['textt']) . "</td><td>" . htmlspecialchars($value['date_added']) . "</td></tr>";
            }
            echo '</table>';
            echo '</div>';
        }
    }

    public static function CommentsCountWithAncor($value) {
        if (isset($value['count']) && $value['count'] > 0) {
            echo '<b><font color="red">(' . $value['count'] . ')</font></b>';
        }
    }

    public static function CommentsCount($value) {
        if ($value !== null && isset($value['count']) && $value['count'] > 0) {
            echo '<b><font color="red">(' . $value['count'] . ')</font></b>';
        } else {
            echo '<b><font color="gray">(0)</font></b>';
        }
    }
}
