<div class="col-sm-12">

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Fonctionnement
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Noms</th>
                        <th scope="col">Messages</th>
                        <th scope="col">Mails</th>
                    </tr>
                </thead>
            <tbody>
<?php
$bigDataMsg = $dataMsg->fetchAll();
if(empty($bigDataMsg)){
?>
                <p>Aucun message</p>
<?php
}
else{
foreach($bigDataMsg as $newDataMsg){
?>
                <tr>
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
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Sécurité
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
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
$bigDataMsg1 = $dataMsg1->fetchAll();
if(empty($bigDataMsg1)){
?>
                <p>Aucun message</p>
<?php
}
else{
foreach($bigDataMsg1 as $newDataMsg1){
?>
                <tr>
                    <th scope="row">2</th>
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
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Divers
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
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
$bigDataMsg2 = $dataMsg2->fetchAll();
if(empty($bigDataMsg2)){
?>
                <p>Aucun message</p>
<?php
}
else{
foreach($bigDataMsg2 as $newDataMsg2){
?>
                <tr>
                    <th scope="row">3</th>
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
