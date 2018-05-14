<?php $title = 'Votre profil' ?>
<?php ob_start(); ?>
<?php
require 'templateNav.php'
?>
<!--*********MAIN*************-->
<style>body{background-image:url(app/Public/Backgrounds/backg-bois-rouge.jpg);background-repeat:no-repeat;}</style>
<div class="container" >
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
<div class="mainPV" >
        <h1 class="mbr-section-title" style="text-align:center;">Modifier votre profil <?= $modif['firstname'] ?></h1>

<?php
if(isset($getFamilyName['familyName'])==true){
?>
        <h4 style="text-align:center;">Vous êtes membre de la Famille <?= $getFamilyName['familyName'] ?></h4>
<?php
}
?>

<div class="row justify-content-sm-center">   
       <p class="reduceP">Vous pouvez gérer ici les informations vous concernant. </p>
       
<?php
if($_SESSION['parenthood'] == 0){
?>     

       <div class="lead loco alert alert-success alert-dismissible fade show"  data-dismiss="alert" role="alert" title="Faîtes disparaitre ce message en cliquant dessus, il réapparaitra la prochaine fois que vous viendrez sur cette page ;)">

       <p>L'Espace Famille permet de regrouper tous les enfants, parents et grand-parents. Deux options s'offrent à vous : <br /> -créer cet Espace ou en rejoindre un existant.</p>
       <p> Le modérateur de l'Espace Famille, c'est-à-dire celui qui est à l'origine de sa création, est le seul à pouvoir vous rattacher à cet Espace en renseignant votre email. Si dans votre entourage, aucun espace n'a été créé, soyez la première personne à le faire et devenez-en le modérateur. Rendez-vous sur l'Espace Famille, accessible depuis la barre de navigation.</p>
        </div>

<?php
}
?>

    </div>
    <div class="row justify-content-sm-center">
        <article class="col-xs-12 col-sm-6 col-md-3 avatarBox social boxProfil" >
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
        <article class="col-xs-12 col-md-6">
            <form action="index.php?action=changeProfile&id" class="proForm" method="post" >
            <label for="wordsCo" >Votre humeur du jour&nbsp;<a href="#small" data-toggle="collapse" aria-expanded="false" aria-controls="#small"><i class="fa fa-info-circle"></i></a></label><br/>
            <div class="collapse" id="small">Ceci apparaîtra de manière aléatoire et anonyme dans votre Espace Famille. A vous de devinez quels auteurs se cachent derrière ces lignes...</div>
                        <input type="text" id="wordsCo" name="wordsCo" value="<?= $modif['words'] ?>"><br />
                        <hr>
         
<?php
// CHANGE SURNAME FOR MISSES
if($modif['gender'] == 1){      
?>

                    <label for="surnameCo" class="label1">Nom</label>
                        <input type="text" id='surnameCo'  name="surnameCo" value="<?= $modif["surname"] ?>" > <br /> 

<?php
}
else{
?>

                        <input type="hidden" id='surnameCo'  name="surnameCo" value="<?= $modif["surname"] ?>" > 

<?php
}
?>                                     
                    
                    <label for="mail" class="label1">Email</label>
                        <input type="email" id="mailCo" name="mailCo" value="<?= $modif['mail'] ?>"><br />
                    <div id="popMail">
                        <p>Votre mail n'est pas conforme.</p>
                    </div>               
                    <label for="birthDateCo" class="label2">Date de naissance</label>
                        <input type="date" id="birthdateCo" name="birthdateCo"  value="<?= $modif['birthdate'] ?>"><br />
                    <label for="mdpCoCo" class="label3">Mot de passe</label>
                    <button type="button" class="btn btn-outline-info"  class="btn social" data-toggle="modal" data-target="#modalChangePass">Modifier</button>
                        <hr >       
                    <label for="cityCo" id="adressPV">Adresse</label><br />
                        <textarea id="cityCo" name="cityCo"  rows="3" ><?= $modif['city'] ?></textarea><br />
                        <input class="btn" style="background-color:#6bbfb0;color:white;margin-top:10px;" id="registration" type="submit" name="updateUser" value="Envoyer" />
            <a href="#" class="social delPV" data-toggle="modal" data-target="#modalQuit" >Supprimer mon compte</a></form>
            
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
                    <input type="checkbox" onclick="watchPW()" name="pass2Co">Afficher le mot de passe <br>
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



<!-- MODAL DELETE MEMBER-->
<div class="modal fade" id="modalQuit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header padiday">
                <h5 class="modal-title" style="color:black;">Supprimer mon compte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
                <p>En validant, vous supprimez <strong>définitivement</strong> toutes les données vous concernant ainsi que celles de <strong>vos enfants</strong> sauf s'il reste un parent attaché à cet enfant. Vous pouvez vous réinscrire à tout moment. <br /></p>
                 <form action="index.php?action=deleteMember" method="post">
                 <div class="form-group">
                        
                    </div>
                 <div class="form-check">
                    <input type="checkbox" name="choixDelCo" required /> Je confirme supprimer mon compte.</br>
                </div>
                <button type="submit" class="btn btn-outline-danger">Valider</button>              
                </form>
            </div>
        </div>
    </div>
</div>
</div>




<!--********END OF PAGE*************-->
</div>    


<?php $content = ob_get_clean(); ?>
<?php require 'templateHeadScripts.php' ?>