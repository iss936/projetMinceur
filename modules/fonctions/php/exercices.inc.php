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
	if($idPartieCorps) $req .= " WHERE idPartieCorps = $idPartieCorps";
	
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
function updateExercice($idExercice, $contenuExercice,$titre,$resume,$imageResume,$bodyPart,$video)
{

	//Récupération des variables
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
	
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (échouééé)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
}
//Récupère un exercice
function getIdPartieCorps($bodyPart)
{
	//Requête
	$req = "SELECT idPartieCorps FROM partiecorps where libelle = '$bodyPart'";
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUnExercice)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
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

	//vérification de l'imageResume
	$explode = explode(".",$imageResume);
	$extension = end($explode);
	if($idExercice == null || $idExercice == "")
	{
			if($imageResume == null && in_array($extension, 
			array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff')) == false){
						$msgErreur[] = "image du résumé: Le fichier importé n'est pas une image";	
			}
		else if(in_array($extension, array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff')))
		{
			$ok = true;
		}
		else
		{
			$msgErreur[] = "image du résumé: Saisir une image(jpg, jpeg, png, gif, bmp ou tiff)";
		}
	}
	else // modification
	{
		if($imageResume = null && in_array($extension, 
			array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff')) == false){
						$msgErreur[] = "image du résumé: Le fichier importé n'est pas une image";	
			}
		
	}

	return $msgErreur;
}

//Récupère les cinqs derniers exercices ajoutés
function getLes5DerniersExercices()
{
	//Requête
	$req = "SELECT * from ficheexercice ORDER BY dateAjout DESC LIMIT 0,5";
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getLes5DerniersExercices()</u>: ".mysql_error()."<br>");
	mysql_close($conx);
	
	//Récupération
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