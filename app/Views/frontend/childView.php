<?php $title = 'Espace Membre' ?>
<?php ob_start(); ?>
<?php require 'bureau.php' ?>

<div class="container" style="background-color: #FFFAFA;">


  <h1 style="text-align:center;">Bienvenue sur votre Espace Membre <?= $_SESSION['firstname'] ?>&nbsp;!</h1>

  <article class="row justify-content-md-center" style="text-align:center;text-align:justify;">Vous trouverez ici tous les renseignements nécessaires à la gestion des fiches de vos enfants. Vous pouvez les modifier et les personnaliser à loisir. 
  </article>


  <section class="row justify-content-md-center">
  <?php
$bigData = $data->fetchAll();
if(empty($bigData)){
?>
                <p>Vous pouvez dès à présent créer une fiche pour votre enfant, créer un Espace Famille ou en rejoindre un.</p>
<?php
}
else{
foreach($bigData as $newData){
?>





    <article class="col-sm-3 avatarBox" >
    <a href="#" data-toggle="modal" data-target="#exampleModal<?= $newData['idChildren'] ?>" data-whatever="@mdo" class="photoChild2" style="background-image: url(<?= $newData['img'] ?>);" title="Vous pouvez modifier la photo" ></a>
                  <div class="modal fade" id="exampleModal<?= $newData['idChildren'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
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
                            <input type="submit" class="btn btn-primary" value="Envoyer" name="submit" />
                            </fieldset>
                        </form>
                      </div>
                    </div>
                  </div>
                  </div>
    </article>

  
    <article class="col-sm-7" >
    <h3><?= $newData['firstname']; ?> <?= $newData['surname']; ?> </h3>
                    <a href="index.php?action=goToUpdateChild&idChildren=<?= $newData['idChildren']; ?>"><button type="button" class="btn btn-warning">Modifier cette fiche enfant</button></a>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2<?= $newData['idChildren'] ?>">Rattacher un parent à cet enfant</button>

<!--***************************Modal Child-to-Parent****************************-->
                    <div class="modal fade" id="exampleModal2<?= $newData['idChildren'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" style="color:black;">Rattacher un deuxième parent à cet enfant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span >&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" style="color:black;">
                            <p>Pour rattacher cette fiche Enfant à un autre Parent, il vous suffit de renseigner son adresse mail. <br />
                              Ainsi cette personne pourra elle aussi gérer l'intégralité de cette fiche.
                            </p>
                            <form action="index.php?action=belong&idChildren=<?=$newData['idChildren']; ?>" method="post">
                              <div class="form-group">
                                <input type="mail" class="form-control" id="mailCo" name="mailCo" placeholder="Entrez son mail">
                              </div>
                              <button type="submit" class="btn btn-primary">Valider</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
<!--*************************IDENTITY********************************-->
                    <div class="sr-only"><?= $newData['idMember']; ?></div>
                    <p>Date de naissance : <?= $newData['new_birthdate']; ?></p>
                    <p>Parent(s) : <?= $newData['parent1']?> 
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
                    <h3>ALIMENTATION </h3>
                    <p>Plats préférés : <?= $newConnex2['favorite_meal']; ?></p>
                    <p>Plats détestés : <?= $newConnex2['hated_meal']; ?></p>
<!--**************************HEALTH**********************************-->        
<?php
$newConnex3 = $connex3->fetch()
?>
                    <h3>TRAITEMENT</h3>
                    <p>Noms, posologies, durées : <?= $newConnex3['meds']; ?></p>
                    <p>Allergies : <?= $newConnex3['allergies']; ?></p>
                    <p>Dernière modification effectuée par <?= $newData['upDateUser'] ?>, le <?= $newData['new_upDateLog'] ?>.</p>

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

