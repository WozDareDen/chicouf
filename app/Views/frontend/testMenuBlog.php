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
<br /> 
</div>


<div class="mainPV" >
        <h1 class="mbr-section-title" style="text-align:center;">Le coin des blogs</h1>      
</div>
<br /><br />
<div class="row">
   
   <div class="wrap">
  <div class="search">
  <br />
     <input type="text" class="searchTerm" placeholder="Quel blog recherchez-vous ?">
     <button type="submit" class="searchButton">
       <i class="fa fa-search"></i>
    </button>
  </div>
</div>
</div>
<br />

<div class="row">
<div class="mainPV">

 <img src="app/Public/uploads/1capture.png" />
 <p>https://codepen.io/andymerskin/pen/XNMWvQ</p>

</div>

</div>




<!--********END OF PAGE*************-->
</div>    


<?php $content = ob_get_clean(); ?>
<?php require 'templateHeadScripts.php' ?>

<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 100%;
  position: relative
}

.searchTerm {
  float: left;
  width: 100%;
  border: 3px solid #00B4CC;
  padding: 5px;
  height: 36px;
  border-radius: 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  position: absolute;  
  right: -50px;
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>