<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="X-UA-compatible" content="IE=edge" />
        <meta name="description" content="Chicouf, service de gestion de contenu familial" />
        <meta name="keywords" content="Chicouf, famille, gestion" />
<!--******************Meta Facebook**************-->        
        <meta property="og:title" content="Chicouf, service de gestion de contenu familial" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="chicouf.fr" />
        <meta property="og:description" content="Chicouf, service de gestion de contenu familial" />
        <meta property="og:image" content="public/images/charlesfav.png" />
<!--******************Meta Twitter**************-->             
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Chicouf, service de gestion de contenu familial" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:description" content="Chicouf, service de gestion de contenu familial" />
        <meta name="twitter:image" content="app/Public/uploads/logo.png" />
        <title><?= $title ?></title>
        <link href="app/Public/css/style.css" rel="stylesheet" /> 
        <link href="app/Public/css/styleNav.css" rel="stylesheet" /> 
        <link rel="icon" type="image/png" href="app/Public/uploads/logo.png" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head> 

        <?php require 'templateHeader.php' ?>
        
        <?= $content ?>

        <?php require 'templateFooter.php' ?>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="app/Public/js/errorChecking.js"></script>
        <script src="app/Public/js/logoScript.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
        <script src="app/public/js/script.js"></script>
    </body>
</html>