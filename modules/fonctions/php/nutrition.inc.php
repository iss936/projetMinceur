<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux exercices
//------------------------------------------------------------------------------------------------------------------

//R�cup�re un exercice
function getUneNutrition($idNutrition)
{
	//Requ�te
	$req = "SELECT * FROM ficheexercice where idFicheExercice = ".getMySqlString($idExercice);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$unExercice = mysql_fetch_assoc($res);
	
	return $unExercice;
}

//R�cup�re les fiches nutritions
function getLesNutritions()
{
	//Requ�te
	$req = "SELECT * FROM fichenutrition";
	
	//Ex�cution
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