<?php $title = 'Modif Fiche Enfant' ?>
<?php ob_start(); ?>
<?php require 'templateNav.php' ?>
<div class="container-fluid childMain">
          <!--***********************MENU & SECTION********************-->
          <div class="row">    


     
<?php 
$newData = $data->fetch()
?>
        <form method="post" class="childForm" action="index.php?action=updateChild&idChildren=<?= $newData['idChildren'] ?>">
          <h1>MODIFICATION D'UNE FICHE ENFANT</h1>      
          <article>
            <p>Vous et vos proches pouvaient à tout moment modifier la fiche de renseignement de votre enfant.</p>
            <p>Seuls les parents peuvent mettre à jour l'identité et la photo de leur enfant.</p> </article>

<?php
if($_SESSION['firstname'] == $newData['parent1'] || $_SESSION['firstname'] == $newData['parent2']){
?>    
 
          <div class="form-group  col-lg-12">
            <h2>IDENTITE</h2>
            <label for="lastname">Nom</label><br />
            <input type="text" id="lastname" name="lastNameCo"  required="valid" cols="30" value="<?= $newData['surname']; ?>" /> 
          </div>
          <div class="form-group col-lg-12"> 
            <label for="firstname">Prénom</label><br />
            <input type="text" id="firstname" name="firstNameCo" required="valid" cols="30" value="<?= $newData['firstname']; ?>" > 
          </div>
          <div class="form-group col-lg-12">
            <label for="birthdate">Date de Naissance</label><br />
            <input type="date" id="birthdate" name="birthDateCo" required="valid" cols="30" value="<?= $newData['birthdate']; ?>" >
          </div>
          <div class="form-group col-lg-12">
            <label for="parent1">Parent 1</label><br />
            <input type="text" id="parent1" name="parent1Co" required="valid" cols="30" value="<?= $newData['parent1']; ?>">
            </div>
          <div class="form-group col-lg-12 ">
            <label for="parent2">Parent 2</label><br />
            <input type="text" id="parent2" name="parent2Co" cols="30" value="<?= $newData['parent2']; ?>" >
          </div>

<?php
}
else{
  ?>
            <input type="hidden" id="lastname" name="lastNameCo"  value="<?= $newData['surname']; ?>" /> 
            <input type="hidden" id="firstname" name="firstNameCo"  value="<?= $newData['firstname']; ?>" > 
            <input type="hidden" id="birthdate" name="birthDateCo" value="<?= $newData['birthdate']; ?>" >
            <input type="hidden" id="parent1" name="parent1Co" value="<?= $newData['parent1']; ?>">
            <input type="hidden" id="parent2" name="parent2Co" cols="30" value="<?= $newData['parent2']; ?>" >

<?php
}
?>          
<?php 
$newConnex2 = $connex2->fetch()  
?>
            <h2>ALIMENTATION</h2>
            <div class="form-group col-lg-12 ">
            <label for="favoriteMeal">Plats préférés</label><br />
            <textarea id="favoriteMeal" name="favoriteMealCo" autofocus="on" rows="5" cols="30" ><?= $newConnex2['favorite_meal']; ?></textarea>
            </div>
            <div class="form-group col-lg-12 ">
            <label for="hatedMeal">Plats détestés</label><br />
            <textarea id="hatedMeal" name="hatedMealCo" rows="5" cols="30"><?= $newConnex2['hated_meal']; ?></textarea>
            </div>
<?php 
$newConnex3 = $connex3->fetch()
?>
            <h2>TRAITEMENT</h2>
            <div class="form-group col-lg-12 ">
            <label for="meds">Médicaments</label><br />
            <input type="search" id="meds" name="medsCo" value="<?= $newConnex3['meds'] ?>" placeholder="choisissez" />
            </div>
            <div class="form-group col-lg-12 ">
            <label for="poso">Posologie</label><br />
            <textarea id="poso" name="posoCo" rows="5" cols="30" ><?= $newConnex3['meds'] ?></textarea>
            </div>
            <div class="form-group col-lg-12 ">
            <label for="allergies">Allergies</label><br />
            <textarea id="allergies" name="allergiesCo" rows="5" cols="30" ><?= $newConnex3['allergies'] ?></textarea>
            </div>         
          <div class="form-check col-lg-12">
            <input class="btn btn-primary" type="submit" name="updateChild" value="Valider" />
            
          </div>
</div>
</form>

<a href="index.php?action=deleteChild&idMember=<?= $_SESSION['id'] ?>&idChildren=<?= $newData['idChildren'] ?>"><button class="btn btn-danger" name="updateChild">Supprimer</button></a>
</div>
</div>



<style>
  .childMain{
    display:flex;
    flex-direction: column; 
    align-items:center;
    border:1px solid black;
  }

</style>



<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>

