<meta charset="UTF-8">
		<title>Dictionnaire</title>
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

echo "<br><br><br><br><span id=\"Haut\"></span>\n"; 
echo "		<div class=\"jumbotron text-center\">\n"; 
echo "			<p>Recherchez dans le dictionnaire:</p> \n"; 
echo "			<form class=\"form-inline\" action=\"serveur/rechercheDictionnaire.php\" method=\"post\">\n"; 
echo "				<input type=\"search\" size=\"50\" name=\"votreRecherche\">\n"; 
echo "				<input type=\"submit\" class=\"btn btn-default\" value=\"Recherchez\">			\n"; 
echo "			</form>\n"; 
echo "		</div>\n"; 
echo "<span id=\"termes\"></span>";
echo "	<br><br>\n";

	try
{
	$bdd = new PDO('mysql:host=localhost;dbname=conseiller;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT terme FROM dictionnaire');
$i = 0;
while ($donnees = $reponse->fetch())
{
	$i++;
	echo '<p style="margin-left:5%;"><a href="#'.$i.'">'.$donnees['terme'] . '</a></p>';
}

$reponse->closeCursor();
	
echo "<br><br>\n"; 

$reponse = $bdd->query('SELECT * FROM dictionnaire WHERE 1');
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
?>

<?php include 'footer.php';?>



