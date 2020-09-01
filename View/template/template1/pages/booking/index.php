<?php
$page = 'materiel';

if(isset($queryURI) && isset($queryURI[1])){

    $array = ['mesReservations', 'materiel'];
    if(in_array($queryURI[1], $array)){
        $page = $queryURI[1];
    }

}

require ('View/template/template1/pages/booking/'. $page .'.php');
