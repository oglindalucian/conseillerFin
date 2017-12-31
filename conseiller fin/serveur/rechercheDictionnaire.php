<?php

$termeRecherche = $_POST['votreRecherche'];

echo $termeRecherche;

if(!$fic=fopen("../donnees/termesFinanciers.txt","r")) {
		echo "erreur: termesFinanciers.txt";
		exit;
	}

$ok = false;	
$ligne=fgets($fic);
	while(!feof($fic)) {
		$tab = explode(";",$ligne);
		if($termeRecherche === $tab[0]) {
			$ok = true;
			echo "<b>".$tab[0]."</b><br>".$tab[1];
		}
		$ligne=fgets($fic);		
	}
	
	if(!$ok)
		echo "Terme introuvable.";

?>