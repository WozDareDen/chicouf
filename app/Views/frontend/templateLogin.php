
        <div class="register" style="border:1px solid black;display:inline-block;">
            <form action="index.php?action=record" method="post">
              <div>
                <label for="firstname">Prénom</label><br />
                <input type="text" id="firstname" name="firstname" placeholder="entrez votre prénom">
              </div>
              <div>
                <label for="surname">Nom</label><br />
                <input type="text" id="surname" name="surname" placeholder="votre nom">
              </div>                     
              <div>
                <label for="pass">Mot de passe</label><br />
                <input type="password" id="pass" name="pass" autocomplete="off" placeholder="et votre mot de passe">
              </div>
              <div>
                <input id="submit" type="submit" value="GO !">
              </div>
              <div class="compte">Pas encore inscrit ? <span class="compteLien"><a href="index.php?action=subView">Créez un compte !</a></span>
              </div>                      
            </form>
        </div>
