<?php
class ViewNews {
    // Метод для отображения новостей по категориям
    public static function NewsByCategory($arr) {
        foreach ($arr as $value) {
            echo '<img src="data:image/jpeg;base64,' . base64_encode($value['picture']) . '" width="400"/><br>';
            echo "<h2>" . $value['title'] . "</h2>";
            Controller::CommentsCount($value['id']);
            echo "<br />";
            echo "<strong>" . $value['price'] . "€/öö</strong><br />";
            echo "<br/>";
            echo "<a href='news?id=" . $value['id'] . "'>uuri lähemalt</a><br>";
        }
    }

    // Метод для отображения всех новостей
    public static function AllNews($arr) {
        foreach ($arr as $value) {  // Пропущен символ $
            echo  $value['title'];
            Controller::CommentsCount($value['id']);
            echo "<br />";
            echo "<strong>" . $value['price'] . "€/öö</strong><br />";

            echo "<a href='news?id=" . $value['id'] . "'>uuri lähemalt</a>";
            echo "</li><br />";
            
        }
    }

    // Метод для отображения одной новости
    public static function ReadNews($n) {
        echo "<h2>" . $n['title'] . "</h2>";
        Controller::CommentsCountWithAncor($n['id']);
        echo '<br>';
        echo '<br><img src="data:image/jpeg;base64,' . base64_encode($n['picture']) . '" width="400"/><br>';
        echo "<p>" . $n['price'] . " <strong> eur/öö: </strong> </p>";
        echo "<p>" . $n['text'] . "</p>";
        echo "<p><strong>Aadress: </strong> " . $n['address'] . "</p>";
        echo "<p><strong>Linn: </strong> " . $n['city'] . "</p>";
        echo "<p><strong>Riik: </strong> " . $n['country'] . "</p>";
        echo "<p><strong>Suurus (m2): </strong> " . $n['size'] . "</p>";
        echo "<p><strong>Korrus: </strong> " . $n['floor'] . "</p>";

    }


}
