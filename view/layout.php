<?php

//echo "<pre>LANG: $langCode\n"; print_r($lang); echo "</pre>";

//echo 'LANG: ' . $_SESSION['lang'];

?>
<!DOCTYPE html>
<html lang="<?= $langCode ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $lang['admin_panel'] ?? 'Admin' ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">

    <style>
        nav { background: #703C96; }
        .menu-toggle { display: none; background: #703C96; color: white; font-size: 24px; padding: 10px 15px; border: none; cursor: pointer; }
        .submenu { display: none; position: absolute; }
        .topmenu li:hover .submenu { display: block; }

        @media (max-width: 768px) {
            .menu-toggle { display: block; }
            .topmenu { display: none; flex-direction: column; gap: 10px; background-color: #703C96; padding: 10px; }
            .topmenu li { width: 100%; }
            .topmenu a { color: white; display: block; padding: 10px; }
            .topmenu li:hover .submenu { display: block; position: static; }
            .pull-right { margin-top: 10px; }
        }
    </style>

</head>

<body>

<nav class="one">
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
    <ul class="topmenu" id="mainMenu">
        <li>
            <a href="#"><?= $lang['categories'] ?? 'Categories' ?> <i class="fa fa-angle-down"></i></a>
            <ul class="submenu" style="background-color:#703C96;">
                <?php Controller::AllCategory(); ?>
            </ul>
        </li>
        <li><a href="iwww"><?= $lang['info'] ?? 'Info' ?></a></li>
        <li><a href="./"><?= $lang['homepage'] ?? 'Homepage' ?></a></li>
        <li><a href="registerForm"><?= $lang['register'] ?? 'Register' ?></a></li>

            <div class="pull-right" style="margin-left: 20px;">
<a href="<?= buildLangUrl('et') ?>">ET</a> |
<a href="<?= buildLangUrl('en') ?>">EN</a>



    </ul>
    <div class="pull-right">
        <form action="search">
            <input type="text" name="otsi">
            <input type="submit" value="<?= $lang['search'] ?? 'Search' ?>">
        </form>
    </div>

</div>

</nav>

<section style="width: 100%;max-width: 100%;padding-top:10px;">
    <div class="divBox">
        <?php
        if (isset($content)) {
            echo $content;
        } else {
            echo '<h1>' . ($lang['content_missing'] ?? 'Content is gone') . '</h1>';
        }
        ?>
    </div>
</section>

<hr>
<p style="text-align: center;">SPTV22 2025 &copy;</p>

<footer>
<script>
    function toggleMenu() {
        const menu = document.getElementById("mainMenu");
        menu.style.display = menu.style.display === "flex" ? "none" : "flex";
    }
</script>
</footer>
</body>
</html>
