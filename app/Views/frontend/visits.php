<?php 
//VIEWS COUNT
if(file_exists('public/compteur_pages_vues.txt'))
{
        $compteur_f = fopen('data/compteur_pages_vues.txt', 'r+');
        $compte = fgets($compteur_f);
}
else
{
        $compteur_f = fopen('data/compteur_pages_vues.txt', 'a+');
        $compte = 0;
}
$compte++;
fseek($compteur_f, 0);
fputs($compteur_f, $compte);
fclose($compteur_f); 

//VISITS COUNT
if(file_exists('public/compteur_visites.txt'))
{
        $compteur_f2 = fopen('data/compteur_visites.txt', 'r+');
        $compte2 = fgets($compteur_f2);
}
else
{
        $compteur_f2 = fopen('data/compteur_visites.txt', 'a+');
        $compte2 = 0;
}
if(!isset($_SESSION['compteur_de_visite']))
{
        $_SESSION['compteur_de_visite'] = 'visite';
        $compte2++;
        fseek($compteur_f2, 0);
        fputs($compteur_f2, $compte2);
}
fclose($compteur_f2);
?>