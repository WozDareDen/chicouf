<?php
//Defining Namespace
namespace Src\Models;
//ChildObject :
class ChildManager extends Manager
{
    //***************GET CHILD INFOS THROUGH MEMBER**************************
    public function watchChild($idMember){
        $db = $this -> dbConnect(); 
        $data = $db->prepare('SELECT children.idChildren, member_children.idMember, surname, firstname, img, parent1, parent2, updateUser, bulk, DATE_FORMAT(bulkDate,\'%d/%m/%Y\') as new_bulkDate, children.gender,DATE_FORMAT(updateLog, \'%d/%m/%Y à %Hh%i\') as new_updateLog,  DATE_FORMAT(birthdate, \'%d/%m/%Y\') as new_birthdate FROM children INNER JOIN member_children ON member_children.idChildren = children.idChildren WHERE idMember = ?');
        $data->execute(array($idMember));
        return $data;
    }
    public function getMealsInfos($one_childId){
        $db = $this -> dbConnect();
        $connex2 = $db->prepare('SELECT * FROM meals WHERE idChildren = ?');
        $connex2->execute(array($one_childId));
        return $connex2;
    }
    public function getMedsInfos($one_TTTId){
        $db = $this -> dbConnect();
        $connex3 = $db->prepare('SELECT title, content FROM posology INNER JOIN meds ON meds.idMeds=posology.idMeds JOIN treatment ON treatment.idTTT = posology.idTTT WHERE idChildren = ?');
        $connex3->execute(array($one_TTTId));
        return $connex3;
    }
    public function getAllergyInfos($one_childId){
        $db = $this -> dbConnect();
        $connex4 = $db->prepare('SELECT * FROM allergy INNER JOIN children_allergy ON children_allergy.idAllergy = allergy.idAllergy WHERE idChildren = ?');
        $connex4->execute(array($one_childId));
        return $connex4;
    }
    public function getTTTDate($one_childId){
        $db = $this -> dbConnect();
        $connex5 = $db->prepare('SELECT idTTT,DATE_FORMAT(startDate,\'%d/%m/%Y \') as new_startDate FROM treatment WHERE idChildren = ?');
        $connex5->execute(array($one_childId));
        return $connex5;
    }
    //******************CHILD CREATION*********************
    public function addChild($lastname,$firstname,$birthdate,$gender,$parent1,$parent2,$username,$bulk,$bulkDate){
        if($gender == 0){
            $img = 'app/Public/uploads/avatarBoy.png';
        }
        else{
            $img = 'app/Public/uploads/avatarGirl.png';
        }    
        $db = $this -> dbConnect();
        $infos1 = $db->prepare('INSERT INTO children(surname,firstname,birthdate,gender,parent1,parent2,img,updateLog,updateUser,bulk,bulkDate) VALUES(?,?,?,?,?,?,?,NOW(),?,?,?)');
        $infos1->execute(array($lastname,$firstname,$birthdate,$gender, $parent1,$parent2,$img,$username,$bulk,$bulkDate));
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
    public function getIdTTT(){
        $db = $this -> dbConnect();
        $getIdTTT = $db->query('SELECT MAX(idTTT) FROM treatment');
        return $getIdTTT;
    }
    // FREQUENCE
    public function newPoso($idTTT,$idMeds,$posology){
        $db = $this -> dbConnect();
        $newGlobalTTT= $db->prepare('INSERT INTO posology(idMeds,idTTT,content) VALUES(?,?,?)');
        $newGlobalTTT->execute(array($idMeds,$idTTT,$posology));
        return $newGlobalTTT;
    } 
    //*****************CHILD UPDATES**********************
    public function updateOldChild($lastname,$firstname,$birthdate,$parent1,$parent2, $idChild, $username,$bulk,$bulkDate){
        $db = $this -> dbConnect();
        $infos1 = $db->prepare('UPDATE children SET surname=?, firstname=?, birthdate=?, parent1=? ,parent2=?, upDateLog=NOW(), upDateUser=?, bulk=?, bulkDate=? WHERE idChildren = ?');
        $infos1->execute(array($lastname,$firstname,$birthdate,$parent1,$parent2,$username,$bulk, $bulkDate, $idChild));
        return $infos1;
    }
    // FOOD
    public function updateOldMeal($favMeal,$hatedMeal,$idChild){
        $db = $this -> dbConnect();
        $infos2 = $db->prepare('UPDATE meals SET favorite_meal=?, hated_meal=? WHERE idChildren=?');
        $infos2->execute(array($favMeal,$hatedMeal,$idChild));
        return $infos2;
    }
    // allergy
    public function updateOldAllergy($allergies,$idAllergy){
        $db = $this -> dbConnect();
        $upDateAllergy = $db->prepare('UPDATE allergy SET content = ? WHERE idAllergy = ?');
        $upDateAllergy->execute(array($allergies,$idAllergy));
        return $upDateAllergy;
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
    //***************GET CHILD INFOS THROUGH CHILD******************
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
        $connex3 = $db->prepare('SELECT * FROM allergy JOIN children_allergy ON allergy.idAllergy= children_allergy.idAllergy WHERE idChildren = ?');
        $connex3->execute(array($idChild));
        return $connex3;
    }
    public function getIdFamilyByChild($idChild){
        $db = $this -> dbConnect();
        $connex5 = $db->prepare('SELECT idFamily FROM family_children WHERE idChildren = ?');
        $connex5->execute(array($idChild));
        return $connex5;
    }
    public function getDateTTT($idChild){
        $db = $this -> dbConnect();
        $getDateTTT = $db->prepare('SELECT idTTT, DATE_FORMAT(startDate, \'%d/%m/%Y\') as new_startDate FROM treatment WHERE idChildren=?');
        $getDateTTT->execute(array($idChild));
        return $getDateTTT;
    }
    public function getAllMedsChild($idTTT){
        $db = $this -> dbConnect();
        $getAllMedsChild = $db->prepare('SELECT title,content,idTTT FROM posology INNER JOIN meds ON meds.idMeds=posology.idMeds WHERE idTTT=?');
        $getAllMedsChild->execute(array($idTTT));
        return $getAllMedsChild;
    }
    public function stopMedicine($idChild){
        $db = $this -> dbConnect();
        $stopMeds = $db->prepare('DELETE FROM treatment WHERE idChildren = ?');
        $stopMeds->execute(array($idChild));
        return $stopMeds;
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
        $data = $db->prepare('SELECT * FROM meds WHERE title LIKE ? ORDER BY title LIMIT 8');
        $data->execute(array($autoComp));
        return $data;
    }
}