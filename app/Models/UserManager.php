<?php
//Defining Namespace
namespace Src\Models;
//UserObject :
class UserManager extends Manager
{ 
    // ADD NEW USER
    public function addUser($firstNameCo, $lastNameCo, $passCo, $mailCo, $parentCo, $genderCo){
        if($genderCo == 0 && $parentCo == 0){
            $img = 'app/Public/uploads/avatarGrandPa.jpg';
        }
        elseif($genderCo == 0 && $parentCo == 1){
            $img = 'app/Public/uploads/avatarMan.png';
        }
        elseif($genderCo == 1 && $parentCo == 0){
            $img = 'app/Public/uploads/avatarGrandMa.jpg';
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

    public function watchUser($idMember){ //recup donner utilisateur
        $db = $this -> dbConnect();
        $req = $db->prepare('SELECT * FROM members WHERE idMember = ?');
        $req->execute(array($idMember));
        return $req;
    }

    public  function changeUser($name, $mail, $birthdate, $city, $idMember){
        $db = $this -> dbConnect();
        $ins = $db->prepare('UPDATE members SET surname = ?, mail = ?, birthdate = ?, city = ? WHERE idMember = ?');
        $ins->execute(array($name, $mail, $birthdate, $city, $idMember));
        return $ins;
    }
    public function contactDb($usernameContact,$mailContact,$titleContact,$contentContact){
        $db = $this -> dbConnect();
        $contact = $db->prepare('INSERT INTO contact(title,msg,mailContact,nameContact) VALUES(?,?,?,?)');
        $contact->execute(array($titleContact,$contentContact,$mailContact,$usernameContact));
        return $contact;
    }
    public function changePass($idMember,$newPass){
        $db = $this -> dbConnect();
        $changePass = $db->prepare('UPDATE members SET pass=? WHERE idMember=?');
        $changePass->execute(array($newPass,$idMember));
        return $changePass;
    }
    public function insertAvatar($target_file,$idMember){
        $db = $this -> dbConnect();
        $insertAvatar = $db->prepare('UPDATE members SET img=? WHERE idMember=?');
        $insertAvatar->execute(array($target_file,$idMember));
        return $insertAvatar;
    }
    public function eraseModo($idMember){
        $db = $this -> dbConnect();
        $eraseModo = $db->prepare('UPDATE members SET modo=0 WHERE idMember = ?');
        $eraseModo->execute(array($idMember));
        return $eraseModo;
    }
}