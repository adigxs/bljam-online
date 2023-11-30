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

	$_GET['Num_vol'] = intval($_GET['Num_vol']);
		$_GET['titre'] = $_GET['titre'];
	$tomeParPage = 10;
$tomeTotalesReq = $bdd->query('SELECT num_tome FROM tome');
$tomeTotales = $tomeTotalesReq->rowCount();
$pagesTotales = ceil($tomeTotales/$tomeParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) 
{
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
  $pageCourante = 1;
}
$depart = ($pageCourante-1)*$tomeParPage;

$active=2;

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
ul.a {
  list-style-type: circle;
}

ul.b {
  list-style-type: square;
}

ol.c {
  list-style-type: upper-roman;
}

ol.d {
  list-style-type: lower-alpha;
}
</style>
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
<script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>
	<style>
* {box-sizing: border-box;}

.img-magnifier-container {
  position:relative;
}

.img-magnifier-glass {
  position: absolute;
  border: 2px solid #c4a218;
  border-radius: 50%;
  cursor: none;
  /*Set the size of the magnifier glass:*/
  width: 100px;
  height: 100px;
}
</style>
<style>

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #c4a218;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>
 <style>

/* Full-width input fields */

/* Set a style for all buttons */


button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
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
	<div class="en_tete_bloc_left"><h3 style="  background: linear-gradient(to right, #c4a218, white);color:white;">Liste des Tomes : Textes et documents du cameroun</h3>  </div>
		<div class="card1">
	
          <h4 style="color:grey;">Volume <?=$_GET['Num_vol'].": ".$_GET['titre']?></h4>
		  <?php
		 
      $tome = $bdd->prepare('SELECT * FROM tome WHERE Num_vol = ? ORDER BY num_tome ASC LIMIT '.$depart.','.$tomeParPage);
	  $tome->execute(array($_GET['Num_vol']));
      while($tom = $tome->fetch()) {
      ?><ul class="a">
		  <li><h4><a style="color:grey;" href="contenu_tomes.php?tome=<?= $tom['num_tome']?>&titre=<?=$tom['titre_tome']?>&Num_vol=<?=$_GET['Num_vol']?>&titre_vol=<?=$_GET['titre']?>"><?= "Tome ".$tom['num_tome']." : ".$tom['titre_tome'] ?></a></h4></li>
		 </ul> <div class="img-magnifier-container"><img id="myimage<?= $tom['num_tome'] ?>" src="img/tomes/volumes <?= $tom['Num_vol'] ?>/<?= $tom['num_tome'] ?>.jpg" style="border:1px solid #c4a218; width:200px;height:250px;margin-right:10px; float:left;">
                               </div>
                              <form method="POST" onsubmit="return sendData<?= $tom['num_tome'] ?>()">
								 <input type="text" name="titre" value="<?= "Volume ".$tom['num_tome']." : ".utf8_encode($tom['num_tome']) ?>" id="titre<?= $tom['num_tome']?>" hidden >
								 <input type="number" name="prix" value="1500" id="prix<?=$tom['num_tome']?>"  hidden >
								 <input type="text" name="id_user" value="<?= $_SERVER['REMOTE_ADDR'] ?>" id="id_user<?= $tom['num_tome']?>"  hidden >
								
								 <input style="width:15%; text-align:left;" type="submit" name="submit_form" value="Ajouter au panier">
							<p>Prix: 1000 XAF</p>
						      </form><br><br><br><br><br><br><br>
<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage<?= $tom['num_tome'] ?>", 3);
</script>		<?php
      }
      ?>   <div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
					

					<div class="container">
					    <p style="text-align:center;font-size:1.5vw;text-transform: uppercase;">Panier</p>
						
					<p>
						<?php 
							 $pan = $bdd->prepare('SELECT * FROM panier WHERE id_user = ? ORDER BY id ');
								  $pan->execute(array($_SERVER['REMOTE_ADDR']));
								  $total=0;
								  while($pan_ = $pan->fetch()) {
									 echo $pan_["volume"]." à ".$pan_["prix"]." xaf <br>";
									 $total=$pan_["prix"]+$total;
								  }
									echo "Total : ".$total." xaf";
						?>
						</p>
						<hr style=" border-top: 3px dashed #c4a218;">
						
						 <p style="text-align:center;font-size:1.5vw;text-transform: uppercase;">Identification </p>
					
					  <input type="text"  name="uname" placeholder="Nom" required>
					 
					  <input type="text"  name="unamee" placeholder="Prénom" required>
                        <p style="text-align:center; color:white;">.</p>
					  <hr style=" border-top: 3px dashed #c4a218;">
						 <p style="text-align:center;font-size:1.5vw;text-transform: uppercase;">Mode de paiement</p>
						 <table style="margin:auto;">
		<tr>
		   <td><img src="img/OIP.jfif" ><td><img src="img/OIP1.jfif" ></td><td><img src="img/th.jfif" ></td><td><img src="img/th1.jfif" > </td>
		</tr>
	 </table><br>
						<hr style=" border-top: 3px dashed #c4a218;">
						
					 <input type="submit" value="Acheter" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
					  
					  
					  
					  
					  
					</div>

					<div class="container" style="background-color:#f1f1f1">
					  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
					 
					</div>
				  </form></div>
 
		 </div>
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

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
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
<script>
// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
