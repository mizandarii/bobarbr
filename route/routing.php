<?php

// УБРАТЬ — уже подключено в index.php
// require_once __DIR__ . '/../langLoader.php';

$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/', $host)[$num];

// Используем везде $content — layout ожидает именно эту переменную
if($path == '' OR $path == 'index' OR $path == 'index.php'){
    $content = Controller::StartSite();
}
elseif($path == 'all') {
    $content = Controller::AllEntities();
}
elseif($path == 'category' and isset ($_GET['id'])){
    $content = Controller::EntitiesByCatID($_GET['id']);
}
elseif($path == 'entities' and isset ($_GET['id'])){
    $content = Controller::EntitiesByID($_GET['id']);
}
elseif($path == 'insertcomment' and isset($_GET['comment'], $_GET['id'])){
    $content = Controller::InsertComment($_GET['comment'], $_GET['id']);
}
elseif($path == 'book' and isset($_GET['user'], $_GET['object'], $_GET['start'], $_GET['end'])){
    $content = Controller::InsertBooking($_GET['user'], $_GET['object'], $_GET['start'], $_GET['end']);
}
elseif ($path == 'registerForm'){
    $controller = new Controller();
    $content = $controller->registerForm();
}
elseif($path == 'registerAnswer'){
    $controller = new Controller();
    $content = $controller->registerUser(); // изменено: сохраняем в $content
}
else {
    $content = Controller::error404();
}
