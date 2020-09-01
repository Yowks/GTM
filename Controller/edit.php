<?php
$select = new materiel($db);
$update = "";
if(isset($_POST['save'])){
    $id = $_POST['id'];
    $name = addslashes($_POST['name']);
    $reference = addslashes($_POST['reference']);
    $etat = $_POST['materialState'];

    echo $id;
    echo $name;
    echo $reference;
    echo $etat;

    if(!empty($name) | !empty($reference)){
        $update .= "UPDATE `products` SET ";
        if(!empty($name) && empty($reference) && empty($etat)){
            $update .= "name = '$name'";
        }else {
            $update .= "name = '$name', ";
        }
        if(!empty($reference) && !empty($etat)){
            $update .= "reference = '$reference', ";
        }else {
            $update .= "reference = '$reference', ";
        }
        if(!empty($etat)){
            if ($etat == 1) {
                $update .= "material_state = 1 ";
            }else if ($etat == 2) {
                $update .= "material_state = 2 ";
            }else if ($etat == 3) {
                $update .= "material_state = 3 ";
            }
        }
        $update .= "WHERE id = $id";
        echo $update;
        $select->ModifeMateriel($update);
    }else if(empty($name) | empty($reference) | empty($etat)){
        echo "vide";

    }else{
        echo "ok";
    }
}

?>