<?php
$users = new Users($db);
$products = new Products($db);

// RESERVATION EQUIPEMENTS

if (isset($_POST['reserve'])) {
    $id_order = time().$_SESSION['user_id'];
    
    if (!empty($_POST['products'])) {
        foreach ($_POST['products'] as $prod_id) {
            $id_equipment = filter_var($prod_id, FILTER_SANITIZE_NUMBER_INT);
            $id_user = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
            $reason_booking = filter_var($_POST['motif'], FILTER_SANITIZE_STRING);
            $user_level = filter_var($_SESSION['user_level'], FILTER_SANITIZE_NUMBER_INT);
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            
            // DATE VALIDATION
            if($start_date > $end_date) {
                $products->set_errors('La date de fin de réservation doit étre supérieur à celle de début de réservation');
            }

            // motif de la réservation VALIDATION
            if (empty($reason_booking)) {
                $products->set_errors('Entrez un motif de réservation');
            }

            if($reason_booking > 255) {
                $products->set_errors('Le motif de la réservation ne doit pas dépasser 255 charactères');
            }
            // Register booking 

            if (empty($products->get_errors())) {
                $result = $products->registerUserBooking($id_order, $id_equipment, $id_user, $reason_booking, $user_level, $start_date, $end_date);
            }
        }
        if($result > 0){
            $products -> set_errors('Enregistrement réussi');
        }
    } else {
        $products->set_errors('Veuillez choisir un équipement');
    }
}