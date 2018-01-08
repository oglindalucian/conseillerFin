<!DOCTYPE html>
<html lang="fr">
<head>
<title>Panier des produits financiers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script language="javascript" src="js/global.js"></script>
  <link rel="stylesheet" href="css/investisseur.css" type="text/css" />
  <link rel="stylesheet" href="css/accueil.css" type="text/css" />
</head>
<body>
  <?php include 'menu.php';?>	

<?php

echo "<br><br><br><br><span id=\"Haut\"></span>";
echo '<h1 align="center">Liste des produits que vous avez commandés:</h1>';
//$idUtilisateur = null;
if(isset($_COOKIE["IdUtil"])) {
	$idUtilisateur = intval($_COOKIE["IdUtil"]);
	//echo $idUtilisateur;
}
	try
{
	$bdd = new PDO('mysql:host=localhost;dbname=conseiller;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT p.nom AS nomProduit, i.nom AS nomInstitution, ROUND(p.prix,2) AS prix_arrondi, r.explication AS explicationRisque, COUNT(*) AS nombre
FROM produitsachetes p, institutions i, risque r, utilisateurs u 
WHERE i.id_institution = p.id_institution AND
r.id_risque = p.id_risque AND
u.id_utilisateur = '.$idUtilisateur.' AND
u.id_utilisateur = P.id_utilisateur
GROUP BY nomProduit, nomInstitution, prix_arrondi, explicationRisque
ORDER BY nomProduit, nomInstitution');

?>
<table border=1 style="border-collapse:collapse; margin:2% auto;">
<tr><th>Numéro</th><th>Nom produit</th><th>Institution financiere</th><th>Prix</th><th>Risque</th><th>Quantité</th></tr>
<?php
$i=0;
while ($donnees = $reponse->fetch())
{
	$i++;
	echo '<tr><td>'.$i.'</td><td>'.$donnees['nomProduit'].'</td><td>'.$donnees['nomInstitution'].'</td><td>$'
	.$donnees['prix_arrondi'].'</td><td>'.$donnees['explicationRisque'].'</td><td>'.$donnees['nombre'].'</td></tr>';	
}
$reponse->closeCursor();
echo "</table><br><br><br><br>";

?>	

<?php  include 'footer.php';?>
</body>
</html>