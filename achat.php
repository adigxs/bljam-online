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


$article=htmlspecialchars($_GET['article']);

if(isset($_POST['submit'])){
	$itemArr=$_POST['name'];
	foreach($itemArr as $list){
		if($list!=''){
			
			$req = $bdd->prepare('insert into test_json(json_value) values(?)');
            $req->execute(array($list));
		}
	}

}

$active=2;


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

@media screen and (max-width: 800px) {
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

      <!-- Telephone Input CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css'>
      <!-- Icons CSS -->
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
      <!-- Nice Select CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css'>
     <!-- Style CSS -->
    <link rel="stylesheet" href="c/css/style.css">
	<!-- Demo CSS -->
	<link rel="stylesheet" href="c/css/demo.css">
</head>
<body>

<div class="header">
  <h2  ></h2>
</div>

<?php
include("menu2.php");
?>

<div class="row">
  <div class="leftcolumn">
	<div class="en_tete_bloc_left"><h3 style="  background: linear-gradient(to right, #c4a218, white);color:white;">Achat</h3>  </div>

<div class="card1">
		 <section class="multi_step_form">  
  <form id="msform"> 
   
    <!-- fieldsets -->
	  <fieldset>
      
     <?php $volume = $bdd->query('SELECT * FROM volume ORDER BY Num_vol');?>
	 <?php $tome = $bdd->query('SELECT * FROM tome ORDER BY num_tome');?>
	 <?php $dece = $bdd->query('SELECT * FROM articles ORDER BY num_article');?>

      <h5>Vous avez choisi: <?= strtoupper($article) ?> </h5><br>
	  <div class="passport">
        
        <h3>Ajouter un volume</h3>
      </div>
	<div id="wrap1">
		<input type="button"  name="add_btn1" value="Ajouter" onclick="add_more1()"><br><br>
		
		
		<select class="form-control" name="name1[]" id="name">
          <?php  while($vol = $volume->fetch()) { ?>
          <option><?=$vol['Titre_vol']?></option>
		  <?php }?>
        </select><br><br>
		<input type="hidden" id="box_count1" value="1">
		<table ><tr><td><div >Total=</div></td><td><div style="text-align:right;" id="m1">10000</div></td><td><div > XAF</div></td></tr></table><br>

	</div>
	
	<div class="passport">
        
        <h3>Ajouter un tome</h3>
      </div>
	<div id="wrap2">
		<input type="button"  name="add_btn2" value="Ajouter" onclick="add_more2()"><br><br>
		
		<select class="form-control" name="name2[]" id="name">
          <?php  while($tom = $tome->fetch()) { ?>
          <option><?=$tom['titre_tome']?></option>
		  <?php }?>
		  <input type="hidden" id="box_count2" value="1">
        </select><br><br><table><tr><td><div >Total=</div></td><td><div style="text-align:right;" id="m2">5000</div></td><td><div > XAF</div></td></tr></table><br>

	</div>
      <div class="passport">
        
        <h3>Ajouter un Article</h3>
      </div>
      <div id="wrap3">
		<input type="button"  name="add_btn3" value="Ajouter" onclick="add_more3()"><br><br>
		
		<select class="form-control" name="name2[]" id="name">
          <?php  while($dec = $dece->fetch()) { ?>
          <option><?=$dec['titre_article']?></option>
		  <?php }?>
		  <input type="hidden" id="box_count3" value="1">
        </select><br><br><table><tr><td><div >Total=</div></td><td><div style="text-align:right;" id="m2">500</div></td><td><div > XAF</div></td></tr></table><br>

	</div>
      <button type="button" style="background-color:#c4a218;" class="next action-button">Continue</button>  
    </fieldset> 
	
    <fieldset>
      <h3>Liste de ce qui a été choisi</h3>
     
      <div class="passport">
        <h4>Volume 1 : 10000 xaf <br>Volume 2 : 10000 xaf<br>Volume 3 : 10000 xaf</h4> <br>
        <h4>Total : 30000 xaf</h4>
      </div>
	  
      
      <button type="button" class="action-button previous previous_button">Back</button>
      <button type="button" style="background-color:#c4a218;" class="next action-button">Continue</button>  
    </fieldset>  
    <fieldset>
      <h3>Informations personelles</h3>
    
      <div class="form-group fg_2"> 
        <input type="text" class="form-control" placeholder="Name">
      </div> 
      <div class="form-group fg_2"> 
        <input type="text" class="form-control" placeholder="Prénom">
      </div> 
      <div class="form-group fg_2"> 
        <input type="email" class="form-control" placeholder="Email">
      </div> <br>
	  <h3>Mode de paiment</h3>
     <table style="margin:auto;">
		<tr>
		   <td><img src="img/OIP.jfif" ><td><img src="img/OIP1.jfif" ></td><td><img src="img/th.jfif" ></td><td><img src="img/th1.jfif" > </td>
		</tr>
	 </table><br>
      <button type="button"  class="action-button previous previous_button">Back</button>
      <a href="#" style="background-color:#c4a218;" class="action-button">Acheter</a> 
    </fieldset>  
  </form>  
</section> 
  
</div>
<br>
		

                      		  

        <br> 
  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>		
  </div>
<?php
include("bloc_de_gauche.php");
?>
  <div data-show-empty-cart="VALUE" class="ec-cart-widget"></div>
<div><script data-cfasync="false" type="text/javascript"
src="https://app.ecwid.com/script.js?STORE_ID&data_platform=code"
charset="utf-8"data-fixed="TRUE"></script><script>Ecwid.init();</script></div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js'></script>
    <script src="c/js/script.js"></script>
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
<style>
#wrap{width:20%;}
.my_box{width:100%; padding-bottom:36px;}
.field_box{float:left;width:80%;}
.button_box{float:left;width:20%;}
</style>
<script src="jquery-1.4.1.min.js"></script>
<script>
<?php $volume = $bdd->query('SELECT * FROM volume ORDER BY Num_vol');?>
<?php $volume1 = $bdd->query('SELECT * FROM tome ORDER BY num_tome');?>

<?php $dece = $bdd->query('SELECT * FROM articles ORDER BY num_article');?>


function add_more1(){
	var box_count1=jQuery("#box_count1").val();
	box_count1++;
	jQuery("#box_count1").val(box_count1);
	jQuery("#wrap1").append(' <div class="my_box" id="box_loop_1'+box_count1+'"><div class="field_box"><select class="form-control" name="name1[]" id="name1"<?php  while($vol = $volume->fetch()) { ?><option><?=$vol["Titre_vol"]?></option> <?php }?> </select></div><br><div class="button_box"><br><input type="button" name="submit" id="submit" value="Retirer" onclick=remove_more1("'+box_count1+'")></div></div><br>');
document.getElementById("m1").innerHTML = box_count1*10000;
}
function remove_more1(box_count1){
	jQuery("#box_loop_1"+box_count1).remove();
	var box_count1=jQuery("#box_count1").val();
	box_count1--;
	jQuery("#box_count1").val(box_count1);
	document.getElementById("m1").innerHTML = (box_count1--)*10000 ;
}

function add_more2(){
	var box_count2=jQuery("#box_count2").val();
	box_count2++;
	jQuery("#box_count2").val(box_count2);
	jQuery("#wrap2").append(' <div class="my_box" id="box_loop_2'+box_count2+'"><div class="field_box"><select class="form-control" name="name2[]" id="name2"<?php  while($vol1 = $volume1->fetch()) { ?><option><?=$vol1["code_tome"] ?></option> <?php }?> </select></div><br><div class="button_box"><br><input type="button" name="submit" id="submit" value="Retirer" onclick=remove_more2("'+box_count2+'")></div></div><br>');
document.getElementById("m2").innerHTML = box_count2*10000;
}

function remove_more2(box_count2){
	jQuery("#box_loop_2"+box_count2).remove();
	var box_count2=jQuery("#box_count2").val();
	box_count2--;
	jQuery("#box_count2").val(box_count2);
	document.getElementById("m2").innerHTML = (box_count2--)*3000 ;
}

function add_more3(){
	var box_count3=jQuery("#box_count3").val();
	box_count3++;
	jQuery("#box_count3").val(box_count3);
	jQuery("#wrap3").append(' <div class="my_box" id="box_loop_3'+box_count3+'"><div class="field_box"><select class="form-control" name="name3[]" id="name3"<?php  while($dec = $dece->fetch()) { ?><option><?=$dec["titre_article"] ?></option> <?php }?> </select></div><br><div class="button_box"><br><input type="button" name="submit" id="submit" value="Retirer" onclick=remove_more3("'+box_count3+'")></div></div><br>');
document.getElementById("m3").innerHTML = box_count3*10000;
}

function remove_more3(box_count3){
	jQuery("#box_loop_3"+box_count3).remove();
	var box_count3=jQuery("#box_count3").val();
	box_count3--;
	jQuery("#box_count3").val(box_count3);
	document.getElementById("m3").innerHTML = (box_count3--)*500 ;
}
</script>
</body>
</html>
