<?php
//Defining Namespace
namespace OpenClassRooms\Chicouf\Models;
//Calling Manager
require_once('models/Manager.php');
//UserObject :
class UserManager extends Manager
{
// ADD NEW USER
public function addUser($firstNameCo, $lastNameCo, $passCo, $mailCo){
    $pass_hache = password_hash($passCo, PASSWORD_DEFAULT);
    $db = $this -> dbConnect(); 
    $connex = $db->prepare('INSERT INTO members(firstname, surname, pass, mail, registration_date) VALUES(?,?,?,?,CURDATE())');
    $connex->execute(array($firstNameCo, $lastNameCo, $pass_hache, $mailCo));
    return $connex;
    }
public function getMaxIdMember(){
    $db = $this -> dbConnect();
    $connex11 = $db->query('SELECT MAX(idMember) FROM members');
    return $connex11;
}
}