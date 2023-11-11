<?php
require('1.php');
use TeamTNT\TNTSearch\TNTSearch;
 

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
	
	 
     $indexer1=$tnt->createIndex("volumess.index");
	 
	 $indexer1->query("SELECT Num_vol,Titre_vol FROM volume ");
     $indexer1->setPrimaryKey('Num_vol');
	 $indexer1->setLanguage('french');
     $indexer1->run();
	 
	 $indexer2=$tnt2->createIndex("tomes.index");
	 
	 $indexer2->query("SELECT num_tome,titre_tome FROM tome ");
     $indexer2->setPrimaryKey('num_tome');
	 $indexer2->setLanguage('french');
     $indexer2->run();
	 
	 $indexer3=$tnt3->createIndex("articlesss.index");
	 
	 $indexer3->query("SELECT * FROM articles ");
     $indexer3->setPrimaryKey('num_article');
	 $indexer3->setLanguage('french');
     $indexer3->run();
	 
	
	 //$index->update(25, ["id" => "25", "Titre_vol" => "25 chats"]);
    //$searchResult= $tnt->search($_GET['q']);
	//var_dump($searchResult);
	//$ids=implode(",",$searchResult["ids"]);
	//if($searchResult['hits']!=0){
	//$q = $bdd->query("SELECT Num_vol, Titre_vol FROM volume WHERE Num_vol IN ($ids) ORDER BY FIELD(Num_vol,$ids ) ");
	//$articles=$q->fetchAll(PDO::FETCH_ASSOC);
	
	
?>