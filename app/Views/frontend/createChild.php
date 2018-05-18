<?php $title = 'Fiche Enfant' ?>
<?php ob_start(); ?>
<?php require 'templateNav.php' ?>

<style>body{background-image:url(app/Public/Backgrounds/backg-bois-rouge.jpg);background-repeat:no-repeat;background-attachment:fixed;}</style>
<div class="container-fluid childMain ">
  <div class="row formCrEd mainPV">    
        <!--***********************FORM********************-->
    <form method="post" class="childForm" >
      <h1 class="h1Create" id="inkCreate"style="padding:0 30px;">CREATION D'UNE FICHE ENFANT</h1>      
      <div class="reducePCC">Seuls les champs marqués d'un astérisque sont obligatoires.</div> 
        <!--***********************IDENTITY********************-->
        <div class="col-xs-8 col-sm-12">
        <div class="form-group col-lg-12" >
          <h2 class="h2Create">IDENTITE</h2>
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
          <input type="text" id="parent1" name="parent1Co" required="valid" cols="30" placeholder="nom du 1er parent">
          </div>
        <div class="form-group col-lg-12 ">
          <label for="parent2">Parent 2</label><br />
          <input type="text" id="parent2" name="parent2Co" cols="30" placeholder="nom du 2ème parent" >
        </div><hr>
        <!--***********************FOOD********************-->
        <div class="form-group col-lg-12 ">
          <h2 class="h2Create">ALIMENTATION</h2>
          <label for="favoriteMeal">Plats préférés</label><br />
          <textarea id="favoriteMeal" name="favoriteMealCo" rows="5" cols="20" placeholder="aucun plat préféré" ></textarea>
          </div>
          <div class="form-group col-lg-12 ">
          <label for="hatedMeal">Plats détestés</label><br />
          <textarea id="hatedMeal" name="hatedMealCo" rows="5" cols="20" placeholder="aucun plat... moins apprécié" ></textarea>
        </div><hr>
        <!--***********************HEALTH********************-->                
          <div class="autocomplete ui-front form-group col-xs-8 col-lg-12" ><h2 class="h2Create">TRAITEMENT <a href="#smallC" data-toggle="collapse" aria-expanded="false" aria-controls="#smallC"><i class="fa fa-info-circle"></i></a></h2>
          <div id="smallC" class="collapse col-sm-6" style="font-size:14px">Sélectionnez le médicament en cliquant dessus lorsque la liste s'affichera au fur et à mesure de vos entrées</div> 
            <input id="myInput" type="text" name="medsCo" placeholder="liste des médicaments">
          </div>
          <div class="form-group col-lg-12 startDate" >
            <label for="startDate">Date de début du traitement</label>
            <input id="startDateCo" type="date" name="startDateCo" >
          </div><hr>
        <!--***********************ALLERGIES********************-->
          <div class="form-group col-lg-12 ">
            <h2 class="h2Create lampost">ALLERGIES</h2>
            <textarea id="allergies" name="allergiesCo" rows="3" cols="20" >Aucune allergie connue</textarea>
          </div>         
          <div class="form-check col-lg-12">
            <a class="btn btn-primary"  id="submitChildren" >Valider</a>
          </div>
      </div>
</div>
    </form>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>



