<div class="b_login" id="register_login">
    <h1>Register Page</h1>
    <?php
        foreach ($users->get_errors() as $error) {
            echo $error.'<br>';
        }

    ?>

    <form method="post">
        <label for="name">Nom * :</label>
        <input type="text" id="name" name="name" required value="<?= isset($name) ? $name : '' ;?>"
            placeholder="Nom de famille" />
        <br>
        <label for="first_name">Prénom * :</label>
        <input type="text" id="fist_name" name="first_name" required value="<?= isset($firstname) ? $firstname : '';?>"
            placeholder="Prénom" />
        <br>

        <label for="mail">E-mail * :</label>
        <input type="email" id="email" name="email" required value="<?= isset($email) ? $email : '';?>"
            placeholder="addresse e-mail" />
        <br>

        <label for="phone">Téléphone * :</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required
            value="<?= isset($phone) ? $phone : '';?>" placeholder="Téléphone" />
        <br>

        <label for="student_number">Numéro d'étudiant * :</label>
        <input type="text" id="student_number" name="student_number" required
            value="<?= isset($student_number) ? $student_number: ''; ?>" placeholder="Numéro d'étudiant" />
        <br>

        <label for="password">Mot de passe * :</label>
        <input type="password" id="password" name="password" required minlength=6 
            placeholder="Votre mot de passe" />
        <br>

        <label for="password_confirmation">Confirmation mot de passe * :</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required minlength=6
            placeholder="Confirmation de votre mot de passe" />
        <br>

        <label for="user_level">Profil :</label>
        <select name="user_level" id="user_level" id="user_level">
            <option value="1">Élève</option>
            <option value="2">Professeur</option>
        </select>
        <br>
        <br>
        <input type="submit" name="register_user" value="Inscription" />
    </form>

    <a href="<?= $correctSlug ?>">Vous avez déjà un compte ? Connectez vous</a>
</div>
