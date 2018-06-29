<?php $title = 'Votre profil' ?>
<?php ob_start(); ?>
<?php
require 'templateNav.php'
?>
<!--*********MAIN*************-->
<style>body{background-image:url(app/Public/backgrounds/backg-bois-rouge.jpg);background-attachment:fixed !important;background-repeat:no-repeat;}</style>
<div class="container" >
<!--********BANNER************-->
    <div class="bannerBox">
<?php
if(isset($dataF6['banner'])){
?>
        <a href="#" class="row bannerFamily" style="background-image: url( <?= $dataF6['banner'] ?>);" data-toggle="modal" data-target="#modalAddBanner" ></a>
<?php
}
else{
?>          
        <a href="#" class="row bannerFamily" style="background-image: url('app/Public/uploads/banners/banniere.png');"></a> 

<?php
}
?>

    </div>
        
<?php $modif = $recoverUs->fetch() ?>
<div class="mainPV" >
        <h1 class="mbr-section-title" style="text-align:center;">Bienvenue sur votre Espace Profil <?= $modif['firstname'] ?></h1>

<?php
if(isset($getFamilyName['familyName'])==true){
?>
        <h4 style="text-align:center;">Vous êtes membre de la Famille <?= $getFamilyName['familyName'] ?></h4>
<?php
}
?>

<div class="row justify-content-sm-center">   

       
<?php
if($_SESSION['parenthood'] == 0){
?>     

       <div class="lead loco alert alert-success alert-dismissible fade show col-lg-10"  data-dismiss="alert" role="alert" title="Faîtes disparaitre ce message en cliquant dessus, il réapparaitra la prochaine fois que vous viendrez sur cette page ;)">

       <p>L'Espace Famille permet de regrouper tous les enfants, parents et grand-parents. Deux options s'offrent à vous : <br /> -créer cet Espace ou en rejoindre un existant.</p>
       <p> Le modérateur de l'Espace Famille, c'est-à-dire celui qui est à l'origine de sa création, est le seul à pouvoir vous rattacher à cet Espace en renseignant votre email. Si dans votre entourage, aucun espace n'a été créé, soyez la première personne à le faire et devenez-en le modérateur. Rendez-vous sur l'Espace Famille, accessible depuis la barre de navigation.</p>
        </div>

<?php
}
?>

    </div>
    <div class="row justify-content-sm-center">
        <article class="col-xs-12 col-sm-6 col-md-3 avatarBox social boxProfil" >
            <a href="#" data-toggle="modal" data-target="#userModal<?= $modif['idMember'] ?>" data-whatever="@mdo" class="photoChild2 photoMD" style="background-image: url(<?= $modif['img'] ?>);" title="Vous pouvez modifier la photo" ></a>
            <div class="modal fade" id="userModal<?= $modif['idMember'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header" style="background-color:#6bbfb0;">
                        <h5 class="modal-title" id="exampleModalLabel" >Modifier votre photo de profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Votre fichier doit obligatoirement être au format jpg, jpeg, png ou gif et ne pas dépasser 5Mo.
                        </p>
                        <form action="index.php?action=uploadAva&idMember=<?= $modif['idMember'] ?>" method="post" enctype="multipart/form-data">
                            <fieldset>
                            <input type="file" name="fileToUpload" id="fileToUpload" /> 
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <input type="submit" class="btn" style="background-color:#6bbfb0;" value="Envoyer" name="submit" />
                            </fieldset>
                        </form>
                    </div>
                    </div>
                </div>
            </div>            
        </article>



<article>
<div class="form-group col-lg-12">
<label for="wordsCo" >Votre humeur du jour&nbsp;<a href="#small" data-toggle="collapse" aria-expanded="false" aria-controls="#small"><i class="fa fa-info-circle"></i></a></label>
                    <div class="collapse form-group col-lg-6" id="small">Ceci apparaîtra de manière aléatoire et anonyme dans votre Espace Famille. A vous de devinez quels auteurs se cachent derrière ces lignes...
                    </div>


           
                        <p style="font-style:italic;">"<?= $modif['words'] ?>"</p>
                        <hr>
         
