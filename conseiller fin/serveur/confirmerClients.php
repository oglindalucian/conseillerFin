<?php
	$courriel = test_input($_POST['couriel']);
	$courriel=filter_var($courriel, FILTER_SANITIZE_EMAIL);
	if (filter_var($courriel, FILTER_VALIDATE_EMAIL) === false) {
	   echo("Ce n'est pas une adresse de courriel valide.");
	   $courriel = null;
	}
	$mdp = test_input($_POST['mPasse']);
	$mdp = filter_var($mdp, FILTER_SANITIZE_STRING);
	if (isset($_POST['cleAdmin'])) {
		$cle = test_input($_POST['cleAdmin']);
		$cle = filter_var($cle, FILTER_SANITIZE_STRING);
	}

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
	$admin = false;
	while(!feof($fic) && !$ok){
		$tab=explode(";",$ligne);
		if($courriel===$tab[0] && $mdp===$tab[5]) {
			$ok = true;
			if($courriel==="admin@admin.ca" && $mdp==="Admin123" && $cle==="Admin123") {
				$admin = true;
			}
			else {
				$ok = false;
			}
		}		
	    $ligne=fgets($fic);
	 }
	 fclose($fic);
	 
	 if($ok && !$admin) 
		 echo "Bienvenu!";
	 if($admin)
		 echo "Bienvenu admin!";
	 if(!$ok)
		 echo "Verifier vos donnees";
	 

?>