<?php $title = 'Votre profil' ?>
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
        <a href="#" class="row bannerFamily" style="background-image: url('app/Public/uploads/banners/banniere.png');"></a> 
<?php
}
?>

    </div>
        
<?php $modif = $recoverUs->fetch() ?>

<h1 class="mbr-section-title" style="text-align:center;">Modifier votre profil <?= $modif['firstname'] ?></h1>
<div class="row justify-content-md-center">   
       <p>Vous pouvez modifier ici les informations vous concernant. </p>
       <p> Pour modifier votre photo de profil, cliquez dessus.</p>
        </div>
    <div class="row justify-content-md-center">
        <article class="col-sm-3 avatarBox social" >
            <a href="#" data-toggle="modal" data-target="#userModal<?= $modif['idMember'] ?>" data-whatever="@mdo" class="photoChild2" style="background-image: url(<?= $modif['img'] ?>);" title="Vous pouvez modifier la photo" ></a>
                        <div class="modal fade" id="userModal<?= $modif['idMember'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header" style="background-color:#6bbfb0;">
                                <h5 class="modal-title" id="exampleModalLabel" >Modifier votre photo de profil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="index.php?action=uploadAva&idMember=<?= $modif['idMember'] ?>" method="post" enctype="multipart/form-data">
                                    <fieldset>
                                    <input type="file" name="fileToUpload" id="fileToUpload" /> 
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <input type="submit" class="btn" style="background-color:#6bbfb0;" value="Envoyer" name="submit" />
                                    </fieldset>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
        </article>
        <article class="col-sm-6">
            <form action="index.php?action=changeProfile&id" method="post">
                <button type="button" class="btn btn-info"  class="btn social" data-toggle="modal" data-target="#modalChangePass">Changer votre mot de passe</button><br />
         
<?php
// CHANGE SURNAME FOR MISSES
if($modif['gender'] == 1){      
?>

                    <label for="surnameCo">Modifier votre nom</label><br />
                        <input type="text" id='surnameCo'  name="surnameCo" value="<?= $modif["surname"] ?>" > <br /> 

<?php
}
else{
?>

                        <input type="hidden" id='surnameCo'  name="surnameCo" value="<?= $modif["surname"] ?>" > <br /> 

<?php
}
?>                                     

                    <label for="mail">Modifier votre email</label><br/>
                        <input type="email" id="mailCo" name="mailCo" value="<?= $modif['mail'] ?>"><br />
                    <div id="popMail">
                        <p>Votre mail n'est pas conforme.</p>
                    </div>               
                    <label>Modifier votre date de naissance</label><br />
                        <input type="date" id="birthdateCo" name="birthdateCo"  value="<?= $modif['birthdate'] ?>"><br />       
                    <label>Modifier votre Adresse</label><br />
                        <textarea id="cityCo" name="cityCo"  rows="3" ><?= $modif['city'] ?></textarea><br />
                        <input class="btn" style="background-color:#6bbfb0;color:white;" id="registration" type="submit" name="updateUser" value="Envoyer" />
            </form>
    </div>
</article>




<!-- MODAL CHANGE PASS -->
<div class="modal fade" id="modalChangePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel7" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header padiday2">
                <h5 class="modal-title" style="color:white;" >Changer votre mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
                <p>Pour opérer cette modification, vous devez d'abord renseigner votre mot de passe actuel.</p>
                <p>Ensuite, vous pouvez entrer un nouveau mot de passe que vous devrez confirmer.</p>
                <p>Comme précédemment pour l'inscription, ce nouveau mot de passe devra également contenir entre 8 et 16 caractères alphanumériques dont 1 majuscule, 1 minuscule et 1 chiffre. </p>
                <form action="index.php?action=changePass&id" method="post">
                    <input type="password" id="initPass" name="initPassCo" required placeholder="mot de passe actuel"><br />
                    <input type="password" id="regFormPass" class="champ2 champPass" name="passCo"
                        autocomplete="off" placeholder="nouveau mot de passe" required>
                    <input type="checkbox" onclick="myFunction()" name="pass2Co">Afficher le mot de passe <br>
                    <div id="pop">
                    <!--Button trigger modal-->
                        <div id="buttonPassword" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                            Mot de passe non conforme
                        </div>
                    <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        </div>
                    </div>
                    <input type="password" id="regFormPass2" class="champ2 champPass" required name="pass2Co"
                        autocomplete="off" placeholder="confirmez-le">
                    <input type="checkbox" onclick="myFunction2()">Afficher le mot de passe <br/>
                    <span id="message"></span><br />
                    <button type="submit" class="btn btn-outline-info">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>








<!--********END OF PAGE*************-->
</div>    


<?php $content = ob_get_clean(); ?>
<?php require 'templateHeadScripts.php' ?>