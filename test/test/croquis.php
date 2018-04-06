<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="X-UA-compatible" content="IE=edge" />
        <meta name="description" content="Blog du romancier Jean Forteroche" />
        <meta name="keywords" content="Jean Forteroche, ecrivain, blog, roman, Alaska" />
<!--******************Meta Facebook**************-->        
        <meta property="og:title" content="Blog du romancier Jean Forteroche" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="JeanForteroche.fr" />
        <meta property="og:description" content="Blog du romancier Jean Forteroche" />
        <meta property="og:image" content="public/images/charlesfav.png" />
<!--******************Meta Twitter**************-->             
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Blog du romancier Jean Forteroche" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:description" content="Blog du romancier Jean Forteroche" />
        <meta name="twitter:image" content="public/images/charlesfav.png" />
        <title>Croquis Espace Membre</title>
        <link href="public/css/move.css" rel="stylesheet" /> 
        <link rel="icon" type="image/png" href="public/images/charlesfav.png" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head> 
        <div class="container-fluid">
            <header class="row">
                <div class="col-lg-12" style="background-color:#024959;height:100px;color:white;">
                HEADER
                avec le logo à gauche et son avatar de connexion à droite
                </div>
            </header>
            <div class="row">
                <nav class="col-lg-2"  style="background-color:red;">
                MENU pour naviguer dans son Espace Membre repertoriant toutes les fonctionnalités telles que Créer une Fiche Enfant, Modifier une Fiche Enfant, Supprimer une Fiche Enfant...
                </nav>
                <section class="col-lg-10" style="background-color:blue;color:white;">
                SECTION où apparaisse les informations demandées. C'est l'Espace Principal. La grille de Bootstrap doit être placée dans un conteneur. Bootstrap propose les classescontainer etcontainer-fluid. Leur utilisation était auparavant optionnelle. Il est désormais clairement indiqué dans la documentation qu'il faut la mettre en œuvre systématiquement si on veut obtenir des alignements et des espacements corrects. La classecontainer contient et centre la grille sur une largeur fixe, qui s'adapte en fonction de la largeur de l'écran. La classecontainer-fluid permet à la grille d'occuper toute la largeur. Dans les exemples de ce chapitre, je vais utiliser systématiquementcontainer pour avoir une visualisation plus facile des éléments. Ce conteneur a une largeur maximale selon le média concerné, comme indiqué au tableau suivant.
                <div class="row">
                    
                    <aside class="col-lg-offset-10 col-lg-2" style="background-color:white;color:black;">
                    ASIDE pk pas une timeline ? ou autres infos
                    </aside>
                </div>
                <div class="row">
                    <article class="col-lg-10" style="background-color:green;color:white;">
                    ARTICLE où pourrait apparaitre des conseils pratiques de bonne gestion du compte, des astuces, des rappels, mémos...
                    </article>
                </div>
                
                
                </section>
            </div>
            <footer class="row">
                <div class="col-lg-12" style="background-color:black;height:100px;color:white;">
                FOOTER de merde
                </div>
            </footer>
        </div>









<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('template.php'); ?>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>


</body>
</html>