<?php $title = 'Espace Membre' ?>
<?php ob_start(); ?>
<?php require 'templateNav.php' ?>

<style>body{background-image:url(app/Public/backgrounds/backg-bois-rouge.jpg);background-attachment:fixed !important;background-repeat:no-repeat;}</style>
<div class="container pageMV" >

<?php
if($_SESSION["gender"]==0){
?>

  <span class="pseudoM h1Fam"><h1 class="styleH1" >Bienvenue sur votre Espace Membre, <?= $_SESSION['firstname'] ?>&nbsp;!</h1></span>

<?php
}
else{
?>
  <span class="pseudoF h1Fam"><h1 class="styleH1">Bienvenue sur votre Espace Membre, <?= $_SESSION['firstname'] ?>&nbsp;!</h1></span>
<?php
}
?>
  <article class="row justify-content-md-center" style="text-align:center;text-align:justify;"> <h5 class="h5Mem">Vous trouverez ici tous les renseignements nécessaires à la gestion des fiches de vos enfants.</h5>
  <div class="lead loco alert alert-success alert-dismissible fade show"  data-dismiss="alert" role="alert" title="Faîtes disparaitre ce message en cliquant dessus, il réapparaitra la prochaine fois que vous viendrez sur cette page ;)">
    <p class="pMem"> Vous pouvez les modifier et les personnaliser à loisir. Tous les membres de votre Espace Famille auront la possibilité de modifier les habitudes alimentaires et les traitements. Seuls les parents peuvent ajouter une photo de profil et modifier l'identité de la Fiche Enfant.</p> 
    <p class="pMem">Pour ajouter une photo de profil à votre enfant, il vous suffit de cliquer sur celle-ci. Une fenêtre s'ouvrira alors. Il en va de même pour votre profil personnel, accessible en haut à gauche de la barre de navigation.</p>  
    <p class="pMem">L'Espace Famille permet de regrouper tous les enfants, parents et grand-parents. Deux options s'offrent à vous : créer cet Espace ou en rejoindre un existant. Le modérateur de l'Espace Famille est le seul à pouvoir vous inviter. </p>
  </article>


  <section class="row justify-content-md-center">
  <?php
