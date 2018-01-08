<?php
	//session_start();
	//header('Location: produits.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Acheter produit financier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script language="javascript" src="js/global.js"></script>
  <link rel="stylesheet" href="css/investisseur.css" type="text/css" />
  <link rel="stylesheet" href="css/accueil.css" type="text/css" />
</head>
<body onLoad="creerListesProduits();">
<a href="index.php">Accueil</a>
<?php
if(!isset($_COOKIE['authentification'])) {
    echo "<a href=\"connexion.html\">Il faut se connecter d'abord pour pouvoir ajouter des produits à son panier.</a>";
} else {
   $produit = $institution = $prix = $risque = $idRisque = $idBank = $idUtilisateur = null;
   echo "<br><br><br><div class=\"tabInscription\">";
	   $produit = test_input($_GET['nom']);
	   echo "<b>".$produit."</b><br>";
	   $institution = test_input($_GET['institution']);
	   echo "<i>".$institution."</i><br>";
	   $prix = test_input($_GET['prix']);
	   echo $prix."<br>";
	   $risque = test_input($_GET['risque']);
	   echo $risque."<br>";
	   $idRisque = test_input($_GET['IdRisk']);
	   echo "IdRisk:".$idRisque."<br>";
	   $idRisque = intval($idRisque);
	   $idBank = test_input($_GET['IdBank']);
	   echo "IdBank:".$idBank."<br>";
	   $idBank = intval($idBank);
	   $idUtilisateur = $_COOKIE["IdUtil"];
	   echo "IdUtilisatuer: ".$idUtilisateur."<br>";
	   $idUtilisateur = intval($idUtilisateur);
	   echo "<form action=\"\" method=\"POST\" id=\"ajouterAuPanier\" name=\"ajouterAuPanier\">
	   Produit:<input type=\"text\" value=\"".$produit."\"><br>
	   Nom institution:<input type=\"text\" value=\"".$institution."\"><br>
	   Prix:<input type=\"text\" value=\"".$prix."\"><br>
	   Type de risque:<input type=\"text\" value=\"".$risque."\"><br>
	   Id risque:<input type=\"text\" value=\"".$idRisque."\"><br>
	   Id Institution:<input type=\"text\" value=\"".$idBank."\"><br>
	   Id Utilisateur:<input type=\"text\" value=\"".$idUtilisateur."\"><br>";
	   echo 'Quantité:<select id="quantiteProduits" name="quantiteProduits"></select><br>';
	   //echo '<input type="text" name="nb">';
	   echo "<input type=\"submit\" id=\"envoi\" value=\"Ajouter au panier\" name=\"nombreProduits\"><br>
	   <input type=\"reset\" value=\"Recommencer\">
	   </form>";
   echo "</div><br><br>";
    $quantite = 0;
	$i = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_POST['nombreProduits'])) {
		$quantite = intval($_POST['quantiteProduits']);
		echo "Vous avez commande: ".$quantite;
    }
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=conseiller;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
	 $req = $bdd->prepare('INSERT INTO produitsachetes(
	id_utilisateur, nom, id_institution, prix, id_risque) 
	VALUES(:id_utilisateur, :nom, :id_institution, :prix, :id_risque)') or die(print_r($bdd->errorInfo()));
	 
	 for($i = 0; $i<$quantite; $i++) {
		 $req->execute(array(
			 'id_utilisateur' => $idUtilisateur, //ok
			 'nom' => $produit,//ok
			 'id_institution' => $idBank,//ok
			 'prix' => $prix,//ok
			 'id_risque' => $idRisque //ok
			
			 ));
		}
	}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>