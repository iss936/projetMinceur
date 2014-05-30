<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux parties du corps
//------------------------------------------------------------------------------------------------------------------

//Récupère une partie du corps
function getUnePartieCorps($idPartieCorps)
{
	//Requête
	$req = "SELECT * FROM partiecorps where idPartieCorps = ".getMySqlString($idPartieCorps);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnePartieCorps)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$unePartieCorps = mysql_fetch_assoc($res);
	
	return $unePartieCorps;
}

//Récupère les parties du corps
function getLesPartiesCorps()
{
	//Requête
	$req = "SELECT * FROM partiecorps order by libelle";
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesPartiesCorps)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	$lesPartiesCorps = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesPartiesCorps[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesPartiesCorps;
}
?>