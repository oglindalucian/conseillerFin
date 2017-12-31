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

<?php
echo "<nav class=\"navbar navbar-default navbar-fixed-top\">\n"; 
echo "  <div class=\"container-fluid\">\n"; 
echo "    <div class=\"navbar-header\">\n"; 
echo "      <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#myNavbar\">\n"; 
echo "        <span class=\"icon-bar\"></span>\n"; 
echo "        <span class=\"icon-bar\"></span>\n"; 
echo "        <span class=\"icon-bar\"></span>                        \n"; 
echo "      </button>\n"; 
echo "      <span class=\"navbar-brand\">Dictionnaire</span>\n"; 
echo "    </div>\n"; 
echo "    <div class=\"collapse navbar-collapse\" id=\"myNavbar\">\n"; 
echo "      <ul class=\"nav navbar-nav navbar-right\">\n"; 
echo "        <li><a href=\"index.html\">ACCUEIL</a></li>\n"; 
echo "		<li class=\"dropdown\">\n"; 
echo "          <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><span class=\"glyphicon glyphicon-user\"></span>CONNEXION\n"; 
echo "          <span class=\"caret\"></span></a>\n"; 
echo "          <ul class=\"dropdown-menu\">\n"; 
echo "            <li><a href=\"connexion.html\">Connexion</a></li>\n"; 
echo "            <li><a href=\"inscription.html\">Inscription</a></li>\n"; 
echo "          </ul>\n"; 
echo "        </li>\n"; 
echo "		<li class=\"dropdown\">\n"; 
echo "          <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><span class=\"glyphicon glyphicon-shopping-cart\"></span>PRODUITS\n"; 
echo "          <span class=\"caret\"></span></a>\n"; 
echo "          <ul class=\"dropdown-menu\">\n"; 
echo "            <li><a href=\"produits.php\">Produits</a></li>\n"; 
echo "            <li><a href=\"index.html#contact\">Contact</a></li>\n"; 
echo "          </ul>\n"; 
echo "        </li>\n"; 
echo "        <li class=\"dropdown\">\n"; 
echo "          <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\"><span class=\"glyphicon glyphicon-flag\"></span>LANGUE\n"; 
echo "          <span class=\"caret\"></span></a>\n"; 
echo "          <ul class=\"dropdown-menu\">\n"; 
echo "            <li><a href=\"#\">Anglais</a></li>\n"; 
echo "            <li><a href=\"#\">Français</a></li>\n"; 
echo "          </ul>\n"; 
echo "        </li>\n"; 
echo "        <li class=\"dropdown\">\n"; 
echo "          <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">INFO\n"; 
echo "          <span class=\"caret\"></span></a>\n"; 
echo "          <ul class=\"dropdown-menu\">\n"; 
echo "            <li><a href=\"listeSites.html\">Liste des sites</a></li>\n"; 
echo "            <li><a href=\"dictionnaire.html\">Dictionnaire financier</a></li>\n"; 
echo "          </ul>\n"; 
echo "        </li>\n"; 
echo "        <li><a href=\"#\"><span class=\"glyphicon glyphicon-search\"></span></a></li>\n"; 
echo "      </ul>\n"; 
echo "    </div>\n"; 
echo "  </div>\n"; 
echo "</nav>\n"; 
echo "<br><br><br><br><span id=\"dictHaut\"></span>\n"; 
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
echo "<footer class=\"text-center\">\n"; 
echo "  <a class=\"up-arrow\" href=\"#dictHaut\" data-toggle=\"tooltip\" title=\"En haut\">\n"; 
echo "    <span class=\"glyphicon glyphicon-chevron-up\"></span>\n"; 
echo "  </a><br>\n"; 
echo "  <p>Bootstrap Theme Made By <a href=\"https://www.w3schools.com\" data-toggle=\"tooltip\" title=\"Visit w3schools\">www.w3schools.com</a></p> \n"; 
echo "</footer>\n";

?>