<?php $title = 'Le coin des blogs' ?>
<?php ob_start(); ?>
<?php
require 'templateNav.php'
?>
<!--*********MAIN*************-->
<style>body{background-image:url(app/Public/backgrounds/backg-bois-rouge.jpg);background-attachment:fixed !important;background-repeat:no-repeat;}</style>
<div class="container" >
<!--********BANNER************-->
    <div class="bannerBox">
<?php
if(isset($dataF6['banner'])){
?>
        <a href="#" class="row bannerFamily" style="background-image: url( <?= $dataF6['banner'] ?>);" data-toggle="modal" data-target="#modalAddBanner" ></a>
<?php
}
else{
?>          
        <a href="#" class="row bannerFamily" style="background-image: url('app/Public/uploads/banners/banniere.png');"></a> 

<?php
}
?>

    </div>
        

<div class="mainPV" >
        <h1 class="mbr-section-title" style="text-align:center;">Le coin des blogs</h1>
</div>
<br>
<div class="mainPV">

</h2>


</div>




<!--********END OF PAGE*************-->
</div>    


<?php $content = ob_get_clean(); ?>
<?php require 'templateHeadScripts.php' ?>