<?php
$cle = null;
	$courriel = test_input($_POST['couriel']);
	$courriel=filter_var($courriel, FILTER_SANITIZE_EMAIL);
	if (filter_var($courriel, FILTER_VALIDATE_EMAIL) === false) {
	   echo("Ce n'est pas une adresse de courriel valide.");
	   $courriel = null;
	}
	$cookie_name = "authentification";
	$cookie_value = $courriel;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 0.25), "/"); // 86400 = 1 day
	
	$mdp = test_input($_POST['mPasse']);
	$mdp = filter_var($mdp, FILTER_SANITIZE_STRING);
	if (isset($_POST['cleAdmin'])) {
		$cle = test_input($_POST['cleAdmin']);
		$cle = filter_var($cle, FILTER_SANITIZE_STRING);
	}
	header('Location: ../index.php');//
?>


<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo $courriel."<br>";
echo $mdp."<br>";

if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}

//deschid fisierul pe care l-am umplut la collecteClients.php si vad daca coincid datele

// if(!$fic=fopen("../donnees/clients.txt","r")){
		// echo "ERREUR: probleme avec le fichier txt";
		// exit;
// }

// $ligne=fgets($fic);
	// $ok = false;
	// $admin = false;
	// while(!feof($fic) && !$ok){
		// $tab=explode(";",$ligne);
		// if($courriel===$tab[0] && $mdp===$tab[5]) {
			// $ok = true;
			// if($courriel==="admin@admin.ca" && $mdp==="Admin123" && $cle==="Admin123") {
				// $admin = true;
			// }
			// else {
				// $ok = false;
			// }
		// }		
	    // $ligne=fgets($fic);
	 // }
	 // fclose($fic);
	 
	 // if($ok && !$admin) 
		 // echo "Bienvenu!";
	 // if($admin)
		 // echo "Bienvenu admin!";
	 // if(!$ok)
		 // echo "Verifier vos donnees";
	
$ok = false;
$admin = false;
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=conseiller;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->prepare("SELECT courriel, mdp FROM utilisateurs WHERE courriel = ?");	
$reponse->execute(array($courriel));
$donnees = $reponse->fetch();  
if($mdp===$donnees['mdp']) {
	$ok = true;
}
if($ok && $courriel==="admin@admin.ca" && $mdp==="Admin123" && $cle==="Admin123") {
	$admin = true;
	}
// else {
	// $ok = false;
	// }


echo "BD - COURRIEL: ".$donnees['courriel'].'<br>';
echo "BD - mdp: ".$donnees['mdp'].'<br>';
$reponse->closeCursor();
$msg = "";
 if($ok) 
		  $msg = "Bienvenu!";
 if($admin)
		  $msg = "Bienvenu admin!";
 if(!$ok)
		  $msg = "Verifier vos donnees";
 if($cle!=="Admin123" && $ok && $cle!=null)
		  $msg = "Votre clé d'admin n'est pas bonne!";
echo $msg;
?>