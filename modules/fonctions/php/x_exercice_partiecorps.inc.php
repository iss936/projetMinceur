<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux parties du corps
//------------------------------------------------------------------------------------------------------------------

//R�cup�re une partie du corps
/*function getUnExercicePartieCorps($idProgramme, $idFicheExercice = null)
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
}*/

//R�cup�re les parties du corps
function getLesExercicePartieCorps($idPartieCorps)
{
	//Requ�te
	$req = "SELECT * FROM x_exercice_partiecorps WHERE idPartieCorps = ".getMySqlString($idPartieCorps);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesExercicePartieCorps)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	$lesExercice = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesExercice[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesExercice;
}
?>