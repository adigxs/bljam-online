

<?php
 
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
if( isset( $_POST['titre'] ) )
  {
    $volume = $_POST['titre'];
    $prix = $_POST['prix'];
    $id_user = $_POST['id_user'];
	
	 $exist_in_cart = $bdd->prepare("SELECT volume FROM panier WHERE id_user = ?");
               $exist_in_cart->execute(array($id_user));
			   $exist_in = $exist_in_cart->rowCount();
			    $exist_i = $exist_in_cart->fetch();
			   $it=0;
			  while($exist_i = $exist_in_cart->fetch())
					{
						if($exist_i["volume"]==$volume){$it++;}
					}
                        if($it==0){
							$req = $bdd->prepare('INSERT INTO panier (volume,prix,id_user) VALUES(?,?,?)');
$req->execute(array($volume,$prix,$id_user));
						}
    
  

  }
?>