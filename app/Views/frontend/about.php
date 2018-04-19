<?php $title = 'A propos' ?>
<?php ob_start(); ?>
<?php
require 'bureau.php'
?>
<!--*********MAIN*************-->
<div class="container">
<!--********BANNER************-->
    <div class="bannerBox">
<?php
if(isset($dataF6['banner'])){
?>
        <a href="#" class="row bannerFamily" style="background-image: url( <?= $dataF6['banner'] ?>);" data-toggle="modal" data-target="#modalAddBanner" ></a>
<?php
}
else{
?>          
        <a href="#" class="row bannerFamily" style="background-image: url('app/Public/uploads/banners/banniere.png');" data-toggle="modal" data-target="#modalAddBanner" ></a> 
<?php
}
?>

    </div>
        

<h1 class="mbr-section-title display-3" style="text-align:center;">A propos</h1>
    <div class="row justify-content-md-center">
        <div class="col-md-10 col-md-offset-2 text-xs-center">
            <div class="lead">
                <h4>L'origine</h4>
                <p><strong>Chicouf.fr</strong> a initialement été élaboré dans le cadre de la formation dispensée à <strong><a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwjrxfGB6MbaAhVEbVAKHYrPDcwQFggoMAA&url=http%3A%2F%2Fgreta-bretagne.ac-rennes.fr%2Fportail%2Fweb%2Fgreta-de-bretagne-sud%2Fkercode&usg=AOvVaw1bhFZPGR7Xtc4QiCQ7CLY9">Kercode-Simplon</a></strong>, Grande Ecole du Numérique, en partenariat avec la formation de Développeur Web Junior d'<strong><a href="https://openclassrooms.com/">OpenClassrooms</a></strong>. Ce site constitue le projet 5 de la-dite formation.</p> 
                <p>Cette dernière est sanctionnée par l'obtention du diplôme '<strong>Développeur intégrateur en réalisation d'applications web</strong>' de niveau III (bac+2), enregistré au <a href="http://www.rncp.cncp.gouv.fr/grand-public/visualisationFiche?format=fr&fiche=25468">Répertoire National des Certifications Professionnelles</a>, reconnu par l'Etat. Cette certification est obtenue avec le concours de <strong><a href="https://3wa.fr/">3W Academy</a></strong>.<p>
                 
        </div>
    </div>
    
</div>




</div>    
<!--********END OF PAGE*************-->









<?php $content = ob_get_clean(); ?>

<?php require 'templateHeadScripts.php' ?>