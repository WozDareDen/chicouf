
<?php ob_start(); ?>
    <div class="row">
        <div class="col-lg-12 regContent" >
            <h2 style="border:1px solid black;text-align:center;">Inscrivez-vous !</h2>
            <form method="post" class="regForm col-sm-6" name="regForm" action="index.php?action=addUser">
                <div class="form-group  col-lg-12">
                    <label for="lastname">Nom</label><br />
                    <input type="text" id="lastname" class="champ" name="lastNameCo" required="valid" placeholder="entrez votre nom" >
                </div>
                <div class="form-group col-lg-12">
                    <label for="firstname">Prénom</label><br />
                    <input type="text" id="firstname" class="champ" name="firstNameCo" required="valid" placeholder="entrez votre prénom" >
                </div>
                <div class="form-group col-lg-12">
                    <label for="sexe">Genre</label><br />
                    <input type="radio" name="genderCo" value="0" checked> Homme<br>
                    <input type="radio" name="genderCo" value="1"> Femme<br>
                </div>
                <div class="form-group col-lg-12">
                    <label for="pass">Mot de passe</label><br />
                    <input type="password" id="regFormPass" class="champ2 champPass" name="passCo" required="valid" autocomplete="off" placeholder="entrez votre mot de passe">
                    <input type="checkbox" onclick="watchPW()">Afficher le mot de passe
                    <div id="pop">
                        <!-- Button trigger modal -->
                        <button type="button" id="buttonPassword" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                            Mot de passe non conforme
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Votre mot de passe doit comporter :</h5>
                                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Au moin une Majuscule. <br>
                                        Un chiffre.<br>
                                        contenir entre 8 et 16 carractère.

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label for="pass2">Confirmation du mot de passe</label><br />
                    <input type="password" id="regFormPass2" class="champ2 champPass" name="pass2Co" required="valid" autocomplete="off" placeholder="confirmez-le">
                    <input type="checkbox" onclick="myFunction2()">Afficher le mot de passe <br />
                    <span id="message"></span>
                </div>
                <div class="form-group col-lg-12 ">
                    <label for="mail">Adresse email</label><br />
                    <input type="email" id="mail" name="mailCo" required="valid" placeholder="renseignez votre email" >
                    <div id="popMail">
                        <p>
                            Votre mail n'est pas conforme.
                        </p>
                    </div>
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons votre email avec aucun tiers.</small>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Parentalité</label>
                    </div>
                    <select required class="custom-select" name="parentCo" id="inputGroupSelect01">
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







</div>
