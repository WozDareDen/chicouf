<?php
// PARENT NAV

if(isset($_SESSION['parenthood'])){
    
    if($_SESSION['parenthood'] == 1){
    ?>    


<!-- Start of Navbar -->
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
            <a class="nav-link" href="index.php?action=memberView&idMember=<?= $_SESSION['id'] ?>">Mon Profil</a>
        </li>
        
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Espace Enfant
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="index.php?action=createChild">Créer une fiche Enfant</a>
<a class="dropdown-item" href="badges.html">Badges</a>
<a class="dropdown-item" href="cards.html">Cards</a>
</div>
</li>

<?php
    if(isset($dataFam2)){  
?>     

<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Espace Famille</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?action=familyLink&id=<?= $dataFam2['idFamily'] ?>">Rejoindre mon espace Famille</a>
            <a class="dropdown-item" href="index.php?action=goToCreateFamily" >Créer un Espace Famille</a>
            </div>
        </li>
        <?php            
}
else{
?>
<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Espace Famille</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?action=familyLink&id=<?= $_GET['id'] ?>">Rejoindre mon espace Famille</a>
            <a class="dropdown-item" href="index.php?action=goToCreateFamily" >Créer un Espace Famille</a>
            </div>
        </li>


<?php
}
?>

        <li class="nav-item">
            <div class="nav-link contactMouse" data-toggle="modal" data-target="#ModalContact" >Nous contacter</div>
        </li>
<?php
  if(($_SESSION['id'] == 32) && ($_SESSION['modo'] == 2)){

?>
        <li class="nav-item">
            <a class="nav-link" href="admin.php?action=dashboard">Admin</a>
        </li>
<?php
  }
?>


</ul>

<div class="form-inline my-2 my-lg-0">
<?php 
//LOGIN BOX
if(empty($_SESSION['firstname'])){
?>

<button type="button" class="btn btn-outline-danger my-2 my-sm-0 btnConnex" data-toggle="modal" data-target="#exampleModal">Connexion</button>

<?php 
}
else{
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
// GRANDPARENT NAV
elseif($_SESSION['parenthood'] == 0){
?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="index.php">
<img src="app/Public/uploads/logo.png" width="30" height="30" alt="Logo">
</a>
<a class="navbar-brand" href="index.html">Chicouf</a>
<div class="collapse navbar-collapse justify-content-between" id="navbar2">
<ul class="navbar-nav">
<li class="nav-item">
            <a class="nav-link" href="index.php?action=memberView&idMember=<?= $_SESSION['id'] ?>">Mon Profil</a>
        </li>
        
<?php
    if(isset($dataFam2)){  
?>     

<li class="nav-item">
            <a class="nav-link" href="index.php?action=familyLink&id=<?= $dataFam2['idFamily'] ?>">Espace Famille</a>
        </li>
        <?php            
}
else{
?>
<li class="nav-item">
            <a class="nav-link" href="index.php?action=familyLink&id=<?= $_GET['id'] ?>">Espace Famille</a>
        </li>


<?php
}
?>

        <li class="nav-item">
            <div class="nav-link contactMouse" data-toggle="modal" data-target="#ModalContact">Nous contacter</div>
        </li>
</ul>

<div class="form-inline my-2 my-lg-0">
<?php 
//LOGIN BOX
if(empty($_SESSION['firstname'])){
?>

<button type="button" class="btn btn-outline-danger my-2 my-sm-0 btnConnex" data-toggle="modal" data-target="#exampleModal">Connexion</button>

<?php 
}
else{
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
<a class="navbar-brand" href="index.html">Chicouf</a>
<div class="collapse navbar-collapse justify-content-between" id="navbar2">
<ul class="navbar-nav">

        
<li class="nav-item">
            <a class="nav-link" href="#mainContent">Comment ça marche ?</a>
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
<!-- End of Navbar -->

<!-- Modal -->
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








