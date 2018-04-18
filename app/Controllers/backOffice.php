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
    function watchMembers(){
        $adminManager = new \Src\Models\AdminManager();
        $data = $adminManager -> watchAllMembers();

        require 'app/Views/backend/membersView.php';
    }
    function deleteMember($idMember){
        $adminManager = new \Src\Models\AdminManager();
        $deleteMember = $adminManager -> eraseMember($idMember);
        header('Location: admin.php?action=dashboard.php');
    }









}