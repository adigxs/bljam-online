<?php $active=2;?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
</head>
<body >

<div class="header">
  <h2  ></h2>
</div>

<?php
include("menu2.php");
?>

<div class="row">
 <ul class="a">
  <div class="leftcolumn">
	<div class="en_tete_bloc_left"><h3 style="  background: linear-gradient(to right, #c4a218, white);color:white;">Liste des  publications</h3>  </div>
		<div class="card1">
	
      
		 <li> <h4 ><a style="color:grey;" href="contenu_publication_volumes.php">Textes et documents du cameroun (1815-2012)</a></h4>
		   </li><p style="color:grey;">
		  <div class="img-magnifier-container"><img id="myimage" src="img/3.jpg" style="border:1px solid #c4a218; width:200px;height:250px;margin-right:10px; float:left;">
                               </div>
							  
		<p style="color:grey;">Cet ouvrage de 250 tomes a été produit par le Professeur Magloire Ondoa et son équipe

160.000 Pages, 67 volumes et 250 tomes sont les résultats des dix dernières années de travail acharné du professeur 
Magloire Ondoa pour produire « Textes et Documents du Cameroun (1815-2012) » paru aux éditions Le Kilimandjaro à Yaoundé. Comme l’a souligné Paul-Gérard Pougoue, professeur à l’Université de Yaoundé II Soa et préfacier de l’ouvrage, c’est un pari insensé qui a été tenu. Présenté à la presse le mercredi 29 mai dernier, « Textes et Documents du Cameroun (1815-2012) » du Professeur Magloire Ondoa, nait de l’expérience malheureuse et de la personnalité scientifique et humaine de l’étudiant Ondoa. Devenu mature, le besoin de consolider la théorie de l’autonomie des droits africains, son cheval de bataille scientifique, ainsi que celui de rendre hommage à la mémoire de Ferdinand Léopold Oyono, son père spirituel, lui ont permis de maintenir cette flamme allumée et d’y trouver la force de mener à son terme, l’ambitieux projet d’offrir au 
public les « Textes et Documents du Cameroun (1815-2012) ».</p>
<p style="color:grey;">Pour rassembler tous ces textes et documents du Cameroun 
de 1815 à 2012, selon le Professeur Ondoa, des émissaires ont été envoyés à Buéa, Douala, l’Assemblée nationale, au ministère
 de l’Administration Territorial et de la Décentralisation, à la Direction du Journal Officiel, sans oublier des voyages en
 Europe et dans d’autres pays du continent africain. Pour les textes communautaires par exemple, il a fallu se rendre en
 République Centrafricaine. A travers « Textes et Documents du Cameroun (1818-2012) », le Professeur Ondoa
 conforte sa théorie de l’autonomie du droit camerounais, popularise le droit et participe à la conservation 
 du patrimoine juridique du Cameroun. Sur le plan théorique, cet ouvrage répond au besoin d’illustrer la thèse
 de l’autonomie des droits africains en général et camerounais en particulier, que l’auteur défend depuis une
 quinzaine d’années. Au plan pratique, cet ouvrage se propose de combler le déficit d’information juridique qui rallonge les délais des recherches en droit, complique la décision administrative ou politique et rend aléatoire la justice ou le destin judiciaire des citoyens.</p>
		</p></div>
   
	    <div class="card1">
	
		 <li> <h3 style="color:grey;">Autre livres...</h3></li>
		  <p style="color:grey;">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
		</div>
    
  </div>
  </ul>
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
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage", 3);
</script>
</body>
</html>
