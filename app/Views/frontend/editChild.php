<?php $title = 'Modif Fiche Enfant' ?>
<?php ob_start(); ?>
<?php require 'templateNav.php' ?>

<style>body{background-image:url(app/Public/backgrounds/backg-bois-rouge.jpg);background-repeat:no-repeat;background-attachment:fixed;}</style>
<div class="container-fluid childMain ">
          <!--***********************MENU & SECTION********************-->
          <div class="row formCrEd mainPV">    


     
<?php 
$newData = $data->fetch()
?>
        <form method="post" autocomplete="off" class="editForm" action="index.php?action=updateChild&idChildren=<?= $newData['idChildren'] ?>">
          <h1 class="h1Create">MODIFICATION D'UNE FICHE ENFANT</h1>      
          <article>
            <p class="editP2">Vous et vos proches pouvaient à tout moment modifier la fiche de renseignement d'un enfant.</p>
            <p class="editP2">Seuls les parents peuvent mettre à jour l'identité et la photo de leur enfant.</p> </article>

<?php
if($_SESSION['firstname'] == $newData['parent1'] || $_SESSION['firstname'] == $newData['parent2']){
?>    
        <div class="col-xs-8 col-sm-12">
          <div class="form-group col-lg-12">
            <h2 class="h2Create">IDENTITE</h2>
            <label for="lastname1Up">Nom</label><br />
            <input type="text" id="lastname1Up" name="lastNameCo"  required cols="30" value="<?= $newData['surname']; ?>" /> 
          </div>
          <div class="form-group col-lg-12"> 
            <label for="firstname1Up">Prénom</label><br />
            <input type="text" id="firstname1Up" name="firstNameCo" required cols="30" value="<?= $newData['firstname']; ?>" > 
          </div>
          <div class="form-group col-lg-12">
            <label for="birthdateUp">Date de Naissance</label><br />
            <input type="date" id="birthdateUp" name="birthDateCo" required cols="30" value="<?= $newData['birthdate']; ?>" >
          </div>
          <div class="form-group col-lg-12">
            <label for="weightUp">Poids (en Kg)</label><br />
            <input type="text" id="weightUp" name="weightUp" cols="30" value="<?= $newData['bulk'] ?>" />
            <input type="date" id="weightDateUp" name="weightDateUp" value="<?= $newData['bulkDate'] ?>" />
          </div>
          <div class="form-group col-lg-12">
            <label for="parent1Up">Parent 1</label><br />
            <input type="text" id="parent1Up" name="parent1Co" required cols="30" value="<?= $newData['parent1']; ?>" disabled>
            </div>
          <div class="form-group col-lg-12 ">
            <label for="parent2Up">Parent 2</label><br />
            <input type="text" id="parent2Up" name="parent2Co" cols="30" value="<?= $newData['parent2']; ?>" disabled>
          </div><hr>

<?php
}
else{
  ?>
            <h2 class="nameChild"><?= $newData['firstname'] ?> <?= $newData['surname'] ?></h2>
            <input hidden id="lastname1Up" name="lastNameCo"  value="<?= $newData['surname']; ?>" /> 
            <input hidden id="firstname1Up" name="firstNameCo"  value="<?= $newData['firstname']; ?>" > 
            <input hidden id="birthdateUp" name="birthDateCo" value="<?= $newData['birthdate']; ?>" >
            <input hidden id="parent1Up" name="parent1Co" value="<?= $newData['parent1']; ?>">
            <input hidden id="parent2Up" name="parent2Co" cols="30" value="<?= $newData['parent2']; ?>" >

<?php
}
?>          
<?php 
$newConnex2 = $connex2->fetch()  
?>
            <div class="form-group col-lg-12 ">
            <h2 class="h2Create">ALIMENTATION</h2>
            
            <label for="favoriteMeal">Plats préférés</label><br />
            <textarea id="favoriteMealUp" name="favoriteMealCo" autofocus="on" rows="5" cols="20" ><?= $newConnex2['favorite_meal']; ?></textarea>
            </div>
            <div class="form-group col-lg-12 ">
            <label for="hatedMeal">Plats détestés</label><br />
            <textarea id="hatedMealUp" name="hatedMealCo" rows="5" cols="20"><?= $newConnex2['hated_meal']; ?></textarea>
            </div><hr>
