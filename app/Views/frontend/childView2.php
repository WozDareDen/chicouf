<?php $title = 'Espace Membre' ?>
<?php ob_start(); ?>
          <!--***********************MENU & SECTION********************-->
          <div class="row">    
        <!--***********************MENU********************-->
            <nav class="col-sm-2" style="background-color:red;">MENU
            <ul>
                <li><a href="#"><i class="fa fa-home" style="font-size:30px;"></i></a>
                </li>
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
            </ul>
            </nav>
      <!--***********************SECTION********************-->
            <section class="col-sm-10" style="background-color:#117a8b;color:white;">




<div class="row">
    <div class="col-sm-10">      
        <!--***********************ARTICLES********************-->
        <h2 class="row">Bienvenue sur votre Espace Membre !</h2>
            <div class="row"> 
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

                <article class="col-sm-6" style="background-color:purple;color:white;">
            <div>
<h3><?= $newData['Firstname']; ?> <?= $newData['Surname']; ?> </h3>
<a href="index.php?action=goToUpdateChild&idChildren=<?= $newData['idChildren']; ?>">Modifier cette fiche enfant</a>
<div class="sr-only"><?= $newData['idMember']; ?></div>
<p>Date de naissance : <?= $newData['new_birthdate']; ?></p>
<p>Parent(s) : <?= $newData['Parent1']?> 
<?php 
if(!empty($newData['Parent2'])){
?>
 & <?= $newData['Parent2']?>
 <?php
 }
 ?> </p>
<?php
$newConnex2 = $connex2->fetch() 
 ?>

<h3>ALIMENTATION </h3>
<p>Plats préférés : <?= $newConnex2['Favorite_meal']; ?></p>
<p>Plats détestés : <?= $newConnex2['Hated_meal']; ?></p>
<?php
$newConnex3 = $connex3->fetch()
?>
<h3>TRAITEMENT</h3>

<p>Noms, posologies, durées : <?= $newConnex3['Meds']; ?></p>
<p>Allergies : <?= $newConnex3['Allergies']; ?></p>


                </article>


                <article class="col-sm-6 avatarBox" >
                <img data-toggle="modal" data-target="#exampleModal<?= $newData['idChildren'] ?>" data-whatever="@mdo" id="overPic" src="<?= $newData['img'] ?>" title="Vous pouvez modifier la photo" />
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
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
                </article>

                <?php
}
}
?>
</div>



<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'template.php'; ?>