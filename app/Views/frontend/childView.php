<?php $title = 'Espace Membre' ?>
<?php ob_start(); ?>
<?php require 'templateNav.php' ?>

<div class="container" >


  <h1 style="text-align:center;" >Bienvenue sur votre Espace Membre <?= $_SESSION['firstname'] ?>&nbsp;!</h1>

  <article class="row justify-content-md-center" style="text-align:center;text-align:justify;"> <h5>Vous trouverez ici tous les renseignements nécessaires à la gestion des fiches de vos enfants.</h5>
  <div class="lead loco alert alert-success alert-dismissible fade show"  data-dismiss="alert" role="alert" title="Faîtes disparaitre ce message en cliquant dessus, il réapparaitra la prochaine fois que vous viendrez sur cette page ;)">
    <p> Vous pouvez les modifier et les personnaliser à loisir. Tous les membres de votre Espace Famille auront la possibilité de modifier les habitudes alimentaires et les traitements. Seuls les parents peuvent ajouter une photo de profil et modifier l'identité de la Fiche Enfant.</p> 
    <p>Pour ajouter une photo de profil à votre enfant, il vous suffit de cliquer sur celle-ci. Une fenêtre s'ouvrira alors. Il en va de même pour votre profil personnel, accessible en haut à gauche de la barre de navigation.</p>  
    <p>L'Espace Famille permet de regrouper tous les enfants, parents et grand-parents. Deux options s'offrent à vous : créer cet Espace ou en rejoindre un existant. Le modérateur de l'Espace Famille est le seul à pouvoir vous inviter. </p>
  </article>


  <section class="row justify-content-md-center">
  <?php
$bigData = $data->fetchAll();
if(empty($bigData)){
?>
                <p>Vous pouvez dès à présent créer une fiche pour votre enfant, créer un Espace Famille ou en rejoindre un. Le modérateur de l'Espace Famille, c'est-à-dire celui qui est à l'origine de sa création, est le seul à pouvoir vous rattacher à cet Espace en renseignant votre email. Si dans votre entourage, aucun espace n'a été créé, soyez la première personne à le faire et devenez-en le modérateur. Rendez-vous sur l'Espace Famille, accessible dans la barre de navigation. </p>
                <img id="logoTurn2" class="logTurn" src="app/Public/uploads/logo.png" alt="logo pleine page" title="logo pleine page" />
<?php
}
else{
foreach($bigData as $newData){
?>





    <article class="col-sm-3 avatarBox social" >
    <a href="#" data-toggle="modal" data-target="#exampleModal<?= $newData['idChildren'] ?>" data-whatever="@mdo" class="photoChild2" style="background-image: url(<?= $newData['img'] ?>);" title="Vous pouvez modifier la photo" ></a>
                  <div class="modal fade" id="exampleModal<?= $newData['idChildren'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color:#6bbfb0;">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier la photo de votre enfant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="index.php?action=uploadPic&idMember=<?= $newData['idMember'] ?>&idChildren=<?= $newData['idChildren'] ?>" method="post" enctype="multipart/form-data">
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

  
    <article class="col-sm-7 social" >
    <h3><?= $newData['firstname']; ?> <?= $newData['surname']; ?> </h3>
                    <a href="index.php?action=goToUpdateChild&idChildren=<?= $newData['idChildren']; ?>" class="social"><button type="button" style="background-color:#FCD64C;color:#0B2F3D;" class="btn">Modifier cette fiche enfant</button></a>
                    <button type="button" style="background-color:#3D91B2;color:#FFF" class="btn social" data-toggle="modal" data-target="#exampleModal2<?= $newData['idChildren'] ?>">Rattacher un parent à cet enfant</button>

<!--***************************Modal Child-to-Parent****************************-->
                    <div class="modal fade" id="exampleModal2<?= $newData['idChildren'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="background-color:#17a2b8;">
                            <h5 class="modal-title" style="color:white;">Rattacher un deuxième parent à cet enfant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span style="color:white;">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" style="color:black;">
                            <p>Pour rattacher cette fiche Enfant à un autre Parent, il vous suffit de renseigner son adresse mail. <br />
                              Ainsi cette personne pourra elle aussi gérer l'intégralité de cette fiche.
                            </p>
                            <p>Cependant ce parent ne sera pas automatiquement rattaché à votre Espace Famille. Seul le modérateur de celui-ci peut le faire.</p>
                            <form action="index.php?action=belong&idChildren=<?=$newData['idChildren']; ?>" method="post">
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
                    <div class="sr-only"><?= $newData['idMember']; ?></div>
                    <p class="social">Date de naissance : <?= $newData['new_birthdate']; ?></p>
                    <p class="social">Parent(s) : <?= $newData['parent1']?> 
<?php 
if(!empty($newData['parent2'])){
?>
& <?= $newData['parent2']?>
<?php
}
?> 

</p>
<!--****************************FOOD**********************************-->
<?php
$newConnex2 = $connex2->fetch() 
?>
                    <h3 class="social">ALIMENTATION </h3>
                    <p class="social">Plats préférés : <?= $newConnex2['favorite_meal']; ?></p>
                    <p class="social">Plats détestés : <?= $newConnex2['hated_meal']; ?></p>
<!--**************************HEALTH**********************************-->        
<?php
$newConnex3 = $connex3->fetch()
?>
                    <h3 class="social">TRAITEMENT</h3>
                    <p class="social">Noms, posologies, durées : <?= $newConnex3['meds']; ?></p>
                    <p class="social">Allergies : <?= $newConnex3['allergies']; ?></p>
                    <p class="social">Dernière modification effectuée par <?= $newData['upDateUser'] ?>, le <?= $newData['new_upDateLog'] ?>.</p>

    </article>
    <?php
}
}
?>
  </section>

</div>


<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>

