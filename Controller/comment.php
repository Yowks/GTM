<?php
// ajouter un commentaire
$HoldComment = "";
if(isset($_POST['addComment'])){
    $newComment = $_POST['comment'];
    $id = $_POST['id'];

    foreach ($select->displayCommentMateriel($id) as $r){
        $HoldComment .= $r['comment'];
    }

    $resComment = $HoldComment." - ".$newComment;
    $add = $select-> commentMateriel($id,$resComment);
}
?>