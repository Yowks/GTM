<?php

require ('../Controller/booking.php');
require ('../Controller/Users.controller.php');
$page = 'home';

if(isset($queryURI) && isset($queryURI[1])){

    $array = ['view', 'add'];
    if(in_array($queryURI[1], $array)){
        $page = $queryURI[1];
    }

}

require ($chemin_template.'pages/booking/'. $page .'.php');
