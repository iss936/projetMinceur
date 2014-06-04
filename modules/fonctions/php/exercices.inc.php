<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux exercices
//------------------------------------------------------------------------------------------------------------------

//Récupère un exercice
function getUnExercice($idExercice)
{
	//Requête
	$req = "SELECT * FROM ficheexercice where idFicheExercice = ".getMySqlString($idExercice);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$unExercice = mysql_fetch_assoc($res);
	
	return $unExercice;
}

//Récupère les exercices
function getLesExercices($idPartieCorps = null)
{
	//Requête
	$req = "SELECT * FROM ficheexercice";
	if($idPartieCorps != null) $req .= " WHERE idPartieCorps = ".getMySqlString($idPartieCorps);
	
	//Exécution
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
	//Récupération des variables
	$Erreurs = array();
	$id = getMySqlString($idExercice);
	$contenu = getMySqlString($contenuExercice);
	
	//Test des erreurs
	if(!$contenuExercice) $Erreurs[] = "Veuillez remplir tous les champs obligatoires.";
	
	//Mise à jour de la base
	if(!$Erreurs)
	{
		$req = "UPDATE ficheexercice SET
				contenu = $contenu
				WHERE idFicheExercice = $id";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (editExercice)</u>: ".mysql_error();
		mysql_close($conx);
	}
	
	return $Erreurs;
}

//Supprime un exercice
function delExercice($idExercice)
{
	//Récupération des variables
	$Erreurs = array();
	
	$id = getMySqlString($idExercice);
	
	//Test des erreurs
	
	if(!$Erreurs)
	{
		$req = "DELETE FROM ficheexercice
				WHERE idFicheExercice = $id";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (delExercice)</u>: ".mysql_error();
		mysql_close($conx);
	}
	
	return $Erreurs;
}

//Récupère le dernier exercice ajouté
function getLeDernierExercice()
{
	//Requête
	$req = "SELECT * FROM ficheexercice where dateAjout = (SELECT MAX(dateAjout) FROM ficheexercice)";
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getLeDernierExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$unExercice = mysql_fetch_assoc($res);
	
	return $unExercice;
}
?>