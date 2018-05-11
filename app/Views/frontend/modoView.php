<?php $title = 'Espace Famille' ?>
<?php ob_start(); ?>
<?php
require 'templateNav.php'
?>
<!--*********MAIN*************-->
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
            <h3 class="mbr-section-title display-3 " style="text-align:center"><span>Bienvenue dans votre Espace</span> </h3>
            <h3 class="mbr-section-title display-3 " style="text-align:center">Modération de la <span>Famille <?= $dataF4['familyName'] ?></span></h3>
            <div id="modoMemList" >                
                <table class="table table-hover tableModo">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="centerCol">Membres</th>
                        <th scope="col" class="centerCol">Mails</th>
                        <th scope="col" class="centerCol">Ajout</th>
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
                            <td>
                                <a href="#" class="btn kitDel" data-toggle="modal" data-target="#modalAddModo" ><button class="btn btn-info">Ajouter un modérateur</button></a>
                            </td>
                            <td>
                                <a href="#" class="btn kitDel4" data-toggle="modal" data-target="#modalBann"><button class="btn btn-danger">Bannir un membre de cette famille</button></a>
                            </td>
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