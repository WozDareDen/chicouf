<?php $title = 'Mentions légales' ?>
<?php ob_start(); ?>
<?php
require 'templateNav.php'
?>
<!--*********MAIN*************-->
<style>body{background-color:#ebe7f7;}</style>
<div class="container">
<!--********BANNER************-->
    <div class="bannerBox">
        <a href="#" class="row bannerFamily" style="background-image: url('app/Public/uploads/banners/banniere.png');" ></a> 
    </div>
<!--********CONTENT************-->            
    <h1 class="mbr-section-title display-3" style="text-align:center;">Mentions légales</h1>
        <div class="row justify-content-md-center">
            <div class="col-md-10 col-md-offset-2 text-xs-center">
                <div class="lead">
                    <h4>Les régles d'usage</h4>
                    <p>L'inscription sur le site Chicouf.fr est <strong>gratuite</strong>. </p>
                    <p>Vous vous engagez à n'écrire aucun message à caractère obscène, vulgaire, discriminatoire, menaçant, diffamatoire, injurieux ou contraire aux lois et règlements en vigueur de votre pays, du pays où « Chicouf.fr » est hébergé ou les lois internationales.</p>
                    
                    <h4>Valider son inscription</h4>
                    <p>La seule contrainte pour vous enregistrer concerne votre mot de passe. Celui-ci doit être composé entre 8 et 16 caractères alphanumériques comprenant au minimum 1 majuscule, 1 minuscule et 1 chiffre.</p>

                    <h4>Données personnelles</h4>
                    <p>Vous seuls êtes responsables des informations que vous partagez. Chicouf.fr ne saurait être tenu responsable de potentielles erreurs ayant entraîné des conséquences sur la santé de votre enfant. Vous acceptez que toutes les informations que vous avez saisies soient stockées dans notre base de données. Chicouf.fr s'engage de son côté à faire tout son possible pour assurer la sécurité de vos données personnelles (noms, photos, données médicales etc). 
                    <p>Chicouf.fr s'engage à ne pas revendre vos données à des tiers.</p>

                    <p>www.chicouf.fr est hébergé par : los Gringos del Greta56</p>
                    <p>Conformément aux articles 39 et suivants de la loi n° 78-17 du 6 janvier 1978 relative à  l'informatique, aux fichiers et aux libertés, toute personne peut obtenir communication et, le cas échéant, rectification ou suppression des informations la concernant, en s'adressant par les moyens de communication disponibles en bas de cette page.<p>
                </div>
            </div>
        </div>
</div>    
<!--********END OF PAGE*************-->
<?php $content = ob_get_clean(); ?>
<?php require 'templateHeadScripts.php' ?>