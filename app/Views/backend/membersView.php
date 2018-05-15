<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<div class="container mvContain">

<?php require 'templateAdminHeader.php' ?>
<?php
$userAll = $useAll->fetch(); 
?>
<!--JUMBOTRON-->
    <div class="jumbotron jumbo cardFamX">
        <h1 class="display-5" id="test" style="margin-bottom:2rem;text-align:center;">Liste des <?= $userAll[0] ?> membres</h1>
    <!-- MEMBERS TABLE-->
        <table class="table table-hover table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Noms</th>
                <th scope="col" class="col3mv">Villes</th>
                <th scope="col">Inscription</th>
            </tr>
            </thead>
            <tbody class="table_body">

<?php
while ($members = $data->fetch())
{
?>            
            <tr><td><span id='idUser'><?=$members['idMember'] ?></span></td><td><span id='names'><?= $members['surname'] ?> <?=$members['firstname'] ?></span></td><td class="col3mv"><span id='cities'><?= $members['city'] ?></span></td><td><span id='regDate'><?=$members['new_regDate']?></span></td></tr>
           
<?php
}
?>      

            </tbody>
        </table>   

<nav aria-label="Page navigation example">
  <ul class="pagination">

<?php
for($i=1;$i<=$numPage;$i++){
    echo "<li class='page-item'><a class='page-link' href=\"admin.php?action=membersList&p=$i\">$i </a></li>";
}
?>

  </ul>
</nav>

<?php 
$userInfo = $userInfos->fetch();
?>
<!--DELETE MEMBER BUTTON-->
        <p><br />
        L'utilisateur enregistré le plus récent est <span class="fatRed"><?= $userInfo['firstname'] ?> <?= $userInfo['surname'] ?></span>, le <?=$userInfo['reg_date'] ?>.<br />
        
        <a href="#" data-toggle="modal" class="deLink" data-target="#modalDeleteMember"><button class="btn btn-danger deLink">Supprimer</button></a> </p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>




