<?php
//session_start();
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
<?php
if(!isset($_COOKIE['authentification'])) {
    echo "<a href=\"connexion.html\">Il faut se connecter d'abord pour pouvoir ajouter des produits à son panier.</a>";
} else {
   // echo $_SESSION["produitSelectionne"]."<br>";
   // echo $_SESSION["nomInstitutionProduit"]."<br>";
   // echo $_SESSION["prixProduit"]."<br>";
   // echo $_SESSION["risqueProduit"];
   echo "<br><br><br><div class=\"tabInscription\">";
	   $produit = test_input($_GET['nom']);
	   echo "<b>".$produit."</b><br>";
	   $institution = test_input($_GET['institution']);
	   echo "<i>".$institution."</i><br>";
	   $prix = test_input($_GET['prix']);
	   echo $prix."<br>";
	   $risque = test_input($_GET['risque']);
	   echo $risque."<br>";
	   echo "<form action=\"\" method=\"post\" id=\"ajouterAuPanier\" name=\"ajouterAuPanier\">
	   Quantité:<select id=\"quantiteProduits\" nom=\"quantiteProduits\"><select><br><input type=\"submit\" value=\"Ajouter au panier\"></form>";
   echo "</div><BR><BR>";
   $quantite = "";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $quantite = test_input($_POST["quantiteProduits"]);
   echo $quantite;
   }
   
   try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
 $req = $bdd->prepare('INSERT INTO produitsachetes(
id_utilisateur, nom, id_institution, prix, id_risque) 
VALUES(:id_utilisateur, :nom, :id_institution, :prix, :id_risque)') or die(print_r($bdd->errorInfo()));
 $req->execute(array(
	 'id_utilisateur' => $nom,
	 'nom' => $produit,
	 'id_institution' => $console,
	 'prix' => $prix,
	 'id_risque' => $nbre_joueurs_max,
	
	 ));
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