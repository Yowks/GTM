<?php
    require ('../Controller/booking.php');
    require ('../Controller/Users.controller.php');
?>

<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <?php require ($chemin_template.'pages/calendar/components/list.php') ; ?>
    <?php require($chemin_template.'components/styles.php') ?>
    <style>
        html, body {margin: 0;padding: 0;font-family: Arial, Helvetica Neue, Helvetica, sans-serif;font-size: 14px;}
        #calendar {max-width: 900px;margin: 40px auto;padding: 0 10px;}
    </style>
<div id="calendar"></div>
