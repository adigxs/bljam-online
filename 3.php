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
	var_dump($searchResult);
	$ids=implode(",",$searchResult["ids"]);
	if($searchResult['hits']!=0){
	$q = $bdd->query("SELECT * FROM volume WHERE Num_vol IN ($ids) ORDER BY FIELD(Num_vol,$ids) ");
	$articles1=$q->fetchAll(PDO::FETCH_ASSOC);
	}
	
	 $tnt2->selectIndex("tomes.index");
	 $searchResult2= $tnt2->search($_GET['q']);
	 var_dump($searchResult2);
	 $ids=implode(",",$searchResult2["ids"]);
	if($searchResult2['hits']!=0){
	$q = $bdd->query("SELECT * FROM tome WHERE num_tome IN ($ids) ORDER BY FIELD(num_tome,$ids) ");
	$articles2=$q->fetchAll(PDO::FETCH_ASSOC);
	}
	
	$tnt3->selectIndex("articless.index");
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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recherche</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 
    <form method="GET">
        <input type="search" placeholder="Rechercher..." name="q">
        <button type="submit">OK</button>
    </form>
    
   
        <h2>
            Résultats<br>
            <small><?= $searchResult['hits'] ?> résultats en <?= $searchResult['execution_time'] ?></small>
        </h2>
 <?php if ($articles1): ?>
        <ul>
		 <h2>Volumes</h2> 
		 <h2>
            Résultats<br>
            <small><?= $searchResult['hits'] ?> résultats en <?= $searchResult['execution_time'] ?></small>
        </h2>
            <?php


			foreach ($articles1 as $article1): ?>
                <li>
                    <h3>[#<?= $article1['Num_vol'] ?>] <?= $article1['Titre_vol'] ?></h3>
                   
                </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
	
	<?php if ($articles2): ?>
        <ul>
		  <h2>Tomes</h2>
		  <h2>
            Résultats<br>
            <small><?= $searchResult2['hits'] ?> résultats en <?= $searchResult['execution_time'] ?></small>
        </h2>
            <?php


			foreach ($articles2 as $article2): ?>
                <li>
                    <h3>[#<?= $article2['num_tome'] ?>] <?= $article2['titre_tome'] ?></h3>
                   
                </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
	
	<?php if ($articles3): ?>
        <ul>
		   <h2>Articles</h2>
		   <h2>
            Résultats<br>
            <small><?= $searchResult3['hits'] ?> résultats en <?= $searchResult['execution_time'] ?></small>
        </h2>
            <?php


			foreach ($articles3 as $article3): ?>
                <li>
                    <h3>[#<?= $article3['num_article'] ?>] <?= $article3['titre_article'] ?></h3>
                   
                </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
    
</body>
</html>