<?php
//вычислить маршрут из адресной строки
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/',$host)[$num];

if($path == '' OR $path == 'index' OR $path == 'index.php'){
    $response = Controller::StartSite();
}

elseif($path == 'all') {
    $response = Controller::AllNews();
}
elseif($path == 'category' and isset ($_GET['id'])){
    $response = Controller::NewsByCatID($_GET['id']);
}
elseif($path == 'news' and isset ($_GET['id'])){
    $response = Controller::NewsByID($_GET['id']);
}

elseif($path == 'insertcomment' and isset($_GET['comment'], $_GET['id']))
{
    $response = Controller::InsertComment($_GET['comment'], $_GET['id']);
}



elseif($path == 'book' and isset($_GET['user'], $_GET['object'], $_GET['start'], $_GET['end']))
{
    $response = Controller::InsertBooking($_GET['user'], $_GET['object'], $_GET['start'], $_GET['end']);
}




elseif ($path == 'registerForm'){
    //$response = Controller::registerForm();
    $controller = new Controller();
    $response = $controller->registerForm();
}
elseif($path == 'registerAnswer'){
    $controller = new Controller();
    $response = $controller->registerUser();
    //$response = Controller::registerUser(); 
}

else{
    $response = Controller::error404();
}