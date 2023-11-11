<?php
require('./1.php');
 
$apiKey = "b1749927d9404ecda7296333e45e88d1";
 
$categories = ['technology', 'sports', 'science', 'business', 'entertainment'];
foreach ($categories as $category) {
    $endpoint = "https://newsapi.org/v2/top-headlines?category=".$category."&amp;pageSize=100&amp;country=fr&amp;apiKey=".$apiKey;
 
    $response = file_get_contents($endpoint);
    $response = json_decode($response);
    var_dump($response);
 
    foreach ($response->articles as $article) {
        $q = $bdd->prepare('INSERT INTO articles (title, author, content, description, imageUrl, publishedAt) VALUES (:title, :author, :content, :description, :imageUrl, :publishedAt)');
        $q->bindValue('title', $article->title);
        $q->bindValue('author', $article->author);
        $q->bindValue('content', $article->content);
        $q->bindValue('description', $article->description);
        $q->bindValue('imageUrl', $article->urlToImage);
        $q->bindValue('publishedAt', date("Y-m-d H:i:s", strtotime($article->publishedAt)));
        $q->execute();
    }
}