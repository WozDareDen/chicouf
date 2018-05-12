<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<?php require 'templateAdminHeader.php' ?>
<?php 
//VIEWS COUNT
if(file_exists('data/compteur_pages_vues.txt'))
{
        $compteur_f = fopen('data/compteur_pages_vues.txt', 'r+');
        $compte = fgets($compteur_f);
}
else
{
        $compteur_f = fopen('data/compteur_pages_vues.txt', 'a+');
        $compte = 0;
}
$compte++;
fseek($compteur_f, 0);
fputs($compteur_f, $compte);
fclose($compteur_f); 

//VISITS COUNT
if(file_exists('data/compteur_visites.txt'))
{
        $compteur_f2 = fopen('data/compteur_visites.txt', 'r+');
        $compte2 = fgets($compteur_f2);
}
else
{
        $compteur_f2 = fopen('data/compteur_visites.txt', 'a+');
        $compte2 = 0;
}
if(!isset($_SESSION['compteur_de_visite']))
{
        $_SESSION['compteur_de_visite'] = 'visite';
        $compte2++;
        fseek($compteur_f2, 0);
        fputs($compteur_f2, $compte2);
}
fclose($compteur_f2);
?>
 <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron  cardFamGP ">
        <div class="container">
          <h1 class="display-3" id="test2">Tableau de bord</h1>
          <p class="testP">Vous pouvez à partir de cette Espace d'Administration avoir accès à la liste des utilisateurs inscrits et des familles enregistrées par ces derniers. Vous disposez également un Espace de Messagerie ainsi que d'un Espace d'Expression.</p>
          <p class="testP">Il y a eu <span class="fatRed"><?= $compte ?></span> pages vues sur le site.<br />
            Il y a eu <span class="fatRed"><?= $compte2 ?></span> visiteurs sur le site.</p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-3 cardFam">
            <h2>Membres</h2>
            <p>Le nombre total d'utilisateurs inscrits sur le site s'élève à <span class="spanDash"><?= $useAll[0] ?></span>. </p>
            <p><a class="btn btn-secondary" href="admin.php?action=membersList" role="button">Accéder &raquo;</a></p>
          </div>
          <div class="col-md-3 cardFamP">
            <h2>Enfants</h2>
            <p>Le nombre total d'enfants enregistrés sur le site s'élève à <span class="spanDash"><?= $childrenAll[0] ?></span>. </p>
            
          </div>
          <div class="col-md-3 cardFam">
            <h2>Familles</h2>
            <p>Le nombre total de familles enregistrées sur le site s'élève à <span class="spanDash"><?= $famAll[0] ?></span>.</p>
            <p><a class="btn btn-secondary" href="admin.php?action=familiesList" role="button">Accéder &raquo;</a></p>
          </div>
          <div class="col-md-3 cardFamP">
            <h2>Messages</h2>
            <p>Vous avez <span class="spanDash"><?= $msgAll[0] ?></span> messages envoyés par les utilisateurs dans votre espace de messagerie.</p>
            <p><a class="btn btn-secondary" href="admin.php?action=msgView" role="button">Accéder &raquo;</a></p>
          </div>
        </div>

        <hr>

      </div> <!-- /container -->

    </main>


<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>    