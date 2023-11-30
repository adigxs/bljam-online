<?php
require('1.php');
use TeamTNT\TNTSearch\TNTSearch;
 
	$articles1 = [];
	$articles2 = [];
	$articles3 = [];
if (!empty($_GET['q'])) {

    $tnt = new TNTSearch;
 
    $tnt->loadConfig([
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'mon_site_juridique',
        'username'  => 'root',
        'password'  => '',
        'storage'   => '.',
        'stemmer'   => \TeamTNT\TNTSearch\Stemmer\PorterStemmer::class
    ]);
	$tnt2 = new TNTSearch;
 
    $tnt2->loadConfig([
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'mon_site_juridique',
        'username'  => 'root',
        'password'  => '',
        'storage'   => '.',
        'stemmer'   => \TeamTNT\TNTSearch\Stemmer\PorterStemmer::class
    ]);
	$tnt3 = new TNTSearch;
 
    $tnt3->loadConfig([
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'mon_site_juridique',
        'username'  => 'root',
        'password'  => '',
        'storage'   => '.',
        'stemmer'   => \TeamTNT\TNTSearch\Stemmer\PorterStemmer::class
    ]);
     $tnt->selectIndex("volumess.index");   
    $searchResult= $tnt->search($_GET['q']);	
	//var_dump($searchResult);
	$ids=implode(",",$searchResult["ids"]);
	if($searchResult['hits']!=0){
	$q = $bdd->query("SELECT * FROM volume WHERE Num_vol IN ($ids) ORDER BY FIELD(Num_vol,$ids) ");
	$articles1=$q->fetchAll(PDO::FETCH_ASSOC);
	}
	
	 $tnt2->selectIndex("tomes.index");
	 $searchResult2= $tnt2->search($_GET['q']);
	// var_dump($searchResult2);
	 $ids=implode(",",$searchResult2["ids"]);
	if($searchResult2['hits']!=0){
	$q = $bdd->query("SELECT * FROM tome WHERE num_tome IN ($ids) ORDER BY FIELD(num_tome,$ids) ");
	$articles2=$q->fetchAll(PDO::FETCH_ASSOC);
	}
	
	$tnt3->selectIndex("articlesss.index");
	$searchResult3= $tnt3->search($_GET['q']);
    $ids=implode(",",$searchResult3["ids"]);	
	if($searchResult3['hits']!=0){
	$q = $bdd->query("SELECT * FROM articles WHERE num_article IN ($ids) ORDER BY FIELD(num_article,$ids) ");
	$articles3=$q->fetchAll(PDO::FETCH_ASSOC);
	
	}
	
    //$indexer->query("SELECT Num_vol,Titre_vol FROM volume ");
   // $indexer->setPrimaryKey('Num_vol');
	  //  $indexer->setLanguage('french');
		//$indexer->run();
} 
if (!empty($_GET['formconnexion1'])) {
	 $num_vol = htmlspecialchars($_GET['num_vol']);
  $num_tome = htmlspecialchars($_GET['num_tome']);
     $Annee= htmlspecialchars($_GET['annee']);
	 
		 $date=$Annee;
		 
	
	
	 $cont = $bdd->prepare('SELECT * FROM articles WHERE Num_vol=? AND num_tome=? AND date_publication=?');
			  $cont->execute(array($num_vol,$num_tome,$date));
			  $conRC = $cont->rowCount();
			  $conn=$cont->fetchAll(PDO::FETCH_ASSOC);
	 
			  
}
$active=0;
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
input[type=text], input[type=password] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 100%;
  background: #f1f1f1;
}

input[type=submit] {
  width: 100%;
  background-color: #c4a218;
  color: white;
  padding: 15px 15px;
  margin-top: 5px;
  border: none;
  border-radius: 2px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #e8daa6;
}


</style>
<style>

