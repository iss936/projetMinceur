<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux parties du corps
//------------------------------------------------------------------------------------------------------------------

//R�cup�re une partie du corps
function getUnePartieCorps($idPartieCorps)
{
	//Requ�te
	$req = "SELECT * FROM partiecorps where idPartieCorps = ".getMySqlString($idPartieCorps);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnePartieCorps)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$unePartieCorps = mysql_fetch_assoc($res);
	
	return $unePartieCorps;
}

//R�cup�re les parties du corps
function getLesPartiesCorps()
{
	//Requ�te
	$req = "SELECT * FROM partiecorps order by libelle";
	
	//Ex�cution
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