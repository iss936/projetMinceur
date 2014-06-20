<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux exercices
//------------------------------------------------------------------------------------------------------------------

//Récupère un exercice
function getUneNutritiona($idNutrition)
{
	//Requête
	$req = "SELECT * FROM fichenutrition where idFicheNutrition = ".getMySqlString($idNutrition);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUneNutrition)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$uneNutrition = mysql_fetch_assoc($res);
	
	return $uneNutrition;
}

//Récupère les fiches nutritions
function getLesCategoriesNutrition()
{
	//Requête
	$req = "SELECT * FROM categorie";
	
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