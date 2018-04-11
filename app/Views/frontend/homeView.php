<?php $title = 'Accueil' ?>
<?php ob_start(); ?>



<h1>Chicouf.fr !</h1>

<div id="identify">
<?php 
//LOGIN BOX
if(empty($_SESSION['firstname'])){
?>
      <button class="identifyB">s'identifier</button>
        <div class="register">
          <div class="close">X</div>
          <form action="index.php?action=record" method="post">
            <div>
            <label for="firstname">Prénom</label><br />
            <input type="text" id="firstname" name="firstname" placeholder="entrez votre prénom">
            </div>
            <div>
            <label for="surname">Nom</label><br />
            <input type="text" id="surname" name="surname" placeholder="entrez votre nom">
            </div>                     
            <div>
            <label for="pass">Mot de passe</label><br />
            <input type="password" id="pass" name="pass" autocomplete="off" placeholder="et votre mot de passe">
            </div>
            <div>
            <input id="submit" type="submit" value="GO !">
            </div>
            <div class="compte">Pas encore inscrit ? <span class="compteLien"><a href="index.php?action=subView">Créez un compte !</a></span>
            </div>                      
          </form>
        </div>
<?php 
}
else{
?>
        <a href="index.php?action=deco"><button class="identifyB">Déconnexion</button></a>    
<?php 
}
?>
    </div>





<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'template.php'; ?>