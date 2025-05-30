<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

  <!-- Bootstrap 4.3.1 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MS+dh/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">

  <!-- Твой локальный CSS -->
  <link rel="stylesheet" type="text/css" href="./style/style.css">

  <!-- Подключение шрифта -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
  <style>
    nav{
        background: #703C96;
    }
/* Базовая стилизация */
.menu-toggle {
    display: none;
    background: #703C96;
    color: white;
    font-size: 24px;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
}

/* Скрыть подменю по умолчанию */
.submenu {
    display: none;
    position: absolute;
}

.topmenu li:hover .submenu {
    display: block;
}

/* Адаптивный режим */
@media (max-width: 768px) {
    .menu-toggle {
        display: block;
    }

    .topmenu {
        display: none;
        flex-direction: column;
        gap: 10px;
        background-color: #703C96;
        padding: 10px;
    }

    .topmenu li {
        width: 100%;
    }

    .topmenu a {
        color: white;
        display: block;
        padding: 10px;
    }

    .topmenu li:hover .submenu {
        display: block;
        position: static;
    }

    .pull-right {
        margin-top: 10px;
    }
}
</style>

</head>

<body>

<nav class="one">
    
    <!-- Бургер-кнопка -->
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>

    <ul class="topmenu" id="mainMenu">
        <li>
            <a href="#">Kategooriad <i class="fa fa-angle-down"></i></a>
            <ul class="submenu" style="background-color:#703C96;">
                <?php Controller::AllCategory(); ?>
            </ul>
        </li>
        <li><a href="iwww">Info</a></li>
        <li><a href="./">Stardileht</a></li>
        <li><a href="registerForm">Register</a></li>
    </ul>

    <div class="pull-right">
        <form action="search">
            <input type="text" name="otsi">
            <input type="submit" value="otsi">
        </form>
    </div>
</nav>

    <section style="width: 100%;max-width: 100%;padding-top:10px;">
        <div class="divBox" >
            <?php
            if (isset($content)){
                echo $content;
            }
            else{
                echo '<h1>Content is gone</h1>';
            }
            ?>
        </div>
    </section>

    <hr>
    <p style="display:block; text-align: center;">SPTV22 2025 a. &copy;</p>
</body>
<footer>
    <script>
    function toggleMenu() {
        const menu = document.getElementById("mainMenu");
        menu.style.display = menu.style.display === "flex" ? "none" : "flex";
    }
</script>

</footer>
</html>
