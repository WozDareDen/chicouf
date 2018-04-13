
       <footer class="row">
            <div class="col-lg-12" id="footer" >

                <div class="col-lg-2">
                Kercode by Simplon 2017-2018
                </div>

                <div class="col-lg-8">
                <form method="post" class="regForm col-sm-6" name="contactForm" action="index.php?action=addUser">
                    <div class="form-group  col-lg-12">
                        <label for="lastnameContact">Nom</label><br />
                        <input type="text" id="lastnameContact" class="champ" name="lastNameContactCo" required="valid" placeholder="entrez votre nom" >
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

                    <div class="form-check col-lg-12">                   
                        <input class="btn btn-primary " id="registration" type="submit" name="addUser" value="S'inscrire" />
                    </div>
                </form>

                </div>

                <div class="col-lg-2">
                <p><a href="index.php?action=mentions">mentions légales</a></p>
                </div>



            </div>
        </footer>









<style>
#footer-wrapper{
    background-color:black;
    height:100px;
    color:white;
}
</style>