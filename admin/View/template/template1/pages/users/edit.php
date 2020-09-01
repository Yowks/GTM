<?php include ("../Controller/updateadmin.php") ;?>

<form method="post">
    <?Php
        foreach($admin->selectAdmin($_SESSION['id']) as $a){
        ?>
        <input type="text" name="name" value="<?=$a['name']?>" placeholder="login"/>
        <input type="text" name="first-name" value="<?=$a['first-name']?>" placeholder="prenom"/>
        <input type="mail" name="email" value="<?=$a['email']?>"  placeholder="email"/>
        <input type="text" name="number_staff" value="<?=$a['number_staff']?>" placeholder="number_staff"/>
        <input type="password" name="password" value="<?=$a['password']?>" placeholder="mot de passe"/>
        <input type="text" name="actif" value="<?=$a['actif']?>" placeholder="actif"/>
        <input type="submit" name="modifier" value="modifier" placeholder="modifier"/>
        <?php
        }
    ?>
</form>