<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux utilisateurs
//------------------------------------------------------------------------------------------------------------------

//R�cup�re un utilisateur
function getUnUtilisateur($idUtilisateur, $nomChamp = null)
{
	//Requ�te
	if(!$idUtilisateur) $idUtilisateur = 0;
	$req = "SELECT * FROM utilisateurs WHERE idUtilisateur = ".getMySqlString($idUtilisateur);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getUnUtilisateur)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$unUser = mysql_fetch_assoc($res);
	if($nomChamp) $unUser = $unUser[$nomChamp];
	
	return $unUser;
}

//R�cup�re les utilisateurs
function getLesUtilisateurs()
{
	//Requ�te
	$req = "SELECT * FROM utilisateurs";
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesUtilisateurs)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration des lignes
	$lesUsers = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesUsers[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesUsers;
}

//Modifie un utilisateur
function editUtilisateur($idUtilisateur, $prenomUtilisateur, $nomUtilisateur, $telUtilisateur, $mailUtilisateur, $adresseUtilisateur)
{
	//R�cup�ration des variables
	$Erreurs = array();
	$id = getMySqlString($idUtilisateur, 0);
	$prenom = getMySqlString($prenomUtilisateur);
	$nom = getMySqlString($nomUtilisateur);
	$tel = getMySqlString($telUtilisateur);
	$mail = getMySqlString($mailUtilisateur);
	$adresse = getMySqlString($adresseUtilisateur);
	
	//Test des erreurs
	if(!$idUtilisateur || intval($idUtilisateur) <= 0) $Erreurs[] = "Pas d'utilisateur � modifier!";
	if(!$prenomUtilisateur || !$nomUtilisateur || !$telUtilisateur || !$mailUtilisateur || !$adresseUtilisateur) $Erreurs[] = "Veuillez remplir tous les champs obligatoires (*).";
	if(!estunMail($mailUtilisateur)) $Erreurs[] = "L'adresse mail saisie n'est pas valide!";

	//Mise � jour de la base
	if(!$Erreurs)
	{
		$req = "UPDATE utilisateurs SET 
				prenom = $prenom,
				nom = $nom,
				telephone = $tel,
				mail = $mail,
				adresse = $adresse
				WHERE idUtilisateur = $id";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (editUtilisateur)</u>: $mail".mysql_error();
		mysql_close($conx);
	}

	return $Erreurs;
}

//Ajoute un utilisateur
function addUtilisateur($loginUtilisateur, $mdpUtilisateur, $confirmMdp, $prenomUtilisateur, $nomUtilisateur, $telephoneUtilisateur, $mailUtilisateur, $adresseUtilisateur)
{
	//R�cup�ration des variables
	$Erreurs = array();
	
	$login = getMySqlString($loginUtilisateur);
	$mdp = getMySqlString($mdpUtilisateur);
	$prenom = getMySqlString($prenomUtilisateur);
	$nom = getMySqlString($nomUtilisateur);
	$tel = getMySqlString($telephoneUtilisateur);
	$mail = getMySqlString($mailUtilisateur);
	$adresse = getMySqlString($adresseUtilisateur);
	
	//Test des erreurs
	if(!$loginUtilisateur || !$mdpUtilisateur || !$confirmMdp || !$prenomUtilisateur || !$nomUtilisateur || !$telephoneUtilisateur || !$mailUtilisateur || !$adresseUtilisateur) $Erreurs[] = "Veuillez remplir tous les champs obligatoires (*).";
	if(!estunMail($mailUtilisateur)) $Erreurs[] = "L'adresse mail saisie n'est pas valide!";
	if(strlen($mdpUtilisateur) < 6) $Erreurs[] = "Le nouveau mot de passe doit contenir au moins 6 caract�res.";
	if($mdpUtilisateur != $confirmMdp) $Erreurs[] = "Le nouveau mot de passe et sa confirmation ne sont pas identiques.";
	
	//Ajout dans la base
	if(!$Erreurs)
	{
		$req = "INSERT INTO utilisateurs (login, mdp, prenom, nom, telephone, mail, adresse)
				VALUES ($login, sha1($mdp), $prenom, $nom, $tel, $mail, $adresse)";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (addUtilisateur)</u>: ".mysql_error();
		mysql_close($conx);
	}

	//Envoi du mail de confirmation de la cr�ation du compte
	if(!$Erreurs)
	{
		$destinataire = "$prenomUtilisateur $nomUtilisateur <$mailUtilisateur>";
		$sujet = "Confirmation de la cr�ation de votre compte MyDietFit";
		$msg = "Bienvenue chez MyDietFit ! <br> <br>
		
				Votre compte utilisateur a �t� cr�e.<br>
				Vous pouvez d�s maintenant vous connecter en utilisant les informations suivantes : <br> <br>
				
				Login : $loginUtilisateur <br>
				Mot de passe : $mdpUtilisateur <br> <br>
				
				Bien � vous,<br>
				L'�quipe MyDietFit";
		$entete = "From: \"MyDietFit\" <noreply@mydietfit.fr> \n";
		$entete .= "MIME-Version: 1.0 \n";
		$entete .= "Content-type: text/html; charset='ISO-8859-1'";
		mail($destinataire, $sujet, $msg, $entete) or die("<u>Erreur (envoiMail)</u>: Impossible d'envoyer le mail! $destinataire<br>");
	}
	return $Erreurs;
}

//Supprime un utilisateur
function delUtilisateur($id_utilisateur)
{
	//R�cup�ration des variables
	$Erreurs = array();
	
	$id = getMySqlString($id_utilisateur);
	$nbReservations = count(getLesReservations($pagesNull, null, null, $id_utilisateur));
	
	//Test des erreurs
	if($nbReservations > 0) $Erreurs[] = "Veuillez supprimer les r�servations de l'�cole avant de la supprimer.";
	
	if(!$Erreurs)
	{
		$req = "DELETE FROM utilisateurs
				WHERE id_utilisateur = $id";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (delUtilisateur)</u>: ".mysql_error();
		mysql_close($conx);
	}

	return $Erreurs;
}

?>