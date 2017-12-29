

<?php

$nom = test_input($_POST['nom']);
$courriel = test_input($_POST['email']);
$site = test_input($_POST['website']);
$commentaire = test_input($_POST['comment']);
$genre = test_input($_POST['genre']);
$mdp = test_input($_POST['mdp']);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// echo $nom."<br>";
// echo $courriel."<br>";
// echo $site."<br>";
// echo $commentaire."<br>";
// echo $genre."<br>";
// echo $mdp."<br>";

//sa inscriu toata asta intr-un fisier sau BD


$ligneAEnregistrer=$courriel.';'.$nom.';'.$site.';'.$commentaire.';'.$genre.';'.$mdp.';'.PHP_EOL;
//echo $ligneAEnregistrer;

if(!$fic=fopen("../donnees/clients.txt","r")){
		echo "ERREUR: probleme avec le fichier txt";
		exit;
}

if(!$ficTmp=fopen("../donnees/clients.tmp","w")){
		  echo "ERREUR: probleme de creation du fichier .tmp";
		  exit;
}
	

	//fputs($fic,$ligneAEnregistrer);
	//fclose($fic);
	$ligne=fgets($fic);
	$ok = true;
	while(!feof($fic) && $ok){
		$tab=explode(";",$ligne);
		if($courriel===$tab[0]) {
			$ok = false;
			//ECHO "COURRIEL EXISTE DEJA";
		}		
	    $ligne=fgets($fic);
	 }
	 fclose($fic);
	 if(!$fic=fopen("../donnees/clients.txt","r")){
		echo "ERREUR: probleme avec le fichier txt";
		exit;
}
	 $ligne=fgets($fic);
	 if(!$ok) { //exista deja
	 //$ligne=fgets($fic);
		while(!feof($fic)){
			$tab=explode(";",$ligne);
			fputs($ficTmp,$ligne);
			$ligne=fgets($fic);
		}		
	 } else { //daca nu exista
	 //$ligne=fgets($fic);
		 while(!feof($fic)){
			$tab=explode(";",$ligne);
			fputs($ficTmp,$ligne);
			$ligne=fgets($fic);
		}
			fputs($ficTmp,$ligneAEnregistrer);
	 } 
	 
	 fclose($fic);
	 fclose($ficTmp);
	 unlink("../donnees/clients.txt");
	 rename("../donnees/clients.tmp","../donnees/clients.txt");
	if($ok) echo "<br><b>AJOUT DU client : <h2>".$nom."</h2></b>";
	else ECHO "COURRIEL EXISTE DEJA";


?>