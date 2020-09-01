<?php

/**
 * 
 * booking.php
 * 
 * Création de l'objet "booking"
 *   Cet objet servira pour toutes les méthodes de réservations coté administrateur
 * 
 */

 
$booking = new booking($db);


if(isset($_POST['switch_state_booking'])){
    $id = $_POST['id_booking'];
    $status = $_POST['new_status'];
    $booking -> switchState($id, $status);
}