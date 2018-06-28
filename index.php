<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
try{
    $frontoffice = new \Src\Controllers\FrontOffice();
    if (!(empty($_POST['action'])) && $_POST['action'] =="addNewChild") {
        $children = $_POST['data'];
        $frontoffice->addNewChild($children);
    }
    elseif(!(empty($_POST['action'])) && $_POST['action'] == "updateChild"){
        $children = $_POST['data'];
        $frontoffice->updateChild($children);
    }
    elseif(!(empty($_POST['action'])) && $_POST['action'] == "changeFamilyName"){
        $family = $_POST['data'];
        $frontoffice->changeFamilyName($family);
    }
    elseif(!(empty($_POST['action'])) && $_POST['action'] == "saveBlog"){
        $memberBlog = $_POST['data'];
        $frontoffice->saveBlog($memberBlog);
    }
    if (isset($_GET['action'])) {
        //ADD NEW USER
        if ($_GET['action'] == 'addUser'){
            if(!(empty($_POST['firstNameCo'])) && !(empty($_POST['lastNameCo'])) && !(empty($_POST['passCo'])) && !(empty($_POST['pass2Co'])) && isset($_POST['genderCo'])){
                $firstNameCo = htmlspecialchars($_POST['firstNameCo']);
                $lastNameCo = htmlspecialchars($_POST['lastNameCo']);
                $passCo = htmlspecialchars($_POST['passCo']);
                $pass2Co = htmlspecialchars($_POST['pass2Co']);
                $mailCo = htmlspecialchars($_POST['mailCo']);
                $parentCo = $_POST['parentCo'];
                $genderCo = $_POST['genderCo'];
                    if(intval($parentCo) == 0 || intval($parentCo) == 1){
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
                        throw new Exception(var_dump($parentCo).'veuillez préciser votre parentalité');
                    }
            }
            else{
                throw new \Exception('tous les champs ne sont pas remplis');
            }
        }
        // USER CONTACT
        elseif($_GET['action'] == 'contact'){
            if(empty($_POST['usernameContact']) && empty($_POST['titleContact']) && empty($_POST['contentContact'])){
                throw new \Exception('tous les champs ne sont pas remplis');                
            }
            else{
                $usernameContact = htmlspecialchars($_POST['usernameContact']);
                $mailContact = htmlspecialchars($_POST['mailContact']);
                $titleContact = htmlspecialchars($_POST['titleContact']);
                $contentContact = htmlspecialchars($_POST['contentContact']);
                    if(filter_var($mailContact,FILTER_VALIDATE_EMAIL)){
                        $frontoffice->contact($usernameContact,$mailContact,$titleContact,$contentContact);
                    }
                    else{
                        throw new Exception('votre adresse mail n\'est pas valide');
                    } 
            }
        }
        // USER RECORD
        elseif ($_GET['action'] == 'record'){
            if(!(empty($_POST['firstnameCo'])) && !(empty($_POST['surnameCo'])) && !(empty($_POST['passCo']))){
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
        // AUTO-DELETE MEMBER
        elseif($_GET['action'] == 'deleteMember'){
            $frontoffice->deleteMember();
        }
        // GET CHILD TO PARENT
        elseif($_GET['action'] == 'belong'){
            if(!(empty($_POST['mailCo'])) && isset($_GET['idChildren'])){
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
                $idMember = $_SESSION['id'];            
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
            if(!(empty($_POST['mailCoModo']))){
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
            if(isset($_GET['idChildren'])) {
                $idMember = htmlspecialchars($_SESSION['idMember']);
                $idChildren = htmlspecialchars($_GET['idChildren']);
                $frontoffice->deleteChild($idMember, $idChildren);
            }
            else{
                throw new \Exception('cette page vous est inaccessible');
            }
        }
        // GO TO FAMILY VIEW
        elseif($_GET['action'] == 'familyLink'){
            if(isset($_GET['id'])){
                if(isset($_SESSION['family'])){                    
                    if($_SESSION['family'] == $_GET['id']){
                        $idFamily = $_GET['id'];
                        $idMember = $_SESSION['id'];
                        if(isset($_GET['p'])){
                            $cPage = $_GET['p'];
                        }
                        else{
                            $cPage = 1;
                        }
                        $frontoffice->goToFamily($idFamily,$idMember,$cPage);
                    }
                    else{
                        throw new \Exception('il ne s\'agit pas de votre famille');
                    }
                }
                else{
                    $frontoffice->goToCreateFamily();
                }
            }
            else{
                throw new \Exception('cette page n\'existe pas');
            }
        }
        // GO TO MODO VIEW
        elseif($_GET['action'] == "goToModo"){
            if(isset($_GET['id'])){
                if($_SESSION['family'] == $_GET['id'] && $_SESSION['modo'] > 0) {
                    $idFamily = $_SESSION['family'];
                    if (isset($_GET['p'])) {
                        $cPage = $_GET['p'];
                    } else {
                        $cPage = 1;
                    }
                    $frontoffice->goToModo($idFamily,$cPage);
                }
                else{
                    throw new \Exception('vous n\'avez pas accès à cette page');
                }
            }
        }
        // LEAVE FAMILY
        // elseif($_GET['action'] == 'getMeOuttaHere'){
        //     $idFamily = $_SESSION['family'];
        //     $mailCo = $_SESSION['mail'];
        //     $frontoffice->bann($idFamily,$mailCo);
        // }
        elseif($_GET['action'] == 'test'){
            require 'app/Views/frontend/test3.php';
        }
        elseif($_GET['action'] == 'testProfile'){
            $frontoffice->testProfile();
        }
        elseif($_GET['action'] == 'pageMenuBlog'){
            require 'app/Views/frontend/testMenuBlog.php';
        }
        // BANN MEMBER
        elseif($_GET['action'] == 'bann'){
            if(!(empty($_POST['mailCoModo']))){
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
            $idFamily = htmlspecialchars($_SESSION['family']);
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
        // GO TO MEMORY CARD
        elseif($_GET['action'] == 'memoryGame'){
            require 'app/Views/frontend/memoryGame.php';
        }
        // UPDATE PROFILE
        elseif ($_GET['action'] == 'changeProfile'){ 
                $idMember = $_SESSION['id'];
                $words = htmlspecialchars($_POST['wordsCo']);
                $name = htmlspecialchars($_POST['surnameCo']);
                $mail = htmlspecialchars($_POST['mailCo']);
                $birthdate = htmlspecialchars($_POST['birthdateCo']);
                $city = htmlspecialchars($_POST['cityCo']);
                $frontoffice->changeProfile($name, $mail, $birthdate, $city, $idMember,$words);
        }
        // CHANGE PASS
        elseif($_GET['action'] == "changePass"){
            if(isset($_SESSION['id']) && !(empty($_POST['pass2Co'])) && !(empty($_POST['passCo'])) && !(empty($_POST['initPassCo']))){
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
        // GET WEIGHTS
        // elseif($_GET['action'] == "getWeight"){
        //     $frontoffice->getWeight();
        // }
        else{
            throw new \Exception('page inaccessible');
        }
    } 
    else{
        $frontoffice->homeView();
    }
}
catch(Exception $e){
  require('app/Views/frontend/errorView.php');
}