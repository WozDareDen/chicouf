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
            $_SESSION['img'] = $resultat['img'];
            $_SESSION['id'] =  $resultat['idMember'];
            $_SESSION['modo'] =  $resultat['modo'];
                if($_SESSION['parenthood'] == 1){
                    header('Location: index.php?action=memberView&idMember='.$_SESSION['id']);
                }
                else{
                    header('Location: index.php?action=recoverUser&id='.$_SESSION['id']);
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
                if($_SESSION['parenthood'] == 1){
                    header('Location: index.php?action=memberView&idMember='.$_SESSION['id']);
                }
                else{
                    header('Location: index.php?action=recoverUser&id='.$_SESSION['id']);
                }
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
    // ADD NEW MODO
    function addNewModo($mailNewModo){
        $familyManager = new \Src\Models\FamilyManager();
        $newModo = $familyManager -> insertNewModo($mailNewModo);
        header('Location:index.php?action=familyLink&id='.$_SESSION['family']);
    }
    // CHANGE MODO
    function changeModo($idMember){
        $idFamily = $_SESSION['family'];
        $familyManager = new \Src\Models\FamilyManager();
        $checkModo = $familyManager -> checkModo($idFamily);
        $checkModo2 = $checkModo->fetchAll();
            if(count($checkModo2)>1){ 
                $userManager = new \Src\Models\UserManager();
                $changeModo = $userManager -> eraseModo($idMember);
                $_SESSION['modo'] = 0;
                header('Location:index.php?action=familyLink&id='.$_SESSION['family']);
            }
            else{
                throw new \Exception('vous devez d\'abord désigner un nouveau modérateur');
            }
    }
    // DELETE FAMILY
    function deleteFamily($idFamily,$idMember){
        $familyManager = new \Src\Models\FamilyManager();
        $eraseFam = $familyManager -> eraseFamily($idFamily);       
        $userManager = new \Src\Models\UserManager();
        $eraseModo = $userManager -> eraseModo($idMember);
        $_SESSION['modo'] = 0;
        header('Location: index.php?action=memberView&idMember='.$idMember);
    }
    // BANN MEMBER
    function bann($idFamily,$mailCo){
        $userManager = new \Src\Models\UserManager();
        $getIdModo = $userManager -> getBelongParent($mailCo);
        $getIdModo2 = $getIdModo->fetch();
        $idMember = $getIdModo2['idMember'];
        $familyManager = new \Src\Models\FamilyManager();
        $bann = $familyManager -> bannMember($idFamily,$idMember);
        header('Location:index.php?action=familyLink&id='.$_SESSION['family']);
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
    // GO TO FAMILY SPACE
    function goToCreateFamily(){
        require 'app/Views/frontend/familyView.php';
    }
    // CREATE FAMILY
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
        $_SESSION['family'] = $idFamily;
        $_SESSION['modo'] = 1;
        header('Location: index.php?action=familyLink&id='.$idFamily);
    }
    // BELONG PARENT TO FAMILY (and children if necessary)
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
    function addChild($lastName, $firstName, $birthdate, $gender, $parent1, $parent2, $favMeal, $hatedMeal, $meds,$freq, $start, $allergies){
        $childManager = new \Src\Models\ChildManager();
        $upDateUser = $_SESSION['firstname'];
        $infos1 = $childManager -> addNewChild($lastName, $firstName, $birthdate, $gender, $parent1, $parent2,$upDateUser);
        $infos11 = $childManager -> getMaxIdChild();
        $idChild111 = $infos11->fetch();
        $idChild = $idChild111[0];
        $infos2 = $childManager -> addNewMeal($favMeal, $hatedMeal,$idChild);
        // allergy
        $addAllergy = $childManager -> addNewAllergy($allergies);
        $getIdAllergy = $childManager -> getMaxIdAllergy();
        $newGetIdAllergy = $getIdAllergy->fetch();
        $idAllergy = $newGetIdAllergy[0];
        $insertAllChild = $childManager -> insertAllChild($idAllergy,$idChild);
        // treatment
        $addTTT = $childManager -> addNewTTT($start,$idChild);
        $getIdTTT = $childManager -> getMaxIdTTT();
        $newGetIdTTT = $getIdTTT->fetch();
        $idTTT = $newGetIdTTT[0];
        // frequence
        $getIdMeds = $childManager -> getIdMeds($meds);
        $newGetIdMeds = $getIdMeds->fetch();
        $idMeds = $newGetIdMeds[0];
        $addFreq = $childManager -> addNewFreq($freq,$idMeds,$idTTT);

        $idMember = $_SESSION['id'];
        $infoJoin = $childManager -> addToMyParent($idChild,$idMember);
        $userManager = new \Src\Models\UserManager();
        $infosParent = $userManager -> getFamilyId($idMember);
        $infosParent2 = $infosParent->fetch();
        if(!(empty($infosParent2))){
        $idFamily = $infosParent2['idFamily'];
        $infos4 = $childManager -> addToMyFamily($idChild,$idFamily);
        }
        header('Location: index.php?action=memberView&idMember='.$idMember);
    }
    // UPDATE CHILD
    function updateChild($idMember, $idChildren, $lastName, $firstName, $birthdate, $parent1, $parent2, $username, $favMeal, $hatedMeal, $meds, $freq, $start, $idTTT, $idMeds, $idPoso, $idAllergy, $allergies){            
        $childManager = new \Src\Models\ChildManager();
        $infos1 = $childManager -> updateOldChild($lastName, $firstName, $birthdate, $parent1, $parent2, $idChildren,$username);
        $infos2 = $childManager -> updateOldMeal($favMeal, $hatedMeal, $idChildren);
         // allergy
        $infos4 = $childManager -> updateOldAllergy($allergies,$idAllergy);
        // TTT
        $updateTTT = $childManager -> updateOldTTT($idTTT,$start);
        // poso
        $updatePoso = $childManager -> updateOldPoso($idTTT,$freq,$idMeds);

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
        // allergy
        $connex3 = $childManager -> getAllergy($idChild);
        $idMember = $_SESSION['id'];
        // meds
        $getMedsChild = $childManager ->getMedsChild($idChild);

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
    // BELONG PARENT TO CHILD
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

// UPLOAD USER AVATAR
function uploadAvatar($idMember){
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
                    $userManager = new \Src\Models\UserManager();
                    $insertAvatar = $userManager -> insertAvatar($target_file,$idMember);
                    $this->recoverUser($idMember);
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
    // GET USER PROFILE INFOS
    function recoverUser($idMember)
    {
        $userManager = new \Src\Models\UserManager();
        $recoverUs = $userManager -> watchUser($idMember);
        $idFamily = $_SESSION['family'];
        $familyManager = new \Src\Models\FamilyManager();
        $getFamilyName = $familyManager -> getFamilyName($idFamily);
        require 'app/Views/frontend/profileView.php';
    }
    // UPDATE PROFILE
    function changeProfile($name, $mail, $birthdate, $city, $idMember)
    {
        $userManager = new \Src\Models\UserManager();
        $change = $userManager -> changeUser($name, $mail, $birthdate, $city, $idMember);       
        $this->recoverUser($idMember);
    }
    // CHANGE USER PASS
    function newPass($idMember,$initPass,$pass){
        if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/", $pass)){
            $userManager = new \Src\Models\UserManager();
            $getUserPass = $userManager -> watchUser($idMember);
            $oldPass = $getUserPass->fetch();   
            $isPasswordCorrect = password_verify($initPass,$oldPass['pass']);
                if($isPasswordCorrect){
                    $newPass = password_hash($pass, PASSWORD_DEFAULT);
                    $changePass = $userManager -> changePass($idMember,$newPass);
                    $this->recoverUser($idMember);
                }   
                else{
                    throw new \Exception('votre mot de passe actuel est erroné');
                }      
        }
        else{
            throw new \Exception('votre mot de passe doit comporter des lettres majuscules, minuscules ET des chiffres entre 8 et 16 caractères');
        }
    }
    function ajaxMeds($autoC){
        $childManager = new \Src\Models\ChildManager();
        $data = $childManager -> getAllMeds($autoC);
        header('Content-Type: application/json');
        $data = $data->fetchAll();
        echo json_encode($data);
    }



    // // GET MEDS TO DB
    // function getMeds(){

    //     $getMeds = json_decode(file_get_contents('data/medicaments.json'),true);
    //     /* création fichier si inexistant et ouverture flux */
    //     $file = fopen("import_meds.sql", "w");
    //     /* création string */
    //     $string_to_write = "insert into meds (title) values";
    //     foreach($getMeds as $meds){
    //         $string_to_write .= PHP_EOL.'("'.str_replace('"',"'",$meds["title"]).'"),';
    //     }
    //     /* suppression , finale -> ; */
    //     $string_to_write = substr($string_to_write,0,strlen($string_to_write)-1).";";

    //     /* écriture dans fichier */
    //     fwrite($file, $string_to_write);
    //     /* fermeture flux fichier */
    //     fclose($file);
    // }
}