if(empty($children)){
?>
                <p style="padding:10px;text-align:justify;">Vous pouvez dès à présent créer une fiche pour votre enfant, créer un Espace Famille ou en rejoindre un. Le modérateur de l'Espace Famille, c'est-à-dire celui qui est à l'origine de sa création, est le seul à pouvoir vous rattacher à cet Espace en renseignant votre email. Si dans votre entourage, aucun espace n'a été créé, soyez la première personne à le faire et devenez-en le modérateur. Rendez-vous sur l'Espace Famille, accessible dans la barre de navigation. </p>
                <div class="col-sm-12"><img id="logoTurn2" class="logTurn col-sm-12" src="app/Public/uploads/logo.png" alt="logo pleine page" title="logo pleine page"/></div>
<?php
}
else{
    foreach($children as $one_child){
?>





    <article class="col-sm-3 avatarBox social newMargin" >
    <a href="#" data-toggle="modal" data-target="#exampleModal<?= $one_child['idChildren'] ?>" data-whatever="@mdo" class="photoChild2" style="background-image: url(<?= $one_child['img'] ?>);" title="Vous pouvez modifier la photo" ></a>
                  <div class="modal fade" id="exampleModal<?= $one_child['idChildren'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#6bbfb0;">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier la photo de votre enfant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <p>Votre fichier doit obligatoirement être au format jpg, jpeg, png ou gif et ne pas dépasser 5Mo.
                      </p>
                        <form action="index.php?action=uploadPic&idMember=<?= $_GET['idMember'] ?>&idChildren=<?= $one_child['idChildren'] ?>" method="post" enctype="multipart/form-data">
                            <fieldset>
                            <input type="file" name="fileToUpload" id="fileToUpload" /> 
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <input type="submit" class="btn"style="background-color:#6bbfb0;" value="Envoyer" name="submit" />
                            </fieldset>
                        </form>
                      </div>
                    </div>
                  </div>
                  </div>
    </article>

  
    <article class=" offset-sm-2 col-sm-7 offset-md-0 social" >

<?php
if($one_child["gender"]==1){
?>

    <h3 class="pseudoF"><?= $one_child['firstname']; ?> <?= $one_child['surname']; ?> </h3>

<?php
}
else{
?>

    <h3 class="pseudoM"><?= $one_child['firstname']; ?> <?= $one_child['surname']; ?> </h3>

<?php
}
?>

                    <a href="index.php?action=goToUpdateChild&idChildren=<?= $one_child['idChildren']; ?>" class="social"><button type="button" style="background-color:#b80308;color:white;" class="btn">Modifier cette fiche enfant</button></a>

<?php
if(($one_child['parent2']) == NULL){
?>

                    <button type="button" class="btn social btn-info" data-toggle="modal" data-target="#exampleModal2<?= $one_child['idChildren'] ?>">Rattacher un parent à cet enfant</button>

<?php
}
?>
<!--***************************Modal Child-to-Parent****************************-->
                    <div class="modal fade" id="exampleModal2<?= $one_child['idChildren'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="background-color:#17a2b8;">
                            <h5 class="modal-title" style="color:white;">Rattacher un deuxième parent à cet enfant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span style="color:white;">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" style="color:black;">
                            <p>Pour rattacher cette fiche Enfant à un autre Parent, il vous suffit de <span class="ita">renseigner son adresse mail</span> ET de <span class="ita">rajouter son prénom dans la case "Parents"</span> de l'enfant.<br />
                              Ainsi cette personne pourra elle aussi gérer l'intégralité de cette fiche.
                            </p>
                            <p>Cependant ce parent ne sera pas automatiquement rattaché à votre Espace Famille. Seul le modérateur de celui-ci peut le faire.</p>
                            <form action="index.php?action=belong&idChildren=<?=$one_child['idChildren']; ?>" method="post">
                              <div class="form-group">
                                <input type="mail" class="form-control" id="mailCo" name="mailCo" placeholder="Entrez son mail">
                              </div>
                              <button type="submit" class="btn btn-outline-info">Valider</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
<!--*************************IDENTITY********************************-->
                    <div class="sr-only"><?= $one_child['idMember']; ?></div>
                    <p class="social">Date de naissance : <span class="writings"><?= $one_child['new_birthdate']; ?></span></p>
                    <p class="social">Poids : <span class="writings"><?= $one_child['bulk']; ?> Kg</span> en date du <?= $one_child['new_bulkDate'] ?></p>
                    <p class="social">Parent(s) : <span class="writings"><?= $one_child['parent1']?></span> 
    <?php 
    if(!empty($one_child['parent2'])){
    ?>
    <span class="writings">& </span><span class="writings"><?= $one_child['parent2']?></span>
    <?php
    }    
?> 

</p>
<!--****************************FOOD**********************************-->
<?php
    
    foreach($one_child['meal'] as $nMeals){
    ?>
                        <h3 class="social titlesMV">ALIMENTATION </h3>
                        <p class="social">Plats préférés : <span class="writings"><?= $nMeals['favorite_meal']; ?></span></p>
                        <p class="social">Plats détestés : <span class="writings"><?= $nMeals['hated_meal']; ?></p>

    <?php
    }
    ?>
    <!--**************************HEALTH**********************************-->        
                        <h3 class="social titlesMV">TRAITEMENT</h3>

<?php        
if(!(empty($one_child['TTT']))){
    foreach($one_child['TTT'] as $newTTT){
?>

                        <p class="social" >Début du Traitement : <?= $newTTT['new_startDate']; ?></p>
                        <p class="social">Médicaments, posologies :</p>
                        <p> 
                        
<?php                     
        foreach($newTTT['meds'] as $Nmeds){                
?>                   

                        <span class="ita"><?= $Nmeds['title']; ?></span> (<?= $Nmeds['content']; ?>)<br />      
                        </p>

    <?php  
        }
    }
}
else{
?>

                    <p class="writings">Aucun traitement en cours</p>

<?php
}
?>              
<?php
    if(isset($one_child['allergies'])){
    foreach($one_child['allergies'] as $Nallergies){
    ?>

                        <h3 class="social titlesMV">ALLERGIES </h3>
                        <p class="social writings"><?= $Nallergies['content']; ?></p>
                        <p class="social">Dernière modification effectuée par <span class="updateUser"><?= $one_child['updateUser'] ?></span>, le <?= $one_child['new_updateLog'] ?>.</p>

        </article>
<?php
    }
    }
}
}
?>

  </section>

</div>



<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>