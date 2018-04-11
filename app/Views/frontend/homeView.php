<?php $title = 'Accueil' ?>
<?php ob_start(); ?>
<div id="header-wrapper" class="wrapper">
    <div id="header">






            <div>    
              <?php require 'app/Views/frontend/templateNav.php' ?>
            </div>
            <div style="width:30%;border:1px solid black;">
                <img class="logo" id="logo" src="app/Public/uploads/logo.png" style="width:100%;" />
            </div>
<?php
//LOGIN BOX
if(empty($_SESSION['firstname'])){
?>
            <div>
              <?php require 'app/Views/frontend/templateLogin.php' ?> 
            </div>
<?php 
}
else{
?>
        <a href="index.php?action=deco"><button class="identifyB">Déconnexion</button></a>    
<?php 
}
?>
</div>
</div>



<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>