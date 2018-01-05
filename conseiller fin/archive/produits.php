
<title>Produits</title>
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

  <?php include 'menu.php';?>	

<?php

echo "<br><br><br><br><span id=\"Haut\"></span>";

	// if(!$fic=fopen("donnees/produits.txt","r")) {
		// echo "erreur: produits.txt";
		// exit;
	// }
	// $liste="<ul>";
	// $ligne=fgets($fic);
	// while(!feof($fic)) {
		// $tab = explode(";",$ligne);
		// $liste.="<li>".$tab[1]."</li>";
		// $ligne=fgets($fic);
	// }
	// $liste.="</ul>";
	// echo $liste;
	// fclose($fic);
	
	try
{
	$bdd = new PDO('mysql:host=localhost;dbname=conseiller;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT nom, id_institution, ROUND(prix,2) AS prix_arrondi, id_risque FROM produits ORDER BY nom');
echo '<table border=1 style="border-collapse:collapse;">';
echo '<tr><th>Nom produit</th><th>Institution financiere</th><th>Prix</th><th>Risque</th></tr>';
while ($donnees = $reponse->fetch())
{
	
	echo '<tr><td>'.$donnees['nom']. '</td><td>'.$donnees['id_institution']. '</td><td>'.$donnees['prix_arrondi']. '</td><td>'.$donnees['id_risque']. '</td></tr>';
}

$reponse->closeCursor();
	
echo "<br><br><br><br>";

?>

<?php include 'footer.php';?>