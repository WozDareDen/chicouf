<?php
//Defining Namespace
namespace Src\Models;
//UserObject :
class UserManager extends Manager
{ 
// ADD NEW USER
public function addUser($firstNameCo, $lastNameCo, $passCo, $mailCo, $parentCo){
    $pass_hache = password_hash($passCo, PASSWORD_DEFAULT);
    $db = $this -> dbConnect(); 
    $connex = $db->prepare('INSERT INTO members(firstname, surname, pass, mail, parentHood, modo, registration_date) VALUES(?,?,?,?,?,"0",CURDATE())');
    $connex->execute(array($firstNameCo, $lastNameCo, $pass_hache, $mailCo, $parentCo));
    return $connex;
    }
public function getMaxIdMember(){
    $db = $this -> dbConnect();
    $connex11 = $db->query('SELECT MAX(idMember) FROM members');
    return $connex11;
}
}