<?php $title = 'Espace Famille' ?>
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
        
<?php 
// *********NEW CREATION VIEW*************
if(empty($dataF4)){
?>

<h1 class="mbr-section-title display-3" style="text-align:center;">Bienvenue dans l'Espace Famille</h1>
    <div class="row justify-content-md-center">
        <div class="col-md-10 col-md-offset-2 text-xs-center">
            <div class="lead"><p>Vous pouvez d'ores et déjà créer un nouvel Espace pour votre famille. Vous en serez alors le modérateur. Différentes options de paramétrage s'offrent à vous.<p>
            <p>Tout d'abord, sachez que vos enfants seront <strong>automatiquement</strong> rattachés à cet Espace famille. Ensuite, la principale action qui s'offre à vous est de <strong>rattacher les utilisateurs</strong> au sein de cet espace. Pour cela, rien de plus simple, il vous suffit de renseigner les adresses mails utilisées par ces derniers pour s'inscrire. Ils seront automatiquement rajoutés ainsi que leurs enfants le cas échéant.</p>
            <p>Vous allez pouvoir, en plus de donner <strong>un nom</strong> à cette famille, lui définir <strong>une bannière</strong>.</p>
            <p>Seul le nom est obligatoire dans un premier temps. Vous pourrez rajouter une bannière ultérieurement.</p>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-2 text-xs-center">
        <div class="lead justify-content-md-center">
            <form action="index.php?action=createNewFamily" class="justify-content-md-center" method="post">
                <div class="form-group col-lg-12">
                    <label for="familyNameCo">Nom de votre Espace Famille</label><br />
                    <input type="text" id="familyName" name="familyNameCo" required="valid" placeholder="entrez le nom" >
                </div>
                <div class="justify-content-md-center">
                <input class="btn btn-primary"  type="submit" name="createNewFamily" value="CREER UN NOUVEL ESPACE FAMILLE" />
                </div>
            </form>
        </div>  
    </div>
</div>

<?php
        } 
