<?php

namespace Src\Controllers;

class FrontOffice{
// GET USER TO DB & BACK TO HOMEVIEW
    function newUser($firstNameCo, $lastNameCo, $passCo, $mailCo, $parentCo, $genderCo){
        if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/", $passCo)){              
            $userManager = new \Src\Models\UserManager();
            $connex = $userManager -> addUser($firstNameCo, $lastNameCo, $passCo, $mailCo, $parentCo, $genderCo);
            $connex11 = $userManager -> getMaxIdMember();
            $idMember111 = $connex11->fetch();
            $idMember = $idMember111[0];
            $req = $userManager -> userById($idMember);
            $resultat = $req->fetch();
            $_SESSION['firstname'] =  $resultat['firstname'];
            $_SESSION['parenthood'] = $resultat['parenthood'];
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
            if($isPasswordCorrect){
                $_SESSION['firstname'] =  $resultat['firstname'];
                $_SESSION['parenthood'] = $resultat['parenthood'];
                $_SESSION['id'] =  $resultat['idMember'];
                $_SESSION['modo'] =  $resultat['modo'];
                $_SESSION['img'] =  $resultat['img'];
                $familyManager = new \Src\Models\FamilyManager();     
                $dataFam = $familyManager ->  getfamilyId($_SESSION['id']); 
                $_SESSION['family'] = $dataFam['idFamily'];
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
    function goToFamily($idFamily,$idMember){
        $familyManager = new \Src\Models\FamilyManager();
        $dataF = $familyManager -> watchFamily($idFamily);
        $dataF2 = $familyManager -> watchFamilyMeals($idFamily);
        $dataF3 = $familyManager -> watchFamilyHealth($idFamily);
        $dataF4 = $familyManager -> getFamilyName($idFamily);
        $dataF6 = $familyManager -> getImgFamily($idFamily);
        $dataF7 = $familyManager -> watchModo($idFamily);
        $dataF8 = $dataF7->fetchAll();
        
        $dataMember = $familyManager -> watchMembersFamily($idFamily);
        $userManager = new \Src\Models\UserManager();
        $dataF5 = $userManager -> userById($idMember);
        require 'app/Views/frontend/familyView.php';
    }
    function addNewModo($mailNewModo){
        $familyManager = new \Src\Models\FamilyManager();
        $newModo = $familyManager -> insertNewModo($mailNewModo);
        header('Location:index.php?action=familyLink&id='.$_SESSION['family']);
    }
    function deleteFamily($idFamily,$idMember){
        $familyManager = new \Src\Models\FamilyManager();
        $eraseFam = $familyManager -> eraseFamily($idFamily);
        header('Location: index.php?action=memberView&idMember='.$idMember);
    }
    // GO TO REGISTRATION FORM
    function subView(){
        require 'app/Views/frontend/registrationView.php';
    }
    // GO TO HOME VIEW
    function homeView(){
        require 'app/Views/frontend/homeView.php';
    }
    // GO TO MENTIONS
    function goLegal(){
        require 'app/Views/frontend/legalView.php';
    }
    // GO TO ABOUT
    function goAbout(){
        require 'app/Views/frontend/about.php';
    }
    // USER CONTACT
    function contact($usernameContact,$mailContact,$titleContact,$contentContact){
        $userManager = new \Src\Models\UserManager();
        $contact = $userManager -> contactDb($usernameContact,$mailContact,$titleContact,$contentContact);
        header('Location: index.php');
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
        require 'app/Views/frontend/childView.php';
    }
    // CREATE FAMILY
    function goToCreateFamily(){
        require 'app/Views/frontend/familyView.php';
    }
    function createFamily($idMember,$familyName){
        $familyManager = new \Src\Models\FamilyManager();
        $createFamily = $familyManager -> newFamily($familyName);
        $getNewfamilyId = $familyManager -> getIdFamily($idMember);
        $maxIdFamily = $getNewfamilyId->fetch();
        $idFamily = $maxIdFamily[0];
        $newFamily = $familyManager -> parentFamilyLink($idMember,$idFamily);
        $childManager = new \Src\Models\ChildManager();
        $getChildId = $childManager -> watchChild($idMember);
        $getChildId2 = $getChildId->fetchAll();
        $goModo = $familyManager -> newModo($idMember);
        if(!empty($getChildId2)){
            foreach($getChildId2 as $getChildId3){
                $idChild = $getChildId3['idChildren'];
                $addToMyFamily = $childManager -> AddToMyFamily($idChild,$idFamily);
            }
        }
        header('Location: index.php?action=familyLink&id='.$idFamily);
    }
    function belongFamily($idFamily,$mailCoParent){
        $familyManager = new \Src\Models\FamilyManager();
        $dataParent = $familyManager -> getParentId($mailCoParent); 
        $dataParent2 = $dataParent->fetch(); 
            if(!(empty($dataParent2))){
            $idMember = $dataParent2['idMember'];
            $dataParent3 = $familyManager -> belongParent($idMember,$idFamily);
            $dataParent4 = $familyManager -> getChildParent($idMember);
            $dataParent6 = $dataParent4->fetchAll();
                if(empty($dataParent6)){
                    throw new \Exception ('vous n\'avez aucun enfant rattaché à votre compte');
                }
                else{
                    foreach($dataParent6 as $dataParent7){
                        $idChild = $dataParent7['idChildren'];
                        $dataParent5 = $familyManager -> belongChild($idFamily,$idChild);
                    }
                }
            }
            else{
                throw new \Exception ('cet email ne figure pas dans notre base de données');
            }
        header('Location: index.php?action=familyLink&id='.$idFamily);
    }
    //ADD COMMENT
    function addComment($chatDissId, $chatMemberId, $chatComment){
    $commentManager = new \Src\Models\CommentManager();
    $comments = $commentManager -> postDiscussComment($chatDissId, $chatMemberId, $chatComment);
    if ($comments === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $id_Chapters . '#comments');
    }
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
        header('Location: index.php?action=memberView&idMember='.$idMember);
    }
    // UPDATE CHILD
    function updateChild($idMember, $idChildren, $lastName, $firstName, $birthdate, $parent1, $parent2, $username, $favMeal, $hatedMeal, $meds, $allergies){            
        $childManager = new \Src\Models\ChildManager();
        $infos1 = $childManager -> updateOldChild($lastName, $firstName, $birthdate, $parent1, $parent2, $idChildren,$username);
        $infos2 = $childManager -> updateOldMeal($favMeal, $hatedMeal, $idChildren);
        $infos3 = $childManager -> updateOldHealth($meds, $allergies, $idChildren);
        if($_SESSION['firstname'] == $parent1 || $_SESSION['firstname'] == $parent2){           
            header('Location: index.php?action=memberView&idMember='.$idMember);
        }
        else{
            header('Location:index.php?action=familyLink&id='.$_SESSION['family']);
        }
        
    }

    // GO TO UPDATE CHILD
    function goToUpdateChild($idChild){
        $childManager = new \Src\Models\ChildManager();
        $data = $childManager -> getChild($idChild);
        $connex2 = $childManager -> getMeals($idChild);
        $connex3 = $childManager -> getHealth($idChild);
        $idMember = $_SESSION['id'];
        // $connex4 = $childManager -> getIdMember($idChild,$idMember);
        // $newConnex4 = $connex4->fetch();
        $connex5 = $childManager -> getIdFamilyByChild($idChild);
        $newConnex5 = $connex5->fetch();
            if(isset($_SESSION['id'])){
                if($_SESSION['family'] === $newConnex5['idFamily']){
                    require 'App/Views/frontend/editChild.php';
                }
                else{
                    throw new \Exception('Cette page n\'existe pas !');
                }
            }
            else{
                throw new \Exception('Cette page n\'existe pas !');
            }
    }
    // CREATECHILD VIEW
    function goToCreateChild(){
        require 'app/Views/frontend/createChild.php';
    }
    // DELETE CHILD
    function deleteChild($idMember,$idChildren){
        $childManager = new \Src\Models\ChildManager();
        $delete = $childManager -> EraseChild($idChildren);
        header('Location: index.php?action=memberView&idMember='.$idMember);
    }
    // BELONG PARENT
    function belong($mailCo,$idChild){
        $userManager = new \Src\Models\UserManager();
        $belong0 = $userManager -> getBelongParent($mailCo);
        $belong1 = $belong0->fetch();
        $idMember = $belong1['idMember'];
        $belong2 = $userManager -> belongParent($idMember,$idChild);
        header('Location: index.php?action=memberView&idMember='.$_SESSION['id']);
    }  
    // UPLOAD CHILD AVATAR
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
    // UPLOAD BANNER
    function uploadBanners($idFamily){
        $target_dir = "app/Public/uploads/banners/";
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
                        $familyManager = new \Src\Models\FamilyManager();
                        $insertPicture = $familyManager -> uploadBanner($target_file,$idFamily);
                        header('Location: index.php?action=familyLink&id='.$idFamily);
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


    function recoverUser($idMember)
    {
        $recovUser = new \Src\Models\UserManager();
        $recoverUs = $recovUser->user($idMember);
        require 'app/Views/frontend/profilView.php';
    }

    function changeProfile($name, $mdp, $mail, $dateBorn, $city, $idMember)
    {
        preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/", $mdp);

        $newChange = new \Src\Models\UserManager();
        $change = $newChange->changeUser($name, $mdp, $mail, $dateBorn, $city, $idMember);

        $recovUser = new \Src\Models\UserManager();
        $recoverUs = $recovUser->user($idMember);

        require 'app/Views/frontend/profilView.php';

    }
}