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

<h1 class="mbr-section-title display-3" style="text-align:center;">Bienvenue dans votre Espace Famille</h1>
    <div class="row justify-content-md-center">
        <div class="col-md-10 col-md-offset-2 text-xs-center">
            <div class="lead"><p>Vous pouvez d'ores et déjà créer un nouvel Espace pour votre famille. Vous en serez alors le modérateur. Différentes options de paramétrage s'offrent à vous.<p>
            <p>Tout d'abord, sachez que vos enfants seront <strong>automatiquement</strong> rattachés à cet Espace famille. Ensuite, la principale action qui s'offre à vous est de <strong>rattacher les utilisateurs</strong> au sein de cet espace. Pour cela, rien de plus simple, il vous suffit de renseigner les adresses mails utilisées par ces derniers. Ils seront automatiquement rajoutés ainsi que leurs enfants le cas échéant.</p>
            <p>Vous allez pouvoir, en plus de donner <strong>un nom</strong> à cette famille, lui définir <strong>une bannière</strong>.</p>
            <p>Seul le nom est obligatoire dans un premier temps. Vous pourrez rajouter une bannière ultérieurement.
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

    <div class="row justify-content-md-center">   
        <div class="col-md-12  text-xs-center">   
            <h3 class="mbr-section-title display-3" style="text-align:center">Bienvenue dans votre Espace </h3>
            <h3 class="mbr-section-title display-3" style="text-align:center">Famille <?= $dataF4['familyName'] ?></h3>
    
            <div class="lead">
                <p>Retrouvez tous vos proches au sein de cet Espace. L'ensemble des membres de cette famille peut modifier les habitudes alimentaires et les traitements de tous les enfants présents.</p>
                <p>Pour lire les informations de chaque enfant, il suffit de cliquer sur sa photo. </p>
            </div>

<?php 
$newDataF5 = $dataF5->fetch();
if($newDataF5['modo']>0){
?>
        <div class="row justify-content-md-center">
     
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddParent" >RATTACHER UN MEMBRE</button>
            <button class="btn btn-info" data-toggle="modal" data-target="#modalAddBanner" >MODIFIER LA BANNIERE</button>
            <a href="index.php?action=deleteFamily&id=<?= $_GET['id'] ?>"><button class="btn btn-danger">SUPPRIMER CET ESPACE FAMILLE</button></a>
        </div>

<?php
}
?>
    </div>
<!--*************GRANDCHILDREN**************-->
    <h3>Les petits-enfants</h3>
    <div class="row"> 
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
}
?>

    </div>
</div>

<?php    
if(isset($dataMember)){
?>

    <h3>Les parents</h3>
    <div class="row"> 

<?php
$bigDataMember = $dataMember->fetchAll();
if(!(empty($bigDataMember))){    
foreach($bigDataMember as $newDataMember){
?>

       
            <article class="col-sm-2 avatarBox" >
                <a class="photoChild" style="background-image: url( <?=$newDataMember['img'] ?>)" href="#collapseExample<?= $newDataMember['idMember']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"></a>
                <h3> <?= $newDataMember['firstname']; ?> <?= $newDataMember['surname']; ?></h3>
            </article>
        

<?php
}
}
?>

    </div>

<?php    
}
?>        


</div>    
<!--********END OF PAGE*************-->

<!-- MODAL ADD PARENT -->
<div class="modal fade" id="modalAddParent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black;">Rattacher un utilisateur à cet Espace Famille</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
                <p>Pour rattacher un utilisateur à cet Espace Famille, il vous suffit de renseigner son adresse mail.<br />Ainsi cette personne tout comme ses enfants seront réunis au sein de cet Espace.</p>
                <form action="index.php?action=belongParent" method="post">
                    <div class="form-group">
                        <input type="hidden" name="idCoFamily" value="<?= $_GET['id'] ?>">
                        <input type="mail" class="form-control" id="mailCoParent" name="mailCoParent" placeholder="Entrez son mail">
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- MODAL ADD BANNER -->
<div class="modal fade" id="modalAddBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:black;">Modifier la bannière de cet Espace Famille</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?action=uploadBanner&idFamily=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <input type="hidden" name="idFamilyCo" value="<?= $dataF6['idFamily'] ?>" />
                        <input type="file" name="fileToUpload" id="fileToUpload" /> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <input type="submit" class="btn btn-primary" value="Envoyer" name="submit" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require 'templateHeadScripts.php' ?>