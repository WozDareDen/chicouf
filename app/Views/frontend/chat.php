<?php $title = 'Espace Famille' ?>
<?php ob_start(); ?>
<?php
require 'bureau.php'
?>
<!--CHAT-->
<div>
    <form action="index.php?action=addComment&amp;id=<?=$post['id'] ?>" method="post">
        <div hidden>
            <label for="comment">ID_users</label><br />
            <textarea id="comment" name="chatMemberId"><?=$_SESSION['id'] ?></textarea>
        </div>
        <div hidden>
            <label for="comment">ID_discussion</label><br />
            <textarea id="comment" name="chatDissId"><?= $_GET['id'] ?></textarea>
        </div>
        <div>
            <label for="comment">Postez votre commentaire :</label><br />
            <textarea id="comment" name="chatComment" autofocus></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form></br>

<?php    
 
// COMMENTS LIST
$commentArray = $comments->fetchAll();
if(empty($commentArray)){
?>
                        <p>Soyez le premier à poster un commentaire.</p>
<?php
}
else{
foreach ($commentArray as $comment){   
?>                   
                        <p id="comments-<?= $comment['id'] ?>"><span class="blue"><strong><?= htmlspecialchars($comment['username']) ?></strong></span> le <?= $comment['comment_date_fr'] ?> - <span class="signal"><a href="index.php?action=signal&id=<?= $comment['id'] ?>&idChapter=<?= $post['id'] ?>"> signalez !</a></span></p>
                        <p><?= nl2br(htmlspecialchars($comment['comment_text'])) ?></p>
<?php
}
}
?>                       
                </div>





<?php $content = ob_get_clean(); ?>

<?php require 'templateHeadScripts.php' ?>        