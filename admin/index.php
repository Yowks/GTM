<?php
/**
 *
 * index.php
 *
 * Index unique du site ( panel admin)
 *   Toute les pages du site sont affichés sur cet index là
 *   Donc la plupart des chemins d'accès commencent d'ici
 *
 */

    require("config.php");
    require("../Controller/Users.controller.php");
?>


<!DOCTYPE html>
<html>
<head>
    <?php require($chemin_template.'components/meta.php') ?>
    <title> <?= $pageName ;?> </title>
    <?php require($chemin_template.'components/styles.php') ?>
</head>
<body>
  
<?php
    if ($users->adminIsConnected() == true) {
        require($chemin_template.'components/sidebar.php');
    }
    require("rooter.php");

    require($chemin_template.'components/scripts.php')
?>
</body>
</html>


