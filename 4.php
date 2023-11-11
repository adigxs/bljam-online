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
	 
     // $tnt->selectIndex("articles.index");
	// $index = $tnt->getIndex("articles.index");
	
	// $index->update(25, ["id" => "25", "Titre_vol" => "25 chats"]);
    //$searchResult= $tnt->search($_GET['q']);
	//var_dump($searchResult);
	//$ids=implode(",",$searchResult["ids"]);
	//if($searchResult['hits']!=0){
	//$q = $bdd->query("SELECT Num_vol, Titre_vol FROM volume WHERE Num_vol IN ($ids) ORDER BY FIELD(Num_vol,$ids ) ");
	//$articles=$q->fetchAll(PDO::FETCH_ASSOC);
	
	
?>