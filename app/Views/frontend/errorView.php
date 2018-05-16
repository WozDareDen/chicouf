<?php $title = 'Espace Membre' ?>
<?php ob_start(); ?>
<?php require 'templateNav.php' ?>

<style>body{background-color:#dbe7f7;}</style>
<div class="container-fluid">
        <div class="bannerBox">       
                <a href="#" class="row bannerFamily" style="background-image: url('app/Public/uploads/banners/banniere.png');" ></a>     
        </div>
        <div class="row justify-content-md-center">
            <h2 class="errorMsg"><?= $e->getMessage(); ?></h2>           
            <img id="logoTurn2" class="logTurn turn3" src="app/Public/uploads/logo.png" alt="logo pleine page" title="logo pleine page" />
        </div>
    
</div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>

