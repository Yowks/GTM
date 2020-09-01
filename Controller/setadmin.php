<?php

//le controller de l'ajout admin
$admin = new connectadmin($db);
if(isset($_POST['ajouter'])){

 $admin->setAdmin(addslashes($_POST['name']),addslashes($_POST['firt-name']),
 addslashes($_POST['email']),addslashes($_POST['number-staff']),
    md5($_POST['password']), addslashes($_POST['actif']));
}




?>