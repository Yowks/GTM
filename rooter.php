<?php

require('controller/Users.controller.php' );

$maintenance = false;

if($maintenance == false){

    /**
     * Vérification si l'utilisateur est connecté
     */
    if($users -> isConnected() == true){
        
        /**
         * On vérifie les parametres qu'on envoie dans l'URL
         * $query sera défini sur le premier paramètre d'URL
         */
        if(isset($_GET['query'])){

            if(strpos($_GET['query'], '/') !== false) {
                $queryURI = explode('/', $_GET['query']);
                $query = $queryURI[0];
            }else {
                $query = $_GET['query'];
            }
            
            /**
             * On vérifie si la page demandée correspond a un dossier dans le dossier View/pages
             */
            $pages = array();
            foreach (new DirectoryIterator($chemin_template.'pages/') as $fileInfo) {
                if(!$fileInfo->isDot() AND $fileInfo->isDir()){
                    array_push($pages, $fileInfo->getFilename());
                }
            }

            if($query !== 'admin'){
                if(in_array($query, $pages)){
                    require($chemin_template.'pages/'. $query .'/index.php');
                }else{
                    require($chemin_template.'pages/error/404.php');
                }
            }

        }else{
            // On include la page d'accueil
            require($chemin_template.'pages/home/index.php');
        }

    }else{
        // On include la page de connexion
        if(isset($_GET['query'])){

            if(strpos($_GET['query'], '/') !== false) {
                $queryURI = explode('/', $_GET['query']);
                $query = $queryURI[1];
            }else {
                $query = $_GET['query'];
            }
            if($query == 'register'){ require($chemin_template.'/pages/auth/register.php'); }
            else if($query == 'logout'){ require($chemin_template.'/pages/auth/logout.php'); }
            else {require($chemin_template.'/pages/auth/login.php');}

        }else{
            require($chemin_template.'pages/auth/login.php');
        }
    }


}else{
    // On include la page de maintenance
    require($chemin_template.'pages/error/maintenance.php');
}