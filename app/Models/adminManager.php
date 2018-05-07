<?php
//Defining Namespace
namespace Src\Models;
//AdminObject :
class AdminManager extends Manager
{   
    //*************MEMBER CONTROLS***********************/
    private $perPage = 10;
    private $cPage = 1;

    public function nbPage(){
        $db = $this->dbConnect();
        $reqPage = $db->query('SELECT COUNT(*) AS total FROM members');
        $result = $reqPage->fetch();
        $total = $result['total'];
        $nbPage = ceil($total/$this->perPage);
        return $nbPage;
    }
    public function nbPage2(){
        $db = $this->dbConnect();
        $reqPage = $db->query('SELECT COUNT(*) AS total FROM family');
        $result = $reqPage->fetch();
        $total = $result['total'];
        $nbPage = ceil($total/$this->perPage);
        return $nbPage;
    }
    public function watchAllMembers($cPage){
        $this->cPage = $cPage;
        $db = $this -> dbConnect(); 
        $data = $db->query("SELECT idMember,surname,firstname,city, DATE_FORMAT(registrationDate, \"%d/%m/%Y\") as new_regDate FROM members ORDER BY idMember ASC LIMIT ".(($this->cPage-1)*$this->perPage).", $this->perPage");
        return $data;
    }
    public function watchAllFamilies($cPage){
        $this->cPage = $cPage;
        $db = $this -> dbConnect(); 
        $data = $db->query("SELECT * FROM family ORDER BY idFamily ASC LIMIT ".(($this->cPage-1)*$this->perPage).", $this->perPage");
        return $data;
    }
    public function nbMembers($idFamily){
        $db = $this -> dbConnect();
        $nbMembers = $db-prepare('SELECT COUNT(idMember) FROM member_family WHERE idFamily=?');
        $nbMembers->execute(array($idFamily));
        return $nbMembers;
    }
    public function nbChildren($idFamily){
        $db = $this -> dbConnect();
        $nbChildren = $db-prepare('SELECT COUNT(idChildren) FROM member_family WHERE idFamily=?');
        $nbChildren->execute(array($idFamily));
        return $nbChildren;
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
    public function deleteContact($idMail){
        $db = $this -> dbConnect();
        $deleteMail = $db->prepare('DELETE FROM contact WHERE idContact = ?');
        $deleteMail->execute(array($idMail));
        return $deleteMail;
    }
}