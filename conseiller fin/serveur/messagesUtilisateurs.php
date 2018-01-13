<?php
header('Location: ../index.php');
?>

<?php
$nom = test_input($_POST['name']);
$nom = filter_var($nom, FILTER_SANITIZE_STRING);
$courriel = test_input($_POST['email']);
$courriel=filter_var($courriel, FILTER_SANITIZE_EMAIL);
if (filter_var($courriel, FILTER_VALIDATE_EMAIL) === false) {
   $courriel = null;
}
$commentaire = test_input($_POST['comments']);
$commentaire = filter_var($commentaire, FILTER_SANITIZE_STRING);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=conseiller;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO messagesUtilisateurs(nom, courriel, commentaire) 
	VALUES(:nom, :courriel, :commentaire)') or die(print_r($bdd->errorInfo()));
 $req->execute(array(
			 'nom' => $nom, //ok
			 'courriel' => $courriel,//ok
			 'commentaire' => $commentaire//ok
			  ));
		

?>