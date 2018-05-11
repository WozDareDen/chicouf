<?php
// PARENT NAV

if(isset($_SESSION['parenthood'])){
    
    if($_SESSION['parenthood'] == 1){
    ?>    


<!-- NAVBAR START -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="index.php">
<img id="logoTurn" src="app/Public/uploads/logo.png" width="30" height="30" alt="Logo">
</a>
<a class="navbar-brand" href="index.php">Chicouf</a>
<div class="collapse navbar-collapse justify-content-between" id="navbar2">
<ul class="navbar-nav">
<li class="nav-item">
  <a class="nav-link" href="index.php?action=recoverUser&id=<?= $_SESSION['id'] ?>">Mon Profil</a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Espace Enfant
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item kitDel" href="index.php?action=memberView&idMember=<?= $_SESSION['id'] ?>">Voir mes Enfants</a>
<a class="dropdown-item kitDel" href="index.php?action=createChild">Créer une fiche Enfant</a>
</div>
</li>

<?php
if(isset($_SESSION['family']) && $_SESSION['family'] != NULL){
?>
           <li class="nav-item">
<a class="nav-link" href="index.php?action=familyLink&id=<?= $_SESSION['family'] ?>">Espace Famille</a>
</li>
<?php
}
else{
?>        
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=goToCreateFamily&id">Espace Famille</a>
            </li>






<?php
}
?>


        <li class="nav-item">
            <div class="nav-link contactMouse" data-toggle="modal" data-target="#ModalContact" >Nous contacter</div>
        </li>

        
<?php
if($_SESSION['modo'] >0){
  ?>
  <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" id="navbarDropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Modération</a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
            <a href="#" class="btn dropdown-item kitDel" data-toggle="modal" data-target="#modalAddParent" >Rattacher un membre à votre famille</a>
            <a href="#" class="btn dropdown-item kitDel" data-toggle="modal" data-target="#modalAddBanner" >Modifier la bannière</a>
            <a href="#" class="btn dropdown-item kitDel" data-toggle="modal" data-target="#modalAddModo" >Ajouter un modérateur</a>
            <a href="index.php?action=goToModo&id=<?=$_SESSION['family'] ?>" class="btn dropdown-item kitDel" id="modoFamList" >Afficher la liste des membres</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="btn dropdown-item kitDel4" data-toggle="modal" data-target="#modalStopModo">Quitter la modération</a>
            <a href="#" class="btn dropdown-item kitDel4" data-toggle="modal" data-target="#modalBann">Bannir un membre de cette famille</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="btn dropdown-item kitDel5" data-toggle="modal" data-target="#modalDeleteFamily">Supprimer cet Espace Famille</a>
  </div>
</li>
<?php
}
?>



<?php
  if(($_SESSION['id'] == 43) && ($_SESSION['modo'] == 2)){

?>
        <li class="nav-item">
            <a class="nav-link" href="admin.php?action=dashboard">Admin</a>
        </li>
<?php
  }
?>


</ul>

<div class="form-inline my-2 my-lg-0 iconeSpan">
<?php 
//LOGIN BOX
if(empty($_SESSION['firstname'])){
?>

<button type="button" class="btn btn-outline-danger my-2 my-sm-0 btnConnex" data-toggle="modal" data-target="#exampleModal">Connexion</button>

<?php 
}
else{
?>
<a class="icone" href="index.php?action=recoverUser&id=<?= $_SESSION['id'] ?>" style="background-image:url(<?= $_SESSION['img'] ?>);"> </a>

<?php
if($_SESSION['gender']==1){
?>

Bonjour <span class="pseudoF">&nbsp;<?= $_SESSION['firstname'] ?>&nbsp; </span>

<?php
}
else{
?>

Bonjour <span class="pseudoM">&nbsp;<?= $_SESSION['firstname'] ?>&nbsp; </span>

<?php
}
?>

<a href="index.php?action=deco"><button type="button" style="background-color:#fa164b;color:#FFF;" class="btn my-2 my-sm-0 btnConnex" data-toggle="modal" >Déconnexion</button></a>

<?php 
}
?>
</div>
</div>
</nav>



<?php
}
// GRANDPARENT NAV
elseif($_SESSION['parenthood'] == 0){
?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="index.php">
<img id="logoTurn" src="app/Public/uploads/logo.png" width="30" height="30" alt="Logo">
</a>
<a class="navbar-brand" href="index.html">Chicouf</a>
<div class="collapse navbar-collapse justify-content-between" id="navbar2">
<ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=recoverUser&id=<?= $_SESSION['id'] ?>">Mon Profil</a>
        </li>
        

        <li class="nav-item">
            <a class="nav-link" href="index.php?action=familyLink&id=<?= $_SESSION['family'] ?>">Espace Famille</a>
        </li>


        <li class="nav-item">
            <div class="nav-link contactMouse" data-toggle="modal" data-target="#ModalContact">Nous contacter</div>
        </li>
</ul>

<div class="form-inline my-2 my-lg-0 iconeSpan">
<?php 
//LOGIN BOX
if(empty($_SESSION['firstname'])){
?>

<button type="button" class="btn btn-outline-danger my-2 my-sm-0 btnConnex" data-toggle="modal" data-target="#exampleModal">Connexion</button>

<?php 
}
else{
?>
<a class="icone" href="index.php?action=recoverUser&id=<?= $_SESSION['id'] ?>" style="background-image:url(<?= $_SESSION['img'] ?>);"> </a>

<?php
if($_SESSION['gender']==1){
?>

Bonjour <span class="pseudoF">&nbsp;<?= $_SESSION['firstname'] ?>&nbsp; </span>

<?php
}
else{
?>

Bonjour <span class="pseudoM">&nbsp;<?= $_SESSION['firstname'] ?>&nbsp; </span>

<?php
}
?>

<a href="index.php?action=deco"><button type="button" class="btn btn-danger my-2 my-sm-0 btnConnex" data-toggle="modal" >
  Déconnexion
</button></a>

<?php 
}
?>



</div>

</div>
</nav>



<?php
}
}
// NO SESSION NAV
else{
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="index.php">
<img src="app/Public/uploads/logo.png" width="30" height="30" alt="Logo">
</a>
<a class="navbar-brand" href="index.php">Chicouf</a>
<div class="collapse navbar-collapse justify-content-between" id="navbar2">
<ul class="navbar-nav">

        
<li class="nav-item">
            <a class="nav-link" href="index.php#mainContent">Comment ça marche ?</a>
    </li>
        <li class="nav-item">
            <div class="nav-link contactMouse" data-toggle="modal" data-target="#ModalContact">Nous contacter</div>
        </li>

</ul>

<div class="form-inline my-2 my-lg-0">
<button type="button" class="btn btn-outline-danger my-2 my-sm-0 btnConnex" data-toggle="modal" data-target="#exampleModal">Connexion</button>
</div>
</div>
</nav>

<?php
}
?>
<!-- END OF NAVBARS -->

