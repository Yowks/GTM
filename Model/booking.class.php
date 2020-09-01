<?php

class booking extends Connexion {

    function __construct($db){
        parent::__construct($db);
    }



    /**
     * function getBookings()
     * 
     * Cette fonction va retourner la liste brut de toutes les réservations
     * 
     * @return array
     * 
     */
    function getBookings(){
        $request = $this -> _conn -> query("SELECT * FROM `booking` ");
        return $request -> fetchAll();
    }



    /**
     * function getBooking($param1, $param2)
     * 
     * Cette fonction va retourner une information d'un book donné
     * 
     * @param 1 = le BookingID
     * @param 2 = l'information a récupérer
     * @return array
     * 
     */
    function getBooking($id, $inf){

        $request = $this -> _conn -> query("SELECT * FROM `booking` WHERE `id` = '$id' ");
        foreach($request -> fetchAll() as $r){
            return $r[$inf];
        }
    }


    /**
     * function getProducts()
     * 
     * Cette fonction va retourner la liste brut de toutes les réservations
     * 
     * @return array
     * 
     */
    function getProducts(){
        $request = $this -> _conn -> query("SELECT * FROM `products` ");
        return $request -> fetchAll();
    }


    /**
     * function getProductsCategory()
     * 
     * Cette fonction va retourner la liste des catégories de produits
     * 
     * @return array
     * 
     */
    function getProductsCategory(){
        $request = $this -> _conn -> query("SELECT DISTINCT `name` FROM `products` WHERE `material_state` = 1");
        return $request -> fetchAll();
        
    }

    
    /**
     * function getProduct($param1, $param2)
     * 
     * Cette fonction va retourner une information d'un produit donné
     * 
     * @param 1 = le ProductID
     * @param 2 = l'information a récupérer
     * @return array
     * 
     */
    function getProduct($id, $inf){

        $request = $this -> _conn -> query("SELECT * FROM `products` WHERE `id` = '$id' ");
        foreach($request -> fetchAll() as $r){
            return $r[$inf];
        }
    }


    
    /**
     * function getStatus($param1)
     * 
     * Cette fonction va activer/désactiver une commande
     * 
     * @param 1 = le BookingID
     * 
     */
    function getStatus($id){
        $request = $this -> _conn -> query("SELECT DISTINCT `status` FROM `booking` WHERE `id_order` = $id");
        foreach($request -> fetchAll() as $r){
            return $r['status'];
        }
    }



    /**
     * function deleteBooking($param1, $param2)
     * 
     * Cette fonction va activer/désactiver une commande
     * 
     * @param 1 = le BookingID
     * @param 2 = le nouveau status (true ou false)
     * 
     */
    function switchState($id, $status){
        $update = $this -> _conn -> exec("UPDATE `booking` SET `status` = '$status' WHERE `id_order` = '$id'");
    }

}