// ********CLASSIC FAMILY VIEW***********
        else{                   
?>

    <div class="row justify-content-md-center ">   
        <div class="col-md-12  text-xs-center">   
            <h3 class="mbr-section-title display-3 frame5" style="text-align:center"><span>Bienvenue dans votre Espace</span> </h3>
            <h3 class="mbr-section-title display-3 frame6" style="text-align:center"><span>Famille <?= $dataF4['familyName'] ?></span></h3>
    
            <div class="lead loco alert alert-success alert-dismissible fade show"  data-dismiss="alert" role="alert" title="Faîtes disparaitre ce message en cliquant dessus, il réapparaitra la prochaine fois que vous viendrez sur cette page ;)">
                <p>Retrouvez tous vos proches au sein de cet Espace. <strong>L'ensemble des membres </strong>de cette famille peut modifier les habitudes alimentaires et les traitements de tous les enfants présents.</p>

<?php
if((count($dataF8)) > 1){
?>
                <p>Les modérateurs de votre Espace Famille
<?php

foreach($dataF8 as $newDataF8){       
?>
<span style="color:blue;font-weight:bold;">
<?=  $newDataF8['firstname'];
?></span>,
<?php
}?>sont les seuls habilités
<?php }
else{  
?>

                <p>Le modérateur de votre Espace Famille, <span style="color:blue;font-weight:bold;"><?= $dataF8[0]['firstname'] ?></span>, est le seul habilité 
<?php
}
?>               
                 à rattacher un membre à celle-ci.
                 Un modérateur peut également bannir un membre ou supprimer cet Espace. Il peut aussi décider de <strong>donner les droits de modération</strong> à l'un d'entre vous. Enfin, il peut modifier la bannière qui décore cet Espace. 
                <p>Pour lire les informations de chaque enfant, il suffit de cliquer sur sa photo. </p>
            </div>


    </div>
<!--*************GRANDCHILDREN**************-->
    <h3 class="loco" >Les petits-enfants</h3>
    <div class="row" style="border:1px solid black;" > 
<?php
$bigData = $dataF->fetchAll();
foreach($bigData as $newData){
?>
<!--**************AVATAR********************-->
        <section class="col-sm-4" >
            <div>
                <article class="col-sm-4 avatarBox">
                    <a class="photoChild" data-toggle="collapse" style="background-image: url( <?=$newData['img'] ?>)" href="#collapseExample<?= $newData['idChildren']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"></a>
                    <h3 class="childName"> <?= $newData['firstname']; ?></h3>
                </article>
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
<!--*************FOOD*****************-->
                    <div class="englobe">
                        <div class="fly">
                            <h3>ALIMENTATION </h3>
                            <h5>Plats préférés :</h5> <p class="fav"><?= $newConnex2['favorite_meal']; ?></p>
                            <h5>Plats détestés :</h5><p class="hate"><?= $newConnex2['hated_meal']; ?></p>

<?php
$newConnex3 = $dataF3->fetch()
?>

                        </div>
<hr>
<!--*************HEALTH***************-->
                        <div class="fly">
                        <h3>TRAITEMENT</h3>
                        <h5>Noms, posologies, durées :</h5><p><?= $newConnex3['meds']; ?></p>
                        <h5>Allergies :</h5> <p><?= $newConnex3['allergies']; ?></p>
                        </div>
                    </div><a href="index.php?action=goToUpdateChild&idChildren=<?= $newData['idChildren']; ?>"><button type="button" class="btn btn-warning">Modifier cette fiche</button></a>

                </div>
            </div>   
        </section>
        
<?php
}

?>

    </div>
</div>

<?php    
if(isset($dataMember)){
?>

    <h3 class="loco">Les parents</h3>
    <div class="row parents" style="border:1px solid black;"> 

<?php
$bigDataMember = $dataMember->fetchAll();
if(!(empty($bigDataMember))){    
   
foreach($bigDataMember as $newDataMember){ 
    if($newDataMember['parenthood'] ==1){
?>
       
            <article class="col-sm-3 avatarBox" >
                <a class="photoChild" data-toggle="collapse" style="background-image: url( <?=$newDataMember['img'] ?>)" href="#collapseExample<?= $newDataMember['idMember']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"></a>
                <h3 class="childName"> <?= $newDataMember['firstname']; ?> <?= $newDataMember['surname']; ?></h3>
            
            <div class="collapse" id="collapseExample<?= $newDataMember['idMember']; ?>">
                <h5>Adresse : </h5>

<?php
if(!($newDataMember['city'] == null)){                
?>               

                <p><?= $newDataMember['city'] ?></p>

<?php                
}
else{
    ?>

                <p style="font-style:italic">non renseignée</p>

<?php                
}    
?>          

                <h5>Date de naissance :</h5>

<?php
if(!($newDataMember['new_birthdate'] == null)){                
?>

                <p><?= $newDataMember['new_birthdate'] ?></p>
<?php                
}
else{
    ?>
                <p style="font-style:italic">anniversaire non renseigné</p>
<?php                
}    
?>          
                <p>Inscrit le <?= $newDataMember['new_regDate'] ?>.</p>

            </div></article>
<?php
}
}
}
?>

   </div>

<?php    
}
?>        

    <h3 class="loco">Les grand-parents</h3>
    <div class="row" style="border:1px solid black;"> 

<?php
   
foreach($bigDataMember as $newDataMember){ 
    if($newDataMember['parenthood'] == 0){
?>

            <article class="col-sm-3 avatarBox" >
                <a class="photoChild" data-toggle="collapse" style="background-image: url( <?=$newDataMember['img'] ?>);" href="#collapseExample<?= $newDataMember['idMember']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"></a>
                <h3 class="childName"> <?= $newDataMember['firstname']; ?> <?= $newDataMember['surname']; ?></h3>
                <div class="collapse" id="collapseExample<?= $newDataMember['idMember']; ?>">
                <h5>Adresse : </h5>

<?php
if(!($newDataMember['city'] == null)){                
?>               

                <p><?= $newDataMember['city'] ?></p>

<?php                
}
else{
    ?>

                <p style="font-style:italic">non renseignée</p>

<?php                
}    
?>          

                <h5>Date de naissance :</h5>

<?php
if(!($newDataMember['new_birthdate'] == null)){                
?>

                <p><?= $newDataMember['new_birthdate'] ?></p>
<?php                
}
else{
    ?>
                <p style="font-style:italic">anniversaire non renseigné</p>
<?php                
}    
?>          
                <p>Inscrit le <?= $newDataMember['new_regDate'] ?>.</p>

            </div>
            </article>
        

<?php
}
}
}
?>

   </div>

      




     


</div>    
<!--********END OF PAGE*************-->




<?php $content = ob_get_clean(); ?>

<?php require 'templateHeadScripts.php' ?>