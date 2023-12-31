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
if(isset($_SESSION['id']) AND $_SESSION['id'] > 0  ) {
$num_article=htmlspecialchars($_GET['article']);
$contrnu_article = $bdd->prepare('SELECT * FROM articles WHERE num_article = ?');
			  $contrnu_article->execute(array($num_article));
			  $cont_art = $contrnu_article->fetch();
$active=2;
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
  padding: 20px;
  text-align: center;
  background: #333333;
  margin-top: 20px;
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
  width:50%;
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
	<div class="en_tete_bloc_left"><h3 style="  background: linear-gradient(to right, #c4a218, white);color:white;">Message de bienvenue</h3>  </div>
		<div class="card1">
	
      
		   <div class="single-post">
			<h4 style="color:grey;"><?= strtoupper($cont_art["titre_article"]) ?> </h4>
              
			  
          
    <?php
         if( isset($num_article)) 
		 {
			 
			 
			  $tome = $bdd->prepare('SELECT * FROM tome WHERE Num_vol = ?');
			  $tome->execute(array($cont_art['Num_vol']));
			  $tom = $tome->fetch();
			  
			 
						 
			
         ?>
         <p style=" text-indent: 50px; color:grey;"> <?= $cont_art['texte_avant_visa'] ?></p>
		 
		     
					  
					  <?php	 
					
							
					  
					 for ($i= 0; $i < $cont_art['nb_visa']; $i++)
					{?>  
						 <p style=" text-indent: 50px; color:grey;" id="demo<?=$i?>"> </p>         
					  
					  <script>
const myJSON<?=$i?> = <?= $cont_art['json_visa']?>;
const myArray<?=$i?> = JSON.parse(myJSON<?=$i?>);
document.getElementById("demo<?=$i?>").innerHTML = myArray<?=$i?>[<?=$i?>];

</script>  
				         	
				 <?php	}
					  
					  ?>
				
		 
		 
		 <?php	 		
					  
					 for ($t= 0; $t < $cont_art['nb_arti']; $t++)
					{?>  
						 <p style=" text-indent: 50px; color:grey;" id="demoo<?=$t?>"> </p>         
					  
					  <script>
var text1<?=$t?> = <?=$t?>;	
if (text1<?=$t?> < 1) {
  text1<?=$t?> = "Article premier.-";
} 	else {
	text1<?=$t?> = "Art.<?=$t+1?>.-";
}	  
const myJSONN<?=$t?> = <?= $cont_art['json_article']?>;
const myArrayy<?=$t?> = JSON.parse(myJSONN<?=$t?>);

document.getElementById("demoo<?=$t?>").innerHTML =  text1<?=$t?>.bold().concat(myArrayy<?=$t?>[<?=$t?>]);

</script>  
				<?php	}
					  
					  ?>          	
				 
					   <p style=" text-align: right; text-indent: 45%; color:grey;"> <?= $cont_art['text_a_droite'] ?></p>
					   <p style=" text-align: right; text-indent: 45%; font-weight:bold; color:grey;"> <?= strtoupper($cont_art['nom_president']) ?></p>
					   <h5 style="font-weight:bold; color:grey;">Ampliations :</h5><br/>
					   
					    <?php	 
					
							
					  
					 for ($y= 0; $y < $cont_art['nb_ampliation']; $y++)
					{?>  
						 <p style="color:grey;" id="demooo<?=$y?>"> </p>         
					  
					  <script>
const myJSONNN<?=$y?> = <?= $cont_art['json_ampliations']?>;
const myArrayyy<?=$y?> = JSON.parse(myJSONNN<?=$y?>);
document.getElementById("demooo<?=$y?>").innerHTML = myArrayyy<?=$y?>[<?=$y?>];

</script>  
				         	
				 <?php	}
					  
					  ?>
					   
				 <?php	   }
         ?>
			
               </div><!-- End Single Post Content -->

      </div>
   

    
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
<?php	}else{
header("Location: index1.php");  }
					  ?> 