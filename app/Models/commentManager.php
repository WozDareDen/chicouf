<?php
//Defining Namespace
namespace Src\Models;
//CommentObject :
class CommentManager extends Manager{
    public function postDiscussComment($chatDissId, $chatMemberId, $chatComment){
        $db = $this -> dbConnect(); 
        $comments = $db->prepare('INSERT INTO comments(content,comment_date,idMember) VALUES(?,NOW(),?)');
        $comments->execute(array($chatComment,$chatMemberId, ));
        return $comments;
    }



}