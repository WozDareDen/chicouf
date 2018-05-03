<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<?php require 'templateAdminHeader2.php' ?>




    <div class="row">
        <div class="col-md-5 folio1" style="border:1px solid black;">
            <h2>Membres</h2>
            <span class="spanDash"><?= $useAll[0] ?></span>
        </div>
        <div class="offset-md-2 col-md-5 folio2" style="border:1px solid black;">
            <h2>Enfants</h2>
            <span class="spanDash"><?= $childrenAll[0] ?></span>
        </div>      
        <div class="col-md-5 folio1" style="border:1px solid black;">
            <h2>Familles</h2>
            <span class="spanDash"><?= $famAll[0] ?></span>
        </div>
        <div class="offset-md-2 col-md-5 folio2" style="border:1px solid black;">
            <h2>Messages</h2>
            <span class="spanDash"><?= $msgAll[0] ?></span>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>