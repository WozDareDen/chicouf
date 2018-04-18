<?php
//Defining Namespace
namespace Src\Models;
//ChildObject :
class AdminManager extends Manager
{   
    //GET CHILD THROUGH MEMBER
    public function watchAllMembers(){
        $db = $this -> dbConnect(); 
        $data = $db->query('SELECT * FROM members');
        return $data;
    }
    public function watchAllMsg(){
        $db = $this -> dbConnect();
        $dataMsg = $db->query('SELECT * FROM contact WHERE title=0');
        return $dataMsg;
    }
    public function watchAllMsg1(){
        $db = $this -> dbConnect();
        $dataMsg1 = $db->query('SELECT * FROM contact WHERE title=1');
        return $dataMsg1;
    }
    public function watchAllMsg2(){
        $db = $this -> dbConnect();
        $dataMsg2 = $db->query('SELECT * FROM contact WHERE title=2');
        return $dataMsg2;
    }
    public function eraseMember($idMember){
        $db = $this -> dbConnect();
        $deleteMember = $db->prepare('DELETE FROM members WHERE idMember = ?');
        $deleteMember->execute(array($idMember));
        return $deleteMember;
    }


}