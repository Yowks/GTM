<?php require ("../Controller/updateUser.php") ;?>

<?php
$id = $queryURI[2];
?>
<form method="post">
    <input type="hidden" name="user_id" value="<?= $queryURI[2] ;?>">
    <input type="text" name="name" value="<?= $users -> getUser($id, 'name')?>" placeholder="login"/>
    <input type="text" name="first_name" value="<?= $users -> getUser($id, 'first_name')?>" placeholder="prenom"/>
    <input type="mail" name="email" value="<?= $users -> getUser($id, 'email')?>"  placeholder="email"/>
    <input type="mail" name="phone" value="<?= $users -> getUser($id, 'phone')?>"  placeholder="phone"/>
    <input type="text" name="student_number" value="<?= $users -> getUser($id, 'student_number')?>" placeholder="student_number"/>
    <input type="text" name="user_level" value="<?= $users -> getUser($id, 'user_level')?>" placeholder="mot de passe"/>
    <input type="text" name="actif" value="<?= $users -> getUser($id, 'actif')?>" placeholder="actif"/>
    <input type="submit" name="edit_user" value="modifier" placeholder="modifier"/>
</form>