<?php

namespace Src\Controllers;

class FrontOffice{
// GET USER TO DB & BACK TO HOMEVIEW
    function newUser($firstNameCo, $lastNameCo, $passCo, $mailCo, $parentCo, $gender){
        if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/", $passCo)){              
            $userManager = new \Src\Models\UserManager();
            $connex = $userManager -> addUser($firstNameCo, $lastNameCo, $passCo, $mailCo, $parentCo,$gender);
            $connex11 = $userManager -> getMaxIdMember();
            $idMember111 = $connex11->fetch();
            $idMember = $idMember111[0];
            $req = $userManager -> userById($idMember);
            $resultat = $req->fetch();
            $_SESSION['firstname'] =  $resultat['Firstname'];
            $_SESSION['parentHood'] = $resultat['ParentHood'];
            $_SESSION['id'] =  $resultat['idMember'];
            $_SESSION['modo'] =  $resultat['modo'];
                if($_SESSION['parentHood'] == 1){
                    header('Location: index.php?action=memberView&idMember='.$_SESSION['id']);
                }
                else{
                    header('Location: index.php');
                }
        }
        else{
            throw new \Exception('votre mot de passe doit comporter des lettres majuscules, minuscules ET des chiffres entre 8 et 16 caractères');
        }
    }
    //LOGIN FUNCTION
    function connected($firstname,$surname,$pass){        
        $userManager = new \Src\Models\UserManager();
        $req = $userManager -> userConnex($firstname,$surname);
        $resultat = $req->fetch();
        $isPasswordCorrect = password_verify($pass,$resultat['pass']);
        $_SESSION['firstname'] =  $resultat['Firstname'];
        $_SESSION['parentHood'] = $resultat['ParentHood'];
        $_SESSION['id'] =  $resultat['idMember'];
        $_SESSION['modo'] =  $resultat['modo'];
        $_SESSION['img'] =  $resultat['img'];
            if($isPasswordCorrect){
                header('Location: index.php?action=memberView&idMember='.$_SESSION['id']);             
            }
            else{
                throw new \Exception('vos identifiants sont incorrects');
            }
    }    
    //LOGOUT FUNCTION
    function disconnected(){
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
    }
    //FAMILY BOARD
    function goToFamily($idFamily){
        $familyManager = new \Src\Models\FamilyManager();
        $dataF = $familyManager -> watchFamily($idFamily);
        $dataF2 = $familyManager -> watchFamilyMeals($idFamily);
        $dataF3 = $familyManager -> watchFamilyHealth($idFamily);
        $dataF4 = $familyManager -> getFamilyName($idFamily);
        require 'app/Views/frontend/familyView.php';
    }
    //GO TO REGISTRATION FORM
    function subView(){
        require 'app/Views/frontend/registrationView.php';
    }
    // GO TO HOME VIEW
    function homeView(){
        require 'app/Views/frontend/homeView.php';
    }
    // MEMBER BOARD
    function goToMember($idMember){
        $childManager = new \Src\Models\ChildManager();
        $data = $childManager -> watchChild($idMember);
        $connex2 = $childManager -> getMealsInfos($idMember);
        $connex3 = $childManager -> getHealthInfos($idMember);

        $familyManager = new \Src\Models\FamilyManager();
        $dataFam2 = $familyManager -> getFamilyId($idMember);
        // $connex4 = $childManager -> getParents($)
        require 'app/Views/frontend/childView2.php';
    }
    // ADD CHILD
    function addChild($lastName, $firstName, $birthdate, $gender, $parent1, $parent2, $favMeal, $hatedMeal, $meds, $allergies){
        $childManager = new \Src\Models\ChildManager();
        $infos1 = $childManager -> addNewChild($lastName, $firstName, $birthdate, $gender, $parent1, $parent2);
        $infos11 = $childManager -> getMaxIdChild();
        $idChild111 = $infos11->fetch();
        $idChild = $idChild111[0];
        $infos2 = $childManager -> addNewMeal($favMeal, $hatedMeal,$idChild);
        $infos3 = $childManager -> addNewHealth($meds, $allergies,$idChild);
        $idMember = $_SESSION['id'];
        $infoJoin = $childManager -> addToMyParent($idChild,$idMember);
        $userManager = new \Src\Models\UserManager();
        $infosParent = $userManager -> getFamilyId($idMember);
        $infosParent2 = $infosParent->fetch();
        $idFamily = $infosParent2['idFamily'];
        $infos4 = $childManager -> addToMyFamily($idChild,$idFamily);
        header('Location: index.php?action=memberView&idMember='.$_SESSION['id']); 
    }
    // UPDATE CHILD
    function updateChild($idMember, $idChildren, $lastName, $firstName, $birthdate, $parent1, $parent2, $favMeal, $hatedMeal, $meds, $allergies){
        $childManager = new \Src\Models\ChildManager();
        $infos1 = $childManager -> updateOldChild($lastName, $firstName, $birthdate, $parent1, $parent2, $idChildren);
        $infos2 = $childManager -> updateOldMeal($favMeal, $hatedMeal, $idChildren);
        $infos3 = $childManager -> updateOldHealth($meds, $allergies, $idChildren);
        header('Location: index.php?action=memberView&idMember='.$idMember);
    }

    // GO TO UPDATE CHILD
    function goToUpdateChild($idChild){
        $childManager = new \Src\Models\ChildManager();
        $data = $childManager -> getChild($idChild);
        $connex2 = $childManager -> getMeals($idChild);
        $connex3 = $childManager -> getHealth($idChild);
        require 'App/Views/frontend/editChild.php';
    }
    // CREATE CHILD VIEW
    function goToCreateChild(){
        require 'app/Views/frontend/createChild.php';
    }
    // DELETE CHILD
    function deleteChild($idMember,$idChildren){
        $childManager = new \Src\Models\ChildManager();
        $delete = $childManager -> EraseChild($idChildren);
        header('Location: index.php?action=memberView&idMember='.$idMember);
    }
    // UPLOAD AVATAR
    function uploadPic($idMember,$idChildren){
        $target_dir = "app/Public/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Désolé, votre fichier est trop volumineux. ";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Seuls les formats JPG, JPEG, PNG & GIF files sont authorisés. ";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Désolé, votre avatar n'a pu être envoyé.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $childManager = new \Src\Models\ChildManager();
                        $insertPicture = $childManager -> uploadPicture($target_file,$idChildren);
                        header('Location: index.php?action=memberView&idMember='.$idMember);
                    } else {
                        echo "Désolé, une erreur est survenue dans l'envoi de votre fichier. ";
                    }
                }
            } else {
                echo "Ce fichier n'est pas une image. ";
                $uploadOk = 0;
            }
        }
        
    }
}