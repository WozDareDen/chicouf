<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

try{
    $frontoffice = new \Src\Controllers\FrontOffice();
    if (isset($_POST['action']) && $_POST['action'] =="addNewChild") {
        $children = $_POST['data'];
        $frontoffice->addNewChild($children);
    }
    elseif(isset($_POST['action']) && $_POST['action'] == "updateChild"){
        $children = $_POST['data'];
        $frontoffice->updateChild($children);
    }
    if (isset($_GET['action'])) {
        //ADD NEW USER
        if ($_GET['action'] == 'addUser'){
            if(isset($_POST['firstNameCo']) && isset($_POST['lastNameCo']) && isset($_POST['passCo']) && isset($_POST['pass2Co']) && isset($_POST['mailCo']) && isset($_POST['parentCo']) && isset($_POST['genderCo'])){
                $firstNameCo = htmlspecialchars($_POST['firstNameCo']);
                $lastNameCo = htmlspecialchars($_POST['lastNameCo']);
                $passCo = htmlspecialchars($_POST['passCo']);
                $pass2Co = htmlspecialchars($_POST['pass2Co']);
                $mailCo = htmlspecialchars($_POST['mailCo']);
                $parentCo = htmlspecialchars($_POST['parentCo']);
                $genderCo = htmlspecialchars($_POST['genderCo']);
                    if($parentCo == 1 || $parentCo == 2){
                        if($passCo == $pass2Co){
                            if(filter_var($mailCo, FILTER_VALIDATE_EMAIL)){                        
                                $frontoffice->newUser($firstNameCo, $lastNameCo, $passCo, $mailCo, $parentCo, $genderCo);
                            }
                            else{
                                throw new Exception('votre adresse mail n\'est pas valide');
                            }
                        }
                        else{
                            throw new Exception('vos mots de passes ne sont pas identiques');
                        }
                    }
                    else{
                        throw new Exception('veuillez préciser votre parentalité');
                    }
            }
            else{
                throw new \Exception('tous les champs ne sont pas remplis');
            }
        }
        // GO TO REGISTRATION VIEW
        elseif($_GET['action'] == 'subView'){
            $frontoffice->subView();
        }
        // USER CONTACT
        elseif($_GET['action'] == 'contact'){
            if(isset($_POST['usernameContact']) && isset($_POST['mailContact']) && isset($_POST['titleContact']) && isset($_POST['contentContact'])){
                $usernameContact = htmlspecialchars($_POST['usernameContact']);
                $mailContact = htmlspecialchars($_POST['mailContact']);
                $titleContact = htmlspecialchars($_POST['titleContact']);
                $contentContact = htmlspecialchars($_POST['contentContact']);
                $frontoffice->contact($usernameContact,$mailContact,$titleContact,$contentContact);
            }
            else{
                throw new \Exception('tous les champs ne sont pas remplis');
            }
        }
        // USER RECORD
        elseif ($_GET['action'] == 'record'){
            if(isset($_POST['firstnameCo']) && isset($_POST['surnameCo']) && isset($_POST['passCo'])){
                $firstname = htmlspecialchars($_POST['firstnameCo']);
                $surname = htmlspecialchars($_POST['surnameCo']);
                $pass = htmlspecialchars($_POST['passCo']);
                $frontoffice->connected($firstname,$surname,$pass);
            }
            else{
                    throw new Exception('veuillez renseignez vos identifiants');
            }
        }
        // USER DISCONNECTION
        elseif($_GET['action'] == 'deco'){
            $frontoffice->disconnected();
        }
        // REGISTRATION
        elseif($_GET['action'] == 'subView'){
            $frontoffice->subView();
        }
        // GET CHILD TO PARENT
        elseif($_GET['action'] == 'belong'){
            if(isset($_POST['mailCo']) && isset($_GET['idChildren'])){
                $mailCo = htmlspecialchars($_POST['mailCo']);
                $idChild = $_GET['idChildren'];
                $frontoffice->belong($mailCo,$idChild);
            }
            else{
                throw new \Exception('l\'adresse email est invalide');
            }
        }
        // CHILD VIEW
        elseif($_GET['action'] == 'memberView'){                          
            if(isset($_SESSION['id'])){
                $idMember = $_GET['idMember'];            
                if($_SESSION['id'] === $idMember){
                    $frontoffice->goToMember($idMember);
                }
                else{
                    throw new \Exception('Vous n\'avez pas accès à cette page');
                }
            }
            else{
                throw new \Exception('Vous devez être connecté');
            }
        }
        // MOVE TO CREATE CHILD VIEW
        elseif($_GET['action'] == 'createChild'){
            if(isset($_SESSION['id'])){
                $frontoffice->goToCreateChild();
            }
            else{
                throw new \Exception('Vous devez être connecté');
            }
        }
        // GO TO NEW FAMILY
        elseif($_GET['action'] == 'goToCreateFamily'){
            $frontoffice->goToCreateFamily();
        }
        // CREATE FAMILY
        elseif($_GET['action'] == 'createNewFamily'){
            if(isset($_SESSION['id']) && isset($_POST['familyNameCo'])){
                $familyName = htmlspecialchars($_POST['familyNameCo']);
                $idMember = htmlspecialchars($_SESSION['id']);
                $frontoffice->createFamily($idMember,$familyName);
            }
            else{
                throw new \Exception ('vous devez donner un nom à cette famille');
            }
        }
        // BELONG A PARENT TO FAMILY
        elseif($_GET['action'] == 'belongParent'){
            if(isset($_POST['mailCoParent'])){
                $idFamily = $_POST['idCoFamily'];
                $mailCoParent = htmlspecialchars($_POST['mailCoParent']);
                $frontoffice->belongFamily($idFamily,$mailCoParent);
            }
            else{
                throw new \Exception('l\'adresse email est invalide');
            }
        }
        // DELETE FAMILY
        elseif($_GET['action'] == 'deleteFamily'){
            $idMember = $_SESSION['id'];
            $idFamily = $_SESSION['family'];
            $frontoffice->deleteFamily($idFamily,$idMember);
        }
        // NEW MODO
        elseif($_GET['action'] == 'newModo'){
            if(isset($_POST['mailCoModo'])){
                $mailNewModo = htmlspecialchars($_POST['mailCoModo']);
                $frontoffice->addNewModo($mailNewModo); 
            }
            else{
                throw new \Exception('l\'adresse email est invalide');
            }
        }
        // CHANGE MODO
        elseif($_GET['action'] == 'changeModo'){
            $idMember = $_SESSION['id'];
            $frontoffice->changeModo($idMember);
        }
        // ADD NEW CHILD
        elseif($_GET['action'] == 'addChild'){
            if(($_SESSION['id'])){
                $lastName = htmlspecialchars($_POST['lastNameCo']);
                $firstName = htmlspecialchars($_POST['firstNameCo']);
                $birthdate = htmlspecialchars($_POST['birthDateCo']);
                $gender = htmlspecialchars($_POST['genderCo']);
                $parent1 = htmlspecialchars($_POST['parent1Co']);
                $parent2 = htmlspecialchars($_POST['parent2Co']);
                $favMeal = htmlspecialchars($_POST['favoriteMealCo']);
                $hatedMeal = htmlspecialchars($_POST['hatedMealCo']);
                $meds = htmlspecialchars($_POST['medsCo']);
                $freq = htmlspecialchars($_POST['posoCo']);
                $start = htmlspecialchars($_POST['startDateCo']);
                $allergies = htmlspecialchars($_POST['allergiesCo']);
                $frontoffice->addChild($lastName, $firstName, $birthdate, $gender, $parent1, $parent2, $favMeal, $hatedMeal, $meds, $freq, $start, $allergies);
            }
            else{
                throw new \Exception('Vous devez être connecté');
            }
        }          
        // ADD CHILDREN AVATAR
        elseif($_GET['action'] == 'uploadPic'){
            $idMember = $_GET['idMember'];
            $idChildren = $_GET['idChildren'];
            $frontoffice->uploadPic($idMember,$idChildren);
        }
        // STOP MEDICINE
        elseif($_GET['action'] == 'stopMeds'){
            $idChild = $_POST['idChildCo'];
            $frontoffice->stopMeds($idChild);
        }
        // GO TO UPDATE CHILD VIEW
        elseif($_GET['action'] == 'goToUpdateChild'){
            if(isset($_GET['idChildren']) && isset($_SESSION['id'])){
                $idChild = $_GET['idChildren'];
                $frontoffice->goToUpdateChild($idChild);
            }
            else{
                throw new \Exception('cette page n\'existe pas');
            }
        }
        // DELETE CHILD
        elseif($_GET['action'] == 'deleteChild'){
            $idMember = htmlspecialchars($_GET['idMember']);
            $idChildren = htmlspecialchars($_GET['idChildren']);
            $frontoffice->deleteChild($idMember,$idChildren);
        }
        // GO TO FAMILY VIEW
        elseif($_GET['action'] == 'familyLink'){
            if(isset($_GET['id'])){
                if($_SESSION['family'] == $_GET['id']){
                    $idFamily = $_GET['id'];
                    $idMember = $_SESSION['id'];
                    $frontoffice->goToFamily($idFamily,$idMember);
                }
                else{
                    throw new \Exception('il ne s\'agit pas de votre famille');
                }
            }
            else{
                throw new \Exception('cette page n\'existe pas');
            }
        }
        // BANN MEMBER
        elseif($_GET['action'] == 'bann'){
            if(isset($_POST['mailCoModo'])){
                $idFamily = $_SESSION['family'];
                $mailCo = htmlspecialchars($_POST['mailCoModo']);
                $frontoffice->bann($idFamily,$mailCo);
            }
            else{
                throw new \Exception('le mail est invalide');
            }
        }
        // UPLOAD BANNER
        elseif($_GET['action'] == 'uploadBanner'){
            $idFamily = htmlspecialchars($_POST['idFamilyCo']);
            $frontoffice->uploadBanners($idFamily);
        }
        // GO TO MENTIONS INFOS
        elseif($_GET['action'] == 'legal'){
            $frontoffice->goLegal();
        }
        // GO TO ABOUT INFOS
        elseif($_GET['action'] == 'about'){
            $frontoffice->goAbout();
        }
        // GO TO PROFILE VIEW
        elseif ($_GET['action'] == 'recoverUser'){
            if(isset($_SESSION['id']) && isset($_GET['id']) && $_SESSION['id'] == $_GET['id']){              
                $idMember = $_SESSION['id'];
                $frontoffice->recoverUser($idMember);    
            }
            else{
                throw new \Exception('cette page n\'existe pas');
            }  
        }
        // UPDATE PROFILE
        elseif ($_GET['action'] == 'changeProfile'){ 
            if(isset($_POST['surnameCo']) && isset($_POST['mailCo']) && isset($_POST['birthdateCo']) && isset($_POST['cityCo'])){
                $idMember = $_SESSION['id'];
                $name = htmlspecialchars($_POST['surnameCo']);
                $mail = htmlspecialchars($_POST['mailCo']);
                $birthdate = htmlspecialchars($_POST['birthdateCo']);
                $city = htmlspecialchars($_POST['cityCo']);
                $frontoffice->changeProfile($name, $mail, $birthdate, $city, $idMember);
            }
            else{
                throw new \Exception('cette page n\'existe pas');
            }
        }
        // CHANGE PASS
        elseif($_GET['action'] == "changePass"){
            if(isset($_SESSION['id']) && isset($_POST['pass2Co']) && isset($_POST['passCo']) && isset($_POST['initPassCo'])){
                $idMember = $_SESSION['id'];
                $pass2Co = htmlspecialchars($_POST['pass2Co']);
                $pass = htmlspecialchars($_POST['passCo']);
                $initPass = htmlspecialchars($_POST['initPassCo']);
                    if($pass2Co === $pass){
                        $frontoffice->newPass($idMember,$initPass,$pass);
                    }
                    else{
                        throw new \Exception('vos mots de passe ne sont pas identiques');
                    }
            }        
            else{
                throw new \Exception('tous les champs ne sont pas remplis');
            }                          
        }
        // UPDATE AVATAR
        elseif($_GET['action'] == "uploadAva"){
            if(isset($_SESSION['id']) && $_SESSION['id'] == $_GET['idMember']){
                    $idMember = $_SESSION['id'];
                    $frontoffice->uploadAvatar($idMember);
            }
            else{
                throw new \Exception('page non trouvée');
            }
        }
        // GET ALL MEDS
        elseif($_GET['action'] == "ajaxMeds"){
            $autoC = $_GET['search'];
            $frontoffice->ajaxMeds($autoC);
        }
        else{
            throw new \Exception('page non trouvée');
        }
    }
    
    else{
        $frontoffice->homeView();
    }
}
catch(Exception $e){
  require('app/Views/frontend/errorView.php');
}