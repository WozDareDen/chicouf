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
    // BELONG PARENT TO CHILD
    public function getBelongParent($mailCo){
        $db = $this -> dbConnect();
        $belong0 = $db->prepare('SELECT idMember FROM members WHERE mail = ?');
        $belong0->execute(array($mailCo));
        return $belong0;
    }
    public function belongParent($idMember,$idChild){
        $db = $this -> dbConnect();
        $belong2 = $db->prepare('INSERT INTO member_children(idMember,idChildren) VALUES(?,?)');
        $belong2->execute(array($idMember,$idChild));
        return $belong2;
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

    public function user($idMember){ //recup donner utilisateur
        $db = $this -> dbConnect();
        $req = $db->prepare('SELECT * FROM members WHERE idMember = ?');
        $req->execute(array($idMember));
        return $req;
    }

    public  function changeUser($name, $mdp, $mail, $dateBorn, $city, $idMember){
        $db = $this -> dbConnect();
        $ins = $db->prepare('UPDATE members SET Surname = ?, pass = ?, mail = ?, BirthDate = ?, city = ? WHERE idMember = ?');
        $ins->execute(array($name, $mdp, $mail, $dateBorn, $city, $idMember));
        return $ins;
    }
    public function contactDb($usernameContact,$mailContact,$titleContact,$contentContact){
        $db = $this -> dbConnect();
        $contact = $db->prepare('INSERT INTO contact(title,msg,mailContact,nameContact) VALUES(?,?,?,?)');
        $contact->execute(array($titleContact,$contentContact,$mailContact,$usernameContact));
        return $contact;
    }
}