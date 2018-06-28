<?php $title = 'Espace Modération' ?>
<?php ob_start(); ?>
<?php
require 'templateNav.php'
?>
<!--*********MAIN*************-->
<style>body{background-image:url(app/Public/backgrounds/backg-bois-rouge.jpg);background-attachment:fixed;background-repeat:no-repeat;}</style>
<div class="container">
<!--********BANNER************-->
    <div class="bannerBox">
<?php
if(isset($dataF6['banner'])){
?>
        <a href="#" class="row " style="background-image: url( <?= $dataF6['banner'] ?>);" data-toggle="modal" data-target="#modalAddBanner" ></a>
<?php
}
else{
?>          
        <a href="#" class="row " style="background-image: url('app/Public/uploads/banners/banniere.png');" data-toggle="modal" data-target="#modalAddBanner" ></a> 
<?php
}
?>

    </div>
        

    <div class="row justify-content-md-center ">   
        <div class="col-md-12  text-xs-center">   
            <h3 class="mbr-section-title display-3 noFrame" style="text-align:center"><span>Bienvenue dans votre Espace</span> </h3>
            <h3 class="mbr-section-title display-3 noFrame" style="text-align:center">Modération de la <span>Famille <?= $dataF4['familyName'] ?></span></h3>
            <div class="offset-sm-1 col-sm-10 lead alert alert-success alert-dismissible fade show"  data-dismiss="alert" role="alert" title="Faîtes disparaitre ce message en cliquant dessus, il réapparaitra la prochaine fois que vous viendrez sur cette page ;)">Voici réunies sur cette page, toutes les différentes actions pour gérer votre Espace Famille. Les différents outils mis à votre disposition sont également accessibles via les raccourcis dans le menu  qui vous est réservé dans la barre de navigation.<br />
            De plus, vous avez ici une vue globale sur la liste des utilisateurs de votre Famille toute entière.<br />
            Si vous souhaitez quitter la modération, vous devrez d'abord désigner un successeur. Sachez que vous pouvez parfaitement donner ces droits à l'ensemble de votre Famille. Retenez cependant que, plus l'Espace Famille sera composée de Modérateurs, plus les risques d'une action malheureuse seront réunies ;-)</div>
            <div class="col-lg-12" style="text-align:center;">
                <a href="#" data-toggle="modal" data-target="#modalAddParent" ><button class="btn kitDel" style="background-color:#a8e6cf;">Rattacher un membre</button></a>
                <a href="#" data-toggle="modal" data-target="#modalAddBanner" ><button class="btn" style="background-color:#fdffab;">Modifier la bannière</button></a>
                <a href="index.php?action=deleteBanner&id=<?= $_SESSION['family'] ?>"  ><button class="btn" style="background-color:#ffd3b6;cursor:pointer;">Supprimer la bannière</button></a>
                <a href="#" data-toggle="modal" data-target="#modalStopModo"><button class="btn" style="background-color:#ffaaa5;">Quitter la modération</button></a>
                <a href="#" data-toggle="modal" data-target="#modalDeleteFamily"><button class="btn" style="background-color:#e7759a;">Supprimer cet Espace Famille</button></a>
            </div>
            <div class="form-group col-lg-12">
                <div style="margin-top:20px;">
                    Cette famille est composée de <?= $dataModoFam[0] ?> utilisateurs et de <?= $dataModoFam2[0] ?> enfants.
                </div>    
                <div style="margin-top:20px;">               
                    <label for="familyNameModo">Changer le nom de votre famille</label>
                    <input type="text" id="familyNameModo" class="champ" name="familyNameModo" required="valid" value="<?=$dataF4['familyName'] ?>" ><button id="validNameModo" class="btn btn-info">OK</button>
                </div>
            </div>
            <div id="modoMemList">                
                <table class="table table-hover tableModo table-sm-responsive">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="centerCol">Membres</th>
                        <th scope="col" class="centerCol">Mails</th>
                        <th scope="col" class="centerCol">Ajouter un modérateur</th>
                        <th scope="col" class="centerCol">Suppression</th>
                    </tr>
                    </thead>
                    <tbody class="table_body">

<?php
while ($members = $dataModo->fetch())
{
?>            

                        <tr>
                            <td><?=$members['firstname'] ?> <?= $members['surname'] ?> </td>
                            <td><?=$members['mail']?></td>
                            <td class="centerCol2">
                                <a href="#" class="btn kitDel" data-toggle="modal" data-target="#modalAddModo" ><button class="btn btn-info">Ajouter</button></a>
                            </td>
                            <td class="centerCol2">
                                <a href="#" class="btn kitDel4" data-toggle="modal" data-target="#modalBann"><button class="btn btn-danger">Bannir un membre</button></a>
                            </td>
                            
                        </tr>
           
<?php
}
?>      

                    </tbody>
                </table>   
            </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">

<?php
$idF = $_GET['id'];
for($i=1;$i<=$numPage;$i++){
    echo "<li class='page-item'><a class='page-link' href=\"index.php?action=goToModo&id=$idF&p=$i\">$i </a></li>";
}
?>

                    </ul>
                </nav>
                
                
                

            </div>
        </div>



    

     </div>


   
<!--********END OF PAGE*************-->


<?php $content = ob_get_clean(); ?>

<?php require 'templateHeadScripts.php' ?>