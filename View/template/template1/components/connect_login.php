<div class="b_login" id="connect_login">
  <h1>GESTION TRAVAIL MATÉRIEL</h1>
  <form class="" action="" method="post">
    <input type="email" name="email" placeholder="Email" value="">
    <input type="password" name="password"placeholder="Password" value="">
    <input type="submit" name="login" value="Connexion">
    <a href="<?= $correctSlug ?>auth/register">Vous n'avez pas de compte ? Inscrivez vous</a>
    <div class="error">
    <?php
        require 'Controller/Users.controller.php';
        foreach ($users->get_errors() as $error) {
            echo $error.'<br>';
        }
    ?>
    </div>
  </form>
</div>