<?php
// CHANGE SURNAME FOR MISSES
if($modif['gender'] == 1){      
?>
                    <label for="surnameCo" class="label1">Nom</label>
                        <input type="text" id='surnameCo'  name="surnameCo" value="<?= $modif["surname"] ?>" > <br /> 

<?php
}
else{
?>

                        <input type="hidden" id='surnameCo'  name="surnameCo" value="<?= $modif["surname"] ?>" > 

<?php
}
?>                                     
                    <p>Inscrit le <?= $modif['newRegDate'] ?></p>
                    <p><?= $modif['mail'] ?></p>
                    
                        <p>Né le <?= $modif['newBirthdate'] ?></p>
                   
                        <hr >  
                      
                   
                        <p>Adresse : <?= $modif['city'] ?></p>
                        <a href="http://localhost/chicouf/index.php?action=recoverUser&id=<?= $modif['idMember'] ?>">Modifier mon profil</a>
                   
</div>

</div>



</article>
</div> 
<br />
 <!--*********BLOG BILLS***************-->
<?php
if(!(empty($getBlogData))){
?>

        <div class="mainPV">
            <h2 class="mbr-section-title" style="text-align:center;">Gérer mes billets de Blog</h2>
            <div id="listMemberBlog">
<div class="row">
<?php
foreach($getBlogData as $blogData){
?>      

            <h5 class="offset-lg-2 col-lg-8" >_<?= $blogData['title'] ?> publié le <?= $blogData['newPubDate'] ?></h5>

<?php
}
?>
</div>
            </div>
        </div>


<?php
}?>


<!--********BLOG EDITOR*************-->
 
<br />  
   <div class="mainPV">
        <h2 class="mbr-section-title" style="text-align:center;">Espace d'expression</h2>
        <script type="text/javascript" src="app\Views\frontend\tinymce\js\tinymce\tinymce.min.js"></script> 
        <script type="text/javascript">
		tinymce.init({
			// type de mode
			// mode : "exact", 
			//language : "fr_FR",
			// id ou class, des textareas
			// elements : "texte,texte2", 
			// en mode avancé, cela permet de choisir les plugins
			theme : "modern", 
			// liste des plugins
			selector: "textarea",
			plugins : "autoresize,autolink,lists,pagebreak,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template,wordcount,advlist,autosave,visualblocks",

			// les outils à afficher
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
			
			// // emplacement de la toolbar
			// theme_simple_toolbar_location : "top",  
			// // alignement de la toolbar
			// theme_advanced_toolbar_align : "left",
			// // positionnement de la barre de statut
			// theme_advanced_statusbar_location : "bottom", 
			// // permet de redimensionner la zone de texte
			// theme_advanced_resizing : true,
			
			// chemin vers le fichier css
			// content_css : "views/backend/global/design-tiny.css", 
			// taille disponible
			theme_advanced_font_sizes: "10px,11px,12px,13px,14px,15px,16px,17px,18px,19px,20px,21px,22px,23px,24px,25px", 
			// couleur disponible dans la palette de couleur
			theme_advanced_text_colors : "33FFFF, 007fff, ff7f00", 
			// balise html disponible
			theme_advanced_blockformats : "h1, h2,h3,h4,h5,h6",
			// class disponible
			theme_advanced_styles : "Tableau=textTab;TableauSansCadre=textTabSansCadre;", 
			// possibilité de définir les class et leurs styles directement avec le code suivant
			/*
			style_formats : [
				{title : 'Bold text', inline : 'b'},
				{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
				{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
				{title : 'Example 1', inline : 'span', classes : 'example1'},
				{title : 'Example 2', inline : 'span', classes : 'example2'},
				{title : 'Table styles'},
				{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
			],
			*/
		});
	</script>


        <form class="entree commentsEdition" id="formBlog" action="index.php?action=saveBlog" method="POST">
            <label for="blogTitle">Titre de l'article</label>
            <input type="text" id="blogTitle" name="blogTitle" /></br>
            <label class="upper" for="blogImg">Illustration</label>
            <input class="upper" type="file" id="blogImg" name="blogImg" /><br />
            <textarea id="blogContent" name="blogContent" style="background-color:black;color:white;" rows="50"></textarea><br />
            <input type='submit' name="submit" id="idFormBlog" value="Sauvegarder" />
        </form>






    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'templateHeadScripts.php' ?>