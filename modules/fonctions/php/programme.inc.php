<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux programmes
//------------------------------------------------------------------------------------------------------------------

//Récupère un programme
function getUnProgramme($idProgramme)
{
	//Requête
	$req = "SELECT * FROM programme where idProgramme = ".getMySqlString($idProgramme);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnProgramme)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$unProgramme = mysql_fetch_assoc($res);
	
	return $unProgramme;
}

//Récupère les programme
function getLesProgrammes($idPartieCorps = null)
{
	//Requête
	$req = "SELECT * FROM programme";
	if($idPartieCorps != null) $req .= " WHERE idPartieCorps = ".getMySqlString($idPartieCorps);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesProgrammes)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	$lesProgrammes = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesProgrammes[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesProgrammes;
}
?>