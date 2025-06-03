<?php
require_once __DIR__ . '/../langLoader.php';

Class Booking{
    
public static function insertBooking($user, $object, $start, $end) {
    $query = "INSERT INTO booking (user_id, rental_id, startDate, endDate) VALUES ('".$user."', '".$object."', '".$start."', '".$end."')";
    $db = new Database();
    $q = $db->executeRun($query);
    return $q;
}
}
