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
if(isset($_SESSION['num_vol']) ){
	$articleParPage = 10;
 $_GET['tome'] = intval($_GET['tome']);
  $_GET['titre'] =$_GET['titre'];
   $_GET['Num_vol'] = intval($_GET['Num_vol']);
  $_GET['titre_vol'] =$_GET['titre_vol'];
  
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
                <a href="" class="btn btn-lg btn-block btn-primary mt-auto">Hire Me</a>
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
			
			<h2 style="text-align:center; font-weight:bold;" class="title mb-1">Listes des textes</h2><br>
			<h4 style="text-align:left; font-weight:bold;" class="title mb-1"><a href="Tomes.php?Num_vol=<?=$_GET['Num_vol'] ?>&titre=<?= $_GET['titre'] ?>">Volume <?=$_GET['Num_vol'].":".$_GET['titre']?></a></h4><br>
	       <?php
         if(isset($_SESSION['num_vol']) ) 
		 {
			  $tome = $bdd->prepare('SELECT * FROM tome WHERE Num_vol = ?');
			  $tome->execute(array($_GET['Num_vol']));
			  $tom = $tome->fetch();
			
         ?>
		   <h4 style="text-align:left; font-weight:bold;" class="title mb-1">Tome <?=$_GET['tome'].":".utf8_encode($tom['titre_tome'])?></h4><br>
	      
		  <?php
         }
         ?>
	

    
				
		    </div>
	    </section>
	    
                
                
                <!-- Blog List Start -->
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
<?php
      }else{
			  header("Location: index.php");  
		 }
      ?>