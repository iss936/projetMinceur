<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux parties du corps
//------------------------------------------------------------------------------------------------------------------

//Récupère une partie du corps
function getUnProgrammeExercice($idProgramme, $idFicheExercice = null)
{
	//Requête
	$req = "SELECT * FROM x_programme_exercice where idProgramme = ".getMySqlString($idProgramme);
	if($idFicheExercice != null) $req .= " AND idFicheExercice = ".getMySqlString($idFicheExercice);
	$req .= " ORDER BY ordre";
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnProgrammeExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$unProgrammeExercice = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$unProgrammeExercice[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	} 
	
	return $unProgrammeExercice;
}

//Récupère les parties du corps
function getLesProgrammeExercice()
{
	//Requête
	$req = "SELECT * FROM x_programme_exercice";
	
	//Exécution
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