<!-- MODAL CONNECTION -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fenêtre de connexion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php?action=record" method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="firstname" name="firstnameCo" placeholder="Entrez votre prénom">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="surname" name="surnameCo" placeholder="votre nom">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="passCo" name="passCo" placeholder="Et votre mot de passe">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
          </div>
          <button type="submit" class="btn btn-outline-primary">Valider</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DELETE FAMILY-->
<div class="modal fade" id="modalDeleteFamily" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header padiday">
        <h5 class="modal-title" id="exampleModalLabel5">Suppression de votre Espace Famille</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Cette action entrainera la <strong>suppression définitive</strong> de cet Espace Famille. Par la suite, vous pourrez créer un nouvel Espace Famille.</p>
        <form action="index.php?action=deleteFamily&id=<?= $_SESSION['family'] ?>" method="post">
          <div class="form-check">
          <input type="checkbox" name="choixDelCo" required="valid" /> Je confirme vouloir supprimer cet Espace Famille.</br>
          </div>
          <button type="submit" class="btn btn-outline-danger">Valider</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- MODAL ADD PARENT TO FAMILY-->
<div class="modal fade" id="modalAddParent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header padiday2">
                <h5 class="modal-title" style="color:black;">Rattacher un utilisateur à cet Espace Famille</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
                <p>Pour rattacher un utilisateur à cet Espace Famille, il vous suffit de renseigner son adresse mail.<br />Ainsi cette personne tout comme ses enfants seront réunis au sein de cet Espace.</p>
                <form action="index.php?action=belongParent" method="post">
                    <div class="form-group">
                        <input type="hidden" name="idCoFamily" value="<?= $_SESSION['family'] ?>">
                        <input type="mail" class="form-control" id="mailCoParent" name="mailCoParent" placeholder="Entrez son mail">
                    </div>
                    <button type="submit" class="btn btn-outline-info">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- MODAL ADD BANNER -->
<div class="modal fade" id="modalAddBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header padiday2">
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
                        <input type="submit" class="btn btn-outline-info" value="Envoyer" name="submit" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ADD MODO -->
<div class="modal fade" id="modalAddModo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header padiday2">
                <h5 class="modal-title" style="color:black;">Ajouter un Modérateur à cet Espace Famille</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
                <p>Pour ajouter un modérateur à cet Espace Famille, il vous suffit de renseigner son adresse mail.<br />Ainsi cette personne disposera des mêmes droits que vous au sein de cet Espace.</p>
                <form action="index.php?action=newModo" method="post">
                    <div class="form-group">
                        <input type="mail" class="form-control" id="mailCoModo" name="mailCoModo" placeholder="Entrez son mail">
                    </div>
                    <button type="submit" class="btn btn-outline-info">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL STOP MODO -->
<div class="modal fade" id="modalStopModo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header padiday">
                <h5 class="modal-title" style="color:black;">Quitter la modération</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
                <p>En validant, vous resterez membre de votre Espace Famille mais vous n'en serez plus le modérateur. <br /></p>
                 <form action="index.php?action=changeModo" method="post">
                 
                 <div class="form-check">
                    <input type="checkbox" name="choixDelCo" required /> Je confirme abandonner mes droits à la modération.</br>
                </div>
                <button type="submit" class="btn btn-outline-danger">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MODAL BANN MEMBER-->
<div class="modal fade" id="modalBann" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header padiday">
                <h5 class="modal-title" style="color:black;">Bannir un membre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
                <p>En validant, vous retirez un membre de votre Espace Famille. Cela n'aura pas pour effet de supprimer son compte. Cette action n'est pas irreversible, vous pourrez à tout moment, rattacher de nouveau ce membre à votre Espace. <br /></p>
                 <form action="index.php?action=bann" method="post">
                 <div class="form-group">
                        <input type="mail" class="form-control" id="mailCoModo" name="mailCoModo" placeholder="Entrez son mail" required>
                    </div>
                 <div class="form-check">
                    <input type="checkbox" name="choixDelCo" required /> Je confirme supprimer ce membre de mon Espace Famille.</br>
                </div>
                <button type="submit" class="btn btn-outline-danger">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>


