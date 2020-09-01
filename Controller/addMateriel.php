<?php
// Ajouter un matériel à la bdd
$erreur = "";
if (isset($_POST['addMateriel'])){
    $name = $_POST['name'];
    $reference = $_POST['reference'];
    $materiel_state = $_POST['materiel_state'];

    $add = new materiel($db);
    $connexion = $add->addMateriel($name,$reference,$materiel_state);
    $erreur = "";
    if($connexion > 0){
        $erreur = "La référence de votre matériel existe déjà :";
    }else{
        $erreur = "Votre matériel à été ajouté à la liste";
    }
}
?>