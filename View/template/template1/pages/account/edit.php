<?php
    require 'Controller/Users.controller.php';

    $users->displaySingleUser($_SESSION['user_id']);
    foreach ($users->get_errors() as $error) {
        echo $error.'<br>';
    }
?>
<div id="menu_top"></div>
<div class="ligne"></div>
<div id="affichage">
    <form style="margin-top:30px;" method="POST">
        <div class="group_form">
            <label for="name">Nom :</label>
            <input type="text" name="name" value="<?= htmlspecialchars($users->get_name());?>">
        </div>
        <div class="group_form">
            <label for="firstname">Prenom :</label>
            <input type="text" name="firstname" value="<?= htmlspecialchars($users->get_firstname());?>">
        </div>
        <div class="group_form">
            <label for="email">E-mail :</label>
            <input type="email" name="email" value="<?= htmlspecialchars($users->get_email());?>">
        </div>
        <div class="group_form">
            <label for="phone">Numéro de téléphone :</label>
            <input type="tel" name="phone" pattern="[0-9]{10}" value="<?= htmlspecialchars($users->get_phone());?>">
        </div>
        <div class="group_form">
            <label for="student_number">Numéro d'étudiant :</label>
            <input type="text" name="student_number" value="<?= htmlspecialchars($users->get_student_number());?>">
        </div>
        <div class="group_form">
            <p>Profil Actuel: <?= $users->get_user_level() === 1 ? '<span>Élève</span>' : '<span>Professeur</span>';?></p>
        </div>
        <br>
        <input class="button_submit" type="submit" name="update" value="Update">
    </form>
    <br>
    <form style="margin-top:30px;" method="POST">
        <div class="group_form">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" required minlength=6 placeholder="Votre nouveau mot de passe">
        </div>
        <div class="group_form">
            <label for="password_confirmation">Confirmation de votre mot de passe :</label>
            <input type="password" name="password_confirmation" required minlength=6
            placeholder="Confirmation de votre mot de passe">
        </div>
        <input class="button_submit" type="submit" name="updatePassword" value="Update Password">
    </form>

</div>

<div class="ligne"></div>
<div id="legend_bottom">
    <div id="actions">
        <a class="saved" href="<?= $correctSlug ?>account">Voir son profil</a>
    </div>
</div> 