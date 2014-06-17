<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux exercices
//------------------------------------------------------------------------------------------------------------------

//R�cup�re un exercice
function getUnExercice($idExercice)
{
	//Requ�te
	$req = "SELECT * FROM ficheexercice where idFicheExercice = ".getMySqlString($idExercice);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$unExercice = mysql_fetch_assoc($res);
	
	return $unExercice;
}

//R�cup�re les exercices
function getLesExercices($idPartieCorps = null)
{
	//Requ�te
	$req = "SELECT * FROM ficheexercice";
	if($idPartieCorps != null) $req .= " WHERE idPartieCorps = ".getMySqlString($idPartieCorps);
	
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
	//R�cup�ration des variables
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

//R�cup�re le dernier exercice ajout�
function getLeDernierExercice()
{
	//Requ�te
	$req = "SELECT * FROM ficheexercice where dateAjout = (SELECT MAX(dateAjout) FROM ficheexercice)";
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getLeDernierExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$unExercice = mysql_fetch_assoc($res);
	
	return $unExercice;
}

//ajoute un exercice dans la table fiche exercice
function insertExercice($contenuExercice,$titre,$resume,$bodyPart)
{
	$idBodyPart= getIdPartieCorps($bodyPart);
	$idBodyPart = $idBodyPart[0];
	var_dump($idBodyPart);
	$date = date('d/m/y');
	//Requ�te
	$req = "insert Into ficheexercice (description,dateAjout,titre,resume,idPartieCorps) values ('$contenuExercice',
		'$date','$titre','$resume',$idBodyPart)";
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (�chou���)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
}

//R�cup�re un exercice
function getIdPartieCorps($bodyPart)
{
	//Requ�te
	$req = "SELECT idPartieCorps FROM partiecorps where libelle = '$bodyPart'";
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$id = mysql_fetch_row($res);
	
	return $id;
}
?>