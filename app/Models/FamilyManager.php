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
}