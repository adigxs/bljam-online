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

	$volumeParPage = 10;
$volumeTotalesReq = $bdd->query('SELECT Num_vol FROM volume');
$volumeTotales = $volumeTotalesReq->rowCount();
$pagesTotales = ceil($volumeTotales/$volumeParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) 
{
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
  $pageCourante = 1;
}
$depart = ($pageCourante-1)*$volumeParPage;

$page_active=2;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bloggy - Personal Blog Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
		<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

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
  left:37.5%;
  top: 0;
  width: 50%; /* Full width */
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
  width: 80%; /* Could be more or less, depending on screen size */
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
      function sendData()
{
  var titre = document.getElementById("titre").value;
  var prix = document.getElementById("prix").value;
  var id_user = document.getElementById("id_user").value;

  $.ajax({
    type: 'post',
    url: 'insert.php',
    data: {
      titre:titre,
      prix:prix,
	  id_user:id_user
    },
    success: function (response) {
      $('#res').html("Vos données seront sauvegardées");
    }
  });
    
  return false;
}
    </script>
    </head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="img/profile.jpg" alt="Image">
                <h1 class="font-weight-bold">Kate Glover</h1>
                <p class="mb-4">
                    Justo stet no accusam stet invidunt sanctus magna clita vero eirmod, sit sit labore dolores lorem. Lorem at sit dolor dolores sed diam justo
                </p>
                <div class="d-flex justify-content-center mb-5">
                    <a class="btn btn-outline-primary mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="#"><i class="fab fa-instagram"></i></a>
                </div>
               
            </div>
            <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                <i class="fas fa-2x fa-angle-double-right text-primary"></i>
            </div>
        </div>
        <div class="content">
            <!-- Navbar Start -->
			<?php include("menu.php");?>
           <!-- Navbar End -->

            	    <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container">
			<h2 style="text-align:center; font-weight:bold;" class="title mb-1">Listes des volumes</h2><br>
			<h5 style="text-align:left; color:red; " class="title mb-1">Chaque volume coute 1500 xaf</h5><br>
			<?php
		 
      $volume = $bdd->query('SELECT * FROM volume ORDER BY Num_vol ASC LIMIT '.$depart.','.$volumeParPage);
      while($vol = $volume->fetch()) {
		  
		  $_SESSION['num_vol'] = $vol['Num_vol'];
		  $_SESSION['Titre_vol'] = $vol['Titre_vol'];
      ?>
			    <div class="item mb-5">
				    <div class="media">
					     <div class="media-body">
						 
						    <h3 class="title mb-1"><a href="Tomes.php?Num_vol=<?=$vol['Num_vol'] ?>&titre=<?= $vol['Titre_vol'] ?>"><?= "Volume ".$vol['Num_vol']." : ".$vol['Titre_vol']  ?></a></h3>
						    <!--/ <div class="meta mb-1"><span class="date">Published 2 days ago</span><span class="time">5 min read</span><span class="comment"><a href="#">8 comments</a></span></div>
						   --> <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...
						   <form method="POST" onsubmit="return sendData();">
								 <input type="text" name="titre" value="<?= "Volume ".$vol['Num_vol']." : ".$vol['Titre_vol']  ?>" id="titre" hidden>
								 <input type="number" name="prix" value="1500" id="prix" hidden>
								 <input type="text" name="id_user" value="<?= $_SERVER['REMOTE_ADDR'] ?>" id="id_user" hidden >
								 <input class="btn btn-lg  btn-primary " type="submit" name="submit_form" value="Ajouter au panier">
							</form>
						   
						    </div>
						   <!--/ <a class="more-link" href="blog-post.html">Read more &rarr;</a>
					    --></div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
			<?php
      }
      ?>    
	  <a  onclick="document.getElementById('id01').style.display='block'" class="btn btn-lg btn-block btn-primary mt-auto">Acheter</a> 
                
				

		    </div>
			
		
	    </section>
	    
               
           
                <!-- Blog List Start -->
                <div class="container bg-white pt-5">
                   
				   <div class="row blog-item px-3 pb-5">
                      <div class="row px-3 pb-5">
                        <nav aria-label="Page navigation">
                          <ul class="pagination m-0 mx-3">
                            <li class="page-item">
                             <a class="page-link" href="Volumes.php?page=<?=$pageCourante-1?>"  aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
							<li class="page-item active ">	<table>
							<tr>		<?php
								  for($i=1;$i<=$pagesTotales;$i++) {?>
									<?php if($i == $pageCourante) {?>
										<?= " <td>".$i."</td> " ?>
									<?php } else {?>
										  <?= '<td><a class="page-link" href="Volumes.php?page='.$i.'">'.$i.'</a></td>'?>
										 <?php   }
										   ?>
								 <?php }
								  ?>
								  </tr>
								  </table>
                          </li>
                             
                            <li class="page-item">
                              <a class="page-link" href="Volumes.php?page=<?=$pageCourante+1?>"  aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div> 
				<div  id="id01" class="modal">
  
				  <form class="modal-content animate" action="/action_page.php" method="post">
					

					<div class="container">
					    <p style="text-align:center">Panier </p>
						
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
						<hr style=" border-top: 3px dashed #bbb;">
						
						<p style="text-align:center">Identification </p>
					  <label for="uname"><b>Nom</b></label>
					  <input type="text" placeholder="Enter Username" name="uname" required>
					  <label for="uname"><b>Prénom</b></label>
					  <input type="text" placeholder="Enter Username" name="uname" required>

					  <hr style=" border-top: 3px dashed #bbb;">
						<p style="text-align:center">Mode de paiement</p>
						
						<hr style=" border-top: 3px dashed #bbb;">
						
					  <button type="submit">Acheter</button>
					  
					  
					  
					  
					  
					</div>

					<div class="container" style="background-color:#f1f1f1">
					  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
					 
					</div>
				  </form>
                </div>
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
                <!-- Blog List End -->
                
                
                <!-- Footer Start -->
                <div class="container py-4 bg-secondary text-center">
                    <p class="m-0 text-white">
                        &copy; <a class="text-white font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed by <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
                    </p>
                </div>
                <!-- Footer End -->
            </div>
        </div>
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
