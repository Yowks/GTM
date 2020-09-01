<?php

//le controller de la connexion admin
$admin = new connectadmin($db);
if(isset($_POST['connect'])){

    echo $admin->getAdmin(addslashes($_POST['name']),md5($_POST['password']));
}




?>