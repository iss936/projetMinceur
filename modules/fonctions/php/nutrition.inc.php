<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux exercices
//------------------------------------------------------------------------------------------------------------------

//Récupère un exercice
function getUneNutrition($idNutrition)
{
	//Requête
	$req = "SELECT * FROM ficheexercice where idFicheExercice = ".getMySqlString($idExercice);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$unExercice = mysql_fetch_assoc($res);
	
	return $unExercice;
}

//Récupère les fiches nutritions
function getLesNutritions()
{
	//Requête
	$req = "SELECT * FROM fichenutrition";
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesNutritions)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	$lesNutritions = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesNutritions[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesNutritions;
}
?>