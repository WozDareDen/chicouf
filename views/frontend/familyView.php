<?php $title = 'Espace Membre' ?>
<?php ob_start(); ?>
          <!--***********************MENU & SECTION********************-->
          <div class="row">    
        <!--***********************MENU********************-->
            <nav class="col-sm-2" style="background-color:red;">MENU
            <ul>
                <li>Accéder à votre Espace Famille
                </li>
                <li><a href="index.php?action=createChild">Créer une fiche Enfant</a>
                </li>
                <li><a href="index.php?action=belong">Rattacher une fiche Enfant</a>
                </li>
                <li>Créer un nouvel Espace Famille
                </li>
                <li>Rejoindre un Espace Famille existant
                </li>
                <li><a href="index.php?action=deleteChild">Supprimer une fiche Enfant</a>
                </li>
            </ul>
            </nav>
      <!--***********************SECTION********************-->
            <section class="col-sm-10" style="background-color:blue;color:white;">
<div class="row">
    <div class="col-sm-10">      
        <!--***********************ARTICLES********************-->
        <h2 class="row">Bienvenue sur votre Espace Famille !</h2>
            <div class="row"> 




            </div>
<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'template.php'; ?>