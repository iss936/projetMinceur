<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux exercices
//------------------------------------------------------------------------------------------------------------------

//R�cup�re un exercice
function getUnExercice($idExercice)
{
	//Requ�te
	$req = "SELECT * FROM exercice where idConseil = ".getMySqlString($idExercice);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$unExercice = mysql_fetch_assoc($res);
	
	return $unExercice;
}

//R�cup�re les exercices
function getLesExercices()
{
	//Requ�te
	$req = "SELECT * FROM exercice";
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesExercices)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	$lesExercices = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesExercices[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesExercices;
}

//Modifie un exercice
function editExercice($idExercice, $contenuExercice)
{
	//R�cup�ration des variables
	$Erreurs = array();
	$id = getMySqlString($idExercice);
	$contenu = getMySqlString($contenuExercice);
	
	//Test des erreurs
	if(!$contenuExercice) $Erreurs[] = "Veuillez remplir tous les champs obligatoires.";
	
	//Mise � jour de la base
	if(!$Erreurs)
	{
		$req = "UPDATE exercice SET
				contenu = $contenu
				WHERE idExercice = $id";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (editExercice)</u>: ".mysql_error();
		mysql_close($conx);
	}
	
	return $Erreurs;
}

//Supprime un exercice
function delExercice($idExercice)
{
	//R�cup�ration des variables
	$Erreurs = array();
	
	$id = getMySqlString($idExercice);
	
	//Test des erreurs
	
	if(!$Erreurs)
	{
		$req = "DELETE FROM exercice
				WHERE idExercice = $id";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (delExercice)</u>: ".mysql_error();
		mysql_close($conx);
	}
	
	return $Erreurs;
}
?>