<?php $modif = $recoverUs->fetch() ?>
<h1>Modifier votre profil <?= $modif['Firstname'] ?></h1>
<ul>
    <h2>Modifier votre mot de passe</h2>
        <p><h4>Votre mot de passe doit comporter :</h4>
        Au moin une Majuscule. <br>
        Au moin un chiffre.<br>
        Et contenir entre 8 et 16 carractère.
        </p><br>


        <form action="index.php?action=changeProfile&id" method="post">
    <li>
        <h3>Nouveau mot de passe</h3>
        <input type="password" id="regFormPass" class="champ2 champPass" name="passCo"
                   autocomplete="off" placeholder="entrez votre mot de passe">
            <input type="checkbox" onclick="myFunction()">Afficher le mot de passe <br>


            <div id="pop">
                <!-- Button trigger modal -->
                <div id="buttonPassword" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    Mot de passe non conforme
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                </div>
            </div>

            <input type="password" id="regFormPass2" class="champ2 champPass" name="pass2Co"
                   autocomplete="off" placeholder="confirmez-le">
            <input type="checkbox" onclick="myFunction2()">Afficher le mot de passe <br/>
            <span id="message"></span>
    </li>
    <li>
        <h3>Modifier votre E-mail</h3>

        <label for="mail"><h4>Nouvelle adresse mail</h4></label><br/>
        <input type="email" id="mail" name="mailCo" placeholder="<?= $modif['mail'] ?>">
        <div id="popMail">
            <p>
                Votre mail n'est pas conforme.
            </p>
        </div>
    </li>
    <li><h3>Modifier votre date de naissance</h3>
        <input type="text" id="dateBorn" name="bornDate"  placeholder="<?= $modif['BirthDate'] ?>">
    </li>
    <li><h3>Modifier votre nom</h3>
        <input type="text" id="dateBorn" name="firstName"  placeholder="<?= $modif['Surname'] ?>"
    </li>
    <li><h3>Modifier votre Adresse</h3>
        <input type="text" id="address" name="city"  placeholder="<?= $modif['City'] ?>">
    </li>
</ul>

<input class="btn btn-primary " id="registration" type="submit" name="addUser" value="Envoyer" />
</form>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="app/Public/js/errorChecking.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"
        integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D"
        crossorigin="anonymous"></script>
