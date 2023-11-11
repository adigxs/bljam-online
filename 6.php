<?php
require('1.php');
use TeamTNT\TNTSearch\TNTSearch;
 


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
	 
 
	  $indexer3=$tnt3->createIndex("articlesss.index");
	 
	 $indexer3->query("SELECT Num_vol FROM articles ");
    
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