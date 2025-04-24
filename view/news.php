<?php
class ViewNews {
    // Метод для отображения новостей по категориям
    public static function NewsByCategory($arr) {
        foreach ($arr as $value) {
            echo '<img src="data:image/jpeg;base64,' . base64_encode($value['picture']) . '" width="400"/><br>';
            echo "<h2>" . $value['title'];
            Controller::CommentsCount($value['id']);
            echo "</h2>";
            
            echo "<strong>" . $value['price'] . "€/öö</strong><br />";
            echo "<br/>";
            echo "<a href='news?id=" . $value['id'] . "'>uuri lähemalt</a><br>";
        }
    }

    // Метод для отображения всех новостей
    public static function AllNews($arr) {
        foreach ($arr as $value) {  // Пропущен символ $
            echo '<img src="data:image/jpeg;base64,' . base64_encode($value['picture']) . '" width="400"/><br>';
            echo  $value['title'];
            Controller::CommentsCount($value['id']);
            echo "<br />";
            echo "<strong>" . $value['price'] . "€/öö</strong><br />";

            echo "<a href='news?id=" . $value['id'] . "'>uuri lähemalt</a>";
            echo "</li><br />";
            echo "<hr/>";
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
    
        echo '<button onclick="openModal()" class="book-btn">Broneeri</button>';
    
        // Модальное окно
        echo '
        <div id="bookingModal" class="modal">
            <div class="modal-content">
                <span onclick="closeModal()" class="close">&times;</span>
                <h3>Broneeri majutus</h3>
                <form action="book.php" method="POST">
                    <input type="hidden" name="apartment_id" value="' . $n['id'] . '" />
                    <label for="start_date">Alguskuupäev:</label><br>
                    <input type="date" id="start_date" name="start_date" required><br><br>
    
                    <label for="end_date">Lõppkuupäev:</label><br>
                    <input type="date" id="end_date" name="end_date" required><br><br>
    
                    <button type="submit" class="submit-btn">Kinnita broneering</button>
                </form>
            </div>
        </div>
    
        <style>
            .book-btn {
                background-color: #007bff;
                color: white;
                border: none;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                border-radius: 8px;
            }
    
            .book-btn:hover {
                background-color: #0056b3;
            }
    
            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0,0,0,0.5);
                animation: fadeIn 0.3s ease-in-out;
            }
    
            .modal-content {
                background-color: #fefefe;
                margin: 10% auto;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 10px;
                width: 90%;
                max-width: 400px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
                animation: slideDown 0.4s ease;
            }
    
            .close {
                color: #aaa;
                float: right;
                font-size: 24px;
                font-weight: bold;
                cursor: pointer;
            }
    
            .close:hover {
                color: #000;
            }
    
            .submit-btn {
                background-color: #28a745;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
            }
    
            .submit-btn:hover {
                background-color: #1e7e34;
            }
    
            @keyframes slideDown {
                from { transform: translateY(-30px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }
    
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        </style>
    
        <script>
            function openModal() {
                document.getElementById("bookingModal").style.display = "block";
            }
    
            function closeModal() {
                document.getElementById("bookingModal").style.display = "none";
            }
    
            window.onclick = function(event) {
                const modal = document.getElementById("bookingModal");
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        ';
    }
    


}
