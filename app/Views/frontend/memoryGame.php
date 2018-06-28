<?php $title = 'Memory Game' ?>
<?php ob_start(); ?>
<?php
require 'templateNav.php'
?>
<!--*********MAIN*************-->
<style>body{background-image:url(app/Public/backgrounds/backg-bois-rouge.jpg);background-attachment:fixed;background-repeat:no-repeat;
        overflow-x: hidden;}</style>
<div class="container">
    <!--********BANNER************-->
    <div class="bannerBox">

        <?php
        if(isset($dataF6['banner'])){
            ?>

            <a href="#" class="row bannerFamily" style="background-image: url( <?= $dataF6['banner'] ?>);"  ></a>

            <?php
        }
        else{
            ?>

            <a href="#" class="row bannerFamily" style="background-image: url('app/Public/uploads/banners/banniere.png');" ></a>

            <?php
        }
        ?>

    </div>




  <div id="game" class="mainPV"></div>





  </div>
  <!--********END OF PAGE*************-->
  <?php $content = ob_get_clean(); ?>
<?php require 'templateHeadScripts.php' ?>



    <link rel="stylesheet" href="css/style.prefix.css">

    <script src="js/script.babel.js"></script>