<meta charset="UTF-8">
		<title>Dictionnaire</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script language="javascript" src="../js/global.js"></script>
	  <link rel="stylesheet" href="../css/investisseur.css" type="text/css" />
	  <link rel="stylesheet" href="../css/accueil.css" type="text/css" />
	  
<?php include 'menu.php';?>	  

<?php

echo "<br><br><br><br><span id=\"Haut\"></span>\n"; 
echo "		<div class=\"jumbotron text-center\">\n"; 
echo "			<p>Recherchez dans le dictionnaire:</p> \n"; 
echo "			<form class=\"form-inline\" action=\"../serveur/rechercheDictionnaire.php\" method=\"post\">\n"; 
echo "				<input type=\"search\" size=\"50\" name=\"votreRecherche\">\n"; 
echo "				<input type=\"submit\" class=\"btn btn-default\" value=\"Recherchez\">			\n"; 
echo "			</form>\n"; 
echo "		</div>\n"; 
echo "	<br><br>\n";


echo "<span id=\"termes\"></span>";

if(!$fic=fopen("../donnees/termesFinanciers.txt","r")) {
		echo "erreur: termesFinanciers.txt";
		exit;
	}
	
	$termes = "";
	$i = 0;
	$ligne=fgets($fic);
	while(!feof($fic)) {
		$i++;
		$tab = explode(";",$ligne);
		$termes.="<p style=\"margin-left:5%;\"><a href=\"#$i\"><b>".$tab[0]."</b></a></p>";
		$ligne=fgets($fic);		
	}
	
	echo $termes."<br><br><br>";
	fclose($fic);
	
	if(!$fic=fopen("../donnees/termesFinanciers.txt","r")) {
		echo "erreur: termesFinanciers.txt";
		exit;
	}
	
	$j = 0;
	$liste="";
	$ligne=fgets($fic);
	while(!feof($fic)) {
		$j++;
		if($j%5===0 && $j!==0) {
			$liste.="<p align=\"center\"><a href=\"#termes\">Début</a></p>";
		}
		$tab = explode(";",$ligne);
		$liste.="<div style=\"margin-left:10%;\" id = \"$j\"><dt><b>".$tab[0]."</b></dt></div>";
		$liste.="<dd>".$tab[1]."</dd><br>";
		$ligne=fgets($fic);
		
	}
	
	echo $liste;
	fclose($fic);
	

	
	
echo "<br><br>\n"; 

?>

<?php include 'footer.php';?>



