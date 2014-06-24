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
	if($idPartieCorps) $req .= " WHERE idPartieCorps = $idPartieCorps";
	
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
function updateExercice($idExercice, $contenuExercice,$titre,$resume,$imageResume,$bodyPart,$video)
{

	//R�cup�ration des variables
	$id = getMySqlString($idExercice);
	$contenu = getMySqlString($contenuExercice);
	$resume = getMySqlString($resume);
	$titre = getMySqlString($titre);
	$imageResume = getMySqlString($imageResume);
	$video = getMySqlString($video);
	$date= date("d/m/y");
	if($video != null)
	{
		$req = "UPDATE ficheexercice SET
				description = $contenu,
				titre = $titre,
				resume = $resume,
				imageResume = $imageResume,
				idPartieCorps= $bodyPart,
				video = $video
				WHERE idFicheExercice = $id;";
	}
	else
	{
		$req = "UPDATE ficheexercice SET
				description = $contenu,
				titre = $titre,
				resume = $resume,
				imageResume = $imageResume,
				idPartieCorps = $bodyPart,
				WHERE idFicheExercice = $id;";
	}
			
	$conx = connexion();
	mysql_query($req, $conx) or die ("<u>Erreur SQL (updateExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
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
function insertExercice($contenuExercice,$titre,$resume,$imageResume,$bodyPart,$videoExercice)
{
	$idBodyPart= getIdPartieCorps($bodyPart);
	$idBodyPart = $idBodyPart[0];
	$date = date('d/m/y');

	if($videoExercice == null)
	{
		$req = "insert Into ficheexercice (description,dateAjout,titre,resume,imageResume,idPartieCorps) values ('$contenuExercice',
		'$date','$titre','$resume','$imageResume',$idBodyPart)";
	}
	else
	{
		$req = "insert Into ficheexercice (description,dateAjout,titre,resume,imageResume,idPartieCorps,video) values ('$contenuExercice',
		'$date','$titre','$resume','$imageResume',$idBodyPart,'$videoExercice')";
	}
	
	
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

function verifFormExercice($titre,$resume,$imageResume,$contenuExercice,$idExercice)
{
	$msgErreur = array();
	if($titre == null || $titre == '')
		$msgErreur[] = 'Saisir un titre';
	if($resume == null || $resume == '')
		$msgErreur[] = 'Saisir un resume';
	if(mb_substr_count($contenuExercice, "<img ") >3 || $contenuExercice==null)
			$msgErreur[] = 'Saisir le contenu avec maximum 3 images';

	//v�rification de l'imageResume
	$explode = explode(".",$imageResume);
	$extension = end($explode);
	if($idExercice == null || $idExercice == "")
	{
			if($imageResume == null && in_array($extension, 
			array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff')) == false){
						$msgErreur[] = "image du r�sum�: Le fichier import� n'est pas une image";	
			}
		else if(in_array($extension, array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff')))
		{
			$ok = true;
		}
		else
		{
			$msgErreur[] = "image du r�sum�: Saisir une image(jpg, jpeg, png, gif, bmp ou tiff)";
		}
	}
	else // modification
	{
		if($imageResume = null && in_array($extension, 
			array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff')) == false){
						$msgErreur[] = "image du r�sum�: Le fichier import� n'est pas une image";	
			}
		
	}

	return $msgErreur;
}

//R�cup�re les cinqs derniers exercices ajout�s
function getLes5DerniersExercices()
{
	//Requ�te
	$req = "SELECT * from ficheexercice ORDER BY dateAjout DESC LIMIT 0,5";
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getLes5DerniersExercices()</u>: ".mysql_error()."<br>");
	mysql_close($conx);
	
	//R�cup�ration
	$lesExercices = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesExercices[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesExercices;
}
?>