<!DOCTYPE html>
<html lang="fr">
<head>
<title>Profil investisseur</title>
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
	
	$age = $profession = $risque = $profil = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$age = $_POST["age"];
		$profession = $_POST["profession"];
		$risque = $_POST["risque"];
	  }  
 
	if($age<34 || $risque=="2") {
		$profil = "Investisseur agréssif";
	}
	else if(($age>=34 && $age<46)|| $risque=="3") {
		$profil = "Investisseur modéré";
	}
	else if(($age>=46 && $age<61)|| $risque=="4") {
		$profil = "Investisseur modéré";
	}
	else if($risque=="1") {
		$profil = "Investisseur très agréssif";
	}
	else if($risque=="5") {
		$profil = "Investisseur très modéré";
	}
		
	echo '<br><br><br>';	
	echo '<p align="center">Vous avez indiqué les détails suivants concernant votre profil d\'investisseur: age:'.$age.', profession: '.$profession.', risque: '.$risque.'.</p><br>';
		
	echo "<h4 align=\"center\">Votre profil: ".$profil."</h4>";
	echo "<h2 align=\"center\"><b><i>Liste des produits qui pourraient vous intéresser:</i></b></h2>";
	
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
r.id_risque = "'.$risque.'"
ORDER BY nomProduit, nomInstitution');

?>
<?php //include 'chercherProduit.php';?>

<?php //include 'filtre.php';?>

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
echo "</table><br><br><br><br>";

?>	

<?php  include 'footer.php';?>
</body>
</html>