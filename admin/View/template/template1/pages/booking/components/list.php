<?php

// On récupère la liste complète des réservations


foreach($booking -> getBookings() as $bk){

    ?>
    
    <div class="booking-item" data-status="<?= $bk['status'] ?>">
        <span>ID = <?= $bk['id'] ?> </span> <br>
        <span>ID de la commande = <?= $bk['id_order'] ?> </span> <br>
        <span>Matériel commandé = <?= $booking -> getProduct($bk['id'], 'name') ?> </span> <br>
        <span>Nom de l'élève = <?= $users -> getUser($bk['id_user'], 'name') ?> </span> <br>
        <span>Raison du booking = <?= $bk['reason_booking'] ?> </span> <br>
        <span>Actif / Pas actif  = <?= $bk['state'] ?> </span> <br>
        <span>Level de l'utilisateur  = <?= $bk['user_level'] ?> </span> <br>
        <span>Priorité  = <?= $bk['priority'] ?> </span> <br>
        <span>Date de début  = <?= $bk['start_date'] ?> </span> <br>
        <span>Date de fin  = <?= $bk['end_date'] ?> </span> <br>
        <span>Date de commande  = <?= $bk['date_reservation'] ?> </span> <br>
        <span>Etat  = <?= $bk['status'] ?> </span> <br>

        <a href="booking/view/<?= $bk['id_order'] ?>">Vue de la commande</a>
        <?php
            if($booking -> getStatus($bk['id_order']) == 1){
                ?> 
                    <form method="post">
                        <input type="hidden" value="<?= $bk['id_order'] ?>" name="id_booking">
                        <input type="hidden" value="2" name="new_status">
                        <button name="switch_state_booking">Accepter la commande</button> 
                    </form>
                    <form method="post">
                        <input type="hidden" value="<?= $bk['id_order'] ?>" name="id_booking">
                        <input type="hidden" value="3" name="new_status">
                        <button name="switch_state_booking">Refuser la commande</button> 
                    </form>
                <?php
            }else{
                ?>
                <form method="post">
                    <input type="hidden" value="<?= $bk['id_order'] ?>" name="id_booking">
                    <?php
                    if($booking -> getStatus($bk['id_order']) == 2){
                        ?> 
                            <input type="hidden" value="3" name="new_status">
                            <button name="switch_state_booking">Clore la commande</button> 
                        <?php
                    }else if($booking -> getStatus($bk['id_order']) == 3){
                        ?> 
                            <input type="hidden" value="2" name="new_status">
                            <button name="switch_state_booking">Ré-activer la commande</button> 
                        <?php
                    }
                    ?>
                </form>
                <?php
            }
        ?>

        <br> <br> <hr>
    </div>

    
    <?php

}