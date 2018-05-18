<?php $title = 'Accueil' ?>
<?php ob_start(); ?>
<?php require 'templateNav.php' ?>

<style>body{background-color:#ebe7f7;}</style>
<div class="container">
    <div class="row">
        <h1 class="col-sm-12 h1Home">Bienvenue sur Chicouf.fr</h1>
        <h2 class="col-sm-12 ita3">"Chic ils arrivent... Ouf&nbsp;ils repartent !"</h2>
    </div>
    <section>
        <article id="mainContent">
            <h2>Qu'est-ce que c'est ?</h2>
            <p>C'est l'expression de tendresse par laquelle les grands-parents désignent les progénitures de leurs progénitures. Toujours ravis de les accueillir et de partager du temps avec eux, les grands-parents n'en sont pas moins soulagés aux moments des adieux !</p>

            <p>Chicouf.fr propose de mettre en relation parents et grand-parents. En effet, il n'est pas toujours aisé de se tenir à jour des habitudes alimentaires et autres caprices de chaque enfant. Surtout quand leur nombre croît. Chicouf.fr vous propose une interface d'échange permettant de mettre à jour et de se tenir au courant de ces variations. Vous pouvez également notifier les traitements médicaux éventuels pour chacun des enfants et d'autres choses encore. </p>
        </article>
        <article>
            <h2>Concrètement...</h2>
            <p>En s'inscrivant sur le site, un utilisateur est amené dans un premier temps à créer une fiche pour son enfant. Ensuite, pour partager ces renseignements, il créé ou rejoint un Espace Famille où tous les utilisateurs de cette Famille (grand-parents, oncles, tantes...) pourront lire et modifier les informations de l'Enfant. Un Espace Famille peut contenir autant d'adultes et d'enfants que nécessaires. </p>
        </article>
    </section>
<!--********REGISTRATION FORM****************-->
<?php 
if(isset($_SESSION['id'])){    
}
else{
    require 'registrationView.php';
}
?>

</div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>





