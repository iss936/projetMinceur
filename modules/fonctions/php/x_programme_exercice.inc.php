<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux parties du corps
//------------------------------------------------------------------------------------------------------------------

//R�cup�re une partie du corps
function getUnProgrammeExercice($idProgramme, $idFicheExercice = null)
{
	//Requ�te
	$req = "SELECT * FROM x_programme_exercice where idProgramme = ".getMySqlString($idProgramme);
	if($idFicheExercice != null) $req .= " AND idFicheExercice = ".getMySqlString($idFicheExercice);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnProgrammeExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$unProgrammeExercice = mysql_fetch_assoc($res);
	
	return $unProgrammeExercice;
}

//R�cup�re les parties du corps
function getLesProgrammeExercice()
{
	//Requ�te
	$req = "SELECT * FROM x_programme_exercice";
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesProgrammeExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	$lesProgrammeExercice = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesProgrammeExercice[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesProgrammeExercice;
}
?>