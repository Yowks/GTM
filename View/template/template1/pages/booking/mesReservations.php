<?php
    require 'Controller/UsersReservation.controller.php';
?>
<h1>Mes Réservations</h1>
<br>
<ul>
    <?php foreach ($products->getUserBooking($_SESSION['user_id']) as $ub): ?>
    <li><span>Equipement:</span> <?php echo htmlspecialchars($ub['name']);?></li>
    <li><span>Motif de la réservation:</span> <?php echo htmlspecialchars($ub['reason_booking']);?></li>
    <li><span>Date de la réservation:</span> <?php echo date("d/m/Y", strtotime($ub['date_reservation']));?></li>
    <li><span>Début de la réservation:</span> <?php echo date("d/m/Y", strtotime($ub['start_date']));?></li>
    <li><span>Fin de la réservation:</span> <?php echo date("d/m/Y", strtotime($ub['end_date']));?></li>
    <li><span>Status de la réservation:</span>
        <?php
            switch ($ub['status']) {
                case 1:
                    echo "en attente";
                    break;
                case 2:
                    echo "en cours de préparation";
                    break;
                case 3:
                    echo "finis";
                    break;
            }
        ?>
    </li>
    <br>
    <?php endforeach; ?>
</ul>
<style>
ul {
    list-style: none;
}

ul span {
    text-decoration: underline;
}
</style>