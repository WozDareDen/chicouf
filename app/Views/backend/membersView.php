<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	
<?php require 'templateAdminHeader2.php' ?>
<!-- MEMBERS TABLE-->
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Villes</th>
                        <th scope="col">Inscription</th>
                    </tr>
                </thead>
            <tbody>
<?php
$bigData = $data->fetchAll();
if(empty($bigData)){
?>
                <p>Aucun utilisateur enregistré.</p>
<?php
}
else{
foreach($bigData as $newData){
?>

                <tr>
                    <td><?= $newData['surname'] ?></td>
                    <td><?= $newData['firstname'] ?></td>
                    <td><?= $newData['city'] ?></td>
                    <td><?= $newData['registrationDate'] ?></td>
                </tr>
<?php
}
}
?>    
</tbody>
</table>






<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>