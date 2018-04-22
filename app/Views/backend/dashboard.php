<?php $title = "Tableau de Bord" ?>
<?php ob_start(); ?>	

<?php require 'templateAdminHeader2.php' ?>




    <div class="row">
        <div class="col-md-5 folio1" style="border:1px solid black;"><i class="fa fa-user fa-lg"></i>
        </div>
        <div class="offset-md-2 col-md-5 folio2" style="border:1px solid black;">dqsdqs
        </div>
      
        <div class="col-md-5 folio1" style="border:1px solid black;">azerty
        </div>
        <div class="offset-md-2 col-md-5 folio2" style="border:1px solid black;">qsdfgwxcv
        </div>
    </div>

</div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require('templateAdmin.php'); ?>