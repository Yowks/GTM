<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <?php require ($chemin_template_admin.'pages/calendar/components/list.php') ; ?>

    <title>Calendrier - GTM</title>
    <style>
        html, body {margin: 0;padding: 0;font-family: Arial, Helvetica Neue, Helvetica, sans-serif;font-size: 14px;}
        #calendar {max-width: 900px;margin: 40px auto;padding: 0 10px;}
    </style>
</head>

<body>
    
    <?php require($chemin_template_admin.'components/sidebar.php') ?>

    <div id="calendar"></div>

</body>
</html>