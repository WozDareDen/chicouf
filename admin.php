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
            elseif ($_GET['action'] == 'membersList') {
                if(isset($_GET['p'])){
                    $cPage = $_GET['p'];
                }
                else{
                    $cPage = 1;
                }
                $backoffice->membersList($cPage);
            }
            elseif ($_GET['action'] == 'familiesList') {
                if(isset($_GET['p'])){
                    $cPage = $_GET['p'];
                }
                else{
                    $cPage = 1;
                }
                $backoffice->familiesList($cPage);
            }
            elseif($_GET['action'] == 'famPage'){
                $backoffice->goToFam();
            }
            elseif($_GET['action'] == 'deleteMember'){
                $idBackMember = htmlspecialchars($_POST['idBackMember']);
                $backoffice->deleteMember($idBackMember);
            }
            elseif($_GET['action'] == 'deleteFamily'){
                $idBackFamily = htmlspecialchars($_POST['idBackFamily']);
                $backoffice->deleteFamily($idBackFamily);
            }
            elseif($_GET['action'] == 'msgView'){
                $backoffice->msgView();
            }
            elseif($_GET['action'] == 'deleteMail'){
                if(isset($_GET['id'])){
                    $idMail = $_GET['id'];   
                    $backoffice->deleteMail($idMail);
                }
            }
            elseif($_GET['action'] == 'ajaxTest'){
                $backoffice->ajaxTest();
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