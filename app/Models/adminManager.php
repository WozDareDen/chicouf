<?php
//Defining Namespace
namespace Src\Models;
//AdminObject :
class AdminManager extends Manager
{   
    //*************MEMBER CONTROLS***********************/
    public function watchAllMembers(){
        $db = $this -> dbConnect(); 
        $data = $db->query('SELECT idMember,surname,firstname,city,registrationDate FROM members');
        return $data;
    }
    public function watchAllFamilies(){
        $db = $this -> dbConnect(); 
        $data = $db->query('SELECT * FROM family');
        return $data;
    }
    public function eraseMember($idBackMember){
        $db = $this -> dbConnect();
        $deleteMember = $db->prepare('DELETE FROM members WHERE idMember = ?');
        $deleteMember->execute(array($idBackMember));
        return $deleteMember;
    }
    public function eraseFamily($idBackFamily){
        $db = $this -> dbConnect();
        $deleteFamily = $db->prepare('DELETE FROM family WHERE idFamily = ?');
        $deleteFamily->execute(array($idBackFamily));
        return $deleteFamily;
    }
    //*******************************STATS***************************************/
    public function userStats(){
        $db = $this -> dbconnect();
        $useAll = $db->query('SELECT COUNT(*) FROM members');
        return $useAll;
    }
    public function childrenStats(){
        $db = $this -> dbConnect();
        $childrenAll = $db->query('SELECT COUNT(*) FROM children');
        return $childrenAll;
    }
    public function lastStatUser(){
        $db = $this -> dbConnect();
        $userInfos = $db->query('SELECT firstname, surname, DATE_FORMAT(registrationDate,\'%d\.%m\.%Y\') AS reg_date FROM members WHERE idMember IN(select MAX(idMember) FROM members)');
        return $userInfos;
    }
    public function familyStats(){
        $db = $this -> dbconnect();
        $famAll = $db->query('SELECT COUNT(*) FROM family');
        return $famAll;
    }
    //*******************************MAILS*************************************/
    public function getAllMails(){
        $db = $this -> dbConnect();
        $allMsg = $db->query('SELECT COUNT(*) FROM contact');
        return $allMsg;
    }   
    public function getMails(){
        $db = $this -> dbConnect();
        $dataMsg4 = $db->query('SELECT COUNT(*) FROM contact WHERE title=0');
        return $dataMsg4;
    }
    public function getMails2(){
        $db = $this -> dbConnect();
        $dataMsg5 = $db->query('SELECT COUNT(*) FROM contact WHERE title=1');
        return $dataMsg5;
    }
    public function getMails3(){
        $db = $this -> dbConnect();
        $dataMsg6 = $db->query('SELECT COUNT(*) FROM contact WHERE title=2');
        return $dataMsg6;
    }
    public function watchAllMsg(){
        $db = $this -> dbConnect();
        $dataMsg = $db->query('SELECT * FROM contact WHERE title=0');
        return $dataMsg;
    }
    public function watchAllMsg1(){
        $db = $this -> dbConnect();
        $dataMsg1 = $db->query('SELECT * FROM contact WHERE title=1');
        return $dataMsg1;
    }
    public function watchAllMsg2(){
        $db = $this -> dbConnect();
        $dataMsg2 = $db->query('SELECT * FROM contact WHERE title=2');
        return $dataMsg2;
    }
}