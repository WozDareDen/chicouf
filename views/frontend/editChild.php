<?php $title = 'Modif Fiche Enfant' ?>
<?php ob_start(); ?>
          <!--***********************MENU & SECTION********************-->
          <div class="row">    
        <!--***********************MENU********************-->
            <nav class="col-sm-2" style="background-color:red;">MENU
            <ul>
                <li><a href="#"><i class="fa fa-home" style="font-size:30px;"></i></a>
                </li>
                <li>Accéder à votre Espace Famille
                </li>
                <li><a href="index.php?action=createChild">Créer une fiche Enfant</a>
                </li>
                <li><a href="index.php?action=belong">Rattacher une fiche Enfant</a>
                </li>
                <li>Créer un nouvel Espace Famille
                </li>
                <li>Rejoindre un Espace Famille existant
                </li>
                <li><a href="index.php?action=deleteChild">Supprimer une fiche Enfant</a>
                </li>
            </ul>
            </nav>
      <!--***********************SECTION********************-->
            <section class="col-sm-10" style="background-color:blue;color:white;">

 <h1>MODIFICATION D'UNE FICHE ENFANT</h1>           
<?php 
$newData = $data->fetch()
?>
<form method="post" action="index.php?action=updateChild&idChildren=<?= $newData['idChildren'] ?>">
<div class="form-group  col-lg-10">
<div class="sr-only"><?= $newData['idMember']; ?></div>
            <h2>IDENTITE</h2>
            <label for="lastname">Nom</label><br />
            <input type="text" id="lastname" name="lastNameCo" autofocus="on" required="valid" cols="30" value="<?= $newData['Surname']; ?>" /> 
            <input class="sr-only" type="text" name="idMember" value="<?= $newData['idMember']; ?>" />
          </div>
          <div class="form-group col-lg-12"> 
            <label for="firstname">Prénom</label><br />
            <input type="text" id="firstname" name="firstNameCo" required="valid" cols="30" value="<?= $newData['Firstname']; ?>" > 
          </div>
          <div class="form-group col-lg-12">
            <label for="birthdate">Date de Naissance</label><br />
            <input type="date" id="birthdate" name="birthDateCo" required="valid" cols="30"value="<?= $newData['Birthdate']; ?>" >
          </div>
          <div class="form-group col-lg-12">
            <label for="parent1">Parent 1</label><br />
            <input type="text" id="parent1" name="parent1Co" required="valid" cols="30" value="<?= $newData['Parent1']; ?>">
            </div>
            <div class="form-group col-lg-12 ">
            <label for="parent2">Parent 2</label><br />
            <input type="text" id="parent2" name="parent2Co" cols="30" value="<?= $newData['Parent2']; ?>" >
            </div>
<?php 
$newConnex2 = $connex2->fetch()  
?>
            <h2>ALIMENTATION</h2>
            <div class="form-group col-lg-12 ">
            <label for="favoriteMeal">Plats préférés</label><br />
            <textarea id="favoriteMeal" name="favoriteMealCo" rows="5" cols="30" ><?= $newConnex2['Favorite_meal']; ?></textarea>
            </div>
            <div class="form-group col-lg-12 ">
            <label for="hatedMeal">Plats détestés</label><br />
            <textarea id="hatedMeal" name="hatedMealCo" rows="5" cols="30"><?= $newConnex2['Hated_meal']; ?></textarea>
            </div>
<?php 
$newConnex3 = $connex3->fetch()
?>
            <h2>TRAITEMENT</h2>
            <div class="form-group col-lg-12 ">
            <label for="meds">Médicaments</label><br />
            <textarea id="meds" name="medsCo" rows="5" cols="30" ><?= $newConnex3['Meds'] ?></textarea>
            </div>
            <div class="form-group col-lg-12 ">
            <label for="allergies">Allergies</label><br />
            <textarea id="allergies" name="allergiesCo" rows="5" cols="30" ><?= $newConnex3['Allergies'] ?></textarea>
            </div>         
          <div class="form-check col-lg-12">
            <input class="btn btn-primary" type="submit" name="updateChild" value="Valider" />
            
          </div>
</form>
<a href="index.php?action=deleteChild&idMember=<?= $newData['idMember'] ?>&idChildren=<?= $newData['idChildren'] ?>"><button class="btn btn-danger" name="updateChild">Supprimer</button></a>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'template.php'; ?>