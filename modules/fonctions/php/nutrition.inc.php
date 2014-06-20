<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux exercices
//------------------------------------------------------------------------------------------------------------------

//Récupère un exercice
function getUneNutrition($idNutrition)
{
	//Requête
	$req = "SELECT * FROM fichenutrition where idFicheNutrition = ".getMySqlString($idNutrition);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUneNutrition)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$uneNutrition = mysql_fetch_assoc($res);
	
	return $uneNutrition;
}

//Récupère les fiches nutritions
function getLesNutritions($idCategorie = null)
{
	//Requête
	$req = "SELECT * FROM fichenutrition";
	if ($idCategorie) $req.=" where idCategorieNutrition=$idCategorie";	
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesNutritions)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	$lesNutritions = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesNutritions[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesNutritions;
}

//Ajoute une fiche nutrition
function addNutrition($titreNutrition, $contenuNutrition, $idCategorieNutrition)
{
	//Récupération des variables
	global $_CONFIG;
	$Erreurs = array();
	
	$titre = getMySqlString($titreNutrition);
	$contenu = getMySqlString($contenuNutrition);
	$idCategorie = getMySqlString($idCategorieNutrition);
	
	//Test des errreurs
	if(!$titreNutrition || !$contenuNutrition || !$idCategorieNutrition) $Erreurs[] = "Veuillez remplir tous les champs obligatoires (*).";
	
	//Ajout dans la base
	if(!$Erreurs)
	{
		$req = "INSERT INTO fichenutrition (titre, contenu, dateAjout, idCategorieNutrition)
				VALUES ($titre, $contenu, CURRENT_TIMESTAMP, $idCategorie)";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (addNutrition)</u>: ".mysql_error();
		mysql_close($conx);
	}
	return $Erreurs;
}

//Modifie une fiche nutrition
function editNutrition($idNutrition, $titreNutrition, $contenuNutrition, $idCategorieNutrition)
{
	//Récupération des variables
	$Erreurs = array();
	$id = getMySqlString($idNutrition, 0);
	$titre = getMySqlString($titreNutrition);
	$contenu = getMySqlString($contenuNutrition);
	$idCategorie = getMySqlString($idCategorieNutrition);
	
	//Test des erreurs
	if(!$idNutrition || intval($idNutrition) <= 0) $Erreurs[] = "Pas de fiche nutrition à modifier!";
	if(!$titreNutrition || !$contenuNutrition || !$idCategorieNutrition) $Erreurs[] = "Veuillez remplir tous les champs obligatoires (*).";
	
	//Mise à jour de la base
	if(!$Erreurs)
	{
		$req = "UPDATE fichenutrition SET
				titre = $titre,
				contenu = $contenu,
				idCategorieNutrition = $idCategorie 
				WHERE idFicheNutrition = $id";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (editNutrition)</u>: ".mysql_error();
		mysql_close($conx);
	}

	return $Erreurs;
}

//Supprime une fiche de nutrition
function delNutrition($idNutrition)
{
	//Récupération des variables
	$Erreurs = array();
	
	$id = getMySqlString($idNutrition);
	
	$req = "DELETE FROM fichenutrition
				WHERE idFIcheNutrition = $id";
	$conx = connexion();
	mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (delNutrition)</u>: ".mysql_error();
	mysql_close($conx);

	return $Erreurs;
}
?>