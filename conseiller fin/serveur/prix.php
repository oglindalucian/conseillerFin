<?php
header('Location: produits.php');
?>

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=conseiller;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT p.nom AS nomProduit, i.id_institution AS IdInstitution, i.nom AS nomInstitution, ROUND(p.prix,2) 
AS prix_arrondi, r.id_risque AS IdRisque, r.explication AS explicationRisque
FROM produits p, institutions i, risque r 
WHERE i.id_institution = p.id_institution AND
r.id_risque = p.id_risque
ORDER BY prix');



?>