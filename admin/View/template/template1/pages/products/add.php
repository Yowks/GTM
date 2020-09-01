<?php
require "../Controller/addMateriel.php";
?>
<a href="<?= $correctSlug ;?>products/list">Accueil</a>

<form method="post">
    <label>Nom du matériel :</label>
    <input type="text" name="name"/>
    <label>Numéro de référence matériel</label>
    <input type="text" name="reference"/>
    <label>Sélectionner l'état du matériel :</label>
    <select name="materiel_state">
        <option>Choisir l'état du matériel</option>
        <option value="1">Disponible</option>
        <option value="">Indisponible</option>
        <option value="2">Réparation</option>
    </select>
    <div class="Button_form_Add_materiel">
        <input type="submit" name="addMateriel" value="Ajouter matériels"/>
    </div>
    <p><?php echo $erreur?></p>
</form>