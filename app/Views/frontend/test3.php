<?php $title = 'Espace Test Enfant' ?>
<?php ob_start(); ?>
<?php require 'templateNav.php' ?>

<style>body{background-image:url(app/Public/backgrounds/backg-bois-rouge.jpg);background-attachment:fixed !important;background-repeat:no-repeat;}</style>
<div class="container" >
        <div class="row">
            <div>
                <section>
                        <!--***********************IDENTITY********************-->

        <div class="form-group " >
          <h2 class="h2Create">IDENTITE</h2>
          <input class="newF" type="text" id="lastname1" name="lastNameCo" required autofocus="on" cols="30" placeholder="Nom"  > 
        </div>
        <div class="form-group "> 
          <input class="newF" type="text" id="firstname1" name="firstNameCo" required cols="30" placeholder="Prénom" > 
        </div>
        <div class="form-group ">
          <label for="birthdate">Date de Naissance<span class="fatRed">*</span></label>
          <input class="newF" type="date" id="birthdate" name="birthDateCo" required cols="30" placeholder="entrez sa date de naissance">
        </div>
        <div class="form-group " id="gender">
          <label for="genderCo">Sexe de l'enfant<span class="fatRed">*</span></label>
          <input type="radio" name="genderCo" class="genderCo" value="0" checked> Garçon
          <input type="radio" name="genderCo" class="genderCo" value="1"> Fille
        </div>
        <!--***********************FOOD********************-->
        <div class="form-group  ">
          <h2 class="h2Create">ALIMENTATION</h2>
          <label for="favoriteMeal">Plats préférés</label><br />
          <textarea id="favoriteMeal" name="favoriteMealCo" rows="5" cols="20" placeholder="aucun plat préféré" ></textarea>
          </div>
          <div class="form-group  ">
          <label for="hatedMeal">Plats détestés</label><br />
          <textarea id="hatedMeal" name="hatedMealCo" rows="5" cols="20" placeholder="aucun plat... moins apprécié" ></textarea>
        </div>
        <!--**********************HEALTH********************-->
        <h2>DONNES MEDICALES</h2>
                        <div class="form-group">
                            <label for="bloodType">Groupe sanguin</label>
                            <select class="form-control" id="bloodType">
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>O+</option>
                                <option>O-</option>
                            </select>
                        </div>
                        
                </section>

                <section>
                    <h3>TRAITEMENT</h3>
                        <p>Début du traitement : </p>
                        <p>Médicaments, posologies : </p>
                    
                </section>
                <section>
                    <h3>ALLERGIES</h3>
                        <p>Aucune allergie connue </p>
                        
                </section>
                <section>
                    <h3>COURBES STATISTIQUES</h3>
                    <p>Taille : </p>
                        <p>Courbe de taille</p>
                            <canvas class="weight"></canvas>
                    <p>Poids : </p>        
                        <p>Courbe de poids</p>
                            <img src="app/Public/test/courbeP.png" />
                        
                </section>
                <section>
                    <h3>VACCINS</h3>

                </section>            
                <section>
                    <h3>MEDECINS</h3>
                        <div class="form-group "> 
                            <label for="generalDoc1">Médecin traitant</label>
                            <input type="text" id="generalDoc1" name="generalDoc1"> 
                        </div>
                       
                        <p>Vous souhaitez renseigner un autre médecin ? Inscrivez son nom puis choisissez sa spécialité</p>
                        <div class="form-group">
                        <input class="newF" type="text" id="speDocName" name="speDocName" cols="30" placeholder="Nom du Docteur"  > 
                           
                            <select class="form-control" id="speDoc">
                                <option>Pédiatrie</option>
                                <option>ORL et chirurgie cervico-faciale</option>
                                <option>Médecine générale</option>
                                <option>Pneumologie</option>
                                <option>Anatomie et cytologie pathologiques</option>                               
                                <option>Anesthésie-réanimation</option>
                                <option>Biologie médicale</option>
                                <option>Cardiologie et maladies vasculaires</option>
                                <option>Chirurgie générale</option>
                                <option>Chirurgie infantile</option>
                                <option>Chirurgie maxillo-faciale et stomatologie</option>
                                <option>Chirurgie orthopédique et traumatologie</option>
                                <option>Chirurgie plastique reconstructrice et esthétique</option>
                                <option>Chirurgie thoracique et cardio-vasculaire</option>
                                <option>Chirurgie urologique</option>
                                <option>Chirurgie vasculaire</option>
                                <option>Chirurgie viscérale et digestive</option>
                                <option>Dermatologie et vénéréologie</option>
                                <option>Endocrinologie et métabolisme</option>
                                <option>Ensemble des spécialités d'exercice</option>
                                <option>Gastro-entérologie et hépatologie</option>
                                <option>Gynécologie médicale</option>
                                <option>Gynécologie-obstétrique</option>
                                
                                <option>Génétique médicale</option>
                                <option>Gériatrie</option>
                                <option>Hématologie</option>
                                <option>Médecine du travail</option>
                                
                                <option>Médecine interne</option>
                                <option>Médecine nucléaire</option>
                                <option>Médecine physique et réadaptation</option>
                                <option>Neurochirurgie</option>
                                <option>Neurologie</option>
                                <option>Néphrologie</option>
                                
                                <option>Oncologie option médicale</option>
                                <option>Ophtalmologie</option>
                                
                                <option>Psychiatrie</option>
                                
                                <option>Radiodiagnostic et imagerie médicale</option>
                                <option>Radiothérapie</option>
                                <option>Recherche médicale</option>
                                <option>Rhumatologie</option>
                                <option>Réanimation médicale</option>
                                <option>Santé publique et médecine sociale</option>
                                
                            </select>
                            
</div>


                        
                </section>

            </div>
        </div>

</div>



<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>


<style>
.newF{border:0;border-bottom:1px solid #056c8e;background:transparent;border-radius:0;}
</style>









Anatomie et cytologie pathologiques
Anesthésie-réanimation
Biologie médicale
Cardiologie et maladies vasculaires
Chirurgie générale
Chirurgie infantile
Chirurgie maxillo-faciale et stomatologie
Chirurgie orthopédique et traumatologie
Chirurgie plastique reconstructrice et esthétique
Chirurgie thoracique et cardio-vasculaire
Chirurgie urologique
Chirurgie vasculaire
Chirurgie viscérale et digestive
Dermatologie et vénéréologie
Endocrinologie et métabolisme
Ensemble des spécialités d'exercice
Gastro-entérologie et hépatologie
Gynécologie médicale
Gynécologie-obstétrique
Généralistes
Génétique médicale
Gériatrie
Hématologie
Médecine du travail
Médecine générale
Médecine interne
Médecine nucléaire
Médecine physique et réadaptation
Neurochirurgie
Neurologie
Néphrologie
ORL et chirurgie cervico-faciale
Oncologie option médicale
Ophtalmologie
Pneumologie
Psychiatrie
Pédiatrie
Radiodiagnostic et imagerie médicale
Radiothérapie
Recherche médicale
Rhumatologie
Réanimation médicale
Santé publique et médecine sociale
Spécialistes

