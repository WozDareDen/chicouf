<?php
// PARENT NAV

if(isset($_SESSION['parenthood'])){
    
if($_SESSION['parenthood'] == 1){
?>    
    <nav>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="#header-wrapper">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=memberView&idMember=<?= $_SESSION['id'] ?>">Mon Profil</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Espace Enfant</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?action=createChild">Créer une fiche Enfant</a>
            </div>
        </li>
        <li class="nav-item">
            
<?php
    if(isset($dataFam2)){  
?>              
                <a class="nav-link" href="index.php?action=familyLink&id=<?= $dataFam2['idFamily'] ?>">Espace Famille</a>
<?php            
}
else{
?>
                <a class="nav-link" href="index.php?action=familyLink&id=<?= $_GET['id'] ?>">Espace Famille</a>
<?php
}
?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#footer-wrapper">Nous contacter</a>
            </li>
        </ul>
    </nav>

<?php
}
// GRANDPARENT NAV
elseif($_SESSION['parenthood'] == 0){
?>

    <nav>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="#header-wrapper">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Mon Profil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=familyLink&id=<?= $dataFam2['idFamily'] ?>">Espace Famille</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#footer-wrapper">Nous contacter</a>
        </li>
    </ul>
</nav>

<?php
}
}
// NO SESSION NAV
else{
?>

<nav>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="#header-wrapper">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#mainContent">Comment ça marche ?</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#footer-wrapper">Nous contacter</a>
        </li>
    </ul>
</nav>

<?php
}
?>