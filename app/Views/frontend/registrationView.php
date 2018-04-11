<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="X-UA-compatible" content="IE=edge" />
        <meta name="description" content="Blog du romancier Jean Forteroche" />
        <meta name="keywords" content="Jean Forteroche, ecrivain, blog, roman, Alaska" />
<!--******************Meta Facebook**************-->        
        <meta property="og:title" content="Blog du romancier Jean Forteroche" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="JeanForteroche.fr" />
        <meta property="og:description" content="Blog du romancier Jean Forteroche" />
        <meta property="og:image" content="public/images/charlesfav.png" />
<!--******************Meta Twitter**************-->             
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Blog du romancier Jean Forteroche" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:description" content="Blog du romancier Jean Forteroche" />
        <meta name="twitter:image" content="public/images/charlesfav.png" />
        <title>Formulaire d'inscription</title>
        <link href="app/Public/css/style.css" rel="stylesheet" /> 
        <link rel="icon" type="image/png" href="public/images/charlesfav.png" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head> 
    <div class="container-fluid regView">
        <div class="row">
            <div class="col-lg-4 regContent" >
                <form method="post" class="regForm" action="index.php?action=addUser">
                      <div class="form-group  col-lg-12">
                        <label for="lastname">Nom</label><br />
                        <input type="text" id="lastname" class="champ" name="lastNameCo" required="valid" placeholder="entrez votre nom" >
                      </div>
                      <div class="form-group col-lg-12">
                        <label for="firstname">Prénom</label><br />
                        <input type="text" id="firstname" class="champ" name="firstNameCo" required="valid" placeholder="entrez votre prénom" >
                      </div>
                      <div class="form-group col-lg-12">
                        <label for="pass">Mot de passe</label><br />
                        <input type="password" id="pass" class="champ" name="passCo" required="valid" autocomplete="off" placeholder="entrez votre mot de passe">
                          <div id="pop">
                              <p>Votre mot de passe doit contenir: <br>

                              </p>
                          </div>
                      </div>
                      <div class="form-group col-lg-12">
                        <label for="pass2">Confirmation du mot de passe</label><br />
                        <input type="password" id="pass2" class="champ" name="pass2Co" required="valid" autocomplete="off" placeholder="confirmez-le">
                      </div>
                      <div class="form-group col-lg-12 ">
                        <label for="mail">Adresse email</label><br />
                        <input type="email" id="mail" class="champ" name="mailCo" required="valid" placeholder="renseignez votre email" >
                          <div id="popMail">Votre mail n'est pas conforme</div>

                        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons votre email avec aucun tiers.</small>
                      </div>
                      <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Parentalité</label>
                      </div>
                      <select class="custom-select" name="parentCo" id="inputGroupSelect01">
                        <option selected>Choisissez...</option>
                        <option value="0">Je suis ici en tant que grand-parent</option>
                        <option value="1">Je suis ici uniquement en tant cas que parent</option>
                      </select>
                    </div>
                      <div class="form-check col-lg-12">
                        <input type="checkbox" name="choixCo" required="valid"> J'ai lu les règles d'usage et j'accepte de les respecter.</br>
                        <input class="btn btn-primary " id="registration" type="submit" name="addUser" value="S'inscrire" />
                      </div>
                </form>

            </div>
        </div>


<div class="row">
<div class="col-lg-12">
<div class="col-lg-6">
      <div class="pos-f-t">
              <div class="collapse" id="navbarToggleExternalContent">
                  <div class=" p-4" style='background-color:rgb(2, 73, 89); color:white;'>
                  <h4 class="text-white">Gérer sa Fiche ENFANT</h4>
                  <span class="text-muted">Toggleable via the navbar brand.</span>
                  <span class="text-muted"> J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter.</span>
                  </div>
              </div>
              <nav class="navbar navbar-dark "style='background-color:rgb(2, 73, 89); color:white;'role='navigation'>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
              </nav>

      </div>

<div class="pos-f-t">
              <div class="collapse" id="navbarToggleExternalContent2">
                  <div class=" p-4" style='background-color:#00FA9A; color:white;'>
                  <h4 class="text-white">Gérer sa Fiche PARENT</h4>
                  <span class="text-muted">Toggleable via the navbar brand.</span>
                  <span class="text-muted"> J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter.</span>
                  </div>
              </div>
              <nav class="navbar navbar-dark "style='background-color:#00FA9A; color:white;'role='navigation'>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent2" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
              </nav>

      </div>


      <div class="pos-f-t">
              <div class="collapse" id="navbarToggleExternalContent3">
                  <div class=" p-4" style='background-color:rgb(2, 73, 89); color:white;'>
                  <h4 class="text-white">Gérer sa Fiche FAMILLE</h4>
                  <span class="text-muted">Toggleable via the navbar brand.</span>
                  <span class="text-muted"> J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter. J'ai lu les règles d'usage et j'accepte de les respecter.</span>
                  </div>
              </div>
              <nav class="navbar navbar-dark "style='background-color:rgb(2, 73, 89); color:white;'role='navigation'>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent3" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
              </nav>

      </div>
</div>
</div>
</div>






    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="app/Public/js/errorChecking.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>


</body>
</html>