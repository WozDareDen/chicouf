<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<div class="container">

<?php require 'templateAdminHeader2.php' ?>
<?php
$userAll = $useAll->fetch(); 
?>
<!--JUMBOTRON-->
  <div class="jumbotron">
    <h1 class="display-4">Liste des <?= $userAll[0] ?> membres</h1>
<!-- MEMBERS TABLE-->
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Noms</th>
            <th scope="col">Villes</th>
            <th scope="col">Inscription</th>
          </tr>
        </thead>
        <tbody>

<?php
$bigData = $data->fetchAll();
if(empty($bigData)){
?>

        <p>Aucun utilisateur enregistré.</p>

<?php
}
else{
foreach($bigData as $newData){
?>

          <tr>
            <td><?= $newData['idMember'] ?></td>
            <td><?= $newData['surname'] ?> <?= $newData['firstname'] ?></td>
            <td><?= $newData['city'] ?></td>
            <td><?= $newData['registrationDate'] ?></td>
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

<?php 
$userInfo = $userInfos->fetch();
?>
<!--DELETE MEMBER BUTTON-->
      <p><br />
      L'utilisateur enregistré le plus récent est <span class="fatRed"><?= $userInfo['firstname'] ?> <?= $userInfo['surname'] ?></span>, le <?=$userInfo['reg_date'] ?>.<br />
      </p>
      <a href="#" data-toggle="modal" data-target="#modalDeleteMember"><button class="btn btn-danger">Supprimer un utilisateur</button></a>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>