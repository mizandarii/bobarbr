<<<<<<< HEAD
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
=======
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
>>>>>>> 2668641d4a3fcce24fb699128d4709ca82e17a9e
}