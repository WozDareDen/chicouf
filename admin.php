<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

try{
    $backoffice = new \Src\Controllers\BackOffice();

    if (isset($_GET['action'])) {
        if(isset($_SESSION['id']) && $_SESSION['modo'] == 2){       
       
            if($_GET['action'] == 'dashboard'){
                $backoffice->goToDashboard();
            }
            elseif($_GET['action'] == 'deleteMember'){
                $idBackMember = htmlspecialchars($_POST['idBackMember']);
                $backoffice->deleteMember($idBackMember);
            }
            elseif($_GET['action'] == 'deleteFamily'){
                $idBackFamily = htmlspecialchars($_POST['idBackFamily']);
                $backoffice->deleteFamily($idBackFamily);
            }
            elseif($_GET['action'] == 'membersView'){
                $backoffice->watchMembers();
            }
            elseif($_GET['action'] == 'familiesView'){
                $backoffice->watchFamilies();
            }
            elseif($_GET['action'] == 'msgView'){
                $backoffice->msgView();
            }
            else{
                throw new \Exception ('cette page n\'existe pas');
            }
    }
}
    else{
        header('Location: index.php');
    }
}
catch(Exception $e){
    echo $e->getMessage();
}