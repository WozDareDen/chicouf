<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

try{
    $backoffice = new \Src\Controllers\BackOffice();
    if (isset($_GET['action'])) {
        if($_SESSION['modo']==2){       
        }
            if($_GET['action'] == 'dashboard'){
                $backoffice->goToDashboard();
            }
            elseif($_GET['action'] == 'deleteMember'){
                $idMember = $_GET['id'];
                $backoffice->deleteMember($idMember);
            }
            elseif($_GET['action'] == 'membersView'){
                $backoffice->watchMembers();
            }
        else{
            throw new \Exception ('vous n\'êtes pas administrateur');
        }
    }
    else{
        echo 'beurre';
    }
}
catch(Exception $e){
    echo $e->getMessage();
}