<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux parties du corps
//------------------------------------------------------------------------------------------------------------------

//Récupère une partie du corps
/*function getUnExercicePartieCorps($idProgramme, $idFicheExercice = null)
{
	//Requête
	$req = "SELECT * FROM x_programme_exercice where idProgramme = ".getMySqlString($idProgramme);
	if($idFicheExercice != null) $req .= " AND idFicheExercice = ".getMySqlString($idFicheExercice);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnProgrammeExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$unProgrammeExercice = mysql_fetch_assoc($res);
	
	return $unProgrammeExercice;
}*/

//Récupère les parties du corps
function getLesExercicePartieCorps($idPartieCorps)
{
	//Requête
	$req = "SELECT * FROM x_exercice_partiecorps WHERE idPartieCorps = ".getMySqlString($idPartieCorps);
	
	//Exécution
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