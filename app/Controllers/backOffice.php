<?php

namespace Src\Controllers;

class BackOffice{
    function goToDashboard(){
        $adminManager = new \Src\Models\AdminManager();
        $dataMsg = $adminManager -> watchAllMsg();
        $dataMsg1 = $adminManager -> watchAllMsg1();
        $dataMsg2 = $adminManager -> watchAllMsg2();

        require 'app/Views/backend/dashboard.php';
    }
    function watchFamilies(){
        $adminManager = new \Src\Models\AdminManager();
        $data = $adminManager -> watchAllFamilies();
        $famAll = $adminManager -> familyStats();
        require 'app/Views/backend/familiesView.php';
    }
    function deleteMember($idBackMember){
        $adminManager = new \Src\Models\AdminManager();
        $deleteMember = $adminManager -> eraseMember($idBackMember);
        require 'app/Views/backend/dashboard.php';
    }
    function deleteFamily($idBackFamily){
        $adminManager = new \Src\Models\AdminManager();
        $deleteFamily = $adminManager -> eraseFamily($idBackFamily);
        require 'app/Views/backend/dashboard.php';
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
    function watchMembers(){
        $adminManager = new \Src\Models\AdminManager();
        $useAll = $adminManager -> userStats();
        $userInfos = $adminManager -> lastStatUser();
        require 'app/Views/backend/membersView.php';
    }
    function ajaxTest(){
        $adminManager = new \Src\Models\AdminManager();
        $data = $adminManager -> watchAllMembers();
        header('Content-Type: application/json');
        $data = $data->fetchAll();
        echo json_encode($data);
    }

}