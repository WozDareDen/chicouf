<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no" />
        <meta http-equiv="X-UA-compatible" content="IE=edge" />
        <meta name="description" content="Chicouf, service de gestion de contenu familial" />
        <meta name="keywords" content="Chicouf, famille, gestion" />
<!--******************Meta Facebook**************-->        
        <meta property="og:title" content="Chicouf, service de gestion de contenu familial" />
        <meta property="og:url" content="www.chicouf.fr" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="chicouf.fr" />
        <meta property="og:description" content="Chicouf, service de gestion de contenu familial" />
        <meta property="og:image" content="app/Public/uploads/logo.png" />
<!--******************Meta Twitter**************-->             
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Chicouf, service de gestion de contenu familial" />
        <meta name="twitter:url" content="www.chicouf.fr" />
        <meta name="twitter:description" content="Chicouf, service de gestion de contenu familial" />
        <meta name="twitter:image" content="app/Public/uploads/logo.png" />
        <title><?= $title ?></title>
        <link href="app/Public/css/style.css" rel="stylesheet" /> 
        <link href="app/Public/css/photopile.css" rel="stylesheet" />
        <link rel="stylesheet" href="app/Public/css/style.prefix.css">
        <link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
        <link rel="icon" type="image/png" href="app/Public/uploads/logo.png" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head> 
    <body>

<?php 
//VIEWS COUNT
if(file_exists('data/compteur_pages_vues.txt'))
{
        $compteur_f = fopen('data/compteur_pages_vues.txt', 'r+');
        $compte = fgets($compteur_f);
}
else
{
        $compteur_f = fopen('data/compteur_pages_vues.txt', 'a+');
        $compte = 0;
}
$compte++;
fseek($compteur_f, 0);
fputs($compteur_f, $compte);
fclose($compteur_f); 
//VISITS COUNT
if(file_exists('data/compteur_visites.txt'))
{
        $compteur_f2 = fopen('data/compteur_visites.txt', 'r+');
        $compte2 = fgets($compteur_f2);
}
else
{
        $compteur_f2 = fopen('data/compteur_visites.txt', 'a+');
        $compte2 = 0;
}
if(!isset($_SESSION['compteur_de_visite']))
{
        $_SESSION['compteur_de_visite'] = 'visite';
        $compte2++;
        fseek($compteur_f2, 0);
        fputs($compteur_f2, $compte2);
}
fclose($compteur_f2);
?>
    
        <?= $content ?>
        <?php require 'templateFooter.php' ?>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="app/Public/js/jquery-3.3.1.js"></script>
        <script src="app/Public/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="app/Public/js/jquery.ui.touch-punch.min.js"></script>
        <script src="app/Public/js/script.js"></script>
        <script src="app/Public/js/photopile.js"></script>
        <script src="app/Public/js/script.babel.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
    </body>
</html>