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
        <link href="public/css/move.css" rel="stylesheet" /> 
        <link rel="icon" type="image/png" href="public/images/charlesfav.png" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head> 
    <div class="container-fluid">
      <div class="row">
    <div class="col-lg-12">
        <form method="post" action="index.php?action=addUser">
          <div class="form-group  col-lg-12">
            <label for="lastname">Nom</label><br />
            <input type="text" id="lastname" name="lastNameCo" required="valid" placeholder="entrez votre nom" > 
          </div>
          <div class="form-group col-lg-12">
            <label for="firstname">Prénom</label><br />
            <input type="text" id="firstname" name="firstNameCo" required="valid" placeholder="entrez votre prénom" > 
          </div>
          <div class="form-group col-lg-12">
            <label for="pass">Mot de passe</label><br />
            <input type="password" id="pass" name="passCo" required="valid" autocomplete="off" placeholder="entrez votre mot de passe">
          </div>
          <div class="form-group col-lg-12">
            <label for="pass2">Confirmation du mot de passe</label><br />
            <input type="password" id="pass2" name="pass2Co" required="valid" autocomplete="off" placeholder="confirmez-le">
          </div>
          <div class="form-group col-lg-12 ">
            <label for="mail">Adresse email</label><br />
            <input type="email" id="mail" name="mailCo" required="valid" placeholder="renseignez votre email" >
            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons votre email avec aucun tiers.</small>
          </div>
          <div class="form-check col-lg-12">
            <input type="checkbox" name="choixCo" required="valid"> J'ai lu les règles d'usage et j'accepte de les respecter.</br>
            <input class="btn btn-primary " type="submit" name="addUser" value="S'inscrire" />
          </div>
        </form>
      </div>
      </div>
    </div>












    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>


</body>
</html>