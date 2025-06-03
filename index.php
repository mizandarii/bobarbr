<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// дальше твой код...

require_once __DIR__ . '/langLoader.php'; // ✅ Load language

include_once 'inc/database.php';
require_once 'model/Category.php';
require_once 'model/Entities.php';
require_once 'model/Comments.php';
require_once 'model/Register.php';
require_once 'model/Booking.php';
require_once 'controller/Controller.php';

// 🔁 Execute routing/controller first to generate $content
ob_start();
include_once 'route/routing.php';
$content = ob_get_clean();

// 📦 Then pass the content into the layout (after it's fully built)
require_once __DIR__ . '/view/layout.php'; 
?>
