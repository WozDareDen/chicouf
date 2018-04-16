<?php
//Defining Namespace
namespace Src\Models;
//UserObject :
class FamilyManager extends Manager{
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
        $dataF = $db->prepare('SELECT children.idChildren, family_children.idFamily, surname, firstname, img, parent1, parent2, DATE_FORMAT(birthdate, \'%d/%m/%Y\') as new_birthdate FROM children INNER JOIN family_children ON family_children.idChildren = children.idChildren WHERE idFamily = ? ORDER BY children.idChildren');
        $dataF->execute(array($idFamily));
        return $dataF;
    }
    public function watchFamilyMeals($idFamily){
        $db = $this -> dbConnect();
        $dataF2 = $db->prepare('SELECT * FROM meals INNER JOIN family_children ON family_children.idChildren = meals.idChildren WHERE idFamily = ? ORDER BY family_children.idChildren');
        $dataF2->execute(array($idFamily));
        return $dataF2;
    }
    public function watchFamilyHealth($idFamily){
        $db = $this -> dbConnect();
        $dataF3 = $db->prepare('SELECT * FROM health INNER JOIN family_children ON family_children.idChildren = health.idChildren WHERE idFamily = ? ORDER BY family_children.idChildren');
        $dataF3->execute(array($idFamily));
        return $dataF3;
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
        $dataMember = $db->prepare('SELECT * FROM members INNER JOIN member_family ON member_family.idMember = members.idMember WHERE idFamily = ? ');
        $dataMember->execute(array($idFamily));
        return $dataMember;
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
    // CREATE FAMILY
    public function newFamily($familyName){
        $db = $this -> dbConnect();
        $createfamily = $db->prepare('INSERT INTO family(familyName) VALUES(?)');
        $createfamily->execute(array($familyName));
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
    public function newModo($idMember){
        $db = $this -> dbConnect();
        $goModo = $db->prepare('UPDATE members set modo=1 WHERE idMember = ?');
        $goModo->execute(array($idMember));
        return $goModo;
    }
    // UPLOAD BANNER
    public function uploadBanner($target_file,$idFamily){
        $db = $this -> dbConnect();
        $insertPicture = $db->prepare('UPDATE family SET img=? WHERE idFamily= ?');
        $insertPicture->execute(array($target_file, intval($idFamily)));
        return $insertPicture;
    }
}