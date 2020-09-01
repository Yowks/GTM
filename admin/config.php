<?php

session_start();

require ('../db.php');

spl_autoload_register('load');
function load($class){
    require '../Model/'.$class.'.class.php';
}


// Création du OriginalPath
$counter = count(explode( '/', $_SERVER['QUERY_STRING']));
$correctSlug = "";
if($counter !== 0){
    for($i = 1;$i < $counter; $i ++){ 
        $correctSlug .= "../"; 
    }
}

if(isset($_GET['query'])){

    if(strpos($_GET['query'], '/') !== false) {
        $queryURI = explode('/', $_GET['query']);
        $pageName = 'GTM - '.$queryURI[0];
    }else {
        $pageName = 'GTM - '.$_GET['query'];
    }
}else{
    $pageName = 'GTM Bienvenue sur mon site perso';
}

$template_actif="template1";

$chemin_template="View/template/".$template_actif."/";
$chemin_template_index="View/template/".$template_actif."/index.php";
$chemin_include="View/template/".$template_actif."/includes/";
$chemin_css="View/template/".$template_actif."/css/";
$chemin_ressources="View/template/".$template_actif."/ressources/";
$chemin_img="View/template/".$template_actif."/img/";