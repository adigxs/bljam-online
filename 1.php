	<?php
require('vendor/autoload.php');
 
/**
 * SQL permettant de cr&eacute;er la table 'articles' :
 * create table articles (id int primary key auto_increment, title varchar(255), author varchar(255), content text, description text, imageUrl text, publishedAt datetime);
 */
 
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