<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<?php require 'templateAdminHeader.php' ?>


<main role="main">
<!--***************Main jumbotron**************-->
    <div class="jumbotron ">
        <div class="container">
            <h1 class="display-3" id="test2">Pense-bête</h1>
            <p class="testP">Vous pouvez utiliser cet Espace Ecriture pour noter toutes vos idées.</p>
            <p id="mask" class="testP"><button class="btn btn-info">Masquer/afficher toutes les notes</button></p>
            
<?php
$i = 1;
foreach($getStuff as $oneStuff){
?>

            <a href="admin.php?action=deleteNote&id=<?= $oneStuff['idReminder'] ?>" class="testP3">#<?= $i ?></a>    
            <div class="alert alert-success col-lg-6 alert-dismissible fade show reminder testP3" data-dismiss="alert" role="alert"><p class="firstP"><?= $oneStuff['reminderDate'] ?></p>
            <hr><p class="mb-0" class="secondP"><?= $oneStuff['content'] ?></p></div>

<?php
$i++;
}
?>

            <form method="post">
                <textarea id="writeStuff" name="writeStuff" rows="8"cols="25"></textarea><br />
                <a class="btn btn-info" id="entry">Valider</a>
            </form>
        </div>
    </div>
</main>








               



<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>