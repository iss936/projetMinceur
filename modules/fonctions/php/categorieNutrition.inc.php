<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux exercices
//------------------------------------------------------------------------------------------------------------------

//R�cup�re un exercice
function getUneNutritiona($idNutrition)
{
	//Requ�te
	$req = "SELECT * FROM fichenutrition where idFicheNutrition = ".getMySqlString($idNutrition);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUneNutrition)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$uneNutrition = mysql_fetch_assoc($res);
	
	return $uneNutrition;
}

//R�cup�re les fiches nutritions
function getLesCategoriesNutrition()
{
	//Requ�te
	$req = "SELECT * FROM categorie";
	
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