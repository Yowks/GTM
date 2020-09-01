<?php

require ('../Controller/Users.controller.php');
$page = 'view';

if(isset($queryURI) && isset($queryURI[1])){

    $array = ['edit', 'edit_user', 'view', 'add'];
    if(in_array($queryURI[1], $array)){
        $page = $queryURI[1];
    }

}

require ($chemin_template.'pages/users/'. $page .'.php');