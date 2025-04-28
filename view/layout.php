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
</head>

</head>
<body>
    <nav class="one">
        <ul class="topmenu">
            <li><a href="#">Kategooriad<i class="fa fa-angle-down"></i></a>
                <ul class="submenu" style="background-color:#703C96;">
                    <?php
                        Controller::AllCategory();
                    ?>
                </ul>
            </li>
            <li><a href="iwww">Info</a></li>
            <li><a href="./">Stardileht</a></li> <!-- Исправлена кавычка -->
            <li><a href="registerForm">Register</a></li>
        </ul>
        
        <!-- Размещаем форму поиска за пределами списка ul -->
        <div class="pull-right">
            <form action="search">
                <input type="text" name="otsi">
                <input type="submit" value="otsi"> 
            </form>
        </div>
    </nav>

    <section>
        <div class="divBox">
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
</html>
