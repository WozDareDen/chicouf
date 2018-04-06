<?php $title = 'Espace Enfant' ?>
<?php ob_start(); ?>

<div class="row">
            <div class="col-sm-10">      
            <!--***********************ARTICLES********************-->

              <div class="row"> 
<?php
while($newData = $data->fetch()){
?>
                <article class="col-sm-6" style="background-color:purple;color:white;">
                <div>
<h3>BIO </h3>
<p>Nom : <?= $newData['Surname']; ?></p>
<p>Prénom :  <?= $newData['Firstname']; ?></p>  
<p>Date de naissance : <?= $newData['new_birthdate']; ?></p>
<p>Parent 1 : <?= $newData['Parent1']; ?></p>
<p>Parent 2 : <?= $newData['Parent2']; ?></p>

<?php
while($newConnex2 = $connex2->fetch()){
?>
<h3>ALIMENTATION </h3>
<p>Plats préférés : <?= $newConnex2['Favorite_meal']; ?></p>
<p>Plats détestés : <?= $newConnex2['Hated_meal']; ?></p>

<?php
while($newConnex3 = $connex3->fetch()){
?>
<h3>TRAITEMENT</h3>

<p>Noms, posologies, durées : <?= $newConnex3['Meds']; ?></p>


                </article>


                <article class="col-sm-6">
                <img class="pic" src="http://4.bp.blogspot.com/-uQKhNod45Yg/UHlCofl_AbI/AAAAAAAAjXI/DmXCnsFD0Gw/s1600/mary-elizabeth-winstead_captain-america-the-winter-soldier.jpg" />
                </article>
                <?php
}}}
?>
</div>




<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'template.php'; ?>