<?php
// Affiche l'historique de réservation d'un matériel et commentaire
$tableHistorique = "";
$comment = "";
$formComment = "";

if(!isset($queryURI[2])){
    $tableHistorique = "<p>Séléctionne un matériel pour voir son historique de commandes et c'est commentaires</p>";
}else{
    foreach ($select->productDisplay($queryURI[2]) as $res){
        $idUser = $res['id_user'];

        $tableHistorique .= "<div class='historique'>";

        $tableHistorique .= "<p>Numéro de la réservation : N ° ".$res['id']."</p>";

        $tableHistorique .= "<p>date de début : ".$res['start_date'].", Date de fin : ".$res['end_date']."</p>";

        foreach ($select->userDisplay($idUser) as $resUser){
            $tableHistorique .= "<p>Nom : ".$resUser['name']."</p>";
        }

        $tableHistorique .= "</div>";
    }

    foreach ($select->displayCommentMateriel($queryURI[2]) as $r){
        $comment = "<p>".$r['comment']."</p>";
    }
    $id = $queryURI[2];
    $formComment .= "<div class='formulaireComment'>";
    $formComment .= "<p>Ajouter un commentaire :</p>";
    $formComment .= "<form method='post'>";
    $formComment .= "<input type='text' name='comment'/>";
    $formComment .= "<input type='hidden' name='id' value='".$id."'/>";
    $formComment .= "<input type='submit' name='addComment' value='Send' />";
    $formComment .= "</form>";
    $formComment .= "</div>";


}
?>