<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

try{
    $frontoffice = new \Src\Controllers\FrontOffice();
    if(isset($_POST)){
        $children = $_POST['data'];
        var_dump($children);
        $frontoffice->addNewChild($children);
    }
    else{
        var_dump($_POST['data']);
    }
}
catch(Exception $e){
    echo $e->getMessage();
}