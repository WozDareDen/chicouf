<?php
//Defining Namespace
namespace Src\Models;
//UserObject :
class UserManager extends Manager
{ 
    // ADD NEW USER
    public function addUser($firstNameCo, $lastNameCo, $passCo, $mailCo, $parentCo, $genderCo){
        if($genderCo == 0 && $parentCo == 0){
            $img = 'app/Public/uploads/avatarGrandPa.png';
        }
        elseif($genderCo == 0 && $parentCo == 1){
            $img = 'app/Public/uploads/avatarMan.png';
        }
        elseif($genderCo == 1 && $parentCo == 0){
            $img = 'app/Public/uploads/avatarGrandMa.png';
        }
        else{
            $img = 'app/Public/uploads/avatarWoman.png';
        }
        $pass_hache = password_hash($passCo, PASSWORD_DEFAULT);
        $db = $this -> dbConnect(); 
        $connex = $db->prepare('INSERT INTO members(firstname, surname, pass, mail, parentHood, gender, img, modo, registrationDate) VALUES(?,?,?,?,?,?,?,"0",CURDATE())');
        $connex->execute(array($firstNameCo, $lastNameCo, $pass_hache, $mailCo, $parentCo, $genderCo, $img));
        return $connex;
        }
    public function getMaxIdMember(){
        $db = $this -> dbConnect();
        $connex11 = $db->query('SELECT MAX(idMember) FROM members');
        return $connex11;
    }
    // USER CONNECTION CONTROL
    public function userConnex($firstname,$surname){
        $db = $this -> dbConnect(); 
        $req = $db->prepare('SELECT * FROM members WHERE firstname = ? AND surname = ?');
        $req->execute(array($firstname,$surname));
        return $req;
    }
    public function userById($idMember){
        $db = $this -> dbConnect();
        $req = $db->prepare('SELECT * FROM members WHERE idMember = ?');
        $req->execute(array($idMember));
        return $req;
    }
    public function getFamilyId($idMember){
        $db = $this -> dbConnect();
        $infosParent = $db->prepare('SELECT idFamily FROM member_family WHERE idMember = ?');
        $infosParent->execute(array($idMember));
        return $infosParent;
    }

    public function change($lastName, $pass, $mdp, $mail, $bornDate,  $city, $id){
        $db = $this -> dbConnect();
        $ins = $db->prepare('UPDATE members SET surname = ?, pass = ?, mail = ?, birthdate = ?, city = ? WHERE id = ?');
        $ins->execute(array($lastName, $pass, $mdp, $mail, $bornDate,  $city, $id));
        return $ins;
    }
}