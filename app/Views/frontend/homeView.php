<?php $title = 'Accueil' ?>
<?php ob_start(); ?>
<?php require 'bureau.php' ?>



<div class="container">
    <div class="row">
        <h1 class="col-sm-12 h1Home">Bienvenue sur Chicouf.fr</h1>
    </div>
    <section>
        <article id="mainContent">
            <h2>Qu'est-ce que c'est ?</h2>
            <p>FAFA-FAFA-FAFAFAFA-FAFA Vous êtes designer, artiste, étudiant ou chercheur ? Qu’elle ait un caractère technique ou artistique, qu’elle ait un but commercial ou non, votre création peut faire l’objet d’un dépôt par enveloppe Soleau.
L’enveloppe Soleau, du nom de son créateur, est un moyen de preuve simple et peu coûteux. Elle vous permet de vous constituer une preuve de création et de donner une date certaine à votre idée ou votre projet.</p>

<p>L’enveloppe Soleau vous identifie comme auteur. Le droit d’auteur protège les œuvres littéraires, les créations musicales, graphiques et plastiques, mais aussi les logiciels, les créations de l’art appliqué, les créations de mode, etc. Les artistes-interprètes, les producteurs de vidéogrammes et de phonogrammes ainsi que les entreprises de communication audiovisuelle ont également des droits voisins du droit d’auteur.</p>
        </article>
        <article>
            <h2>L'enveloppe Soleau</h2>
            <p>L’enveloppe Soleau est un moyen de preuve de création dont les formalités de dépôt à l’INPI sont peu contraignantes.
            Qui peut la déposer ? Toute personne (auteur, créateur, inventeur, etc.) voulant se constituer une preuve de création. Plusieurs personnes peuvent déposer ensemble une enveloppe Soleau.
            Quand la déposer ? Vous pouvez effectuer votre dépôt à tout moment. Mais pour que vous puissiez vous en servir comme preuve, il est recommandé de le faire dès la réalisation de votre création.
            Où se la procurer ? vous pouvez la commander en ligne, vous pouvez, depuis le 15 décembre 2016, déposer en quelques clics vos créations. Une démarche en ligne rapide et sécurisée proposant une solution d'archivage certifiée à valeur probatoire.</p>
        </article>
    </section>

<!--********REGISTRATION FORM****************-->    
<?php require 'registrationView.php';
?>

</div>

<?php $content = ob_get_clean(); ?>
<!--template.php-->
<?php require 'templateHeadScripts.php'; ?>





