<?php
//modifier le profil de l'admin.

$admin = new connectadmin($db);

if(isset($_POST['modifier'])){

$admin->updateAdmin(addslashes($_POST['name']),addslashes($_POST['first-name']),
addslashes($_POST['email']),addslashes($_POST['number_staff']),
   md5($_POST['password']), addslashes($_POST['actif']));
}

?>
