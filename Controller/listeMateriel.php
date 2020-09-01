<?php
$table = "";
$edit = "";
$select = new materiel($db);

// Affiche la liste des matériels et formulaire edit
if(isset($_POST['edit'])){
    $idMateriel = $_POST['id'];

    foreach($select->listeMateriel() as $res){
        if($res['id'] == $idMateriel){
            $edit .= "<div class='formEdit'>";
                $edit .= "<form method='post'>";
                    $edit .= "<input type='hidden' name='id' value='".$res['id']."'/>";
                    $edit .= "<input type='text' name='name' value='".$res['name']."'/>";
                    $edit .= "<input type='text' name='reference' value='".$res['reference']."'/>";
                    $edit .= "<select name='materialState'>";
                        $edit .= "<option>Choisire un état</option>";
                        $edit .= "<option value='1'>Disponible</option>";
                        $edit .= "<option value='2'>indisponible</option>";
                        $edit .= "<option value='3'>Maintenance</option>";
                    $edit .= "</select>";
                    $edit .= "<input type='submit' name='save' value='Save'/>";
                $edit .= "</form>";
            $edit .= "</div>";
        }else{
            $status = "";
            if ($res['material_state'] == 1) {
                $status = "Disponible";
            } else if ($res['material_state'] == 2) {
                $status = "indisponible";
            } else {
                $status = "Maintenance";
            }

            $table .= "
<tr>
    <td><p><a href='".$correctSlug."products/list/" . $res['id'] . "'>" . $res['name'] . "</a></p></td>
    <td><p>" . $res['reference'] . "</p></td>
    <td><p>" . $status . "</p></td>
    <td>
        <form method='post'>
            <input type='hidden' name='id' value='" . $res['id'] . "' />
            <input type='submit' name='edit' value='Edit' />
        </form>
        </td>
  </tr>";
        }
    }
}else{
    foreach ($select->listeMateriel() as $res) {
        $status = "";
        if ($res['material_state'] == 1) {
            $status = "Disponible";
        } else if ($res['material_state'] == 2) {
            $status = "indisponible";
        } else {
            $status = "Maintenance";
        }
        $table .= "
<tr>
    <td><p><a href='".$correctSlug."products/list/" . $res['id'] . "'>" . $res['name'] . "</a></p></td>
    <td><p>" . $res['reference'] . "</p></td>
    <td><p>" . $status . "</p></td>
    <td>
        <form method='post'>
            <input type='hidden' name='id' value='" . $res['id'] . "' />
            <input type='submit' name='edit' value='Edit' />
        </form>
        </td>
  </tr>";
    }
}


?>