<?php include ("../Controller/booking.php") ;?>

<form method="post">
    <select name="material">
        <?php require ($chemin_template.'pages/booking/components/products_list.php') ;?>
    </select>

    <input type="text" name="motif"  placeholder="Motif de commande"/>
    <input type="date" name="date-begin"  placeholder="Date de début"/>
    <input type="date" name="date-end"  placeholder="Date de fin"/>
    <input type="submit" name="commander" value="Commander"/>
</form>

<a href="../booking">Retour a la vue</a>
