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
	<?php
		 
      $article = $bdd->prepare('SELECT * FROM articles WHERE Num_vol = ? AND num_tome = ? ORDER BY num_article DESC LIMIT '.$depart.','.$articleParPage);
	  $article->execute(array($_SESSION['num_vol'],$_GET['tome'] ));
	  
      while($art = $article->fetch()){
      ?>
			    <div class="item mb-5">
				    <div class="media">
					     <div class="media-body">
						 
						    <h3 class="title mb-1"><a href="contenu_text.php?"><?= $art['num_article']." : ".strtoupper($art['titre_article']) ?></a></h3>
						    <!--/ <div class="meta mb-1"><span class="date">Published 2 days ago</span><span class="time">5 min read</span><span class="comment"><a href="#">8 comments</a></span></div>
						   --> <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
						   <!--/ <a class="more-link" href="blog-post.html">Read more &rarr;</a>
					    --></div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
			<?php
      }
      ?>    
				
		    </div>
	    </section>
	    
                
                
                <!-- Blog List Start -->
                <div class="container bg-white pt-5">
                   
				   <div class="row blog-item px-3 pb-5">
                      <div class="row px-3 pb-5">
                        <nav aria-label="Page navigation">
                          <ul class="pagination m-0 mx-3">
                            <li class="page-item">
                             <a class="page-link" href="Tomes.php?page=<?=$pageCourante-1?>"  aria-label="Previous">
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
										  <?= '<td><a class="page-link" href="Article_par_tome.php?page='.$i.'">'.$i.'</a></td>'?>
										 <?php   }
										   ?>
								 <?php }
								  ?>
								  </tr>
								  </table>
                          </li>
                             
                            <li class="page-item">
                              <a class="page-link" href="Tomes.php?page=<?=$pageCourante+1?>"  aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
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
<?php
      }else{
			  header("Location: index.php");  
		 }
      ?>