<?php $title = 'Modif Fiche Enfant' ?>
<?php ob_start(); ?>
<?php require 'templateNav.php' ?>
<div class="container-fluid childMain">
          <!--***********************MENU & SECTION********************-->
          <div class="row">    


     
<?php 
$newData = $data->fetch()
?>
        <form method="post" autocomplete="off" action="index.php?action=updateChild&idChildren=<?= $newData['idChildren'] ?>">
          <h1>MODIFICATION D'UNE FICHE ENFANT</h1>      
          <article>
            <p>Vous et vos proches pouvaient à tout moment modifier la fiche de renseignement de votre enfant.</p>
            <p>Seuls les parents peuvent mettre à jour l'identité et la photo de leur enfant.</p> </article>

<?php
if($_SESSION['firstname'] == $newData['parent1'] || $_SESSION['firstname'] == $newData['parent2']){
?>    
 
          <div class="form-group  col-lg-12">
            <h2>IDENTITE <a class="btn btn-danger"  href="index.php?action=deleteChild&idChildren=<?= $_GET['idChildren'] ?>" >Supprimer</a></h2>
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

            <h2>TRAITEMENT</h2>
            <div class="form-group col-lg-12">

<?php
if($getDateTTT['idTTT'] >0){
?>
              <textarea cols="30" rows="6" disabled>Début du traitement : <?= $getDateTTT['new_startDate'] ?>

<?php 
$newMeds = $getAllMedsChild->fetchAll();
             
foreach($newMeds as $posology){    
?>
<?= $posology["title"] ?> : 
<?= $posology['content'] ?>
<?php
}
?>
</textarea>
            </div>


            <div class="autocomplete ui-front form-group col-lg-12" >
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#stopMeds">Arrêter le traitement</a>
            </div>


              
<?php
foreach($newMeds as $meds){
?>
  

<?php 
}
}

$newConnex3 = $connex3->fetch()
?>            

            <div class="autocomplete ui-front form-group col-lg-12" >
              <input id="myInput" type="text" name="medsCo" placeholder="liste des médicaments"> 
            </div>


            <h2 class="lampost">ALLERGIES</h2>
            <div class="form-group col-lg-12 ">
            <input type="hidden" name="idAllCo" value="<?= $newConnex3['idAllergy'] ?>" />
            <textarea id="allergies" name="allergiesCo" rows="2" cols="30" ><?= $newConnex3['content'] ?></textarea>
            </div>         
            <input hidden name="idChildCo" id="idChildCo" value="<?= $_GET['idChildren'] ?>" />
          <div class="form-check col-lg-12">
            <a class="btn btn-primary"  id="submitChildren2" >Valider</a>
          </div>

</form>


</div>
</div>

</div>
<script>

function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}

</script>

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
            <p>Toute l'équipe de Chicouf.fr souhaite une bonne santé à vous et votre enfant ! <br /></p>
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


<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>

