<?php 
session_start(); // не комментируйте это

require_once 'langloader.php'; // Только здесь — один раз!

include_once 'inc/database.php';
require 'model/Category.php';
require 'model/Entities.php';
require 'model/Comments.php';
require 'model/Register.php';
require 'model/Booking.php';

include_once 'controller/Controller.php';

// Сначала routing (он должен установить $content)
include_once 'route/routing.php';

// Layout рендерит на основе $content и $lang
require_once 'view/layout.php';
