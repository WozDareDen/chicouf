<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<div class="container">

<?php require 'templateAdminHeader2.php' ?>
<?php
$newFamAll = $famAll->fetch()
?>
<!--JUMBOTRON-->
    <div class="jumbotron">
        <h1 class="display-4">Liste des <?= $newFamAll[0] ?> familles</h1>
   
   






        <a href="#" data-toggle="modal" data-target="#modalDeleteFamily"><button class="btn btn-danger">Supprimer une famille</button></a>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>