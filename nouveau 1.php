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
  background-color: #8a00e6;
  color: white;
  padding: 15px 15px;
  margin-top: 5px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #4c0080;
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
  background: #8a00e6;
  color: black;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #4c0080;
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
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #ffd900;
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
   border: 3px solid #ffd900;
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

/* Header/Blog Title */
.header {
  padding: 40px;
  font-size: 80px;
  text-align: center;
  background-image:  url("img/ba2.jpg");
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
  border: 3px solid #ffd900;
  background: #ffd900;

}
.en_tete_bloc_left
{
	  margin: auto;
  width: 100%;
  border: 3px solid #8a00e6;
  background: #8a00e6;
  margin-top: 20px;
}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>

</head>
<body >
<div  class="all">
<div class="header">
  <h2  ></h2>
</div>
<div class="menu">
<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
</div>

<div class="row">
  <div class="leftcolumn">
  <div class="en_tete_bloc_left"><h3 style="background: #8a00e6;color:white;">Message de bienvenu</h3>  </div>
    <div class="card1">
	
      
      <h5>Title description, Dec 7, 2017</h5>
      <div class="fakeimg" style="height:200px;">Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
   
	<div class="en_tete_bloc_left"><h3 style="background: #8a00e6;color:white;">Message de bienvenu</h3>  </div>
    <div class="card1">
	
      
      <h5>Title description, Dec 7, 2017</h5>
    
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
    
  </div>
  
  <div class="rightcolumn">
    <div style="background: #ffd900;color:white;" class="card">
     <div class="en_tete_bloc"> <p style="background: #ffd900;color:white;">Je cherche, je trouve...</p></div>
<form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search.." name="search2">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
     
      <p style="background: #b39800;color:white; text-align:center; border-radius:5px;"> Recherche avancée</p>
    </div>
   <div style="background: #ffd900;color:white;" class="card">
      <p style="background: #ffd900;color:white;">Se connecter</p>


  <form style="background: #ffd900;" action="/action_page.php">
   
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

 
    <input type="password" id="lname" name="lastname" placeholder="Your last name..">

   
  
    <input type="submit" value="Submit">
  </form>

</div>
  
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>
</div>

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
