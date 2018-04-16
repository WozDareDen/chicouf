<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

try{
    $frontoffice = new \Src\Controllers\FrontOffice();
    if (isset($_GET['action'])) {
        //ADD NEW USER
        if ($_GET['action'] == 'addUser'){
            $firstNameCo = htmlspecialchars($_POST['firstNameCo']);
            $lastNameCo = htmlspecialchars($_POST['lastNameCo']);
            $passCo = htmlspecialchars($_POST['passCo']);
            $pass2Co = htmlspecialchars($_POST['pass2Co']);
            $mailCo = htmlspecialchars($_POST['mailCo']);
            $parentCo = htmlspecialchars($_POST['parentCo']);
            $genderCo = htmlspecialchars($_POST['genderCo']);
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
        // GO TO REGISTRATION VIEW
        elseif($_GET['action'] == 'subView'){
            $frontoffice->subView();
        }
        // GO TO MENTIONS
        elseif($_GET['action'] == 'mentions'){
            $frontoffice->mentions();
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
        // RATTACHER UN ENFANT A UNE FAMILLE OU UN PARENT
        elseif($_GET['action'] == 'belong'){
            $mailCo = $_POST['mailCo'];
            $idChild = $_GET['idChildren'];
            $frontoffice->belong($mailCo,$idChild);
        }
        // CHILDREN ACTIONS
        elseif($_GET['action'] == 'memberView'){            
            $idMember = $_GET['idMember'];     
            if(isset($_SESSION['id'])){          
                if($_SESSION['id'] === $idMember){
                    $frontoffice->goToMember($idMember);
                }
                else{
                    throw new \Exception('Vous devez être connecté');
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
                $familyName = $_POST['familyNameCo'];
                $idMember = $_SESSION['id'];
                $frontoffice->createFamily($idMember,$familyName);
            }
            else{
                throw new \Exception ('vous devez donner un nom à cette famille');
            }
        }
        elseif($_GET['action'] == 'belongParent'){
            $idFamily = $_POST['idCoFamily'];
            $mailCoParent = $_POST['mailCoParent'];
            $frontoffice->belongFamily($idFamily,$mailCoParent);
        }
        // ADD NEW CHILD
        elseif($_GET['action'] == 'addChild'){
            if(($_SESSION['id'])){
                $lastName = htmlspecialchars($_POST['lastNameCo']);
                $firstName = htmlspecialchars($_POST['firstNameCo']);
                $birthdate = $_POST['birthDateCo'];
                $gender = $_POST['genderCo'];
                $parent1 = htmlspecialchars($_POST['parent1Co']);
                $parent2 = htmlspecialchars($_POST['parent2Co']);
                $favMeal = htmlspecialchars($_POST['favoriteMealCo']);
                $hatedMeal = htmlspecialchars($_POST['hatedMealCo']);
                $meds = htmlspecialchars($_POST['medsCo']);
                $allergies = htmlspecialchars($_POST['allergiesCo']);
                $frontoffice->addChild($lastName, $firstName, $birthdate, $gender, $parent1, $parent2, $favMeal, $hatedMeal, $meds, $allergies);
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
        elseif($_GET['action'] == 'goToUpdateChild'){
            $idChild = $_GET['idChildren'];
            $frontoffice->goToUpdateChild($idChild);
        }
        // UPDATE CHILD
        elseif($_GET['action'] == 'updateChild'){
            if(isset($_SESSION['id'])){
                $idMember = $_SESSION['id'];
                $idChildren = $_GET['idChildren'];
                $lastName = htmlspecialchars($_POST['lastNameCo']);
                $firstName = htmlspecialchars($_POST['firstNameCo']);
                $birthdate = $_POST['birthDateCo'];
                $parent1 = htmlspecialchars($_POST['parent1Co']);
                $parent2 = htmlspecialchars($_POST['parent2Co']);
                $favMeal = htmlspecialchars($_POST['favoriteMealCo']);
                $hatedMeal = htmlspecialchars($_POST['hatedMealCo']);
                $meds = htmlspecialchars($_POST['medsCo']);
                $allergies = htmlspecialchars($_POST['allergiesCo']);
                    if($_SESSION['firstname'] === $parent1 || $_SESSION['firstname'] === $parent2){
                    $frontoffice->updateChild($idMember, $idChildren, $lastName, $firstName, $birthdate, $parent1, $parent2, $favMeal, $hatedMeal, $meds, $allergies);
                    }
                    else{
                        throw new \Exception('Vous devez être connecté');
                    }                    
            }
            else{
                throw new \Exception('Vous devez être connecté');
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
            $idFamily = $_GET['id'];
            $idMember = $_SESSION['id'];
            $frontoffice->goToFamily($idFamily,$idMember);
        }
        // UPLOAD BANNER
        elseif($_GET['action'] == 'uploadBanner'){
            $idFamily = $_POST['idFamilyCo'];
            $frontoffice->uploadBanners($idFamily);
        }
        elseif($_GET['action'] == 'profileView'){
            $idMember = $_GET['idMember'];
            $frontoffice->goToMemberBoard($idMember);
        }
        elseif ($_GET['action'] == 'editPassword'){

        }elseif ($_GET['action'] == 'recoverUser'){
            $idMember = $_SESSION['id'];
            $frontoffice->recoverUser($idMember);
        }elseif ($_GET['action'] == 'changeProfile'){ // changer valeur utilisateur
            $idMember = $_SESSION['id'];
            $name = htmlspecialchars($_POST['firstName']);
            $pass = $_POST['passCo'];
            $mdp = password_hash($pass, PASSWORD_DEFAULT);
            $mail = htmlspecialchars($_POST['mailCo']);
            $dateBorn = htmlspecialchars($_POST['bornDate']);
            $city = htmlspecialchars($_POST['city']);
            $frontoffice->changeProfile($name, $mdp, $mail, $dateBorn, $city, $idMember);

        }


        else{
            echo 'banane';
        }
    }
    else{
        $frontoffice->homeView();
    }
}
catch(Exception $e){
    echo $e->getMessage();
}