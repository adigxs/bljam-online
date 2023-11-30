<?php
try
{
// On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=mon_site_juridique', 'root', '');
}
catch(Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
die('Erreur : '.$e->getMessage());

}
?>