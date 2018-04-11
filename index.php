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
        // USER RECORD
        elseif ($_GET['action'] == 'record'){
            $firstname = htmlspecialchars($_POST['firstname']);
            $surname = htmlspecialchars($_POST['surname']);
            $pass = htmlspecialchars($_POST['pass']);
            if(isset($firstname) && isset($surname) && isset($pass)){
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
        // RATTACHER UN ENFANT A UNE FAMILLE OU UN PARENT
        elseif($_GET['action'] == 'belong'){

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
        // FAMILY ACTIONS
        elseif($_GET['action'] == 'familyLink'){
            $idFamily = $_GET['idFamily'];
            $frontoffice->goToFamily($idFamily);
        }
        elseif($_GET['action'] == 'profileView'){
            $idMember = $_GET['idMember'];
            $frontoffice->goToMemberBoard($idMember);
        }elseif ($_GET['action'] == 'editPassword'){

        }elseif ($_GET['action'] == 'changeProfile'){ //modifier sa fiche profile cedric
            $id = $_GET['id'];
            $pass = $_POST['passCo'];
            $mdp = password_hash($pass, PASSWORD_DEFAULT);
            $mail = htmlspecialchars($_POST['mailCo']);
            $bornDate = htmlspecialchars($_POST['bornDate']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $city = htmlspecialchars($_POST['city']);
            $frontoffice->changeProfile($id, $pass, $mdp, $mail, $bornDate, $lastName, $city);



        }
        else{
            echo 'banane';
        }
    }
    else{
        // $frontoffice->subView();
        $frontoffice->homeView();
    }
}
catch(Exception $e){
    echo $e->getMessage();
}