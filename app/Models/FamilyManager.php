<?php
//Defining Namespace
namespace Src\Models;
//FamilyObject :
class FamilyManager extends Manager{

    private $perPage = 5;
    private $cPage = 1;

    public function getfamilyId($idMember){
        $db = $this -> dbConnect();
        $dataFam = $db->prepare('SELECT idFamily FROM member_family WHERE idMember = ?');
        $dataFam->execute(array($idMember));
        $dataFam2 = $dataFam->fetch();
        return $dataFam2;
    }
    public function getImgFamily($idFamily){
        $db = $this -> dbConnect();
        $dataFam6 = $db->prepare('SELECT * FROM family WHERE idFamily = ?');
        $dataFam6->execute(array($idFamily));
        $dataFam6A = $dataFam6->fetch();
        return $dataFam6A;
    }
    public function watchFamily($idFamily){
        $db = $this -> dbConnect(); 
        $dataF = $db->prepare('SELECT children.idChildren, family_children.idFamily, surname, firstname, img, parent1, parent2, gender, bulk, DATE_FORMAT(bulkDate,\'%d/%m/%Y\')  as new_bulkDate,DATE_FORMAT(birthdate, \'%d/%m/%Y\') as new_birthdate FROM children INNER JOIN family_children ON family_children.idChildren = children.idChildren WHERE idFamily = ? ORDER BY children.birthdate');
        $dataF->execute(array($idFamily));
        return $dataF;
    }
    public function watchFamilyMeals($idFamily){
        $db = $this -> dbConnect();
        $dataF2 = $db->prepare('SELECT * FROM meals INNER JOIN family_children ON family_children.idChildren = meals.idChildren WHERE idFamily = ? ORDER BY family_children.idChildren');
        $dataF2->execute(array($idFamily));
        return $dataF2;
    }
    public function getFamilyName($idFamily){
        $db = $this -> dbConnect();
        $dataF4 = $db->prepare('SELECT * FROM family WHERE idFamily = ?');
        $dataF4->execute(array($idFamily));
        $dataF42 = $dataF4->fetch();
        return $dataF42;
    }
    public function watchMembersFamily($idFamily){
        $db = $this -> dbConnect();
        $dataMember = $db->prepare('SELECT members.idMember,firstname,surname,city, gender, modo, DATE_FORMAT(registrationDate, \'%d/%m/%Y\') as new_regDate,parenthood,img,mail,DATE_FORMAT(birthdate, \'%d/%m/%Y\') as new_birthdate FROM members INNER JOIN member_family ON member_family.idMember = members.idMember WHERE idFamily = ? ORDER BY birthdate');
        $dataMember->execute(array($idFamily));
        return $dataMember;
    }
    public function watchModo($idFamily){
        $db = $this -> dbConnect();
        $dataF7 = $db->prepare('SELECT firstname FROM `members` INNER JOIN member_family ON member_family.idMember = members.idMember WHERE member_family.idFamily = ? AND members.modo >0');
        $dataF7->execute(array($idFamily));
        return $dataF7;
    }
    public function getMembers($idFamily,$cPage){
        $this->cPage = $cPage;
        $db = $this -> dbConnect();
        $dataModo = $db->prepare('SELECT firstname, surname, mail FROM members INNER JOIN member_family ON member_family.idMember = members.idMember WHERE idFamily = ? ORDER BY birthdate ASC LIMIT '.(($this->cPage-1)*$this->perPage).", $this->perPage");
        $dataModo->execute(array($idFamily));
        return $dataModo;
    }
    public function checkMember($idFamily){
        $db = $this -> dbConnect();
        $checkMember = $db->prepare('SELECT mail FROM `members` INNER JOIN member_family ON member_family.idMember = members.idMember WHERE member_family.idFamily = ?');
        $checkMember->execute(array($idFamily));
        return $checkMember;
    }
    public function nbPage($idFamily){
        $db = $this->dbConnect();
        $reqPage = $db->prepare('SELECT COUNT(*) AS total FROM members INNER JOIN member_family ON member_family.idMember = members.idMember WHERE idFamily = ? ');
        $reqPage->execute(array($idFamily));
        $result = $reqPage->fetch();
        $total = $result['total'];
        $nbPage = ceil($total/$this->perPage);
        return $nbPage;
    }
    public function getUrl($idFamily,$idFamily2){
        $db = $this->dbConnect();
        $getUrl = $db->prepare('SELECT img,firstname FROM members JOIN member_family ON member_family.idMember = members.idMember WHERE idFamily = ? UNION SELECT img,firstname FROM children JOIN family_children ON family_children.idChildren = children.idChildren WHERE idFamily = ?');
        $getUrl->execute(array($idFamily,$idFamily2));
        return $getUrl;
    }
    // ADD PARENT AND CHILDREN TO FAMILY
    public function getParentId($mailCoParent){
        $db = $this -> dbConnect();    
        $dataParent = $db->prepare('SELECT idMember FROM members WHERE mail = ?');
        $dataParent->execute(array($mailCoParent));
        return $dataParent;
    } 
    public function belongParent($idMember,$idFamily){
        $db = $this -> dbConnect();
        $dataParent3 = $db->prepare('INSERT INTO member_family(idMember,idFamily) VALUES(?,?)');
        $dataParent3->execute(array($idMember,$idFamily));
        return $dataParent3;
    }
    public function getChildParent($idMember){
        $db = $this -> dbConnect();
        $dataParent4 = $db->prepare('SELECT idChildren FROM member_children WHERE idMember = ?');
        $dataParent4->execute(array($idMember));
        return $dataParent4;
    }
    public function belongChild($idFamily,$idChild){
        $db = $this -> dbConnect();
        $dataParent5 = $db->prepare('INSERT INTO family_children(idFamily,idChildren) VALUES(?,?)');
        $dataParent5->execute(array($idFamily,$idChild));
        return $dataParent5;
    }
    public function checkFamChild($idFamily,$idChild){
        $db = $this -> dbConnect();
        $dataParent7 = $db->prepare('SELECT * FROM family_children WHERE idFamily = ? AND idChildren = ?');
        $dataParent7->execute(array($idFamily,$idChild));
        return $dataParent7;
    }
    // CREATE FAMILY
    public function newFamily($familyName){
        $db = $this -> dbConnect();
        $banner = 'app/Public/uploads/banners/banniere.png';
        $createfamily = $db->prepare('INSERT INTO family(familyName,banner) VALUES(?,?)');
        $createfamily->execute(array($familyName,$banner));
        return $createfamily;
    }
    public function getIdFamily($idMember){
        $db = $this -> dbConnect();        
        $getNewFamilyId = $db->query('SELECT MAX(idFamily) FROM family');
        return $getNewFamilyId;
    }
    public function parentFamilyLink($idMember,$idFamily){
        $db = $this -> dbConnect();
        $newFamily = $db->prepare('INSERT INTO member_family(idMember, idFamily) VALUES(?,?)');
        $newFamily->execute(array($idMember,$idFamily));
        return $newFamily;
    }
    public function feWords($idFamily){
        $db = $this -> dbConnect();
        $feWords = $db->prepare('SELECT words FROM members JOIN member_family ON member_family.idMember = members.idMember WHERE member_family.idFamily = ?');
        $feWords->execute(array($idFamily));
        return $feWords;
    }
    // FIRST MODO
    public function newModo($idMember){
        $db = $this -> dbConnect();
        $goModo = $db->prepare('UPDATE members set modo=1 WHERE idMember = ?');
        $goModo->execute(array($idMember));
        return $goModo;
    }
    // ADD MODO
    public function insertNewModo($mailNewModo){
        $db = $this -> dbConnect();
        $newModo = $db->prepare('UPDATE members set modo=1 WHERE mail = ?');
        $newModo->execute(array($mailNewModo));
        return $newModo;
    }
    // CHECK MODO
    public function checkModo($idFamily){
        $db = $this -> dbConnect();
        $checkModo = $db->prepare('SELECT firstname,mail FROM members INNER JOIN member_family ON member_family.idMember = members.idMember WHERE idFamily = ? AND modo > 0');
        $checkModo->execute(array($idFamily));
        return $checkModo;
    }
    // BANN MEMBER
    public function bannMember($idFamily,$idMember){
        $db = $this -> dbConnect();
        $bann = $db->prepare('DELETE FROM member_family WHERE idFamily = ? AND idMember = ?');
        $bann->execute(array($idFamily,$idMember));
        return $bann;
    }
    // BANN CHILDREN
    public function bannChildren($idFamily, $one_child){
        $db = $this -> dbConnect();
        $bannChildren = $db->prepare('DELETE FROM family_children WHERE idFamily = ? AND idChildren = ?');
        $bannChildren->execute(array($idFamily, $one_child));
        return $bannChildren;
    }
    // DELETE FAMILY
    public function eraseFamily($idFamily){
        $db = $this -> dbConnect();
        $eraseFamily = $db->prepare('DELETE FROM family WHERE idFamily = ?');
        $eraseFamily->execute(array($idFamily));
        return $eraseFamily;
    }
    // UPLOAD BANNER
    public function uploadBanner($target_file,$idFamily){
        $db = $this -> dbConnect();
        $insertPicture = $db->prepare('UPDATE family SET banner=? WHERE idFamily= ?');
        $insertPicture->execute(array($target_file, intval($idFamily)));
        return $insertPicture;
    }
    // DELETE BANNER
    public function eraseBanner($banner,$idFamily){
        $db = $this -> dbConnect();
        $deleteBanner = $db->prepare('UPDATE family SET banner=? WHERE idFamily=?');
        $deleteBanner->execute(array($banner,$idFamily));
        return $deleteBanner;
    }
    // MODO STATS
    public function countUsers($idFamily){
        $db = $this -> dbConnect();
        $dataModoFam = $db->prepare('SELECT COUNT(idMember) FROM member_family WHERE idFamily=?');
        $dataModoFam->execute(array($idFamily));
        return $dataModoFam;
    }
    public function countKids($idFamily){
        $db = $this -> dbConnect();
        $dataModoFam2 = $db->prepare('SELECT COUNT(idChildren) FROM family_children WHERE idFamily=?');
        $dataModoFam2->execute(array($idFamily));
        return $dataModoFam2;
    }
    public function updateFamName($newName,$idFamily){
        $db = $this -> dbConnect();
        $changeFamilyName = $db->prepare('UPDATE family SET familyName = ? WHERE idFamily = ?');
        $changeFamilyName->execute(array($newName,$idFamily));
        return $changeFamilyName;
    }
    // public function getFamNames($idMember){
    //     $db = $this -> dbConnect();
    //     $getFamNames = $db->prepare('SELECT familyName from family INNER JOIN member_family ON member_family.idFamily = family.idFamily WHERE idMember=?');
    //     $getFamNames->execute(array($idMember));
    //     return $getFamNames;
    // }

}