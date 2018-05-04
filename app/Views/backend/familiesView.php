<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<div class="container">

<?php require 'templateAdminHeader2.php' ?>
<?php
$newFamAll = $famAll->fetch()
?>
<!--JUMBOTRON-->
  <div class="jumbotron">
    <h1 class="display-4">Liste des <?= $newFamAll[0] ?> familles</h1>
    <!-- MEMBERS TABLE-->
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Noms</th>
        </tr>
      </thead>
      <tbody>

<?php
while ($newData = $data->fetch() ){
?>

        <tr>
          <td><?= $newData['idFamily'] ?></td>
          <td><?= $newData['familyName'] ?></td>
        </tr>

<?php
}
?>    
      </tbody>
    </table>

<nav aria-label="Page navigation example">
  <ul class="pagination">

    <?php
for($i=1;$i<=$numPage;$i++){
    echo "<li class='page-item'><a class='page-link' href=\"admin.php?action=familiesList&p=$i\">$i </a></li>";
}
?>

  </ul>
</nav>



<!--DELETE FAMILY BUTTON-->    
    <a href="#" data-toggle="modal" data-target="#modalDeleteFamily"><button class="btn btn-danger">Supprimer une famille</button></a>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>