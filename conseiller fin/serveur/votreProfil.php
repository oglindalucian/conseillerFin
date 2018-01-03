<script language="javascript" src="../js/global.js"></script>
<link rel="stylesheet" href="../css/investisseur.css" type="text/css" />

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
		
		
	echo "<a href=\"../pages/index.html\">Accueil</a><br><hr>";
	
	echo $age."<br>";
	echo $profession."<br>";
	echo $risque."<br>";
	
	echo "<h1>Votre profil: ".$profil."</h1><br>";
	echo "<h2>Liste des produits qui pourraient vous intéresser:</h2>";
	
	$tableau = "<ul>";
	if(!$fic=fopen("../donnees/produits.txt","r")) {
		echo "erreur: produits.txt";
		exit;
	}
	
	$ligne=fgets($fic);
	while(!feof($fic)) {
		$tab = explode(";",$ligne);
		if($risque===$tab[0])
			$tableau.="<li>".$tab[1]."</li>";
		$ligne=fgets($fic);
	}
	$tableau.="</ul>";
	echo $tableau;
	fclose($fic);
	
	
	
	// echo "<ol>";
	// for($i=0, nb=count($listeProduits); i<nb; i++) {
		// echo "<li".$listeProduits[i]."</li>";
	// }
	// echo "</ol>";
	
	

?>