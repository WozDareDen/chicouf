<?php

namespace Src\Controllers;

class BackOffice{
    function goToDashboard(){
        $adminManager = new \Src\Models\AdminManager();
        $msgAll = $adminManager -> getAllMails()->fetch();
        $famAll = $adminManager -> familyStats()->fetch();
        $useAll = $adminManager -> userStats()->fetch();
        $childrenAll = $adminManager -> childrenStats()->fetch();
        require 'app/Views/backend/dashboard.php';
    }
    function membersList($cPage){
        $adminManager = new \Src\Models\AdminManager();
        $numPage = $adminManager->nbPage();
            if( !($cPage>0 && $cPage<=$numPage)){
                $cPage = 1;
            }
        $data = $adminManager->watchAllMembers($cPage);
        $useAll = $adminManager -> userStats();
        $userInfos = $adminManager -> lastStatUser();
        require 'app/Views/backend/membersView.php';
    }
    function familiesList($cPage){
        $adminManager = new \Src\Models\AdminManager();
        $numPage = $adminManager->nbPage2();
        if( !($cPage>0 && $cPage<=$numPage)){
            $cPage = 1;
        }
        $data = $adminManager -> watchAllFamilies($cPage);
        $allFamiliesId = $adminManager -> getFamilies();
        $dataFamily = $allFamiliesId->fetchAll();
        $nbMembers = [];
        $nbChildren = [];           
        foreach($dataFamily as $one_family){
            $idFamily = $one_family['idFamily'];
           array_push($nbMembers,  $adminManager -> nbMembers($idFamily)->fetch())  ;
           array_push($nbChildren,  $adminManager -> nbChildren($idFamily)->fetch())  ;                   
        }
        $famAll = $adminManager -> familyStats();
        
        require 'app/Views/backend/familiesView.php';
    }
    function deleteMember($idBackMember){
        $adminManager = new \Src\Models\AdminManager();
        $deleteMember = $adminManager -> eraseMember($idBackMember);
        header('Location: admin.php?action=dashboard');
    }
    function deleteFamily($idBackFamily){
        $adminManager = new \Src\Models\AdminManager();
        $deleteFamily = $adminManager -> eraseFamily($idBackFamily);
        header('Location: admin.php?action=dashboard');
    }
    function msgView(){
        $adminManager = new \Src\Models\AdminManager();
        $dataMsg = $adminManager -> watchAllMsg();
        $dataMsg1 = $adminManager -> watchAllMsg1();
        $dataMsg2 = $adminManager -> watchAllMsg2();
        $dataMsg4 = $adminManager -> getMails();
        $dataMsg5 = $adminManager -> getMails2();
        $dataMsg6 = $adminManager -> getMails3();
        require 'app/Views/backend/msgView.php';
    }
    function deleteMail($idMail){
        $adminManager = new \Src\Models\AdminManager();
        $deleteMail = $adminManager -> deleteContact($idMail);
        header('Location: admin.php?action=msgView');
    }
    function goToWriteStuff(){
        $adminManager = new \Src\Models\AdminManager();
        $getStuff = $adminManager -> getStuff()->fetchAll();
        require 'app/Views/backend/aReminder.php';
    }
    function addNewTips($writings){
        $idAdmin = $_SESSION['id'];
        $content = json_decode($writings,true);
        $tips = $content['contentA'];
        $adminManager = new \Src\Models\AdminManager();
        $inserTips = $adminManager -> inserTips($tips,$idAdmin);
        return $writings;
    }
    function deleteNote($idNote){
        $adminManager = new \Src\Models\AdminManager();
        $deleteNote = $adminManager -> eraseNote($idNote);
        header('Location: admin.php?action=goToWriteStuff');
    }
    // function ajaxTest(){
    //     $adminManager = new \Src\Models\AdminManager();
    //     $data = $adminManager -> watchAllMembers();
    //     header('Content-Type: application/json');
    //     $data = $data->fetchAll();
    //     echo json_encode($data);
    // }
}