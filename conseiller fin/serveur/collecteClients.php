<?php
header('Location: ../connexion.html');
?>

<?php

$nom = test_input($_POST['nom']);
$nom = filter_var($nom, FILTER_SANITIZE_STRING);
$courriel = test_input($_POST['email']);
$courriel=filter_var($courriel, FILTER_SANITIZE_EMAIL);
if (filter_var($courriel, FILTER_VALIDATE_EMAIL) === false) {
   echo("Ce n'est pas une adresse de courriel valide.");
   $courriel = null;
}
$site = test_input($_POST['website']);
$site = filter_var($site, FILTER_SANITIZE_URL);
if (!filter_var($site, FILTER_VALIDATE_URL) === false) {
   echo("Ce n'est pas une URL valide.");
   $site = null;
}
$commentaire = test_input($_POST['comment']);
$commentaire = filter_var($commentaire, FILTER_SANITIZE_STRING);
$genre = test_input($_POST['genre']);
$mdp = test_input($_POST['mdp']);
$mdp = filter_var($mdp, FILTER_SANITIZE_STRING);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo $nom."<br>";
echo $courriel."<br>";
echo $site."<br>";
echo $commentaire."<br>";
echo $genre."<br>";
echo $mdp."<br>";

//sa inscriu toata asta intr-un fisier sau BD


$ligneAEnregistrer=$courriel.';'.$nom.';'.$site.';'.$commentaire.';'.$genre.';'.$mdp.';'.PHP_EOL;
//echo $ligneAEnregistrer;

// if(!$fic=fopen("../donnees/clients.txt","r")){
		// echo "ERREUR: probleme avec le fichier txt";
		// exit;
// }

// if(!$ficTmp=fopen("../donnees/clients.tmp","w")){
		  // echo "ERREUR: probleme de creation du fichier .tmp";
		  // exit;
// }
	

	// //fputs($fic,$ligneAEnregistrer);
	// //fclose($fic);
	// $ligne=fgets($fic);
	// $ok = true;
	// while(!feof($fic) && $ok){
		// $tab=explode(";",$ligne);
		// if($courriel===$tab[0]) {
			// $ok = false;
			// //ECHO "COURRIEL EXISTE DEJA";
		// }		
	    // $ligne=fgets($fic);
	 // }
	 // fclose($fic);
	 // if(!$fic=fopen("../donnees/clients.txt","r")){
		// echo "ERREUR: probleme avec le fichier txt";
		// exit;
// }
	 // $ligne=fgets($fic);
	 // if(!$ok) { //exista deja
	 // //$ligne=fgets($fic);
		// while(!feof($fic)){
			// $tab=explode(";",$ligne);
			// fputs($ficTmp,$ligne);
			// $ligne=fgets($fic);
		// }		
	 // } else { //daca nu exista
	 // //$ligne=fgets($fic);
		 // while(!feof($fic)){
			// $tab=explode(";",$ligne);
			// fputs($ficTmp,$ligne);
			// $ligne=fgets($fic);
		// }
			// fputs($ficTmp,$ligneAEnregistrer);
	 // } 
	 
	 // fclose($fic);
	 // fclose($ficTmp);
	 // unlink("../donnees/clients.txt");
	 // rename("../donnees/clients.tmp","../donnees/clients.txt");
	 
	try
{
	$bdd = new PDO('mysql:host=localhost;dbname=conseiller;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

try {
$req = $bdd->prepare('INSERT INTO utilisateurs(nom, courriel, mdp, site, commentaire, genre) VALUES(:nom, :courriel, :mdp, :site, :commentaire, :genre)');
$req->execute(array(
	 'nom' => $nom,
	 'courriel' => $courriel,
	 'mdp' => $mdp,
	 'site' => $site,
	 'commentaire' => $commentaire,
	 'genre' => $genre
 ));
}

catch(Exception $e) {
		die('Erreur : '.$e->getMessage().'<br><b>Ce courriel existe deja!</b>');
	} 
?>