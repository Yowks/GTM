<?php
    require 'Controller/UsersReservation.controller.php';
    
    foreach ($products->get_errors() as $error) {
        echo $error.'<br>';
    }

?>
<div id="menu_top"></div>
<div class="ligne"></div>

<div id="affichage">
    <h1>Liste Matériel Disponible</h1>

    <form method="post">
        <select required class="js-example-basic-multiple-search matos" name="products[]" multiple="multiple">
            <?php foreach ($products->displayAllProducts() as $p): ?>
            <option value="<?= $p['id'] ;?>"><?= $p['name'];?>( <?= $p['reference'];?> )</option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Date d'emprunt</label>
        <br>
        <input type="date" name="start_date" required value="<?= date('Y-m-d'); ?>">
        <br>
        <label>Date de retour</label>
        <br>
        <input type="date" name="end_date" required value="<?= date('Y-m-d', strtotime("+1 days")); ?>">
        <br>
        <textarea name="motif" cols="30" rows="10" required maxlength="255" placeholder="Motif de la réservation..."></textarea>
        <br>
        <input type="submit" name="reserve" value="Reserver">
    </form>
</div>
    <div class="ligne"></div>
    <div id="legend_bottom">
        <div id="actions">
            <a class="edit" href="<?= $correctSlug ?>account/edit">Editer son profil</a>
        </div>
</div>

<style>
.matos {
    width: 400px;
}
</style>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple-search').select2();
    $('.js-example-basic-multiple-search').on('select2:opening select2:closing', function(event) {
        var $searchfield = $(this).parent().find('.select2-search__field');

    });
});
</script>