* {
  box-sizing: border-box;
    background: #ffd900;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #c4a218;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #e8daa6;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
<style>


.topnav {
  overflow: hidden;
  background-color: #ffffff;
}

.topnav a {
  margin: auto;
  width: 60%;
  color: #808080;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
   
}

.topnav a:hover {
  background-color: #c4a218;
  color: black;
}

.topnav a.active {
  background-color: #c4a218;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
<style>
* {
  box-sizing: border-box;
 
    background-color: #f2f2f2;
}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
 background: white;
  width: 80%;
   margin: auto;

   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

/* Header/Blog Title */
.header {
  padding: 5%;
  text-align: center;
  background-image:  url("img/ba2.png");
  background-size: 100%;
    background-repeat: no-repeat;
  border: 1px solid #ffd900;
   margin-top: 0px;

}
.menu {
  padding: 10px;
  font-size: 10px;
  text-align: center;
  background: white;
  
  margin-top:20px;
}
/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: right;
  width: 75%;
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

/* Right column */
.rightcolumn {
  float: right;
  width: 25%;
  padding-right: 20px;

}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}
.card1 {
   background-color: white;
   padding: 20px;
   
}

.card2 {
   background-color: #ffd900;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 15px;
  text-align: center;
  margin-top: 20px;
   border: 2px solid #c4a218;
}
.en_tete_bloc
{
	  margin: auto;
  width: 100%;
    border: white;
  background: linear-gradient(to right, #c4a218, white);

}
.en_tete_bloc_left
{
	  margin: auto;
  width: 100%;
  border: 3px solid white;
  background: linear-gradient(to right, #c4a218, white);
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width:800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
 
}
</style>
<style>

.price3{
    list-style-type: none; 
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
   float: left;
  width: 50%;
  border-left-style: solid;
    border-color: #c4a218;

}


.price1 {
   list-style-type: none;
  -webkit-transition: 0.3s;
  transition: 0.3s;
   float: left;
  width: 50%;

    border-color: #c4a218;
	
}

@media only screen and (max-width: 600px) {
  .price1 {
    width: 100%;
	border-bottom-style: solid;
	border-right-style: none;
    border-color: #c4a218;

  }
   
   .price3 {
    width: 100%;
	border-left-style: none;
  }
}
</style>

</head>
<body >

<div class="header">
  <h2  ></h2>
</div>

<?php
include("menu2.php");
?>

<div class="row">
  <div class="leftcolumn">
	<div class="en_tete_bloc_left"><h3 style="  background: linear-gradient(to right, #c4a218, white);color:white;">Résultats</h3>  </div>
		<div class="card1">
	
      
		
 <?php if ($articles1): ?>
        <ul>
		 <h4>Volumes</h4> 
		 <h4>
           
            <small><?= $searchResult['hits'] ?> résultat(s) en <?= $searchResult['execution_time'] ?></small>
        </h4>
            <?php


			foreach ($articles1 as $article1): ?>
                <li>
                    <h4><a style="color:grey;" href="contenu_publication_tomes.php?Num_vol=<?=$article1['Num_vol'] ?>&titre=<?= $article1['Titre_vol'] ?>">Volume <?= $article1['Num_vol'] ?> : <?= $article1['Titre_vol'] ?></a></h4>
                   
                </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
	
	<?php if ($articles2): ?>
        <ul>
		  <h4>Tomes</h4>
		  <h4>
            
            <small><?= $searchResult2['hits'] ?> résultat(s) en <?= $searchResult['execution_time'] ?></small>
        </h4>
            <?php
				
			foreach ($articles2 as $article2):  
			$volume = $bdd->prepare('SELECT * FROM volume WHERE Num_vol = ?');
                $volume->execute(array($article2['Num_vol']));
				$vol = $volume->fetch();?>
                <li>
                    <h4><a style="color:grey;" href="contenu_tomes.php?tome=<?= $article2['num_tome']?>&titre=<?=utf8_encode($article2['titre_tome'])?>&Num_vol=<?=$article2['Num_vol']?>&titre_vol=<?=$vol['Titre_vol']?>">Tome <?= $article2['num_tome'] ?> : <?= $article2['titre_tome'] ?>, Volume : <?= $article2['Num_vol'] ?></a></h4>
                   
                </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
	
	<?php if ($articles3): ?>
        <ul>
		   <h4>Contenu des tomes</h4>
		   <h4>
            
            <small><?= $searchResult3['hits'] ?> résultat(s) en <?= $searchResult['execution_time'] ?> </small>
        </h4>
            <?php


			foreach ($articles3 as $article3): ?>
                <li>
                    <h4>  <a style="color:grey;" href="post.php?article=<?=$article3['num_article'] ?>"><?= strtoupper($article3['titre_article']) ?>, Volumes : <?= $article3['Num_vol'] ?> , Tome : <?= $article3['num_tome'] ?></a></h4>
                   
                </li>
				
            <?php endforeach ?>
        </ul>
    <?php endif ?>
   
	<?php if (!empty($_GET['formconnexion1'])): ?>
        <ul>
		   <h4>Contenu des tomes</h4>
		   <h4>
            
            <small><?= $conRC ?> résultat(s)  </small>
        </h4>
            <?php


			foreach ($conn as $con3): ?>
                <li>
                    <h4> <a style="color:grey;" href="post.php?article=<?= $con3['num_article'] ?>"><?= strtoupper($con3['titre_article']) ?>, Volumes : <?= $con3['Num_vol'] ?> , Tome : <?= $con3['num_tome'] ?></a></h4>
                   
                </li>
				
            <?php endforeach ?>
        </ul>
    <?php endif  ?></div>
    
  </div>
<?php
include("bloc_de_gauche.php");
?>
  
</div>

<?php
include("footer.php");
?>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>
