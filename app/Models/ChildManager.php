<?php
//Defining Namespace
namespace Src\Models;
//ChildObject :
class ChildManager extends Manager
{
    //GET CHILD THROUGH MEMBER
    public function watchChild($idMember){
        $db = $this -> dbConnect(); 
        $data = $db->prepare('SELECT children.idChildren, member_children.idMember, surname, firstname, img, parent1, parent2, upDateUser, DATE_FORMAT(upDateLog, \'%d/%m/%Y à %Hh%i\') as new_upDateLog,  DATE_FORMAT(birthdate, \'%d/%m/%Y\') as new_birthdate FROM children INNER JOIN member_children ON member_children.idChildren = children.idChildren WHERE idMember = ? ORDER BY member_children.idChildren');
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
    public function addChild($lastName,$firstName,$birthdate,$gender,$parent1,$parent2,$upDateUser){
        if($gender == 0){
            $img = 'app/Public/uploads/avatarBoy.png';
        }
        else{
            $img = 'app/Public/uploads/avatarGirl.png';
        }    
        $db = $this -> dbConnect();
        $infos1 = $db->prepare('INSERT INTO children(surname,firstname,birthdate,gender,parent1,parent2,img,upDateLog,upDateUser) VALUES(?,?,?,?,?,?,?,NOW(),?)');
        $infos1->execute(array($lastName,$firstName,$birthdate,$gender, $parent1,$parent2,$img,$upDateUser));
        return $infos1;
    }
    // FOOD
    public function addNewMeal($favMeal,$hatedMeal,$idChild){
        $db = $this -> dbConnect();
        $infos2 = $db->prepare('INSERT INTO meals(favorite_meal,hated_meal,idChildren) VALUES(?,?,?)');
        $infos2->execute(array($favMeal,$hatedMeal,$idChild));
        return $infos2;
    }
    // ALLERGIES
    public function addNewAllergy($allergies){
        $db = $this -> dbConnect();
        $infos3 = $db->prepare('INSERT INTO allergy(content) VALUES(?)');
        $infos3->execute(array($allergies));
        return $infos3;
    }
    public function getMaxIdAllergy(){
        $db = $this -> dbConnect();
        $infos44 = $db->query('SELECT MAX(idAllergy) FROM allergy');
        return $infos44;
    }
    public function insertAllChild($idAllergy,$idChild){
        $db = $this -> dbConnect();
        $insertAllChild = $db->prepare('INSERT INTO children_allergy(idChildren,idAllergy) VALUES(?,?)');
        $insertAllChild->execute(array($idChild,$idAllergy));
        return $insertAllChild;
    }   
    // TREATMENT
    public function addNewTTT($start,$idChild){
        $db = $this -> dbConnect();
        $addTTT = $db->prepare('INSERT INTO treatment(startDate,idChildren) VALUES(?,?)');
        $addTTT->execute(array($start,$idChild));
        return $addTTT;
    }
    public function getIdMeds($newMeds){
        $db = $this -> dbConnect();
        $getIdMeds = $db->prepare('SELECT idMeds FROM meds WHERE title=?');
        $getIdMeds->execute(array($newMeds));
        return $getIdMeds;
    }  
    public function newPoso($idTTT,$idMeds,$newPoso){
        $db = $this -> dbConnect();
        $newGlobalTTT= $db->prepare('INSERT INTO posology(idMeds,idTTT,content');
        $newGlobalTTT->execute(array($idMeds,$idTTT,$newPoso));
        return $newGlobalTTT;
    }
    public function getMaxIdTTT(){
        $db = $this -> dbConnect();
        $getIdTTT = $db->query('SELECT MAX(idTTT) FROM treatment');
        return $getIdTTT;
    }
    // FREQUENCE
    public function addNewFreq($freq,$idMeds,$idTTT){
        $db = $this -> dbConnect();
        $addFreq = $db->prepare('INSERT INTO posology(idMeds,idTTT,content) VALUES(?,?,?)');
        $addFreq->execute(array($idMeds,$idTTT,$freq));
        return $addFreq;
    }
    // CHILD UPDATES
    public function getIdFamilyByChild($idChild){
        $db = $this -> dbConnect();
        $connex5 = $db->prepare('SELECT idFamily FROM family_children WHERE idChildren = ?');
        $connex5->execute(array($idChild));
        return $connex5;
    }
    public function updateOldChild($lastName,$firstName,$birthdate,$parent1,$parent2, $idChildren, $username){
        $db = $this -> dbConnect();
        $infos1 = $db->prepare('UPDATE children SET surname=?, firstname=?, birthdate=?, parent1=? ,parent2=?, upDateLog=NOW(), upDateUser=? WHERE idChildren = ?');
        $infos1->execute(array($lastName,$firstName,$birthdate,$parent1,$parent2,$username,$idChildren));
        return $infos1;
    }
    // FOOD
    public function updateOldMeal($favMeal,$hatedMeal,$idChildren){
        $db = $this -> dbConnect();
        $infos2 = $db->prepare('UPDATE meals SET favorite_meal=?, hated_meal=? WHERE idChildren=?');
        $infos2->execute(array($favMeal,$hatedMeal,$idChildren));
        return $infos2;
    }
    public function updateOldHealth($meds,$poso,$allergies,$idChildren){
        $db = $this -> dbConnect();
        $infos3 = $db->prepare('UPDATE health SET meds=?, posology=?, allergies=? WHERE idChildren=?');
        $infos3->execute(array($meds,$poso,$allergies,$idChildren));
        return $infos3;
    }
    // allergy
    public function updateOldAllergy($allergies,$idAllergy){
        $db = $this -> dbConnect();
        $infos4 = $db->prepare('UPDATE allergy SET content = ? WHERE idAllergy = ?');
        $infos4->execute(array($allergies,$idAllergy));
        return $infos4;
    }
    // treatment
    public function updateOldTTT($idTTT,$start){
        $db = $this -> dbConnect();
        $updateTTT = $db->prepare('UPDATE treatment SET startDate = ? WHERE idTTT = ?');
        $updateTTT->execute(array($start,$idTTT));
        return $updateTTT;
    }
    // posology
    public function updateOldPoso($idTTT,$freq,$idMeds){
        $db = $this -> dbConnect();
        $updatePoso = $db->prepare('UPDATE posology SET content = ? WHERE idTTT = ?');
        $updatePoso->execute(array($freq,$idTTT));
        return $updatePoso;
    }
    public function deleteAllergy($idAllergy,$idChildren){
        $db = $this -> dbConnect();
        $infos44444 = $db->prepare('DELETE FROM allergy WHERE idChildren = ?');
        $infos44444->execute(array($idChildren));
        return $infos44444;
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
    public function getAllergy($idChild){
        $db = $this -> dbConnect();
        $connex3 = $db->prepare('SELECT * FROM allergy JOIN children_allergy WHERE idChildren = ?');
        $connex3->execute(array($idChild));
        return $connex3;
    }
    public function getMedsChild($idChild){
        $db = $this -> dbConnect();
        $getMedsChild = $db->prepare('SELECT posology.content, posology.idPosology, treatment.startDate, meds.title, meds.idMeds, treatment.idTTT FROM children JOIN treatment ON treatment.idChildren = children.idChildren JOIN posology ON treatment.idTTT = posology.idTTT JOIN meds ON meds.idMeds = posology.idMeds WHERE treatment.idChildren = ? ');
        $getMedsChild->execute(array($idChild));
        return $getMedsChild;
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
    // ADD TREATMENT
    public function addTTT($idChild,$startDate){
        $db = $this -> dbConnect();
        $request = $db->prepare('INSERT INTO treatment(startDate, idChildren) VALUES(?,?)');
        $request->execute(array($startDate,$idChild));
        return $request;
    }
    // GET ALL MEDS
    public function getAllMeds($autoC){
        $autoComp = $autoC."%";
        $db = $this -> dbConnect();
        $data = $db->prepare('SELECT title FROM meds WHERE title LIKE ? ORDER BY title LIMIT 8');
        $data->execute(array($autoComp));
        return $data;
    }
}