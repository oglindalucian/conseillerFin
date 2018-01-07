<!DOCTYPE html>
<html lang="fr">
<head>
		<meta charset="UTF-8">
		<title>Recherche produits financiers</title>
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
<body data-spy="scroll" data-target=".navbar" data-offset="50">	
  
<?php include 'menu.php';?>	 

<?php

$produitRecherche = $_POST['produitRecherche'];
echo '<span id="termes"></span>';
echo '<span id="Haut"></span>';
echo "<br><br><br><br><h2 align=\"center\">Vous cherchez le produit <b>".$produitRecherche.". </b></h2>
<p align=\"center\"><i>Voici les résultats de la recherche:</i></p>";

// echo "<div class=\"dropdown\" id=\"premier\">\n"; 
// echo "    <button class=\"btn btn-primary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">Filtrez votre recherche:\n"; 
// echo "    <span class=\"caret\"></span></button>\n"; 
// echo "    <ul class=\"dropdown-menu\">\n"; 
// echo "      <li><a href=\"prix.php\">Prix</a></li>\n"; 
// echo "      <li><a href=\"typeProduit.php\">Type produit</a></li>\n"; 
// echo "      <li><a href=\"institution.php\">Institution</a></li>\n";
// echo "      <li><a href=\"risque.php\">Risque</a></li>\n"; 
// echo "    </ul>\n"; 
// echo "  </div>\n"; 
// echo "</div>\n";

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=conseiller;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT p.nom AS nomProduit, i.id_institution AS IdInstitution, i.nom AS nomInstitution, ROUND(p.prix,2) 
AS prix_arrondi, r.id_risque AS IdRisque, r.explication AS explicationRisque
FROM produits p, institutions i, risque r 
WHERE i.id_institution = p.id_institution AND
r.id_risque = p.id_risque AND
p.nom LIKE "%'.$produitRecherche.'%"
ORDER BY p.nom, i.nom');
?>

<table border=1>
<tr><th>Numéro</th><th>Nom produit</th><th>Institution financiere</th><th>Prix</th><th>Risque</th><th>Acheter</th></tr>

<?php
$i = 0;
$lien = "";
while ($donnees = $reponse->fetch())
{
	$i++;
	if(!isset($_COOKIE['authentification'])) {
		$lien = "<a href=\"connexion.html\">Connexion</a>";
		echo '<tr><td>'.$i.'</td><td>'.$donnees['nomProduit']. '</td><td>'.$donnees['nomInstitution'].'</td><td>$'
		.$donnees['prix_arrondi'].'</td><td>'.$donnees['explicationRisque'].'</td><td>'.$lien.'</td></tr>';
	} else {
		$lien = '<a id="'.$i.'"  href="acheter.php?nom='
	.$donnees['nomProduit'].'&institution='.$donnees['nomInstitution'].'&prix='.$donnees['prix_arrondi'].'&risque='.$donnees['explicationRisque'].
	'&IdRisk='.$donnees['IdRisque'].'&IdBank='.$donnees['IdInstitution'].'">Acheter</a>';
	
	echo '<tr><td>'.$i.'</td><td>'.$donnees['nomProduit']. '</td><td>'.$donnees['nomInstitution'].'</td><td>$'
	.$donnees['prix_arrondi'].'</td><td>'.$donnees['explicationRisque'].'</td><td>'.$lien.'</td></tr>';
	}
}

$reponse->closeCursor();
echo "</table><br>";
if($i===0) {
	echo "<p align=\"center\">Aucun résultat ne correspond à votre recherche.</p>";
	echo '<p align="center"><a href="produits.php">Réessayez</a></p>';
}
echo "<br><br><br><br>";
?>	

<?php  //if($ok===true) 
	include 'footer.php';?>
</body>
</html>