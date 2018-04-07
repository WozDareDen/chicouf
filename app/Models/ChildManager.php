<?php
//Defining Namespace
namespace Src\Models;
//CommentsObject :
class ChildManager extends Manager
{
public function watchChild($idMember){
    $db = $this -> dbConnect(); 
    $data = $db->prepare('SELECT children.idChildren, member_children.idMember, Surname, Firstname, img, Parent1, Parent2, DATE_FORMAT(Birthdate, \'%d/%m/%Y\') as new_birthdate FROM children INNER JOIN member_children ON member_children.idChildren = children.idChildren WHERE idMember = ? ORDER BY member_children.idChildren');
    $data->execute(array($idMember));
    return $data;
}
public function getMealsInfos($idMember){
    $db = $this -> dbConnect();
    $connex2 = $db->prepare('SELECT * FROM meals INNER JOIN member_children ON member_children.idChildren = meals.idChildren WHERE idMember = ? ORDER BY member_children.idChildren');
    $connex2->execute(array($idMember));
    return $connex2;
}
public function getHealthInfos($idMember){
    $db = $this -> dbConnect();
    $connex3 = $db->prepare('SELECT * FROM health INNER JOIN member_children ON member_children.idChildren = health.idChildren WHERE idMember = ? ORDER BY member_children.idChildren');
    $connex3->execute(array($idMember));
    return $connex3;
}
// CHILD CREATION
public function addNewChild($lastName,$firstName,$birthdate,$parent1,$parent2){
    $db = $this -> dbConnect();
    $infos1 = $db->prepare('INSERT INTO children(Surname,Firstname,Birthdate,Parent1,Parent2) VALUES(?,?,?,?,?)');
    $infos1->execute(array($lastName,$firstName,$birthdate,$parent1,$parent2));
    return $infos1;
}
public function addNewMeal($favMeal,$hatedMeal,$idChild){
    $db = $this -> dbConnect();
    $infos2 = $db->prepare('INSERT INTO meals(Favorite_meal,Hated_meal,idChildren) VALUES(?,?,?)');
    $infos2->execute(array($favMeal,$hatedMeal,$idChild));
    return $infos2;
}
public function addNewHealth($meds,$allergies,$idChild){
    $db = $this -> dbConnect();
    $infos3 = $db->prepare('INSERT INTO health(meds,allergies,idChildren) VALUES(?,?,?)');
    $infos3->execute(array($meds,$allergies,$idChild));
    return $infos3;
}
// CHILD UPDATE
public function updateOldChild($lastName,$firstName,$birthdate,$parent1,$parent2, $idChildren){
    $db = $this -> dbConnect();
    $infos1 = $db->prepare('UPDATE children SET Surname=?, Firstname=?, Birthdate=?, Parent1=? ,Parent2=? WHERE idChildren = ?');
    $infos1->execute(array($lastName,$firstName,$birthdate,$parent1,$parent2,$idChildren));
    return $infos1;
}
public function updateOldMeal($favMeal,$hatedMeal,$idChildren){
    $db = $this -> dbConnect();
    $infos2 = $db->prepare('UPDATE meals SET Favorite_meal=?, Hated_meal=? WHERE idChildren=?');
    $infos2->execute(array($favMeal,$hatedMeal,$idChildren));
    return $infos2;
}
public function updateOldHealth($meds,$allergies,$idChildren){
    $db = $this -> dbConnect();
    $infos3 = $db->prepare('UPDATE health SET meds=?, allergies=? WHERE idChildren=?');
    $infos3->execute(array($meds,$allergies,$idChildren));
    return $infos3;
}
public function eraseChild($idChildren){
    $db = $this -> dbConnect();
    $delete = $db->prepare('DELETE FROM children WHERE idChildren = ?');
    $delete->execute(array($idChildren));
    return $delete;
}



public function getMaxIdChild(){
    $db = $this -> dbConnect();
    $infos11 = $db->query('SELECT MAX(idChildren) FROM children');
    return $infos11;
}
public function getChild($idChild){
    $db = $this -> dbConnect(); 
    $data = $db->prepare('SELECT * FROM children INNER JOIN member_children ON member_children.idChildren = children.idChildren WHERE member_children.idChildren = ?');
    $data->execute(array($idChild));
    return $data;
}
public function getMeals($idChild){
    $db = $this -> dbConnect();
    $connex2 = $db->prepare('SELECT * FROM meals WHERE idChildren = ?');
    $connex2->execute(array($idChild));
    return $connex2;
}
public function getHealth($idChild){
    $db = $this -> dbConnect();
    $connex3 = $db->prepare('SELECT * FROM health WHERE idChildren = ?');
    $connex3->execute(array($idChild));
    return $connex3;
}
public function uploadPicture($target_file,$idChildren){
    $db = $this -> dbConnect();
    $insertPicture = $db->prepare('UPDATE children SET img=? WHERE idChildren= ?');
    $insertPicture->execute(array($target_file, intval($idChildren)));
    return $insertPicture;
}
}