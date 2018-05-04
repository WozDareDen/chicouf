<div class="container">
    <nav class="main-menu">
        <div>
            <a href="index.php?action=memberView&idMember=<?= $_SESSION['id'] ?>"><img src="app/Public/uploads/logo.png" style="width:80%;"/>
            </a> 
        </div> 
        <div class="scrollbar" id="style-1">     
            <ul>
                <li>                                   
                    <a href="admin.php?action=dashboard">
                    <i class="fa fa-home fa-lg"></i>
                    <span class="nav-text">Tableau de Bord</span>
                    </a>
                </li>                  
                <li>                                 
                    <a href="admin.php?action=membersList">
                    <i class="fa fa-user fa-lg"></i>
                    <span class="nav-text">Membres</span>
                    </a>
                </li>   
                <li>                                 
                    <a href="admin.php?action=familiesList">
                    <i class="fa fa-users fa-lg"></i>
                    <span class="nav-text">Familles</span>
                    </a>
                </li>           
                <li>                                 
                    <a href="admin.php?action=msgView">
                    <i class="fa fa-envelope-o fa-lg"></i>
                    <span class="nav-text">Messages</span>
                    </a>
                </li>                                                       
                <li class="darkerli">
                    <a href="admin.php?action=membersList">
                    <i class="fa fa-desktop fa-lg"></i>
                    <span class="nav-text">Statistiques</span>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="admin.php?action=famPage">
                    <i class="fa fa-picture-o fa-lg"></i>
                    <span class="nav-text">Test</span>
                    </a>
                </li>               
            </ul>                                  
            <ul class="logout">
                <li>
                    <a href="index.php?action=deco">
                    <i class="fa fa-lightbulb-o fa-lg"></i>
                    <span class="nav-text">Déconnexion</span>                        
                    </a>
                </li>  
            </ul>
    </nav>
        
<!-- MODAL DELETE MEMBER -->
<div class="modal fade" id="modalDeleteMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header padiday">
                <h5 class="modal-title" style="color:black;">Supprimer un membre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
                <p>Cette suppresion est définitive. <br /></p>
                 <form action="admin.php?action=deleteMember" method="post">
                    <div class="form-group">
                        <input type="number" class="form-control" required id="idBackMember" name="idBackMember" >
                    </div>
                 <div class="form-check">
                    <input type="checkbox" name="choixDelCo" required /> Je confirme la suppresion de ce membre.</br>
                </div>
                <button type="submit" class="btn btn-outline-danger">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>
			
  <!-- MODAL DELETE FAMILY -->
<div class="modal fade" id="modalDeleteFamily" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header padiday">
                <h5 class="modal-title" style="color:black;">Supprimer une Famille</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span >&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color:black;">
                <p>Cette suppresion est définitive. <br /></p>
                 <form action="admin.php?action=deleteFamily" method="post">
                    <div class="form-group">
                        <input type="number" class="form-control" required id="idBackFamily" name="idBackFamily" >
                    </div>
                 <div class="form-check">
                    <input type="checkbox" name="choixDelCo" required /> Je confirme la suppresion de cette Famille.</br>
                </div>
                <button type="submit" class="btn btn-outline-danger">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>
  

            