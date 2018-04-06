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
        <meta name="twitter:image" content="public/images/charlesfav.png" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <link rel="icon" type="image/png" href="public/images/charlesfav.png" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>        
    <body>
    <div class="container-fluid">
    <!--***********************HEADER********************-->
        <header class="row" style="background-color:#024959;height:100px;color:white;">       
            <div class="col-lg-10">HEADER - NO LOGO</div> 
            <div class="col-lg-2"><div class="dropdownMenuButton " >
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        Mon Compte
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Mon profil</a>
                        <a class="dropdown-item pink" data-bubble="2" href="#">Mes messages </a>
                        <a class="dropdown-item" href="#">Déconnexion</a>
                    </div>
                </div></div>
        </header>


                <?= $content ?>

            </section>
        </div>
       <!--****************FOOTER*****************-->
        <footer class="row">
            <div class="col-lg-12" style="background-color:black;height:100px;color:white;">
           FOOTER
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
    <script src="public/js/script.js"></script>
    </body>
</html>