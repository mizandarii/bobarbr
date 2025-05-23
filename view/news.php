<?php
class ViewNews {
    // Метод для отображения новостей по категориям
    public static function NewsByCategory($arr) {
        foreach ($arr as $value) {
            echo '<div style="display: flex; align-items: top; margin-bottom: 30px; padding: 15px; border-radius: 8px;">';
        
            // Картинка
            echo '<div style="flex-shrink: 0;">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($value['picture']) . '" width="400" />';
            echo '</div>';
            
            // Текст справа
            echo '<div style="margin-left: 20px;">';
    
            echo '<h2 style="margin: 0 0 10px 0;">';
            echo $value['title'];
            Controller::CommentsCount($value['id']);
            echo '</h2>';
    
            echo "<p style='margin: 10px 0; font-weight: bold;'>" . htmlspecialchars($value['price']) . "€/öö</p>";
            echo "<a href='news?id=" . urlencode($value['id']) . "' style='color: #007BFF; text-decoration: none;'>uuri lähemalt</a>";
            echo '</div>';
            
            echo '</div>';
            echo '<hr/>';
        }
    }

// Метод для отображения всех новостей
public static function AllNews($arr) {
    foreach ($arr as $value) {
        echo '<div style="display: flex; align-items: top; margin-bottom: 30px; padding: 15px; border-radius: 8px;">';
        
        // Картинка
        echo '<div style="flex-shrink: 0;">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($value['picture']) . '" width="400" />';
        echo '</div>';
        
        // Текст справа
        echo '<div style="margin-left: 20px;">';

        echo '<h2 style="margin: 0 0 10px 0;">';
        echo $value['title'];
        Controller::CommentsCount($value['id']);
        echo '</h2>';

        echo "<p style='margin: 10px 0; font-weight: bold;'>" . htmlspecialchars($value['price']) . "€/öö</p>";
        echo "<a href='news?id=" . urlencode($value['id']) . "' style='color: #007BFF; text-decoration: none;'>uuri lähemalt</a>";
        echo '</div>';
        
        echo '</div>';
        echo '<hr/>';
    }
}


    // Метод для отображения одной новости
    public static function ReadNews($n) {
        echo '<h2 style="margin: 0 0 10px 0; font-size:30px;">';
        echo $n['title'];
        Controller::CommentsCount($n['id']);
        echo '</h2>';
        echo '<br>';
    
        echo '<br><img src="data:image/jpeg;base64,' . base64_encode($n['picture']) . '" width="400"/><br>';
        echo '<p style="font-size:25px;"><strong>' . $n['price'] . '  &euro;/öö </strong> </p>';
        echo "<p>" . $n['text'] . "</p>";
        echo "<p><strong>Aadress: </strong> " . $n['address'] . "</p>";
        echo "<p><strong>Linn: </strong> " . $n['city'] . "</p>";
        echo "<p><strong>Riik: </strong> " . $n['country'] . "</p>";
        echo "<p><strong>Suurus (m2): </strong> " . $n['size'] . "</p>";
        echo "<p><strong>Korrus: </strong> " . $n['floor'] . "</p>";
    
        echo '<button onclick="openModal()" class="book-btn">Broneeri</button>';
        echo '<br/>';
    
        // Первое модальное окно (выбор дат)
        echo '
        <div id="bookingModal" class="modal">
            <div class="modal-content">
                <span onclick="closeModal()" class="close">&times;</span>
                <h3>Broneeri majutus</h3>
                <form id="bookingForm">
                    <input type="hidden" name="apartment_id" value="' . $n['id'] . '" />
                    <label for="start_date">Alguskuupäev:</label><br>
                    <input type="date" id="start_date" name="start_date" required><br><br>
    
                    <label for="end_date">Lõppkuupäev:</label><br>
                    <input type="date" id="end_date" name="end_date" required><br><br>
    
                    <button type="submit" class="submit-btn">Kinnita broneering</button>
                </form>
            </div>
        </div>
        ';
    
        // Второе модальное окно (успешное бронирование)
        echo '
<div id="successModal" class="modal">
    <div class="modal-content success-content"> <!-- дополнительный класс -->
        <span onclick="closeSuccessModal()" class="close">&times;</span>
        <div class="check">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24">
                <rect width="24" height="24" fill="none" />
                <path fill="#703C96" fill-rule="evenodd" d="M12 21a9 9 0 1 0 0-18a9 9 0 0 0 0 18m-.232-5.36l5-6l-1.536-1.28l-4.3 5.159l-2.225-2.226l-1.414 1.414l3 3l.774.774z" clip-rule="evenodd" />
            </svg>
        </div>
        <h3>Broneering õnnestus</h3>
    </div>
</div>


        ';
    
        // Стили для обоих модальных окон
        echo '
        <style>
            .book-btn {
                background-color:rgb(162, 134, 179);
                color: white;
                border: none;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                border-radius: 8px;
            }
            .book-btn:hover {
                background-color:rgb(164, 157, 168);
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
    /* обычная форма без flex */
}

/* Только для успешной модалки! */
.success-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 40px 20px;
    position: relative;

}


.check {
    background-color: white;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: -2px;
}

.close {
    position: absolute;
    top: 15px;
    right: 20px;
    color: #aaa;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
}
.close:hover {
    color: black;
}

            .submit-btn {
                background-color: #703C96;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
            }
            .submit-btn:hover {
                background-color:rgb(79, 41, 105);
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
        ';
    
        // Скрипты управления окнами
        echo '
        <script>
            function openModal() {
                document.getElementById("bookingModal").style.display = "block";
            }
            function closeModal() {
                document.getElementById("bookingModal").style.display = "none";
            }
            function openSuccessModal() {
                document.getElementById("successModal").style.display = "block";
            }
            function closeSuccessModal() {
                document.getElementById("successModal").style.display = "none";
            }
            window.onclick = function(event) {
                const bookingModal = document.getElementById("bookingModal");
                const successModal = document.getElementById("successModal");
                if (event.target === bookingModal) {
                    closeModal();
                }
                if (event.target === successModal) {
                    closeSuccessModal();
                }
            }
    
            // Перехватываем отправку формы
            document.getElementById("bookingForm").addEventListener("submit", function(event) {
                event.preventDefault(); // Останавливаем стандартную отправку формы
    
                // Здесь можно отправить форму через AJAX на сервер если нужно
                // но для простоты просто закрываем окно и открываем другое
    
                closeModal();         // Закрываем окно выбора дат
                openSuccessModal();   // Открываем окно успешного бронирования
            });
        </script>
        ';
    }
}    