<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<?php require 'templateAdminHeader.php' ?>


<main role="main">
<!--***************Main jumbotron**************-->
    <div class="jumbotron cardFamX cardJumbo">
        <div class="container col-xs-12 col-lg-10">
            <h1 class="display-3" id="test2" style="text-align:center;">Pense-bête</h1>
            <p>Vous pouvez utiliser cet Espace Ecriture pour noter toutes vos idées.</p>
            <p id="mask"><button class="btn btn-info">Masquer/afficher <span class="eraseThD">les notes</span></button></p>
            
<?php
$i = 1;
foreach($getStuff as $oneStuff){
?>

            <a href="admin.php?action=deleteNote&id=<?= $oneStuff['idReminder'] ?>" >#<?= $i ?></a>    
            <div class="alert alert-success alert-dismissible fade show reminder " data-dismiss="alert" role="alert"><p><?= $oneStuff['reminderDate'] ?></p>
            <hr><p class="mb-0" ><?= $oneStuff['content'] ?></p></div>

<?php
$i++;
}
?>

            <form method="post">
                <div class="form-group col-sm-12">
                    <textarea class="form-control" id="writeStuff" name="writeStuff" rows="8" ></textarea><br />
                    <a class="btn btn-info" id="entry">Valider</a>
                </div>
            </form>
        </div>
    </div>
</main>








               



<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>