<div class="form-group col-lg-12">
            <h2 class="h2Create">TRAITEMENT <a href="#smallC" data-toggle="collapse" aria-expanded="false" aria-controls="#smallC"><i class="fa fa-info-circle"></i></a></h2> <div id="smallC" class="collapse col-sm-6">Sélectionnez le médicament en cliquant dessus lorsque la liste s'affichera au fur et à mesure de vos entrées</div>
<?php
  if($getDateTTT != NULL){
?>

            



              <textarea cols="30" rows="6" disabled>Début du traitement : <?= $getDateTTT['new_startDate'] ?>

<?php 
$newMeds = $getAllMedsChild->fetchAll();
             
foreach($newMeds as $posology){    
?>
<?= $posology["title"] ?> : 
<?= $posology['content'] ?>

<?php
echo "\n";
}
?>              
              </textarea>
            </div>




            <div class="autocomplete ui-front form-group col-lg-12" >
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#stopMeds">Arrêter le traitement</a>
            </div>

<?php
  }
?>

  

<?php 


$newConnex3 = $connex3->fetch()
?>            

            <div class="autocomplete ui-front form-group col-lg-12" >
              <input id="myInput" type="text" name="medsCo" placeholder="liste des médicaments"> 
            </div>
            <div class="form-group col-lg-12 startDate" >
              <label for="startDate">Date de début du traitement<span class="fatRed">*</span></label>
              <input id="startDateCoUp" type="date" name="startDateCo" >
            </div><hr>
            
            <div class="form-group col-lg-12 ">
              <h2  class="h2Create lampost" >ALLERGIES</h2>
            <input hidden id="idAllergyCoUp" name="idAllCo" value="<?= $newConnex3['idAllergy'] ?>" />
            <input hidden name="idChildCo" id="idChildCoUp" value="<?= $_GET['idChildren'] ?>" />
            <textarea id="allergiesUp" name="allergiesCo" rows="2" cols="20" ><?= $newConnex3['content'] ?></textarea>
            </div>         
            <div class="form-check col-lg-12">
              <a class="btn btn-primary"  id="submitChildren2" style="color:white;">Valider</a>
            </div>

<?php
if($_SESSION['firstname'] == $newData['parent1'] || $_SESSION['firstname'] == $newData['parent2']){
?>              
            <a class="social delPV" data-toggle="modal" data-target="#modalDeleteChild" href="#" >Supprimer cette Fiche</a>
<?php
}
?>


</div>
</form>


</div>
</div>

</div>




<!-- MODAL STOP MEDS -->
<div class="modal fade" id="stopMeds" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:green;">
                <h5 class="modal-title" style="color:white;">Arrêter ce traitement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
            <p>Toute l'équipe de Chicouf.com souhaite une bonne santé à vous et votre enfant ! <br /></p>
                 <form action="index.php?action=stopMeds" method="post">
                 
                 <div class="form-check">
                    <input hidden name="idChildCo" value="<?= $_GET['idChildren'] ; ?>"/>
                    <input type="checkbox" name="choixDelCo" required /> Je confirme vouloir stopper ce traitement.</br>
                </div>
                <button type="submit" class="btn btn-outline-success">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DELETE CHILD-->
<div class="modal fade" id="modalDeleteChild" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header padiday">
                <h5 class="modal-title" style="color:black;">Supprimer une fiche Enfant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
                <p>En validant, vous supprimez définitivement toutes les données concernant votre Enfant. Vous pouvez en recréer une nouvelle à tout moment. <br /></p>
                 <form action="index.php?action=deleteChild&idChildren=<?= $_GET['idChildren'] ?>" method="post">
                 <div class="form-check">
                    <input type="checkbox" name="choixDelCo" required /> Je confirme supprimer cette fiche Enfant.</br>
                </div>
                <button type="submit" class="btn btn-outline-danger">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>







<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>

