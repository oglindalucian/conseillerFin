<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT nom, possesseur FROM jeux_video WHERE possesseur=\'Patrick\'');

while ($donnees = $reponse->fetch())
{
	echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . '<br />';
}

$reponse->closeCursor();

// $reponse = $bdd->query('SELECT nom FROM jeux_video WHERE possesseur=\'' . $_GET['possesseur'] . '\'');  //si on utilise une var - !!! ne faut pas faire !!!

//CORRECT:
// $req = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ?');
//$req->execute(array($_GET['possesseur']));


//encore mieux si bc de var -- Quand il y a beaucoup de paramètres, cela permet parfois d'avoir plus de clarté. De plus, contrairement aux points d'interrogation, nous ne sommes cette fois plus obligés d'envoyer les variables dans le même ordre que la requête.
//$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prixmax');
//$req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max']));


//pour des msg plus clairs sur les erreurs: (on ajoute a la fin de la chaine de connexion)
//array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
?>





