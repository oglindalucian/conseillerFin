<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On ajoute une entrée dans la table jeux_video
$bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(\'Battlefield 1942\', \'Patrick\', \'PC\', 45, 50, \'2nde guerre mondiale\')') or die(print_r($bdd->errorInfo()));

echo 'Le jeu a bien été ajouté !';

//avec des variables:
// $req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
// $req->execute(array(
	// 'nom' => $nom,
	// 'possesseur' => $possesseur,
	// 'console' => $console,
	// 'prix' => $prix,
	// 'nbre_joueurs_max' => $nbre_joueurs_max,
	// 'commentaires' => $commentaires
	// ));
	
	$bdd->exec('UPDATE jeux_video SET prix = 10, nbre_joueurs_max = 32 WHERE nom = \'Battlefield 1942\'') or die(print_r($bdd->errorInfo()));
	
	// $nb_modifs = $bdd->exec('UPDATE jeux_video SET possesseur = \'Florent\' WHERE possesseur = \'Michel\'');
// echo $nb_modifs . ' entrées ont été modifiées !';

// $req = $bdd->prepare('UPDATE jeux_video SET prix = :nvprix, nbre_joueurs_max = :nv_nb_joueurs WHERE nom = :nom_jeu');
// $req->execute(array(
	// 'nvprix' => $nvprix,
	// 'nv_nb_joueurs' => $nv_nb_joueurs,
	// 'nom_jeu' => $nom_jeu
	// ));
	
	//DELETE FROM jeux_video WHERE nom='Battlefield 1942'
	
	//$reponse = $bdd->query('SELECT nom FROM jeux_video') or die(print_r($bdd->errorInfo()));
?>