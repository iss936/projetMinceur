<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux types de salles
//------------------------------------------------------------------------------------------------------------------

// R�cup�re un type de salle
function getUnTypeSalle($idTypeSalle)
{
	//Requ�te
	if(!$idTypeSalle) $idTypeSalle = 0;
	$req = "SELECT * FROM typeSalle WHERE idTypeSalle = ".getMySqlString($idTypeSalle);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getUnTypeSalle)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$unTypeSalle = mysql_fetch_assoc($res);
	
	return $unTypeSalle;
}

//R�cup�re les types de salles
function getLesTypesSalles()
{
	//Requ�te
	$req = "SELECT * FROM typeSalle";
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesTypesSalles)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration des lignes
	$lesTypesSalles = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesTypesSalles[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesTypesSalles;
}
?>