<?php

$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/', $host)[$num];

if($path == '' OR $path == 'index.php')
{
    //main page
    $response = controllerAdmin::formLoginSite();
}
elseif($path == 'login')
{
    //login
    $response = controllerAdmin::loginAction();
}
elseif($path=='logout')
{
    //lpgout
    $response = controllerAdmin::logoutAction();
}

elseif($path == 'entitiesAdmin'){
    $response=controllerAdminEntities::EntitiesList();
}

elseif($path=='entitiesAdd'){
    $response=controllerAdminEntities::entitiesAddForm();
}

elseif($path == 'entitiesAddResult'){
    $response = controllerAdminEntities::entitiesAddResult();
}

elseif($path=='entitiesEdit' && isset($_GET['id'])){
    $response=controllerAdminEntities::entitiesEditForm($_GET['id']);
}

elseif($path == 'entitiesEditResults' && isset($_GET['id'])){
    $response=controllerAdminEntities::entitiesEditResult($_GET['id']);
}
elseif($path =='entitiesDel' && isset($_GET['id'])){
    $response=controllerAdminEntities::entitiesDeleteForm($_GET['id']);
}
elseif($path=="entitiesDelResult" && isset($_GET['id'])){
    $response = controllerAdminEntities::entitiesDeleteResult($_GET['id']);
}
else{
    //page does not exist
    $response = controllerAdmin::error404();
}