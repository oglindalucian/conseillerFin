<!DOCTYPE html>
<html lang="fr">
<head>
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
</head>
<body>
  <?php include 'menu.php';?>	

<?php

echo "<br><br><br><br><span id=\"Haut\"></span>";
echo '<h1 align="center">Liste des produits disponibles actuellement</h1>';
$ok = false;
	try
{
	$bdd = new PDO('mysql:host=localhost;dbname=conseiller;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT p.nom AS nomProduit, i.nom AS nomInstitution, ROUND(p.prix,2) AS prix_arrondi, r.explication AS explicationRisque
FROM produits p, institutions i, risque r 
WHERE i.id_institution = p.id_institution AND
r.id_risque = p.id_risque
ORDER BY nomProduit, nomInstitution');
?>
<table border=1 style="border-collapse:collapse; margin:2% auto;">;
<tr><th>Nom produit</th><th>Institution financiere</th><th>Prix</th><th>Risque</th><th>Acheter</th></tr>;

<?php
while ($donnees = $reponse->fetch())
{
	echo '<tr><td>'.$donnees['nomProduit']. '</td><td>'.$donnees['nomInstitution']. '</td><td>$'.$donnees['prix_arrondi']. '</td><td>'.$donnees['explicationRisque']. '</td><td><a href="acheter.php">Acheter</a></td></tr>';
}

$reponse->closeCursor();
echo "<br><br><br><br>";
$ok = true;
?>	

<?php  if($ok===true) include 'footer.php';?>
</body>
</html>