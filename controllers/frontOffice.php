<?php
require_once('models/UserManager.php');
require_once('models/ChildManager.php');
// GET USER TO DB & BACK TO HOMEVIEW
function newUser($firstNameCo, $lastNameCo, $passCo, $mailCo)
{
    if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/", $passCo)){              
        $userManager = new \OpenClassRooms\Chicouf\Models\UserManager();
        $connex = $userManager -> addUser($firstNameCo, $lastNameCo, $passCo, $mailCo);
        $connex11 = $userManager -> getMaxIdMember();
        $idMember111 = $connex11->fetch();
        $idMember = $idMember111[0];
        header('Location: index.php?action=memberView&idMember='.$idMember);
    }
    else{
        throw new Exception('votre mot de passe doit comporter des lettres majuscules, minuscules ET des chiffres entre 8 et 16 caractères');
    }
}
//GO TO REGISTRATION FORM
function subView(){
    require 'views/frontend/registrationView.php';
}
// GET CHILD INFOS IN MEMBERVIEW
function goToMember($idMember){
    $childManager = new \OpenClassRooms\Chicouf\Models\ChildManager();
    $data = $childManager -> watchChild($idMember);
    $connex2 = $childManager -> getMealsInfos($idMember);
    $connex3 = $childManager -> getHealthInfos($idMember);
    require 'views/frontend/childView2.php';
}
// // PROFILE VIEW
// function goToMemberBoard($idMember){
//     $userManager = new UserManager();
//     $connex = $userManager -> getMemberInfos($idMember);
//     $childManager = new ChildManager();
//     $connex = $childManager -> watchChild($idChild);
//     require 'views/frontend/croquis2.php';
// }
// ADD CHILD
function addChild($lastName, $firstName, $birthdate, $parent1, $parent2, $favMeal, $hatedMeal, $meds, $allergies){
    $childManager = new \OpenClassRooms\Chicouf\Models\ChildManager();
    $infos1 = $childManager -> addNewChild($lastName, $firstName, $birthdate, $parent1, $parent2);
    $infos11 = $childManager -> getMaxIdChild();
    $idChild111 = $infos11->fetch();
    $idChild = $idChild111[0];
    $infos2 = $childManager -> addNewMeal($favMeal, $hatedMeal,$idChild);
    $infos3 = $childManager -> addNewHealth($meds, $allergies,$idChild);
    echo 'Success !';
}
// UPDATE CHILD
function updateChild($idMember, $idChildren, $lastName, $firstName, $birthdate, $parent1, $parent2, $favMeal, $hatedMeal, $meds, $allergies){
    $childManager = new \OpenClassRooms\Chicouf\Models\ChildManager();
    $infos1 = $childManager -> updateOldChild($lastName, $firstName, $birthdate, $parent1, $parent2, $idChildren);
    $infos2 = $childManager -> updateOldMeal($favMeal, $hatedMeal, $idChildren);
    $infos3 = $childManager -> updateOldHealth($meds, $allergies, $idChildren);
    header('Location: index.php?action=memberView&idMember='.$idMember);
}

// GO TO UPDATE CHILD
function goToUpdateChild($idChild){
    $childManager = new \OpenClassRooms\Chicouf\Models\ChildManager();
    $data = $childManager -> getChild($idChild);
    $connex2 = $childManager -> getMeals($idChild);
    $connex3 = $childManager -> getHealth($idChild);
    require 'views/frontend/editChild.php';
}
// CREATE CHILD VIEW
function goToCreateChild(){
    require 'views/frontend/createChild.php';
}
// DELETE CHILD
function deleteChild($idMember,$idChildren){
    $childManager = new \OpenClassRooms\Chicouf\Models\ChildManager();
    $delete = $childManager -> EraseChild($idChildren);
    header('Location: index.php?action=memberView&idMember='.$idMember);
}
// UPLOAD AVATAR
function uploadPic($idMember,$idChildren){
    $target_dir = "public/uploads/";
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
                    $childManager = new \OpenClassRooms\Chicouf\Models\ChildManager();
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