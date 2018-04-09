<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="X-UA-compatible" content="IE=edge" />
        <meta name="description" content="Chicouf, service de gestion de contenu familial" />
        <meta name="keywords" content="Chicouf, famille, gestion" />
<!--******************Meta Facebook**************-->        
        <meta property="og:title" content="Chicouf, service de gestion de contenu familial" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="chicouf.fr" />
        <meta property="og:description" content="Chicouf, service de gestion de contenu familial" />
        <meta property="og:image" content="public/images/charlesfav.png" />
<!--******************Meta Twitter**************-->             
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Chicouf, service de gestion de contenu familial" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:description" content="Chicouf, service de gestion de contenu familial" />
        <meta name="twitter:image" content="public/images/charlesfav.png" />
        <title>espace famille</title>
        <link href="app/Public/css/style.css" rel="stylesheet" /> 
        <link rel="icon" type="image/png" href="app/ublic/images/charlesfav.png" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>        
    <body>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8 col-md-offset-2 text-xs-center" style="border:1px solid black;">
            <h3 class="mbr-section-title display-2">Bienvenue dans votre Espace - Famille <?= $dataF4['FamilyName'] ?></h3>
            <div class="lead"><p>Edit your menu with ease! Change the font, size and color, set your own links... Notice that it's possible to add buttons to the menu as well. Discover the new block parameters and enjoy your beautiful responsive mobile menu!</p></div>
            <div class="row justify-content-md-center"><a class="btn btn-primary" href="">DOWNLOAD FOR WINDOWS</a> <a class="btn btn-black" href="">DOWNLOAD FOR MAC</a></div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-3 col-md-offset-2 text-xs-center" style="margin-top:100px;">
            <h3 class="mbr-section-title display-2"></h3>
            <div class=""><p></p></div>
            
    
        </div>


    </div>

</section>
           <div>
           <h2 class="row">Bienvenue sur votre Espace Membre !</h2>
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

<h3><div class="childName"> <?= $newData['Firstname']; ?> <?= $newData['Surname']; ?> </div></h3>
<!-- <a href="index.php?action=goToUpdateChild&idChildren=<?= $newData['idChildren']; ?>">Modifier cette fiche enfant</a> -->
<div class="sr-only"><?= $newData['idMember']; ?></div>
<div class="collapse" id="collapseExample<?= $newData['idChildren']; ?>">
<p><?= $newData['new_birthdate']; ?></p>
<p>Parent(s) : <?= $newData['Parent1']?> 
<?php 
if(!empty($newData['Parent2'])){
?>
 & <?= $newData['Parent2']?>
 <?php
 }
 ?> </p>
<?php
$newConnex2 = $dataF2->fetch() 
 ?>

<hr>
<div class="englobe"><div class="fly">
<h3>ALIMENTATION </h3>
<h5>Plats préférés :</h5> <p class="fav"><?= $newConnex2['Favorite_meal']; ?></p>
<h5>Plats détestés :</h5><p class="hate"><?= $newConnex2['Hated_meal']; ?></p>
<?php
$newConnex3 = $dataF3->fetch()
?>
</div>
<hr>
<div class="fly">
<h3>TRAITEMENT</h3>

<h5>Noms, posologies, durées :</h5><p><?= $newConnex3['Meds']; ?></p>
<h5>Allergies :</h5> <p><?= $newConnex3['Allergies']; ?></p>
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







    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>
    <script src="app/public/js/script.js"></script>
    </body>
</html>