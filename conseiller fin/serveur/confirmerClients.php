<?php
	$courriel = test_input($_POST['couriel']);
	$mdp = test_input($_POST['mPasse']);
	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo $courriel."<br>";
echo $mdp."<br>";

//deschid fisierul pe care l-am umplut la collecteClients.php si vad daca coincid datele

if(!$fic=fopen("../donnees/clients.txt","r")){
		echo "ERREUR: probleme avec le fichier txt";
		exit;
}

$ligne=fgets($fic);
	$ok = false;
	while(!feof($fic) && !$ok){
		$tab=explode(";",$ligne);
		if($courriel===$tab[0] && $mdp===$tab[5]) {
			$ok = true;
		}		
	    $ligne=fgets($fic);
	 }
	 fclose($fic);
	 
	 if($ok) 
		 echo "Bienvenu!";
	 else
		 echo "Verifier vos donnees";

?>