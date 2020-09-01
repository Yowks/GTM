<?php
class materiel extends Connexion {

    public function __construct($db)
    {
        parent::__construct($db);
    }

    function addMateriel($name,$reference,$materiel_state){
        $verifeReference = $this -> _conn -> query("SELECT reference FROM `products` WHERE reference ='$reference'");
        $nbReference = $verifeReference->rowCount();
        if($nbReference > 0){

        }else{
            $insert = $this-> _conn -> exec("INSERT INTO `products`(`name`, `reference`, `material_state`)
            VALUES ('$name','$reference','$materiel_state')");
        }
        return $nbReference;
    }

    function listeMateriel(){
        $select = $this -> _conn -> query("SELECT * FROM `products`");
        $res = $select -> fetchAll();
        return $res;
    }

    function productDisplay($idMateriel){
        $select = $this -> _conn -> query("SELECT * FROM `booking` 
        WHERE id_equipment = '$idMateriel' ORDER BY date_reservation DESC");
        $res = $select -> fetchAll();
        return $res;
    }

    Function userDisplay($idUser){
        $select = $this -> _conn -> query("SELECT * FROM `users` WHERE id = '$idUser'");
        $res = $select -> fetchAll();
        return $res;
    }

    function displayCommentMateriel($idMateriel){
        $select = $this -> _conn -> query("SELECT * FROM `products` WHERE id= '$idMateriel'");
        $res = $select -> fetchAll();
        return $res;
    }

    function commentMateriel($idMateriel, $comment){
        $update = $this -> _conn -> exec("UPDATE `products` SET 
        `comment`='$comment' WHERE id = '$idMateriel'");
    }

    function ModifeMateriel($update){
        $req = $this -> _conn -> exec($update);
    }

}

?>