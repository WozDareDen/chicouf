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
$bigData = $data->fetchAll();
if(empty($bigData)){
?>

        <p>Aucune famille enregistrée.</p>

<?php
}
else{
foreach($bigData as $newData){
?>

        <tr>
          <td><?= $newData['idFamily'] ?></td>
          <td><?= $newData['familyName'] ?></td>
        </tr>

<?php
}
}
?>    
      </tbody>
    </table>
<!--PAGINATION-->    
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
<!--DELETE FAMILY BUTTON-->    
    <a href="#" data-toggle="modal" data-target="#modalDeleteFamily"><button class="btn btn-danger">Supprimer une famille</button></a>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>