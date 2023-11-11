<?php
session_start();
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

	$articleParPage = 10;
 $_GET['tome'] = intval($_GET['tome']);
$articleTotalesReq = $bdd->query('SELECT num_article FROM articles');
$articleTotales = $articleTotalesReq->rowCount();
$pagesTotales = ceil($articleTotales/$articleParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) 
{
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
  $pageCourante = 1;
}
 $depart = ($pageCourante-1)*$articleParPage;

$active=2;

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
  width: 33.3%;
  border-left-style: solid;
    border-color: #c4a218;

}

.price2 {
    list-style-type: none;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
   float: left;
  width: 33.3%;

}
.price1 {
   list-style-type: none;
  -webkit-transition: 0.3s;
  transition: 0.3s;
   float: left;
  width: 33.3%;
  border-right-style: solid;
    border-color: #c4a218;
	
}


@media only screen and (max-width: 600px) {
  .price1 {
    width: 100%;
	border-bottom-style: solid;
	border-right-style: none;
    border-color: #c4a218;

  }
   .price2 {
    width: 100%;
	border-bottom-style: solid;
	
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
	<div class="en_tete_bloc_left"><h3 style="  background: linear-gradient(to right, #c4a218, white);color:white;">Liste des decisions/conseils : Textes et documents du cameroun</h3>  </div>
		<div class="card1">
	<?php
         if(1) 
		 {
			
			
         ?>
  
          <h4 style="color:grey;">Volume <?=$_GET['Num_vol'].": ".$_GET['titre_vol']?></h4>
		  <?php
         }
         ?><?php
         if(1) 
		 {
			  $tome = $bdd->prepare('SELECT * FROM tome WHERE titre_tome = ?');
			  $tome->execute(array($_GET['titre']));
			  $tom = $tome->fetch();
			
         ?>
  
		  <h4 style="color:grey;">Tome.<?= $_GET['tome']?> : <?= $_GET['titre'] ?></h4>
		    
			<?php
         }
         ?>
		   <ul> <?php
		
      $article = $bdd->prepare('SELECT * FROM articles WHERE Num_vol = ? AND num_tome = ? ORDER BY num_article DESC LIMIT '.$depart.','.$articleParPage);
	  $article->execute(array($_GET['Num_vol'],$_GET['tome'] ));
	  
      while($art = $article->fetch()) {
      ?>
		  <li><h5 ><a style="color:grey;" href="post.php?article=<?= $art['num_article'] ?>"><?= strtoupper($art['titre_article']) ?></a></h5> </li>
		  <p style="color:grey;"> <?= $art['description_contenu'] ?> le <?=  utf8_encode($art['date_publication']) ?> --><a style="color:grey;" href="">Lire</a></p>
		 
		
			<?php
      }
      ?>
	  	  </ul></div>
	  <br>
		

                      		  
<div class="w3-bar" style="text-align:center;">
  <a href="contenu_publication_tomes.php?page=<?=$pageCourante-1 ?>&Num_vol=<?=$_GET['Num_vol'] ?>&titre=<?= $_GET['titre'] ?>" class="w3-button">«</a>
  <?php
								  for($i=1;$i<=$pagesTotales;$i++) {?>
									<?php if($i == $pageCourante) {?>
										<?= " <td>".$i."</td> " ?>
									<?php } else {?>
										  <?= '<a  class="w3-button" style="background-color:#c4a218;color:white;" href="contenu_publication_tomes.php?page='.$i.'&Num_vol='.$_GET['Num_vol'].'&titre='.$_GET['titre'].'">'.$i.'</a>'?>
										 <?php   }
										   ?>
								 <?php }
								  ?>

  <a href="contenu_publication_tomes.php?page=<?=$pageCourante+1?>&Num_vol=<?=$_GET['Num_vol'] ?>&titre=<?= $_GET['titre'] ?>" class="w3-button">»</a>
</div>
        <br> 
	

    
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
