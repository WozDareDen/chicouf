<?php

namespace Src\Controllers;

class FrontOffice
{
    //*****************************USER CONNECTION***********************************
    public function newUser($firstNameCo, $lastNameCo, $passCo, $mailCo, $parentCo, $genderCo)
    {
        if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/", $passCo)) {
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
            $_SESSION['mail'] = $resultat['mail'];
            $_SESSION['gender'] =  $resultat['gender'];
            if ($_SESSION['parenthood'] == 1) {
                header('Location: index.php?action=memberView&idMember='.$_SESSION['id']);
            } else {
                header('Location: index.php?action=recoverUser&id='.$_SESSION['id']);
            }
        } else {
            throw new \Exception('votre mot de passe doit comporter des lettres majuscules, minuscules ET des chiffres entre 8 et 16 caractères');
        }
    }
    //LOGIN FUNCTION
    public function connected($firstname, $surname, $pass)
    {
        $userManager = new \Src\Models\UserManager();
        $req = $userManager -> userConnex($firstname, $surname);
        $resultat = $req->fetch();
        $isPasswordCorrect = password_verify($pass, $resultat['pass']);
        if ($isPasswordCorrect) {
            $_SESSION['firstname'] =  $resultat['firstname'];
            $_SESSION['parenthood'] = $resultat['parenthood'];
            $_SESSION['id'] =  $resultat['idMember'];
            $_SESSION['modo'] =  $resultat['modo'];
            $_SESSION['img'] =  $resultat['img'];
            $_SESSION['gender'] =  $resultat['gender'];
            $familyManager = new \Src\Models\FamilyManager();
            $dataFam = $familyManager ->  getfamilyId($_SESSION['id']);
            $_SESSION['family'] = $dataFam['idFamily'];
            if ($_SESSION['parenthood'] == 1) {
                header('Location: index.php?action=memberView&idMember='.$_SESSION['id']);
            } else {
                header('Location: index.php?action=recoverUser&id='.$_SESSION['id']);
            }
        } else {
            throw new \Exception('vos identifiants sont incorrects');
        }
    }
    //LOGOUT FUNCTION
    public function disconnected()
    {
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
    }
    //******************************MEMBER BOARD******************************************
    public function goToMember($idMember)
    {
        $childManager = new \Src\Models\ChildManager();
        $children = $childManager -> watchChild($idMember)->fetchAll();

        foreach ($children as $idChild=>$one_child) {
            $meals = $childManager -> getMealsInfos($one_child['idChildren'])->fetchAll();
            $children[$idChild]['meal'] = $meals;

            $TTT = $childManager -> getDateTTT($one_child['idChildren'])->fetchAll();
            $children[$idChild]['TTT'] = $TTT;

            foreach ($TTT as $id=>$one_TTT) {
                $meds = $childManager -> getAllMedsChild($one_TTT['idTTT'])->fetchAll();
                $children[$idChild]['TTT'][$id]['meds'] = $meds;
            }
            
            $allergies = $childManager -> getAllergyInfos($one_child['idChildren'])->fetchAll();
            $children[$idChild]['allergies'] = $allergies;
        }
        
        $familyManager = new \Src\Models\FamilyManager();
        $dataFam2 = $familyManager -> getFamilyId($idMember);
        // $connex4 = $childManager -> getParents($)
        require 'app/Views/frontend/memberView.php';
    }
    // GET USER PROFILE INFOS
    public function recoverUser($idMember)
    {
        $userManager = new \Src\Models\UserManager();
        $recoverUs = $userManager -> userById($idMember);
        if (isset($_SESSION['family'])) {
            $idFamily = $_SESSION['family'];
            $familyManager = new \Src\Models\FamilyManager();
            $getFamilyName = $familyManager -> getFamilyName($idFamily);
        }
        require 'app/Views/frontend/profileView.php';
    }
    // UPDATE PROFILE
    public function changeProfile($name, $mail, $birthdate, $city, $idMember, $words)
    {
        $userManager = new \Src\Models\UserManager();
        $change = $userManager -> changeUser($name, $mail, $birthdate, $city, $idMember, $words);
        $this->recoverUser($idMember);
    }
    // CHANGE USER PASS
    public function newPass($idMember, $initPass, $pass)
    {
        if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/", $pass)) {
            $userManager = new \Src\Models\UserManager();
            $getUserPass = $userManager -> userById($idMember);
            $oldPass = $getUserPass->fetch();
            $isPasswordCorrect = password_verify($initPass, $oldPass['pass']);
            if ($isPasswordCorrect) {
                $newPass = password_hash($pass, PASSWORD_DEFAULT);
                $changePass = $userManager -> changePass($idMember, $newPass);
                $this->recoverUser($idMember);
            } else {
                throw new \Exception('votre mot de passe actuel est erroné');
            }
        } else {
            throw new \Exception('votre mot de passe doit comporter des lettres majuscules, minuscules ET des chiffres entre 8 et 16 caractères');
        }
    }
    // DELETE ACCOUNT
    public function deleteMember()
    {
        $userManager = new \Src\Models\UserManager();
        $idMember = $_SESSION['id'];
        $checkChildren = $userManager -> checkChildren($idMember)->fetchAll();
        $familyManager = new \Src\Models\FamilyManager();
        $idFamily = $_SESSION['family'];
        $checkModo = $familyManager -> checkModo($idFamily);
        $checkModo2 = $checkModo->fetchAll();
        if(count($checkModo2)<2 && $_SESSION['modo'] == 1) {
             throw new \Exception('vous devez d\'abord désigner un nouveau modérateur de votre Espace Famille');
        } else {
            $_SESSION['modo'] = 0;
        }
        foreach ($checkChildren as $one_child) {
            $idChild = $one_child['idChildren'];
            $idFamily = $_SESSION['family'];
            $checkParent = $userManager -> checkParent($idChild);
            $checkParent2 = $checkParent->fetch();
            $childManager = new \Src\Models\ChildManager();
            if (count($checkParent2['idMember'])==1) {
                $deleteChildren = $childManager -> eraseChild($idChild);
            }
        }
        $deleteAccount = $userManager -> eraseMember($idMember);
        $this->disconnected();
    }
    //*******************************GO TO FAMILY SPACE*****************************************
    public function goToCreateFamily()
    {
        require 'app/Views/frontend/familyView.php';
    }
    // CREATE FAMILY
    public function createFamily($idMember, $familyName)
    {
        $familyManager = new \Src\Models\FamilyManager();
        $createFamily = $familyManager -> newFamily($familyName);
        $getNewfamilyId = $familyManager -> getIdFamily($idMember);
        $maxIdFamily = $getNewfamilyId->fetch();
        $idFamily = $maxIdFamily[0];
        $newFamily = $familyManager -> parentFamilyLink($idMember, $idFamily);
        $childManager = new \Src\Models\ChildManager();
        $getChildId = $childManager -> watchChild($idMember);
        $getChildId2 = $getChildId->fetchAll();
        $goModo = $familyManager -> newModo($idMember);
        if (!empty($getChildId2)) {
            foreach ($getChildId2 as $getChildId3) {
                $idChild = $getChildId3['idChildren'];
                $addToMyFamily = $childManager -> addToMyFamily($idChild, $idFamily);
            }
        }
        $_SESSION['family'] = $idFamily;
        $_SESSION['modo'] = 1;
        header('Location: index.php?action=familyLink&id='.$idFamily);
    }
    // WATCH FAMILY
    public function goToFamily($idFamily, $idMember, $cPage)
    {
        $familyManager = new \Src\Models\FamilyManager();
        $idFamily = $_SESSION['family'];
        $children = $familyManager -> watchFamily($idFamily)->fetchAll();
        $feWords = $familyManager -> feWords($idFamily);
        $neWords = $feWords->fetchAll();
        shuffle($neWords);
        foreach ($neWords as $words) {
            $getWords = $words[0];
        }
        $childManager = new \Src\Models\ChildManager();
        foreach ($children as $idChild=>$one_child) {
            $meals = $childManager -> getMealsInfos($one_child['idChildren'])->fetchAll();
            $children[$idChild]['meal'] = $meals;
            $TTT = $childManager -> getDateTTT($one_child['idChildren'])->fetchAll();
            $children[$idChild]['TTT'] = $TTT;
            foreach ($TTT as $id=>$one_TTT) {
                $meds = $childManager -> getAllMedsChild($one_TTT['idTTT'])->fetchAll();
                $children[$idChild]['TTT'][$id]['meds'] = $meds;
            }
            $allergies = $childManager -> getAllergyInfos($one_child['idChildren'])->fetchAll();
            $children[$idChild]['allergies'] = $allergies;
        }
        $dataF4 = $familyManager -> getFamilyName($idFamily);
        $dataF6 = $familyManager -> getImgFamily($idFamily);
        $dataF7 = $familyManager -> watchModo($idFamily);
        $dataF8 = $dataF7->fetchAll();
        $numPage = $familyManager->nbPage($idFamily);
        if (!($cPage>0 && $cPage<=$numPage)) {
            $cPage = 1;
        }
        $dataModo = $familyManager -> getMembers($idFamily, $cPage);
        $dataMember = $familyManager -> watchMembersFamily($idFamily);
        $userManager = new \Src\Models\UserManager();
        $dataF5 = $userManager -> userById($idMember);
        $idFamily2 = $idFamily;
        $getUrl = $familyManager -> getUrl($idFamily, $idFamily2)->fetchAll();
        require 'app/Views/frontend/familyView.php';
    }
    // DELETE FAMILY
    public function deleteFamily($idFamily, $idMember)
    {
        $familyManager = new \Src\Models\FamilyManager();
        $eraseFam = $familyManager -> eraseFamily($idFamily);
        $userManager = new \Src\Models\UserManager();
        $eraseModo = $userManager -> eraseModo($idMember);
        $_SESSION['modo'] = 0;
        header('Location: index.php?action=memberView&idMember='.$idMember);
    }
    // BELONG PARENT TO FAMILY (and children if necessary)
    public function belongFamily($idFamily, $mailCoParent)
    {
        $familyManager = new \Src\Models\FamilyManager();
        $dataParent = $familyManager -> getParentId($mailCoParent); 
        $dataParent2 = $dataParent->fetch();
        $idMember = $dataParent2['idMember'];
        $checkDB = $familyManager -> getFamilyId($idMember);
        if($checkDB = false){
            
            throw new \Exception('Une famille est déjà enregistrée pour cet utilisateur');
        }
        else{
            $checkMember = $familyManager -> checkMember($idFamily)->fetchAll();
            $checkMember2 = [];
            foreach($checkMember as $one_member){
                array_push($checkMember2,$one_member[0]);
            }
            if(in_array($mailCoParent,$checkMember2)){
                throw new \Exception('ce membre fait déjà parti de votre famille');
            }
            else{
                if (!(empty($dataParent2))) {
                    $dataParent3 = $familyManager -> belongParent($idMember, $idFamily);
                    $dataParent4 = $familyManager -> getChildParent($idMember);
                    $dataParent6 = $dataParent4->fetchAll();
                    if (!(empty($dataParent6))) {
                        foreach ($dataParent6 as $dataParent7) {
                            $idChild = $dataParent7['idChildren'];
                            $dataParent8 = $familyManager -> checkFamChild($idFamily, $idChild)->fetch();
                            if (empty($dataParent8)) {
                                $dataParent5 = $familyManager -> belongChild($idFamily, $idChild);
                            }
                        }
                    }
                } else {
                    throw new \Exception('cet email ne figure pas dans notre base de données');
                }
            }
                header('Location: index.php?action=familyLink&id='.$idFamily);
        }
    }
    //**************************MODO*******************************
    public function addNewModo($mailNewModo)
    {
        $familyManager = new \Src\Models\FamilyManager();
        $newModo = $familyManager -> insertNewModo($mailNewModo);
        header('Location:index.php?action=familyLink&id='.$_SESSION['family']);
    }
    public function goToModo($idFamily, $cPage)
    {
        $familyManager = new \Src\Models\FamilyManager();
        $numPage = $familyManager->nbPage($idFamily);
        if (!($cPage>0 && $cPage<=$numPage)) {
            $cPage = 1;
        }
        $dataF4 = $familyManager -> getFamilyName($idFamily);
        $dataModo = $familyManager -> getMembers($idFamily, $cPage);
        $dataModoFam = $familyManager -> countUsers($idFamily)->fetch();
        $dataModoFam2 = $familyManager -> countKids($idFamily)->fetch();
        require 'app/Views/frontend/modoView.php';
    }
    // CHANGE MODO
    public function changeModo($idMember)
    {
        $idFamily = $_SESSION['family'];
        $familyManager = new \Src\Models\FamilyManager();
        $checkModo = $familyManager -> checkModo($idFamily);
        $checkModo2 = $checkModo->fetchAll();
        if (count($checkModo2)>1) {
            $userManager = new \Src\Models\UserManager();
            $changeModo = $userManager -> eraseModo($idMember);
            $_SESSION['modo'] = 0;
            header('Location:index.php?action=familyLink&id='.$_SESSION['family']);
        } else {
            throw new \Exception('vous devez d\'abord désigner un nouveau modérateur');
        }
    }
    // BANN MEMBER
    public function bann($idFamily, $mailCo)
    {
        $userManager = new \Src\Models\UserManager();
        $getIdModo = $userManager -> getBelongParent($mailCo);
        $getIdModo2 = $getIdModo->fetch();
        $modo = $getIdModo2['modo'];
        if ($modo == 1) {
            throw new \Exception('vous ne pouvez bannir ce membre car il est aussi modérateur de cette famille');
        }
        $idMember = $getIdModo2['idMember'];
        $familyManager = new \Src\Models\FamilyManager();
        $dataParent4 = $familyManager -> getChildParent($idMember);
        $dataParent6 = $dataParent4->fetchAll();
        if (!(empty($dataParent6))) {
            foreach ($dataParent6 as $dataParent7) {
                $one_child = $dataParent7['idChildren'];
                $checkParent  = $userManager -> checkParent2($one_child, $idFamily)->fetchAll();
                var_dump($checkParent);
                if (count($checkParent) == 1) {
                    $bannChildren = $familyManager -> bannChildren($idFamily, $one_child);
                }
            }
        }
        $bann = $familyManager -> bannMember($idFamily, $idMember);
        header('Location:index.php?action=familyLink&id='.$_SESSION['family']);
    }
    // DELETE BANNER
    public function deleteBanner($idFamily){
        $familyManager = new \Src\Models\FamilyManager();
        $banner = "app/Public/uploads/banners/banniere.png";
        $deleteBanner = $familyManager -> eraseBanner($banner,$idFamily);
        header('Location:index.php?action=familyLink&id='.$_SESSION['family']);
    }
    // CHANGE FAMILY NAME
    public function changeFamilyName($family){
        $idFamily = $_SESSION['family'];
        $newFam = json_decode($family, true);
        $newName = htmlspecialchars($newFam['contentB']);
        $familyManager = new \Src\Models\FamilyManager();
        $changeFamilyName = $familyManager -> updateFamName($newName,$idFamily);
        return $family;
    }
    //*******************USER CONTACT************************
    public function contact($usernameContact, $mailContact, $titleContact, $contentContact)
    {
        $userManager = new \Src\Models\UserManager();
        $contact = $userManager -> contactDb($usernameContact, $mailContact, $titleContact, $contentContact);
        header('Location: index.php');
    }
    //*******************************************CREATECHILD VIEW**************************************************
    public function goToCreateChild()
    {
        require 'app/Views/frontend/createChild.php';
    }
    // CHILD CREATION
    public function addNewChild($children)
    {
        $idMember = $_SESSION['id'];
        $newChild = json_decode($children, true);
        $lastname = htmlspecialchars($newChild['lastname']);
        $firstname = htmlspecialchars($newChild['firstname']);
        $birthdate = htmlspecialchars($newChild['birthdate']);
        $parent1 = $_SESSION['firstname'];
        if ($lastname === "" || $firstname === "" || $parent1 ==="") {
            require 'app/Views/frontend/createChild.php';
        } else {
            $bulk = htmlspecialchars($newChild['bulk']);
            $bulkDate = htmlspecialchars($newChild['bulkDate']);
            $gender = htmlspecialchars($newChild['gender']);
            $favMeal = htmlspecialchars($newChild['favMeal']);
            $hatedMeal = htmlspecialchars($newChild['hatedMeal']);
            $allergies = htmlspecialchars($newChild['allergies']);
            $startDate = htmlspecialchars($newChild['startDate']);
            $username = $_SESSION['firstname'];
            $childManager = new \Src\Models\ChildManager();
            // identity
            $addNewChild = $childManager -> addChild($lastname, $firstname, $birthdate, $gender, $parent1, $username, $bulk, $bulkDate);
            $getIdChild = $childManager -> getMaxIdChild();
            $getIdChild = $getIdChild->fetch();
            $idChild = $getIdChild[0];
            // food
            $addNewMeal = $childManager -> addNewMeal($favMeal, $hatedMeal, $idChild);
            // allergy
            $addAllergy = $childManager -> addNewAllergy($allergies);
            $getIdAllergy = $childManager -> getMaxIdAllergy();
            $newGetIdAllergy = $getIdAllergy->fetch();
            $idAllergy = $newGetIdAllergy[0];
            $insertAllChild = $childManager -> insertAllChild($idAllergy, $idChild);
            // add parents & family
            $addToMyParent = $childManager -> addToMyParent($idChild, $idMember);
            $idFamily = $_SESSION['family'];
            if (!(empty($idFamily))) {
                $addToMyFamily = $childManager -> addToMyFamily($idChild, $idFamily);
            }
            // treatment
            if ($startDate != null) {
                $addTTT = $childManager -> addTTT($idChild, $startDate);
                $getIdTTT = $childManager -> getIdTTT();
                $getIdTTT = $getIdTTT->fetch();
                $idTTT = $getIdTTT[0];
                // meds
                foreach ($newChild['meds'] as $poso) {
                    $posology = htmlspecialchars($poso['posology']) ;
                    $idMeds = $poso['label'] ;
                    $newGlobalTTT = $childManager->newPoso($idTTT, $idMeds, $posology);
                }
            }
            return $children;
        }
    }
    // GO TO UPDATE CHILD
    public function goToUpdateChild($idChild)
    {
        $idMember = strval($_SESSION['id']);
        $userManager = new \Src\Models\UserManager();
        $checkParent = $userManager -> checkParent($idChild)->fetchAll();
        $checkParent2 = [];
        foreach ($checkParent as $parent) {
            array_push($checkParent2, $parent[0]);
        }
        $childManager = new \Src\Models\ChildManager();
        $connex5 = $childManager -> getIdFamilyByChild($idChild);
        $newConnex5 = $connex5->fetch();
        if (isset($_SESSION['id'])) {
            if (in_array($idMember, $checkParent2) || $_SESSION['family'] === $newConnex5['idFamily']) {
                $data = $childManager -> getChild($idChild);
                $connex2 = $childManager -> getMeals($idChild);
                // allergy
                $connex3 = $childManager -> getAllergy($idChild);
                $idMember = $_SESSION['id'];
                // treatment
                $getDateTTT = $childManager -> getDateTTT($idChild);
                $getDateTTT = $getDateTTT->fetch();
                $idTTT = $getDateTTT['idTTT'];
                // meds
                $getAllMedsChild = $childManager ->getAllMedsChild($idTTT);
                require 'app/Views/frontend/editChild.php';
            } else {
                throw new \Exception('Cette page n\'existe pas !');
            }
        } else {
            throw new \Exception('Cette page n\'existe pas !');
        }
    }
    //*****************************UPDATE CHILD***********************************
    public function updateChild($children)
    {
        $childManager = new \Src\Models\ChildManager();
        $newChild = json_decode($children, true);
        $lastname = htmlspecialchars($newChild['lastname']);
        $firstname = htmlspecialchars($newChild['firstname']);
        $birthdate = htmlspecialchars($newChild['birthdate']);
        $bulk = htmlspecialchars($newChild['bulk']);
        $bulkDate = htmlspecialchars($newChild['bulkDate']);
        $favMeal = htmlspecialchars($newChild['favMeal']);
        $hatedMeal = htmlspecialchars($newChild['hatedMeal']);
        $startDate = htmlspecialchars($newChild['startDate']);
        $idAllergy = $newChild['idAllergy'];
        $allergies = htmlspecialchars($newChild['allergies']);
        $idChild = $newChild['idChild'];
        $username = $_SESSION['firstname'];
        // id, meals, allergy
        $infos1 = $childManager -> updateOldChild($lastname, $firstname, $birthdate, $idChild, $username, $bulk, $bulkDate);
        $infos2 = $childManager -> updateOldMeal($favMeal, $hatedMeal, $idChild);
        $upDateAllergy = $childManager -> updateOldAllergy($allergies, $idAllergy);
        // treatment
        if ($startDate != null) {
            $addTTT = $childManager -> addTTT($idChild, $startDate);
            $getIdTTT = $childManager -> getIdTTT();
            $getIdTTT = $getIdTTT->fetch();
            $idTTT = $getIdTTT[0];
            // meds
            foreach ($newChild['meds'] as $poso) {
                $posology = htmlspecialchars($poso['posology']) ;
                $idMeds = $poso['label'] ;
                $newGlobalTTT = $childManager->newPoso($idTTT, $idMeds, $posology);
            }
        }
        return $children;
    }
    // STOP MEDICINE
    public function stopMeds($idChild)
    {
        $childManager = new \Src\Models\ChildManager();
        $stopMeds = $childManager -> stopMedicine($idChild);
        header('Location: index.php?action=goToUpdateChild&idChildren='.$idChild);
    }
   
    // DELETE CHILD
    public function deleteChild($idMember, $idChildren)
    {
        $childManager = new \Src\Models\ChildManager();
        $delete = $childManager -> EraseChild($idChildren);
        header('Location: index.php?action=memberView&idMember='.$idMember);
    }
    // BELONG PARENT TO CHILD
    public function belong($mailCo, $idChild)
    {
        $userManager = new \Src\Models\UserManager();
        $childManager = new \Src\Models\ChildManager();
        $belong0 = $userManager -> getBelongParent($mailCo);
        $belong1 = $belong0->fetch();
        $idMember = $belong1['idMember'];
        $firstname = $belong1['firstname'];
        $belong2 = $childManager -> addToMyParent($idChild, $idMember);
        $belong3 = $childManager -> addFirstnameToChild($firstname,$idChild);
        $getFamilyId = $userManager -> getFamilyId($idMember)->fetch();
        if ($getFamilyId != null) {
            $idFamily = $getFamilyId['idFamily'];
            $addToMyFamily = $childManager -> addToMyFamily($idChild, $idFamily);
        }
        header('Location: index.php?action=memberView&idMember='.$_SESSION['id']);
    }
    //********************OTHER REQUIRES***********************************
    // GO TO REGISTRATION FORM
    public function subView()
    {
        require 'app/Views/frontend/registrationView.php';
    }
    // GO TO HOME VIEW
    public function homeView()
    {
        require 'app/Views/frontend/homeView.php';
    }
    // GO TO MENTIONS
    public function goLegal()
    {
        require 'app/Views/frontend/legalView.php';
    }
    // GO TO ABOUT
    public function goAbout()
    {
        require 'app/Views/frontend/about.php';
    }
    //************************UPLOAD CHILD AVATAR******************************
    public function uploadPic($idMember, $idChildren)
    {
        $target_dir = "app/Public/uploads/";
        $target_file = $target_dir . $idChildren . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 1000000) {
                    throw new \Exception("Désolé, votre fichier est trop volumineux. ");
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                    throw new \Exception("Seuls les formats JPG, JPEG, PNG & GIF files sont authorisés. ");
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    throw new \Exception("Désolé, votre avatar n'a pu être envoyé.");
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $childManager = new \Src\Models\ChildManager();
                        $insertPicture = $childManager -> uploadPicture($target_file, $idChildren);
                        header('Location: index.php?action=memberView&idMember='.$idMember);
                    } else {
                        throw new \Exception("Désolé, une erreur est survenue dans l'envoi de votre fichier. ");
                    }
                }
            } else {
                throw new \Exception("Ce fichier n'est pas une image. ");
                $uploadOk = 0;
            }
        }
    }
    //*********************UPLOAD BANNER*****************************
    public function uploadBanners($idFamily)
    {
        $target_dir = "app/Public/uploads/banners/";
        $target_file = $target_dir . $idFamily . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 1000000) {
                    throw new \Exception("Désolé, votre fichier est trop volumineux. ");
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                    throw new \Exception("Seuls les formats JPG, JPEG, PNG & GIF files sont authorisés. ");
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    throw new \Exception("Désolé, votre avatar n'a pu être envoyé.");
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $familyManager = new \Src\Models\FamilyManager();
                        $insertPicture = $familyManager -> uploadBanner($target_file, $idFamily);
                        header('Location: index.php?action=familyLink&id='.$idFamily);
                    } else {
                        throw new \Exception("Désolé, une erreur est survenue dans l'envoi de votre fichier. ");
                    }
                }
            } else {
                throw new \Exception("Ce fichier n'est pas une image. ");
                $uploadOk = 0;
            }
        }
    }
    //*************************UPLOAD USER AVATAR*********************************
    public function uploadAvatar($idMember)
    {
        $target_dir = "app/Public/uploads/";
        $target_file = $target_dir . $idMember. basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 1000000) {
                    throw new \Exception("Désolé, votre fichier est trop volumineux. ");
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                    throw new \Exception("Seuls les formats JPG, JPEG, PNG & GIF files sont authorisés. ");
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    throw new \Exception("Désolé, votre avatar n'a pu être envoyé.");
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $userManager = new \Src\Models\UserManager();
                        $insertAvatar = $userManager -> insertAvatar($target_file, $idMember);
                        $this->recoverUser($idMember);
                    } else {
                        throw new \Exception("Désolé, une erreur est survenue dans l'envoi de votre fichier. ");
                    }
                }
            } else {
                throw new \Exception("Ce fichier n'est pas une image. ");
                $uploadOk = 0;
            }
        }
    }
    // AJAX MEDS
    public function ajaxMeds($autoC)
    {
        $childManager = new \Src\Models\ChildManager();
        $data = $childManager -> getAllMeds($autoC);
        header('Content-Type: application/json');
        $data = $data->fetchAll();
        echo json_encode($data);
    }

    // TEST PROFILE
    public function testProfile(){
        $idMember = $_SESSION['id'];
        $userManager = new \Src\Models\UserManager();
        $recoverUs = $userManager -> userById($idMember);
        if (isset($_SESSION['family'])) {
            $idFamily = $_SESSION['family'];
            $familyManager = new \Src\Models\FamilyManager();
            $getFamilyName = $familyManager -> getFamilyName($idFamily);
        }
        require 'app/Views/frontend/test4.php';
    }
public function saveBlog($memberBlog){
    $idMember = $_SESSION['id'];
    $memBlog = json_decode($memberBlog, true);
    $title = htmlspecialchars($memBlog['title']);
    $content = htmlspecialchars($memBlog['content']);
    $img = htmlspecialchars($memBlog['img']);
}

}

    // AJAX WEIGHTS
    // function getWeight(){
    //     $childManager = new \Src\Models\ChildManager();
    //     $getWeight = $childManager -> getPounds();
    //     header('Content-Type: application/json');
    //     $data = $getWeight->fetchAll();
    //     echo json_encode($data);
    // } 
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
