<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux types de salles
//------------------------------------------------------------------------------------------------------------------

// Récupère un type de salle
function getUnTypeSalle($idTypeSalle)
{
	//Requête
	if(!$idTypeSalle) $idTypeSalle = 0;
	$req = "SELECT * FROM typeSalle WHERE idTypeSalle = ".getMySqlString($idTypeSalle);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getUnTypeSalle)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$unTypeSalle = mysql_fetch_assoc($res);
	
	return $unTypeSalle;
}

//Récupère les types de salles
function getLesTypesSalles()
{
	//Requête
	$req = "SELECT * FROM typeSalle";
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesTypesSalles)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération des lignes
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