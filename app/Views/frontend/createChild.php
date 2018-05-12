<?php $title = 'Fiche Enfant' ?>
<?php ob_start(); ?>
<?php require 'templateNav.php' ?>
<style>body{background-color:#dbe7f7;}</style>

<div class="container-fluid childMain">
  <div class="row formCrEd">    
        <!--***********************FORM********************-->
    <form method="post" class="childForm" >
      <h1>CREATION D'UNE FICHE ENFANT</h1>      
      <small>Seuls les champs marqués d'un astérisque sont obligatoires.</small> 
        <!--***********************IDENTITY********************-->
        <div class="form-group  col-lg-12" >
          <h2>IDENTITE</h2>
          <label for="lastname1">Nom<span class="fatRed">*</span></label><br />
          <input type="text" id="lastname1" name="lastNameCo" required="valid" autofocus="on" cols="30"placeholder="entrez son nom" > 
        </div>
        <div class="form-group col-lg-12"> 
          <label for="firstname1">Prénom<span class="fatRed">*</span></label><br />
          <input type="text" id="firstname1" name="firstNameCo" required="valid" cols="30" placeholder="entrez son prénom" > 
        </div>
        <div class="form-group col-lg-12">
          <label for="birthdate">Date de Naissance<span class="fatRed">*</span></label><br />
          <input type="date" id="birthdate" name="birthDateCo" required="valid" cols="30" placeholder="entrez sa date de naissance">
        </div>
        <div class="form-group col-lg-12">
          <label for="weightCo">Poids en Kg</label><br />
          <input type="text" id="weightCo" name="weightCo" cols="30" placeholder="entrez son poids">
          <input type="date" id="weightDateCo" name="weightDateCo" />
        </div>
        <div class="form-group col-lg-12" id="gender">
          <label for="sexe">Sexe de l'enfant<span class="fatRed">*</span></label><br />
          <input type="radio" name="genderCo" class="genderCo" value="0" checked> Garçon<br>
          <input type="radio" name="genderCo" class="genderCo" value="1"> Fille<br>
        </div>
        <div class="form-group col-lg-12">
          <label for="parent1">Parent 1<span class="fatRed">*</span></label><br />
          <input type="text" id="parent1" name="parent1Co" required="valid" cols="30" placeholder="entrez le nom du 1er parent">
          </div>
        <div class="form-group col-lg-12 ">
          <label for="parent2">Parent 2</label><br />
          <input type="text" id="parent2" name="parent2Co" cols="30" placeholder="entrez le nom du 2ème parent" >
        </div>
        <!--***********************FOOD********************-->
        <div class="form-group col-lg-12 ">
          <h2>ALIMENTATION</h2>
          <label for="favoriteMeal">Plats préférés</label><br />
          <textarea id="favoriteMeal" name="favoriteMealCo" rows="5" cols="30" placeholder="aucun plat préféré" ></textarea>
          </div>
          <div class="form-group col-lg-12 ">
          <label for="hatedMeal">Plats détestés</label><br />
          <textarea id="hatedMeal" name="hatedMealCo" rows="5" cols="30" placeholder="aucun plat... moins apprécié" ></textarea>
        </div>
        <!--***********************HEALTH********************-->                
          <div class="autocomplete ui-front form-group col-lg-12" ><h2>TRAITEMENT</h2>
          <small>Sélectionnez le médicament en cliquant dessus <br />lorsque la liste s'affichera au fur et à mesure de vos entrées</small><br /> 
            <input id="myInput" type="text" name="medsCo" placeholder="liste des médicaments">
          </div>
          <div class="form-group col-lg-12 startDate" >
            <label for="startDate">Date de début du traitement</label>
            <input id="startDateCo" type="date" name="startDateCo" >
          </div>
        <!--***********************ALLERGIES********************-->
          <div class="form-group col-lg-12 ">
            <h2 class="lampost">ALLERGIES</h2>
            <textarea id="allergies" name="allergiesCo" rows="3" cols="30" >Aucune allergie connue</textarea>
          </div>         
          <div class="form-check col-lg-12">
            <a class="btn btn-primary"  id="submitChildren" >Valider</a>
          </div>
      </div>
    </form>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>



