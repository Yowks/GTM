<?php include ("../Controller/searchUsers.php") ;?>

<br> <a href="<?= $correctSlug ?>users/edit">Editer son profil</a>
<br> <a href="<?= $correctSlug ?>users/add">Ajouter un user</a>

<?php require ($chemin_template.'pages/users/components/search.php') ?>
