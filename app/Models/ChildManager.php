<?php
//Defining Namespace
namespace Src\Models;
//CommentsObject :
class ChildManager extends Manager
{
    //GET CHILD THROUGH MEMBER
    public function watchChild($idMember){
        $db = $this -> dbConnect(); 
        $data = $db->prepare('SELECT children.idChildren, member_children.idMember, surname, firstname, img, parent1, parent2, DATE_FORMAT(birthdate, \'%d/%m/%Y\') as new_birthdate FROM children INNER JOIN member_children ON member_children.idChildren = children.idChildren WHERE idMember = ? ORDER BY member_children.idChildren');
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
    public function addNewChild($lastName,$firstName,$birthdate,$gender,$parent1,$parent2){
        if($gender == 0){
            $img = 'app/Public/uploads/avatarBoy.png';
        }
        else{
            $img = 'app/Public/uploads/avatarGirl.png';
        }    
        $db = $this -> dbConnect();
        $infos1 = $db->prepare('INSERT INTO children(surname,firstname,birthdate,gender,parent1,parent2,img) VALUES(?,?,?,?,?,?,?)');
        $infos1->execute(array($lastName,$firstName,$birthdate,$gender, $parent1,$parent2,$img));
        return $infos1;
    }
    public function addNewMeal($favMeal,$hatedMeal,$idChild){
        $db = $this -> dbConnect();
        $infos2 = $db->prepare('INSERT INTO meals(favorite_meal,hated_meal,idChildren) VALUES(?,?,?)');
        $infos2->execute(array($favMeal,$hatedMeal,$idChild));
        return $infos2;
    }
    public function addNewHealth($meds,$allergies,$idChild){
        $db = $this -> dbConnect();
        $infos3 = $db->prepare('INSERT INTO health(meds,allergies,idChildren) VALUES(?,?,?)');
        $infos3->execute(array($meds,$allergies,$idChild));
        return $infos3;
    }
    // CHILD UPDATES
    public function updateOldChild($lastName,$firstName,$birthdate,$parent1,$parent2, $idChildren){
        $db = $this -> dbConnect();
        $infos1 = $db->prepare('UPDATE children SET surname=?, firstname=?, birthdate=?, parent1=? ,parent2=? WHERE idChildren = ?');
        $infos1->execute(array($lastName,$firstName,$birthdate,$parent1,$parent2,$idChildren));
        return $infos1;
    }
    public function updateOldMeal($favMeal,$hatedMeal,$idChildren){
        $db = $this -> dbConnect();
        $infos2 = $db->prepare('UPDATE meals SET favorite_meal=?, hated_meal=? WHERE idChildren=?');
        $infos2->execute(array($favMeal,$hatedMeal,$idChildren));
        return $infos2;
    }
    public function updateOldHealth($meds,$allergies,$idChildren){
        $db = $this -> dbConnect();
        $infos3 = $db->prepare('UPDATE health SET meds=?, allergies=? WHERE idChildren=?');
        $infos3->execute(array($meds,$allergies,$idChildren));
        return $infos3;
    }
    // DELETE CHILD
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
    // GET CHILD INFOS THROUGH CHILD
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
    // CHECK YOUR KIDS
    public function getIdMember($idChild,$idMember){
        $db = $this -> dbConnect();
        $connex4 = $db->prepare('SELECT idMember FROM member_children WHERE idChildren = ? AND idMember = ?');
        $connex4->execute(array($idChild,$idMember));
        return $connex4;
    }
    // UPLOAD PICTURE
    public function uploadPicture($target_file,$idChildren){
        $db = $this -> dbConnect();
        $insertPicture = $db->prepare('UPDATE children SET img=? WHERE idChildren= ?');
        $insertPicture->execute(array($target_file, intval($idChildren)));
        return $insertPicture;
    }
    // ADD TO PARENT
    public function addToMyParent($idChild,$idMember){
        $db = $this -> dbConnect();
        $req = $db->prepare('INSERT INTO member_children(idMember,idChildren) VALUES(?,?)');
        $req->execute(array($idMember, $idChild));
        return $req;
    }
    // ADD TO FAMILY
    public function addToMyFamily($idChild, $idFamily){
        $db = $this -> dbConnect();
        $request = $db->prepare('INSERT INTO family_children(idFamily, idChildren) VALUES(?,?)');
        $request->execute(array($idFamily,$idChild));
        return $request;
    }
}