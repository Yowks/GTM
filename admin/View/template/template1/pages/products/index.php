<?php

$page = 'list';

if(isset($queryURI) && isset($queryURI[1])){

    $array = ['list', 'add'];
    if(in_array($queryURI[1], $array)){
        $page = $queryURI[1];
    }

}

require ($chemin_template.'pages/products/'. $page .'.php');
