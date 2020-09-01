<?php

$page = 'login';

if(isset($queryURI) && isset($queryURI[1])){

    $array = ['login', 'logout'];
    if(in_array($queryURI[1], $array)){
        $page = $queryURI[1];
    }

}

require ($chemin_template.'pages/auth/'. $page .'.php');
