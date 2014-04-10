<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques à l'identification d'un utilisateur
//------------------------------------------------------------------------------------------------------------------
 
//Permet de savoir si un service est connecté
function estConnecte($idUtilisateur = null, $login = null)
{
	$result = isset($_SESSION['idUtilisateur']) && !empty($_SESSION['idUtilisateur']);
	if($idUtilisateur) $result = $result && $_SESSION['idUtilisateur'] == $idUtilisateur;
	if($login) $result = $result && $_SESSION['login'] == $login;
	return $result;
}

//Déconnexion du service connecté
function estDeconnecte()
{
	//Destruction de la session en cours du service
	session_destroy();
}

//Permet de savoir si c'est l'Administrateur
function estAdmin()
{
	global $_CONFIG;
	return (isset($_SESSION['idUtilisateur']) && $_SESSION['idUtilisateur'] == 1);
}

//Permet de savoir si c'est un utilisateur
function estUtilisateur()
{
	global $_CONFIG;
	return (isset($_SESSION['idUtilisateur']) && $_SESSION['idUtilisateur'] > 1);
}

//Authentification d'un utilisateur
function authentification($login, $mdp)
{
	//Variables
	global $_CONFIG;
	//$mdp = ($mdp != "") ? sha1($mdp) : null;
	
	//Requête
	$req = "SELECT * FROM utilisateurs WHERE login = '$login' AND mdp = '$mdp'";
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (authentification)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$result = false;
	if(mysql_num_rows($res) == 1)
	{
		$donnee = mysql_fetch_assoc($res);
		$_SESSION['idUtilisateur'] = $donnee['idUtilisateur'];
		$_SESSION['login'] = $donnee['login'];
		//On garde l'id du service en mémoire pour une prochaine connexion
		$duree = time() + (3600 * 24 * 30); //Durée d'expiration du cookie (timestamp actuel + 30 jours)
		setcookie("idUtilisateur", $donnee['idUtilisateur'], $duree); 
		
		$result = true;
	}
	
	return $result;
}

//Permet de changer le mot de passe
function modifMdp($oldMdp, $newMdp, $confirmMdp)
{
	$Erreurs = array();
	$idUtilisateur = $_SESSION['idUtilisateur'];
	$verifOldMdp = authentification($idUtilisateur, $oldMdp);
	
	//Erreurs
	// - Erreurs sur l'ancien mot de passe
	if(!$verifOldMdp)
		$Erreurs[] = "Le mot de passe actuel saisi n'est pas valide.";
	//- Erreurs sur le nouveau mot de passe
	if($newMdp == "")
		$Erreurs[] = "Le nouveau mot de passe n'a pas été saisi.";
	else if(strlen($newMdp) < 6)
		$Erreurs[] = "Le nouveau mot de passe doit contenir au moins 6 caractères.";
	else if($newMdp != $confirmMdp)
		$Erreurs[] = "Le nouveau mot de passe et sa confirmation ne sont pas identiques.";
	// - Erreurs sur la confirmation du nouveau mot de passe
	if($confirmMdp == "")
		$Erreurs[] = "La confirmation du mot de passe n'a pas été saisie.";

	//S'il n'y a pas d'erreurs
	if(!$Erreurs)
	{		
		$newMdp = sha1($newMdp);
		$req = "UPDATE utilisateurs SET mdp_utilisateur = '$newMdp' WHERE idUtilisateur = '$idUtilisateur'";
		
		if($req)
		{
			$conx = connexion();
			mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (modifMdp) </u>: ".mysql_error();
			mysql_close($conx);
		}
		else $Erreurs[] = "L'utilisateur connecté n'est ni un service, ni un technicien!";
	}
	
	return $Erreurs;
}

//Permet la réinitialisation du mot de passe
function initMdp($idUtilisateur)
{
	//Variables
	global $_CONFIG;
	$Erreurs = array();
	$mdp = sha1($_CONFIG['APP_PassWord']);
	$req = "UPDATE utilisateurs
			SET mdp_utilisateur = '$mdp'
			WHERE idUtilisateur = $idUtilisateur";
	
	if($req)
	{
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (initMdp)</u>: ".mysql_error();
		mysql_close($conx);
	}
	else $Erreurs[] = "Erreur requête.";
	
	return $Erreurs;
}

?>