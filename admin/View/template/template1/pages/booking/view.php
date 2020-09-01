Vue Commande - <?= $queryURI[2] ?>


<?php
    
    $id = $queryURI[2];
    foreach($booking -> getBookings() as $book){
        if($book['id_order'] == $id){
            ?>
            <div class="booking-item">
                <span>Matériel commandé = <?= $booking -> getProduct($book['id'], 'name') ?> </span> <br>
                <span>Référence = <?= $booking -> getProduct($book['id'], 'reference') ?> </span> <br>
                <span>Nom de l'élève = <?= $users -> getUser($book['id_user'], 'name') ?> </span> <br>
                <span>Raison du booking = <?= $book['reason_booking'] ?> </span> <br>

                <br> <hr>
            </div>

            
            <?php
        }

    }
    ?>




    <?php
    if($booking -> getStatus($id) == 1){
        ?> 
            <form method="post">
                <input type="hidden" value="<?= $id ?>" name="id_booking">
                <input type="hidden" value="2" name="new_status">
                <button name="switch_state_booking">Accepter la commande</button> 
            </form>
            <form method="post">
                <input type="hidden" value="<?= $id ?>" name="id_booking">
                <input type="hidden" value="3" name="new_status">
                <button name="switch_state_booking">Refuser la commande</button> 
            </form>
        <?php
    }else{
        ?>
        <form method="post">
            <input type="hidden" value="<?= $id ?>" name="id_booking">
            <?php
            if($booking -> getStatus($id) == 2){
                ?> 
                    <input type="hidden" value="3" name="new_status">
                    <button name="switch_state_booking">Clore la commande</button> 
                <?php
            }else if($booking -> getStatus($id) == 3){
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
    
    
    