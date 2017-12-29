<script language="javascript" src="../js/global.js"></script>
<link rel="stylesheet" href="../css/investisseur.css" type="text/css" />

<?php
	//pun produsele intr-un fisier txt sau creez acest array in alt php si il includ
	
	 // $produits = array(
					   // "1" => array("p1","p2","p3"), 
					   // "2" => array("p1","p2","p3"),
					   // "3" => array("p1","p2","p3"),
					   // "4" => array("p1","p2","p3"),
					   // "5" => array("p1","p2","p3")
					   // ); 
	// $cles = array_keys($produits);
	//$listeProduits = array();
	
	//$ageErr = $professionErr = $risqueErr = "";
	$age = $profession = $risque = $profil = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$age = $_POST["age"];
		$profession = $_POST["profession"];
		$risque = $_POST["risque"];
	  }  
 
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	// if(isset($_POST['age'])) 
		// $age = $_POST['age']; 
	
	// if(isset($_POST['profession'])) 
		// $profession = $_POST['profession'];
	
	// if(isset($_POST['risque'])) 
		// $risque = $_POST['risque'];
	
	// if(!fic=fopen("../donnees/produits.txt","r")) {
		// echo "erreur: films.txt";
		// exit;
	// }
	
	// $ligne=fgets($fic);
	// while(!feof($fic)) {
		// $tab = explode(";",$ligne);
		// $listeProduits.=$tab[1];
		// $listeProduits.="<br>";
		// $ligne=fgets($fic);
	// }
	
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
		
	// for ($i = 0; $i < count($cles); $i++) {
		// if($cle==i) {  //$produits[$cles[$i]]
			// for($j=0,nb=count($produits[$cles[$i]]);i<nb;i++) {
				// $listeProduits[i]=$valeur[i];
			// }
		// }
	// }
		// foreach ($produits as $cle => $valeur) {
			// if($cle=="2") {
				// for($i=0,nb=count($valeur);i<nb;i++) {
					// $listeProduits[i]=$valeur[i];
				// }
			// }
		// }		 		
	//}
	
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