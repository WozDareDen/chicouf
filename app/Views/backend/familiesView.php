<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<div class="container">

<?php require 'templateAdminHeader.php' ?>
<?php
$newFamAll = $famAll->fetch()
?>
<!--JUMBOTRON-->
  <div class="jumbotron jumbo">
    <h1 class="display-4" id="test">Liste des <?= $newFamAll[0] ?> familles</h1>
    <!-- MEMBERS TABLE-->
    <table class="table table-striped table-sm">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Noms</th>
          <th scope="col">M<span class="zip">em</span>b<span class="zip">re</span>s</th>
          <th scope="col">Enf<span class="zip">ants</span></th>
        </tr>
      </thead>
      <tbody>

<?php
$i = 0;
while ($newData = $data->fetch() ){
?>

        <tr>
          <td><?= $newData['idFamily'] ?></td>
          <td><?= $newData['familyName'] ?></td>
          <td><?= $nbMembers[$i][0] ?></td>
          <td><?= $nbChildren[$i][0] ?></td>
        </tr>

<?php
$i++;
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