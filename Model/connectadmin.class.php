<?php

class connectadmin extends connexion{
    function __construct($db){
		parent::__construct($db);
		
    }


    function getAdmin($nom,$pass){

        $req=$this->_conn->query("SELECT * FROM admin WHERE name='$nom' AND password='$pass' AND actif = '1' ");
        $nb=$req->rowCount();
        $res=$req->fetchAll();

        if( $nb > 0){
            foreach($res as $r){
                $_SESSION['admin_logged_in']=$r['name'];
                $_SESSION['id']=$r['id'];
            }
            $message="ok";
        }else{
            $message="mauvais login ou mdp";
        }
        
        return $message;
    }




    function setAdmin($nom,$prenom,$mail,$number,$pass,$actif){

        $req=$this->_conn->exec("INSERT INTO admin  (`name`, `first-name`, `email`, `number-staff`, `password`, `actif`) 
        VALUES ('$nom','$prenom','$mail','$number','$pass','$actif')");
    }





    function updateAdmin($nom,$prenom,$mail,$number,$pass,$actif){
        $id=$_SESSION['id'];
    
        $req=$this->_conn->exec("UPDATE `admin` SET `name`='$nom',`first-name`='$prenom', `email`='$mail', 
        `number-staff`='$number',password='$pass',`actif`='$actif' WHERE `id`='$id'");
    }




    function selectAdmin($id){

        $req=$this->_conn->query("SELECT * FROM  ADMIN WHERE id='$id'");
        $res=$req->fetchAll();
        return $res;
    }
}

?>


