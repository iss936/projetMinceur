<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux suivis
//------------------------------------------------------------------------------------------------------------------

//Récupère un suivi
function getUnSuivi($idSuivi)
{
	//Requête
	if(!$idUtilisateur) $idUtilisateur = 0;
	$req = "SELECT * FROM suivi WHERE idSuivi = ".getMySqlString($idSuivi);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getUnSuivi)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$unSuivi = mysql_fetch_assoc($res);
	
	return $unSuivi;
}

//Récupère les suivis
function getLesSuivis($idUtilisateur = null)
{
	//Requête
	$req = "SELECT * FROM suivi";
	if($idUtilisateur) $req .= " WHERE idUtilisateur = ".getMySqlString($idUtilisateur);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesSuivis)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération des lignes
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
	//Récupération des variables
	$Erreurs = array();
	
	$date = getMySqlString($dateSuivi);
	$poids = getMySqlString($poidsUtilisateur);
	$taille = getMySqlString($tailleUtilisateur);
	$evenement = getMySqlString($evenementSuivi);
	$idUtilisateur = $_SESSION['idUtilisateur'];
	
	//Test des erreurs
	if(!$dateSuivi || !$poidsUtilisateur || !$tailleUtilisateur || !$evenementSuivi) $Erreurs[] = "Veuillez remplir tous les champs obligatoires (*).";
	if(!estUneDate($dateSuivi)) $Erreurs[] = "La date saisie n'est pas valide!";
	if(compareDates($dateSuivi, date('d/m/Y'), '>' )) $Erreurs[] = "La date saisie n'est pas encore passée!";
	
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
	//Requête
	if(!$idUtilisateur) $idUtilisateur = 0;
	$req = "SELECT * FROM suivi WHERE idUtilisateur = ".getMySqlString($idUtilisateur);
	$req.= " AND date = (SELECT MAX(date) FROM suivi WHERE idUtilisateur = ".getMySqlString($idUtilisateur).")";
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getDernierSuivi)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$unSuivi = mysql_fetch_assoc($res);
	
	return $unSuivi;
}

?>