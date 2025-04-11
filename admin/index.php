<<<<<<< HEAD
<?php
session_start();
    require_once '../inc/database.php';
    include_once ("modelAdmin/modelAdmin.php");
    include_once ("modelAdmin/modelAdminNews.php");
    include_once ("modelAdmin/modelAdminCategory.php");

    include_once ("controllerAdmin/controllerAdmin.php");
    include_once ("controllerAdmin/controllerAdminNews.php");
    
    include('routeAdmin/routingAdmin.php');
=======
<?php
session_start();
    require_once '../inc/database.php';
    include_once ("modelAdmin/modelAdmin.php");
    include_once ("modelAdmin/modelAdminNews.php");
    include_once ("modelAdmin/modelAdminCategory.php");

    include_once ("controllerAdmin/controllerAdmin.php");
    include_once ("controllerAdmin/controllerAdminNews.php");
    
    include('routeAdmin/routingAdmin.php');
>>>>>>> 2668641d4a3fcce24fb699128d4709ca82e17a9e
    echo $response;