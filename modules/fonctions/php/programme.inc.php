<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux programmes
//------------------------------------------------------------------------------------------------------------------

//R�cup�re un programme
function getUnProgramme($idProgramme)
{
	//Requ�te
	$req = "SELECT * FROM programme where idProgramme = ".getMySqlString($idProgramme);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnProgramme)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$unProgramme = mysql_fetch_assoc($res);
	
	return $unProgramme;
}

//R�cup�re les programme
function getLesProgrammes($idPartieCorps = null)
{
	//Requ�te
	$req = "SELECT * FROM programme";
	if($idPartieCorps != null) $req .= " WHERE idPartieCorps = ".getMySqlString($idPartieCorps);
	
	//Ex�cution
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