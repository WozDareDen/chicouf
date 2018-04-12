<?php $title = 'Espace Famille' ?>
<?php ob_start(); ?>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-8 col-md-offset-2 text-xs-center" style="border:1px solid black;">
            <h3 class="mbr-section-title display-2">Bienvenue dans votre Espace - Famille <?= $dataF4['familyName'] ?></h3>
            <div class="lead"><p>Edit your menu with ease! Change the font, size and color, set your own links... Notice that it's possible to add buttons to the menu as well. Discover the new block parameters and enjoy your beautiful responsive mobile menu!</p></div>
            <div class="row justify-content-md-center"><a class="btn btn-primary" href="">PETITS-ENFANTS</a> <a class="btn btn-black" href="">PARENTS</a></div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-3 col-md-offset-2 text-xs-center" style="margin-top:100px;">
            <h3 class="mbr-section-title display-2"></h3>
            <div class=""><p></p></div>    
        </div>
    </div>


           <div>
           <h2 class="row">Bienvenue sur votre Espace Famille !</h2>
            <div class="row"> 
<?php
$bigData = $dataF->fetchAll();
if(empty($bigData)){
?>
                <p>Vous pouvez dès à présent créer un Espace Famille ou en rejoindre un.</p>
<?php
}
else{
foreach($bigData as $newData){
?>

            <article class="col-sm-4" >
            <div>
            <article class="col-sm-4 avatarBox" >
            <a class="photoChild" data-toggle="collapse" style="background-image: url( <?=$newData['img'] ?>)" href="#collapseExample<?= $newData['idChildren']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"></a>

                </article>

<h3><div class="childName"> <?= $newData['firstname']; ?> <?= $newData['surname']; ?> </div></h3>
<!-- <a href="index.php?action=goToUpdateChild&idChildren=<?= $newData['idChildren']; ?>">Modifier cette fiche enfant</a> -->
<div class="sr-only"><?= $newData['idMember']; ?></div>
<div class="collapse" id="collapseExample<?= $newData['idChildren']; ?>">
<p><?= $newData['new_birthdate']; ?></p>
<p>Parent(s) : <?= $newData['parent1']?> 
<?php 
if(!empty($newData['parent2'])){
?>
 & <?= $newData['parent2']?>
 <?php
 }
 ?> </p>
<?php
$newConnex2 = $dataF2->fetch() 
 ?>

<hr>
<div class="englobe"><div class="fly">
<h3>ALIMENTATION </h3>
<h5>Plats préférés :</h5> <p class="fav"><?= $newConnex2['favorite_meal']; ?></p>
<h5>Plats détestés :</h5><p class="hate"><?= $newConnex2['hated_meal']; ?></p>
<?php
$newConnex3 = $dataF3->fetch()
?>
</div>
<hr>
<div class="fly">
<h3>TRAITEMENT</h3>

<h5>Noms, posologies, durées :</h5><p><?= $newConnex3['meds']; ?></p>
<h5>Allergies :</h5> <p><?= $newConnex3['allergies']; ?></p>
</div>

                </article>




                <?php
}
}
?>
</div>
</div>
</div>



           </div>   




<?php $content = ob_get_clean(); ?>

<?php require 'templateHeadScripts.php' ?>