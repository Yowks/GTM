<?php

    class Users extends Connexion
    {
        private $_id;
        private $_name;
        private $_firstname;
        private $_email;
        private $_phone;
        private $_student_number;
        private $_password;
        private $_user_level;
        private $_errors = [];
    
        public function __construct($conn)
        {
            parent::__construct($conn);
        }


        /**
         * Get the value of _id
         */
        public function get_id()
        {
            return $this->_id;
        }

        /**
         * Set the value of _id
         *
         * @return  self
         */
        public function set_id($_id)
        {
            $this->_id = $_id;

            return $this;
        }

        /**
         * Get the value of _name
         */
        public function get_name()
        {
            return $this->_name;
        }

        /**
         * Set the value of _name
         *
         * @return  self
         */
        public function set_name($_name)
        {
            $this->_name = $_name;

            return $this;
        }

        /**
         * Get the value of _firstname
         */
        public function get_firstname()
        {
            return $this->_firstname;
        }

        /**
         * Set the value of _firstname
         *
         * @return  self
         */
        public function set_firstname($_firstname)
        {
            $this->_firstname = $_firstname;

            return $this;
        }

        /**
         * Get the value of _email
         */
        public function get_email()
        {
            return $this->_email;
        }

        /**
         * Set the value of _email
         *
         * @return  self
         */
        public function set_email($_email)
        {
            $this->_email = $_email;

            return $this;
        }

        /**
         * Get the value of _phone
         */
        public function get_phone()
        {
            return $this->_phone;
        }

        /**
         * Set the value of _phone
         *
         * @return  self
         */
        public function set_phone($_phone)
        {
            $this->_phone = $_phone;

            return $this;
        }

        /**
         * Get the value of _student_number
         */
        public function get_student_number()
        {
            return $this->_student_number;
        }

        /**
         * Set the value of _student_number
         *
         * @return  self
         */
        public function set_student_number($_student_number)
        {
            $this->_student_number = $_student_number;

            return $this;
        }

        /**
        * Get the value of _password
        */
        public function get_password()
        {
            return $this->_password;
        }

        /**
         * Set the value of _password
         *
         * @return  self
         */
        public function set_password($_password)
        {
            $this->_password = $_password;

            return $this;
        }
        

        /**
         * Get the value of _user_level
         */
        public function get_user_level()
        {
            return $this->_user_level;
        }

        /**
         * Set the value of _user_level
         *
         * @return  self
         */
        public function set_user_level($_user_level)
        {
            $this->_user_level = $_user_level;

            return $this;
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

        // REGISTER USER

        public function registerUser()
        {
            $this->_password = password_hash($this->_password, PASSWORD_DEFAULT);

            $req = $this->_conn->prepare(
                'INSERT INTO users(name,first_name,email,phone, student_number, password, user_level)
          VALUES (:name, :first_name ,:email, :phone, :student_number, :password, :user_level)'
            );

            $req->bindParam(':name', $this->_name);
            $req->bindParam(':first_name', $this->_firstname);
            $req->bindParam(':email', $this->_email);
            $req->bindParam(':phone', $this->_phone);
            $req->bindParam(':student_number', $this->_student_number);
            $req->bindParam(':password', $this->_password);
            $req->bindParam(':user_level', $this->_user_level);

            $req->execute();
            return $req->rowCount();
        }

        // DISPLAY ALL USERS

        public function displayAllUsers()
        {
            $req = $this->_conn->query('SELECT * FROM users');
            return $req->fetchAll();
        }

        // Display single USER

        public function displaySingleUser($id)
        {
            $req = $this->_conn->prepare('SELECT * FROM users WHERE id =:id');
            $req->bindParam(':id', $id);
            $req->execute();
            $res = $req->fetch(PDO::FETCH_ASSOC);
            $this->_id = $res['id'];
            $this->_name = $res['name'];
            $this->_firstname = $res['first_name'];
            $this->_email = $res['email'];
            $this->_phone = $res['phone'];
            $this->_student_number = $res['student_number'];
            $this->_password = $res['password'];
            $this->_user_level = $res['user_level']; // type casting renvoie un integer
            $this->_actif = $res['actif'];
        }

        // LOGIN USER

        public function logUser()
        {
            $req = $this->_conn->prepare('SELECT * FROM users WHERE email = :email AND actif= 1');
            $req->bindParam(':email', $this->_email);
            $req->execute();
            $res = $req->fetch();

            if ($res) {
                if (password_verify($this->_password, $res['password'])) {
                    $_SESSION['user_logged_in'] = true;
                    $_SESSION['user_id'] = $res['id'];
                    $_SESSION['user_level'] = $res['user_level'];


                    header('Location: account');
                } else {
                    $this->_errors[] = 'Identifiant et/ou mot de passe incorrecte';
                }
            } else {
                $this->_errors[] = 'Identifiant et/ou mot de passe incorrecte';
            }
        }

        // Check unique email

        public function checkUniqueEmail()
        {
            $req = $this->_conn->prepare("SELECT count(email) FROM users WHERE email = :email");
            $req->bindParam(':email', $this->_email);
            $req->execute();
            if ($req->fetchColumn()) {
                $this->_errors[] = 'Email déja utilisé';
            }
        }

        // Check unique student number

        public function checkUniqueStudentNumber()
        {
            $req = $this->_conn->prepare("SELECT count(student_number) FROM users WHERE student_number = :student_number");
            $res = $req->bindParam(':student_number', $this->_student_number);
            $req->execute();
            if ($req->fetchColumn()) {
                $this->_errors[] = 'Numéro étudiant déja utilisé';
            }
        }
        
        // UPDATE USER

        public function updateUser()
        {
            $req = $this->_conn->prepare("UPDATE users SET `name`=:name,`first_name`=:firstname,`email`=:email,`phone`=:phone, `student_number`=:student_number WHERE id=:id");

            $req->bindParam(':id', $this->_id);
            $req->bindParam(':name', $this->_name);
            $req->bindParam(':phone', $this->_phone);
            $req->bindParam(':firstname', $this->_firstname);
            $req->bindParam(':email', $this->_email);
            $req->bindParam(':student_number', $this->_student_number);

            $req->execute();
            return $req->rowCount();
        }

        // Update USER PASSWORD

        

        public function updateUserPassword()
        {
            $this->_password = password_hash($this->_password, PASSWORD_DEFAULT);

            $req = $this->_conn->prepare("UPDATE users SET `password` =:password WHERE id=:id");

            $req->bindParam(':id', $this->_id);
            $req->bindParam(':password', $this->_password);

            $req->execute();
            return $req->rowCount();
        }

        /**
         * Delete user
         */

        public function deleteUser($id)
        {
            $req = $this->_conn->prepare('DELETE FROM users WHERE id=:id');
            $req->bindParam(':id', $id);
            $req->execute();
        }

        
        /**
         * Get the users count
         */

        public function usersCount()
        {
            $req = $this->_conn->query("SELECT count(*) FROM users");
            return $req->fetchColumn();
        }





        // ---------------------------------------------------------------------------------------------------
    /**
     * Système de gestion des Users
     * 
     */



    /**
     * function getUser($param1, $param2)
     * 
     * Cette fonction va retourner une information de l'utilisateur donné
     * 
     * @param 1 = le UserID
     * @param 2 = l'information a récupérer
     * @return string
     * 
     */
    function getUser($id, $inf){

        $request = $this -> _conn -> query("SELECT * FROM `users` WHERE `id` = '$id' ");
        foreach($request -> fetchAll() as $r){
            return $r[$inf];
        }
    }


     /**
     * function isConnected()
     * 
     * Cette fonction va vérifier si l'utilisateur est connecté ou pas
     * 
     * @return boolean
     * 
     */
    function isConnected(){
        if(isset($_SESSION['user_logged_in'])){
            return true;
        }
        return false;
    }


     /**
     * function adminIsConnected()
     * 
     * Cette fonction va vérifier si l'admin est connecté ou pas
     * 
     * @return boolean
     * 
     */
    function adminIsConnected(){
        if(isset($_SESSION['admin_logged_in'])){
            return true;
        }
        return false;
    }




    /**
    * function search($param1)
    * 
    * Cette fonction va chercher un nom dans la liste
    * 
    * @param 1 = le nom
    * @return array
    * 
    */
   function search($name){
       $requete_prepare_3 = $this -> _conn -> prepare("SELECT id,name FROM users WHERE name LIKE ?");
       $requete_prepare_3 -> execute(array($name));
       return $requete_prepare_3->fetchAll();
   }





    /**
    * function updateSpecialUser($param1)
    * 
    * Cette fonction va chercher un nom dans la liste
    * 
    * @param 1 = le nom
    * @return array
    * 
    */
    function updateSpecialUser($id, $name, $first_name, $email, $phone, $student_number, $user_level, $actif){
        $requqest = $this -> _conn -> exec("UPDATE `users` SET `name`='$name',`first_name`='$first_name', `email`='$email', 
        `phone`='$phone',`student_number`='$student_number',`user_level`='$user_level',`actif`='$actif' WHERE `id`='$id'");
    }
    
}
