
<footer id="footer">
     <div class="container">
       <div class="row">
       <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="menu">
                         <span>contact</span>  
                         <li>
                            <div class="contactUs" data-toggle="modal" data-target="#ModalContact" onmouseover="$(this).css('color','#da3e44');" onmouseout="$(this).css('color','#FFF');"> Contactez-nous ! </div>
                          </li>
                                 
                         <li>
                            <a href="index.php?action=legal">Mentions légales</a>
                          </li>
                               
                          <li>
                             <a href="index.php?action=about">A propos</a>
                          </li>
                               
                          
                          
                     </ul>
                </div>


                <div class="col-md-4 col-sm-6 col-xs-12" style="text-align:center;">
                  <img class="logo2 " id="logo2" src="app/Public/uploads/logo.png" style="width:70%;"/>
                </div>
                

           
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <ul class="address">
                        <span>Coordonnées</span>       
                        <li>
                           <i class="fa fa-phone" aria-hidden="true"></i> <a href="#">+33 6 85 22 40 30</a>
                        </li>
                        <li>
                           <i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#">12, rue Claude Monet 56000 Vannes</a>
                        </li> 
                        <li>
                           <i class="fa fa-envelope" aria-hidden="true"></i> <a href="#">fsadot@free.fr</a>
                        </li> 
                   </ul>
               </div>
           
           
           </div> 
        </div>
<!--************MODAL CONTACT********************-->
<div class="modal fade" id="ModalContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fenêtre de contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php?action=contact" method="post">
            <div class="form-group">
                <input type="text" class="form-control" id="usernameContact" name="usernameContact" placeholder="Entrez votre nom" required />
            </div>          
            <div class="form-group">
                <input type="mail" class="form-control" id="mailContact" name="mailContact" placeholder="votre email"  required />
                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons votre email avec aucun tiers.</small>
            </div>
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Précisez le sujet</label>
                    </div>
                    <select required class="custom-select" name="titleContact" id="inputGroupSelect01"  required />
                        <option value="0">fonctionnement du site</option>
                        <option value="1">questions relatives à la sécurité des données</option>
                        <option value="2">autre</option>
                    </select>
                </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name='contentContact' rows="6"  required /></textarea>
            </div>
          <button type="submit" class="btn btn-primary ">Valider</button>
        </form>
      </div>
    </div>
  </div>
</div>

    </footer>
