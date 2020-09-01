<?php
/**
 * 
 * index.php
 * 
 * Index unique du site (sans panel admin)
 *   Toute les pages du site sont affichés sur cet index là
 *   Donc la plupart des chemins d'accès commencent d'ici
 * 
 */

    require("config.php");
    require("Controller/Users.controller.php");

?>

<!DOCTYPE html>
<html>
<head>
    <?php require($chemin_template.'components/meta.php') ?>
    <title> <?= $pageName ;?> </title>
    <?php require($chemin_template.'components/styles.php') ?>
</head>
<body>
    <div id="global">
        
        <?php
        if($users -> isConnected() == true){
            require($chemin_template.'components/sidebar.php');  
            ?>
            <div id="content">
                    <?php require("rooter.php"); ?>
            </div>
            <?php
        }else{
            require($chemin_template.'components/logo_login.php'); 
            require("rooter.php");
        }
        ?>

        
        
        <?php require($chemin_template.'components/scripts.php') ?>
    </div>
</body>
</html>
    