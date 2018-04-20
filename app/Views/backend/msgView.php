<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	
  <div class="container">
<?php require 'templateAdminHeader2.php' ?>
<?php
$newDataMsg4 = $dataMsg4->fetch();
$newDataMsg5 = $dataMsg5->fetch();
$newDataMsg6 = $dataMsg6->fetch();
?>
<div class="jumbotron">

  <h1 class="display-4">Boîte de réception</h1>
<div class="col-sm-12">

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn collasped" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="background-color:#f56a67;">
          Fonctionnement <span class="badge badge-light"> <?= $newDataMsg4[0] ?></span>
        </button> 
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <?php
$bigDataMsg = $dataMsg->fetchAll();
if(empty($bigDataMsg)){
?>
                <p>Aucun message</p>
<?php
}
else{
?>  
  <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Noms</th>
                        <th scope="col">Messages</th>
                        <th scope="col">Mails</th>
                    </tr>
                </thead>
            <tbody>
<?php              
foreach($bigDataMsg as $newDataMsg){
?>
      


                <tr>
                    <th scope="row"><?= $newDataMsg['idContact'] ?></th>
                    <td><?= $newDataMsg['nameContact'] ?></td>
                    <td><?= $newDataMsg['msg'] ?></td>
                    <td><?= $newDataMsg['mailContact'] ?></td>
                </tr>
<?php
}
}
?>    
</tbody>
</table>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color:#cf677e">
          Sécurité <span class="badge badge-light"> <?= $newDataMsg5[0] ?></span>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      <?php
$bigDataMsg1 = $dataMsg1->fetchAll();
if(empty($bigDataMsg1)){
?>
                <p>Aucun message</p>
<?php
}
else{
?>  
  <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Noms</th>
                        <th scope="col">Messages</th>
                        <th scope="col">Mails</th>
                    </tr>
                </thead>
            <tbody>
<?php              
foreach($bigDataMsg1 as $newDataMsg1){
?>
       

                <tr>
                    <th scope="row"><?= $newDataMsg1['idContact'] ?></th>
                    <td><?= $newDataMsg1['nameContact'] ?></td>
                    <td><?= $newDataMsg1['msg'] ?></td>
                    <td><?= $newDataMsg1['mailContact'] ?></td>
                </tr>
<?php
}
}
?>    
</tbody>
</table>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color:#c05488;">
          Divers <span class="badge badge-light"> <?= $newDataMsg6[0] ?></span>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
<?php
$bigDataMsg2 = $dataMsg2->fetchAll();
if(empty($bigDataMsg2)){
?>
                <p>Aucun message</p>
<?php
}
else{
?>  
  <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Noms</th>
                        <th scope="col">Messages</th>
                        <th scope="col">Mails</th>
                    </tr>
                </thead>
            <tbody>
<?php
foreach($bigDataMsg2 as $newDataMsg2){
?>
      
                <tr>
                    <th scope="row"><?= $newDataMsg2['idContact'] ?></th>
                    <td><?= $newDataMsg2['nameContact'] ?></td>
                    <td><?= $newDataMsg2['msg'] ?></td>
                    <td><?= $newDataMsg2['mailContact'] ?></td>
                </tr>
<?php
}
}
?>    
</tbody>
</table>
      </div>
    </div>
  </div>
</div>


        </div>
</div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>