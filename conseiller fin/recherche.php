<!DOCTYPE html>
<html lang="fr">
<head>
		<meta charset="UTF-8">
		<title>Recherche termes financiers</title>
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

$termeRecherche = $_POST['votreRecherche'];
echo '<span id="termes"></span>';
echo '<span id="Haut"></span>';
echo "<br><br><br><br><h2 align=\"center\">Vous cherchez le terme <b>".$termeRecherche.". </b></h2>
<p align=\"center\"><i>Voici les résultats de la recherche:</i></p><br><br>";

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=conseiller;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM dictionnaire WHERE terme LIKE "%'.$termeRecherche.'%"');
$j = 0;
while ($donnees = $reponse->fetch())
{
	$j++;
	if($j%5===0) {
			echo "<p align=\"center\"><a href=\"#termes\">Début</a></p>";
		}
	echo "<div style=\"margin-left:7%;\" id = \"$j\"><dt><b>".$donnees['terme']."</b></dt></div>";
	echo "<dd>".$donnees['definition']."</dd><br>";
}
$reponse->closeCursor();
if($j===0) {
	echo "<p>Aucun résultat ne correspond à votre recherche.</p>";
	echo '<p><a href="dictionnaire.php">Réessayez</a></p>';
}

?>

<?php include 'footer.php';?>

</body>
</html>