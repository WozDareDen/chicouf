<?php $title = 'Espace Famille' ?>
<?php ob_start(); ?>
<?php
require 'templateNav.php'
?>
<!--*********MAIN*************-->
<style>body{background-image:url(app/Public/backgrounds/backg-bois-rouge.jpg);background-attachment:fixed;background-repeat:no-repeat;
overflow-x: hidden;}</style>
<div class="container">
<!--********BANNER************-->
    <div class="bannerBox">

<?php
if(isset($dataF6['banner'])){
?>

        <a href="#" class="row bannerFamily" style="background-image: url( <?= $dataF6['banner'] ?>);"  ></a>

<?php
}
else{
?>          

        <a href="#" class="row bannerFamily" style="background-image: url('app/Public/uploads/banners/banniere.png');" ></a> 

<?php
}
?>

    </div>
        
<?php 
// *********NEW CREATION VIEW*************
if(empty($dataF4)){
?>

    <h1 class="mbr-section-title display-3 h1Fam" >Bienvenue dans l'Espace Famille</h1>
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
        </div>
        <div class="lead loco alert alert-light alert-dismissible fade show"  data-dismiss="alert" role="alert" title="Faîtes disparaitre ce message en cliquant dessus, il réapparaitra la prochaine fois que vous viendrez sur cette page ;)">
            <p>Retrouvez tous vos proches au sein de cet Espace. <strong>L'ensemble des membres </strong>de cette famille peut modifier les habitudes alimentaires et les traitements de tous les enfants présents.</p>

<?php
if((count($dataF8)) > 1){
?>

            <p>Les modérateurs de votre Espace Famille

<?php
foreach($dataF8 as $newDataF8){       
?>

                <span class="modoName" style="color:#056c8e;font-weight:bold;"><?=  $newDataF8['firstname'];?></span>,

<?php
}?>

                sont les seuls habilités

<?php }
else{  
?>

            <p>Le modérateur de votre Espace Famille, <span style="color:#056c8e;font-weight:bold;"><?= $dataF8[0]['firstname'] ?></span>, est le seul habilité 

<?php
}
?>               

            à rattacher un membre à celle-ci.
            Un modérateur peut également bannir un membre ou supprimer cet Espace. Il peut aussi décider de <strong>donner les droits de modération</strong> à l'un d'entre vous. Enfin, il peut modifier la bannière qui décore cet Espace. 
            <p>Pour lire les informations de chaque enfant, il suffit de cliquer sur sa photo. </p>
        </div>      
<?php
if($getWords != NULL){
?>

        <p id="humor" class="col-lg-12">L'humeur du jour : <span class='ita2'>"<?= $getWords ?>"</span></p><br />     
        
<?php
}
?>

        <div>
            <div class="photopile-wrapper">
                <ul class="photopile">

<?php
foreach ($getUrl as $one_img) {
?>

                    <li>
                        <a href="<?= $one_img['img']?>">
                            <a href="index.php?action=memoryGame">Bonus !</a>
                            <img src="<?= $one_img['img']?>" alt="<?= $one_img['firstname']?>" ... /><?= $one_img['firstname']?>
                        </a>
                    </li>

<?php
}
?>    
            
                </ul>
            </div>
        </div>
    </div>

    <div class="row"> 
<!--*************GRANDCHILDREN**************-->
    <h3 class="loco col-sm-12 titleFam" >Les petits-enfants</h3>
    <div class="row" > 
<!--**************AVATAR********************-->
<?php
foreach($children as $one_child){
if(count($children) == 1){
?>

        <section class="col-xs-4 col-sm-6 col-lg-6 cardFam" >

<?php        
}
else{
?>            

            <section class="col-xs-4 col-sm-6 col-lg-3 cardFam" >

<?php            
}
?>

            <div>
                <article class="col-sm-6 col-md-9 avatarBox">
                    <a class="photoChild" data-toggle="collapse" style="background-image: url( <?=$one_child['img'] ?>)" href="#collapseExample<?= $one_child['idChildren']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample" ></a>
                    <h3 class="childName"> <?= $one_child['firstname']; ?></h3>
                </article>
                
                <div class="collapse" id="collapseExample<?= $one_child['idChildren']; ?>">
                    <p><?= $one_child['new_birthdate']; ?></p>
                    <p>Poids : <?= $one_child['bulk']; ?> Kg
                    <small>en date du <?= $one_child['new_bulkDate']; ?></small></p>
                    <p>Parent(s) : <?= $one_child['parent1']?> 

<?php 
if(!empty($one_child['parent2'])){
?>
& <?= $one_child['parent2']?>
<?php
}
?> </p>
<?php
foreach($one_child['meal'] as $nMeals){
?>

                <hr>
<!--*************FOOD*****************-->
                    <div class="englobe">
                        <div class="fly">
                            <h3>ALIMENTATION </h3>
                            <h5>Plats préférés :</h5> <p class="fav"><?= $nMeals['favorite_meal']; ?></p>
                            <h5>Plats détestés :</h5><p class="hate"><?= $nMeals['hated_meal']; ?></p>
                        </div>

<?php
}
?>
                        
                <hr>
<!--*************HEALTH***************-->
                        <div class="fly">
                            <h3>TRAITEMENT</h3>

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

                        </div>
                        <div class="fly">

<?php
if(isset($one_child['allergies'])){
foreach($one_child['allergies'] as $Nallergies){
?>

                            <h3 class="social titlesMV">ALLERGIES </h3>
                            <p class="social writings"><?= $Nallergies['content']; ?></p>
                       
<?php
}
}
?>

                        </div>
                        <a href="index.php?action=goToUpdateChild&idChildren=<?= $one_child['idChildren']; ?>"><button type="button" class="btn btn-warning marginB">Modifier cette fiche</button></a>
                    </div>
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

    <h3 class="loco titleFam">Les parents</h3>
    <div class="row">

<?php
$bigDataMember = $dataMember->fetchAll();
if(!(empty($bigDataMember))){    
   
foreach($bigDataMember as $newDataMember){ 
    if($newDataMember['parenthood'] ==1){
?>
       
        <article class="col-xs-4 col-sm-6 col-md-4 col-lg-3 avatarBox cardFamP" >
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

            </div>
        </article>

<?php
}
}
}
?>

   </div>
    <h3 class="loco titleFam">Les grand-parents</h3>
    <div class="row">

<?php
}   
foreach($bigDataMember as $newDataMember){ 
    if($newDataMember['parenthood'] == 0){
?>

        <article class="col-xs-4 col-sm-6 col-md-4 col-lg-3  avatarBox cardFamGP" >
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
?>

</div>

<?php
}
?>
   
</div>
<!--********END OF PAGE*************-->
<?php $content = ob_get_clean(); ?>
<?php require 'templateHeadScripts.php' ?>