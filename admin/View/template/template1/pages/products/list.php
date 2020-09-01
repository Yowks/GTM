<?php
require "../Controller/edit.php";
require "../Controller/listeMateriel.php";
require "../Controller/historiqueMateriel.php";
require "../Controller/comment.php";
?>
<a href="<?= $correctSlug ;?>products/add">Ajouter un produit</a>

<div class="Tableau_materiel" style="float: left; margin-right: 20px;">
    <table>
        <tr>
            <td>
                <p style="font-weight: bold;">Nom</p>
            </td>
            <td>
                <p style="font-weight: bold;">Référence</p>
            </td>
            <td>
                <p style="font-weight: bold;">status</p>
            </td>
            <td>
                &nbsp
            </td>
        </tr>
        <?php
        echo $table;
        ?>
    </table>
</div>
<div class="edit" style="float: left; margin-right: 20px;">
    <?php
    echo $edit;
    ?>
</div>
<div class="historiqueMateriel" style="float: left;">
    <div class="DisplayHistorique">
        <p style="font-weight: bold;">Historique de réservation :</p>
        <?php
        echo $tableHistorique;
        ?>
    </div>
    <div class="Comment">
        <p style="font-weight: bold;">Commentaire :</p>
        <?php
        echo $comment;
        echo $formComment;
        ?>
    </div>
</div>