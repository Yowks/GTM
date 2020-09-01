<?php
    
    class Products extends Connexion
    {
        private $_errors = [];

        public function __construct($db)
        {
            parent::__construct($db);
        }

        /**
         * Get the value of _errors
         */
        public function get_errors()
        {
            return $this->_errors;
        }

        /**
         * Set the value of _errors
         *
         * @return  self
         */

        public function set_errors($_errors)
        {
            $this->_errors[] = $_errors;

            return $this;
        }

        public function displayAllProducts()
        {
            $req = $this->_conn->query("SELECT * FROM products WHERE `material_state` = 1 ORDER BY `name` ASC");
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }


        public function displayAllProductsBack()
        {
            $req = $this->_conn->query("SELECT * FROM products");
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }

        /**
        * function getProductsCategory()
        *
        * Cette fonction va retourner la liste des catégories de produits
        *
        * @return array
        *
        */
        public function getProductsCategory()
        {
            $request = $this->_conn->query("SELECT DISTINCT `name` FROM `products` WHERE `material_state` = 1");
            return $request->fetchAll();
        }

        public function displaySingleProduct($id)
        {
            $req = $this->_conn->prepare("SELECT * FROM products WHERE id = :id");
            $req->bindParam(':id', $id);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        }

        public function getProductReturnDate($id_equipment)
        {
            $req = $this->_conn->prepare("SELECT end_date FROM booking WHERE id_equipment = :id_equipment");
            $req->bindParam(':id_equipment', $id_equipment);
            $req->execute();
            return $req->fetchColumn();
        }

        // ---------------------------------------------------------------------------------------------------
        // Système de gestion des Bookings Users
    
        /**
         * Get the users bookings
         */

        public function getUserBooking($id)
        {
            $req = $this->_conn->prepare('SELECT * FROM booking INNER JOIN products ON booking.id_equipment = products.id WHERE booking.id_user =:id ORDER BY date_reservation DESC');
            $req->bindParam(':id', $id);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }


        /**
         * Make booking
         */

   
        public function registerUserBooking($id_order, $id_equipment, $id_user, $reason_booking, $user_level, $start_date, $end_date)
        {
            $req = $this->_conn->prepare(
                "INSERT INTO 
                    `booking`(`id_order`, `id_equipment`, `id_user`, `reason_booking`, `user_level`, `priority`, `start_date`, `end_date`) 
                 VALUES (:id_order, :id_equipment, :id_user, :reason_booking, :user_level, :priority, :start_date, :end_date)"
            );

            $req->bindParam(':id_order', $id_order);
            $req->bindParam(':id_equipment', $id_equipment);
            $req->bindParam(':id_user', $id_user);
            $req->bindParam(':reason_booking', $reason_booking);
            $req->bindParam(':user_level', $user_level);
            $req->bindParam(':priority', $user_level);
            $req->bindParam(':start_date', $start_date);
            $req->bindParam(':end_date', $end_date);
            
            $req->execute();
            $res = $req->rowCount();
            
            if ($res) {
                $req = $this->_conn->prepare("UPDATE `products` SET `material_state`= '2' WHERE id = :id_equipment");
                $req->bindParam(':id_equipment', $id_equipment);
                $req->execute();
                return $req -> rowCount();
            }
        }
    }
