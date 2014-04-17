<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux suivis
//------------------------------------------------------------------------------------------------------------------

//R�cup�re un suivi
function getUnSuivi($idSuivi)
{
	//Requ�te
	if(!$idUtilisateur) $idUtilisateur = 0;
	$req = "SELECT * FROM suivi WHERE idSuivi = ".getMySqlString($idSuivi);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getUnSuivi)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$unSuivi = mysql_fetch_assoc($res);
	
	return $unSuivi;
}

//R�cup�re les suivis
function getLesSuivis($idUtilisateur = null)
{
	//Requ�te
	$req = "SELECT * FROM suivi";
	if($idUtilisateur) $req .= " WHERE idUtilisateur = ".getMySqlString($idUtilisateur);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesSuivis)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration des lignes
	$lesSuivis = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesSuivis[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesSuivis;
}

//Ajoute un suivi
function addSuivi($dateSuivi, $poidsUtilisateur, $tailleUtilisateur, $evenementSuivi)
{
	//R�cup�ration des variables
	$Erreurs = array();
	
	$date = getMySqlString($dateSuivi);
	$poids = getMySqlString($poidsUtilisateur);
	$taille = getMySqlString($tailleUtilisateur);
	$evenement = getMySqlString($evenementSuivi);
	$idUtilisateur = $_SESSION['idUtilisateur'];
	
	//Test des erreurs
	if(!$dateSuivi || !$poidsUtilisateur || !$tailleUtilisateur || !$evenementSuivi) $Erreurs[] = "Veuillez remplir tous les champs obligatoires (*).";
	if(!estUneDate($dateSuivi)) $Erreurs[] = "La date saisie n'est pas valide!";
	if(compareDates($dateSuivi, date('d/m/Y'), '>' )) $Erreurs[] = "La date saisie n'est pas encore pass�e!";
	
	//Ajout dans la base
	if(!$Erreurs)
	{
		$req = "INSERT INTO suivi (date, poids, taille, evenement, idUtilisateur)
				VALUES (STR_TO_DATE($date,'%d/%m/%Y'), $poids, $taille, $evenement, $idUtilisateur)";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (addSuivi)</u>: ".mysql_error();
		mysql_close($conx);
	}

	return $Erreurs;
}

function getDernierSuivi($idUtilisateur)
{
	//Requ�te
	if(!$idUtilisateur) $idUtilisateur = 0;
	$req = "SELECT * FROM suivi WHERE idUtilisateur = ".getMySqlString($idUtilisateur);
	$req.= " AND date = (SELECT MAX(date) FROM suivi WHERE idUtilisateur = ".getMySqlString($idUtilisateur).")";
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getDernierSuivi)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$unSuivi = mysql_fetch_assoc($res);
	
	return $unSuivi;
}

?>