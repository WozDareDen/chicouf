<?php $title = 'Fiche Enfant' ?>
<?php ob_start(); ?>
<?php require 'bureau.php' ?>
      <div class="container-fluid childMain">
          <div class="row">    
        <!--***********************MENU********************-->


          

    

  <form method="post" class="childForm" action="index.php?action=addChild&idMember=<?= $_SESSION['id']; ?>" style="border:1px solid black;">
  <h1>CREATION D'UNE FICHE ENFANT</h1>       
    <div class="form-group  col-lg-12" >
      <h2>IDENTITE</h2>
      <label for="lastname">Nom</label><br />
      <input type="text" id="lastname" name="lastNameCo" required="valid" autofocus="on" cols="30"placeholder="entrez son nom" > 
    </div>
    <div class="form-group col-lg-12"> 
      <label for="firstname">Prénom</label><br />
      <input type="text" id="firstname" name="firstNameCo" required="valid" cols="30" placeholder="entrez son prénom" > 
    </div>
    <div class="form-group col-lg-12">
      <label for="birthdate">Date de Naissance</label><br />
      <input type="date" id="birthdate" name="birthDateCo" required="valid" cols="30" placeholder="entrez sa date de naissance">
    </div>
    <div class="form-group col-lg-12">
      <label for="sexe">Sexe de l'enfant</label><br />
      <input type="radio" name="genderCo" value="0" checked> Garçon<br>
      <input type="radio" name="genderCo" value="1"> Fille<br>
    </div>
    <div class="form-group col-lg-12">
      <label for="parent1">Parent 1</label><br />
      <input type="text" id="parent1" name="parent1Co" required="valid" cols="30" placeholder="entrez le nom du 1er parent">
      </div>
    <div class="form-group col-lg-12 ">
      <label for="parent2">Parent 2</label><br />
      <input type="text" id="parent2" name="parent2Co" cols="30" placeholder="entrez le nom du 2ème parent" >
    </div>

            <h2>ALIMENTATION</h2>

            <div class="form-group col-lg-12 ">
            <label for="favoriteMeal">Plats préférés</label><br />
            <textarea id="favoriteMeal" name="favoriteMealCo" rows="5" cols="30" placeholder="aucun plat préféré" ></textarea>
            </div>
            <div class="form-group col-lg-12 ">
            <label for="hatedMeal">Plats détestés</label><br />
            <textarea id="hatedMeal" name="hatedMealCo" rows="5" cols="30" placeholder="aucun plat... moins apprécié" ></textarea>
            </div>

            <h2>TRAITEMENT</h2>

            <div class="form-group col-lg-12 ">
            <label for="meds">Médicaments</label><br />
            <textarea id="meds" name="medsCo" rows="5" cols="30" placeholder="aucun traitement en cours" ></textarea>
            </div>
            <div class="form-group col-lg-12 ">
            <label for="allergies">Allergies</label><br />
            <textarea id="allergies" name="allergiesCo" rows="5" cols="30" placeholder="aucune allergie connue" ></textarea>
            </div>

            <small id="formHelp" class="form-text text-muted">Vous pourrez modifier toutes ces informations ultérieurement.</small>
         
          <div class="form-check col-lg-12">
            <input class="btn btn-primary " type="submit" name="addChild" value="Valider" />
          </div>
</div>          
</form>

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



