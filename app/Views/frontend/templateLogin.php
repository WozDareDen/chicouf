<!--Login Window -->
<!-- Button trigger modal -->
<?php 
//LOGIN BOX
if(empty($_SESSION['firstname'])){
?>
<div class="form-inline my-2 my-lg-0">
<button type="button" class="btn btn-outline-danger btnConnex" data-toggle="modal" data-target="#exampleModal">Connexion</button>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fenêtre de connexion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php?action=record" method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="firstname" name="firstnameCo" placeholder="Entrez votre prénom">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="surname" name="surnameCo" placeholder="votre nom">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="passCo" name="passCo" placeholder="Et votre mot de passe">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
          </div>
          <button type="submit" class="btn btn-primary">Valider</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
}
else{
?>
<a href="index.php?action=deco"><button type="button" class="btn btn-danger btnConnex" data-toggle="modal" >
  Déconnexion
</button></a>

<?php 
}
?>