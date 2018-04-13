<div id="header-wrapper" class="wrapper">
    <div id="header">

            <div class="logo">
                <img class="logo" id="logo" src="app/Public/uploads/logo.png" />
            </div>

            <div>    
              <?php require 'app/Views/frontend/templateNav.php' ?>
            </div>

            <div class="avatarBox">
                <a class="photoMember" data-toggle="collapse" data-target="photoMember" style="background-image: url( <?=$_SESSION['img'] ?>)" href="#collapseExampleBB" role="button" aria-expanded="false" aria-controls="collapseExampleAA"></a>
                <div class="modal fade" id="photoMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier votre photo de profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php?action=uploadPic&idMember=<?= $newData['idMember'] ?>&idChildren=<?= $newData['idChildren'] ?>" method="post" enctype="multipart/form-data">
            <fieldset>
            <input type="file" name="fileToUpload" id="fileToUpload" /> 
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <input type="submit" class="btn btn-primary" value="Envoyer" name="submit" />
            </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
 </div>

           
            <div>
              <?php require 'app/Views/frontend/templateLogin.php' ?> 
            </div>

    </div>
</div>



<style>
#header{
    display:flex;
    justify-content: space-between;


  }
.logo{
    width:20%;
}
#logo{
     width:100%;
}
nav{
    position:fixed;
    background-color: #f46394;    
    z-index:100000 !important;
    margin-left: -10%;
}

/* .btnConnex{
        position:fixed;
        background-color: #f46394;    
        z-index:100000 !important;
    } */
.photoMember{
    position:absolute;
    right:5%;
    width:50%;
}

</style>