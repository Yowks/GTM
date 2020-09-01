<div id="header">
    <div id="logo">
        
    </div>


    <div id="menu">
        <nav>
            <ul>
                <li><a href="<?= $correctSlug ?>./">Accueil</a></li>
                <?php
                    if($users->adminIsConnected() == true){
                        ?>
                            <li><a href="<?= $correctSlug ?>admin">Accueil Admin</a></li>
                        <?php
                    }
                ?>
                <li><a href="<?= $correctSlug ?>booking">Matériel</a></li>
                <li><a href="<?= $correctSlug ?>booking/mesReservations">Mes Réservations</a></li>
                <li><a href="<?= $correctSlug ?>account">Mon Compte</a></li>
                <li><a href="<?= $correctSlug ?>auth/logout">Deconnexion</a></li>
            </ul>    
        </nav>
    </div>
</div>