<?php
class ViewEntities {
    // Метод для отображения новостей по категориям
public static function EntitiesByCategory($arr) {
    echo '
    <style>
    .card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 30px;
        padding: 15px;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        opacity: 0;
        transform: translateY(20px);
        animation: fadeSlideIn 0.5s ease forwards;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    @media (min-width: 700px) {
        .card {
            flex-direction: row;
        }
    }

    .card:hover {
        transform: translateY(0) scale(1.03);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

.card-img-wrapper {
    width: 100%;
    max-width: 400px;
    flex-shrink: 0;
}

.card img {
    width: 100%;
    height: auto;
    border-radius: 6px;
}

    @keyframes fadeSlideIn {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    </style>
    ';

    $i = 0;
    foreach ($arr as $value) {
        $delay = $i * 0.1;
        echo '<div class="card" style="animation-delay: '.$delay.'s;">';

        // Картинка
echo '<div class="card-img-wrapper">';
echo '<img src="data:image/jpeg;base64,' . base64_encode($value["picture"]) . '" />';
echo '</div>';

        // Текст
        echo '<div style="margin-left: 20px;">';
        echo '<h2 style="margin: 0 0 10px 0;">';
        echo $value['title'];
        Controller::CommentsCount($value['id']);
        echo '</h2>';

        echo "<p style='margin: 10px 0; font-weight: bold;'>" . htmlspecialchars($value['price']) . "€/öö</p>";
        echo "<a href='entities?id=" . urlencode($value['id']) . "' style='color: #007BFF; text-decoration: none;'>uuri lähemalt</a>";
        echo '</div>';

        echo '</div>';

        $i++;
    }
}


public static function AllEntities($arr) {
    echo ' <style>
    .card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 30px;
        padding: 15px;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        opacity: 0;
        transform: translateY(20px);
        animation: fadeSlideIn 0.5s ease forwards;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    @media (min-width: 700px) {
        .card {
            flex-direction: row;
        }
    }

    .card:hover {
        transform: translateY(0) scale(1.03);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

.card-img-wrapper {
    width: 100%;
    max-width: 400px;
    flex-shrink: 0;
}

.card img {
    width: 100%;
    height: auto;
    border-radius: 6px;
}

    @keyframes fadeSlideIn {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    </style>';

    echo '<div class="cards-container">';

    $i = 0;
    foreach ($arr as $value) {
        $delay = $i * 0.1;
        echo '<div class="card" style="animation-delay: '.$delay.'s;">';


echo '<div class="card-img-wrapper">';
echo '<img src="data:image/jpeg;base64,' . base64_encode($value["picture"]) . '" />';
echo '</div>';


        echo '<div style="margin-left: 20px;">';
        echo '<h2 style="margin: 0 0 10px 0;">';
        echo $value['title'];
        Controller::CommentsCount($value['id']);
        echo '</h2>';

        echo "<p style='margin: 10px 0; font-weight: bold;'>" . htmlspecialchars($value['price']) . "€/öö</p>";
        echo "<a href='entities?id=" . urlencode($value['id']) . "' style='color: #007BFF; text-decoration: none;'>uuri lähemalt</a>";
        echo '</div>';

        echo '</div>';

        $i++;
    }

    echo '</div>';
}




    public static function ReadEntities($n) {
        echo '<h2 style="margin: 0 0 10px 0; font-size:30px;">';
        echo $n['title'];
        Controller::CommentsCount($n['id']);
        echo '</h2>';
        echo '<br>';
    
        echo '<br><img src="data:image/jpeg;base64,' . base64_encode($n['picture']) . '" width="50%"/><br>';
        echo '<p style="font-size:25px;"><strong>' . $n['price'] . '  &euro;/öö </strong> </p>';
        echo "<p>" . $n['text'] . "</p>";
        echo "<p><strong>Aadress: </strong> " . $n['address'] . "</p>";
        echo "<p><strong>Linn: </strong> " . $n['city'] . "</p>";
        echo "<p><strong>Riik: </strong> " . $n['country'] . "</p>";
        echo "<p><strong>Suurus (m2): </strong> " . $n['size'] . "</p>";
        echo "<p><strong>Korrus: </strong> " . $n['floor'] . "</p>";
    
        echo '<button onclick="openModal()" class="book-btn">Broneeri</button>';
        echo '<br/>';
    

        echo '
<div id="bookingModal" class="modal">
  <div class="modal-content" style="width: 80% !important; margin: 50px auto;">
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

        echo '
<div id="successModal" class="modal">
  <div class="modal-content success-content" style="max-width: 80%; margin: 50px auto;">
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
    position: relative; /* <--- добавь это */
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