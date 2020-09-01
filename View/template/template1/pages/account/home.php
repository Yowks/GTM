<?php require 'Controller/Users.controller.php'; ?>

<?php
    if (isset($_SESSION['user_logged_in'])) {
        $users->displaySingleUser($_SESSION['user_id']);
    }
?>

    <div id="menu_top"></div>
    <div class="ligne"></div>

    <div id="affichage">
        <table>
            <tbody>
                <tr>
                    <td>
                        <span>Utilisateur : </span>
                    </td>
                    <td>
                        <?= ucfirst(htmlspecialchars($users->get_firstname())) ;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Nom : </span>
                    </td>
                    <td>
                        <?= ucfirst(htmlspecialchars($users->get_name())) ;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>E-mail : </span>
                    </td>
                    <td>
                        <?= ucfirst(htmlspecialchars($users->get_email())) ;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Numéro de téléphone : </span>
                    </td>
                    <td>
                        <?= ucfirst(htmlspecialchars($users->get_phone())) ;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Numéro étudiant : </span>
                    </td>
                    <td>
                        <?= ucfirst(htmlspecialchars($users->get_student_number())) ;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Niveau utilisateur : </span>
                    </td>
                    <td>
                        <?= $users->get_user_level() === 1 ? 'Élève' : 'Professeur'; // Si le level utilisateur === 1 alors user_level = éléve sinon prof ;?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="ligne"></div>
    <div id="legend_bottom">
        <div id="actions">
            <a class="edit" href="<?= $correctSlug ?>account/edit">Editer son profil</a>
        </div>
    </div>