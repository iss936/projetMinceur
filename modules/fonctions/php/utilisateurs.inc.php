<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux utilisateurs
//------------------------------------------------------------------------------------------------------------------

//Récupère un utilisateur
function getUnUtilisateur($idUtilisateur, $nomChamp = null)
{
	//Requête
	if(!$idUtilisateur) $idUtilisateur = 0;
	$req = "SELECT * FROM utilisateurs WHERE idUtilisateur = ".getMySqlString($idUtilisateur);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getUnUtilisateur)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$unUser = mysql_fetch_assoc($res);
	if($nomChamp) $unUser = $unUser[$nomChamp];
	
	return $unUser;
}

//Récupère les utilisateurs
function getLesUtilisateurs($mot = null, $id_utilisateur = 1, $enseignement = 0, $roulage = 0)
{
	//Requête
	$req = "SELECT * FROM utilisateurs WHERE idUtilisateur > 3";
	if($mot) $req .= " AND login LIKE '%".getMySqlString($mot, "", 1)."%'";
	if($id_utilisateur) $req .= " OR idUtilisateur = ".getMySqlString($id_utilisateur);
	if($enseignement) $req .= " OR idUtilisateur = ".getMySqlString(2);
	if($roulage) $req .= " OR idUtilisateur = ".getMySqlString(3);
	
	$req .= " ORDER BY login";
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesUtilisateurs)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération des lignes
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
function editUtilisateur($id_utilisateur, $abrevUser, $nomUser, $telUser, $faxUser, $xMail, $adresseEcole, $lieuChargement, $nom_Directeur, $nbClasse, $actif)
{
	//Récupération des variables
	$Erreurs = array();
	$id = getMySqlString($id_utilisateur, 0);
	$abrev = getMySqlString($abrevUser);
	$nom = getMySqlString($nomUser);
	$tel = getMySqlString($telUser);
	$fax = getMySqlString($faxUser);
	$adresse = getMySqlString($adresseEcole);
	$lieu = getMySqlString($lieuChargement);
	$nomDirecteur = getMySqlString($nom_Directeur);
	$nbClasse = getMySqlString($nbClasse);
	$mail = "";
	
	//Test des erreurs
	if(!$id_utilisateur || intval($id_utilisateur) <= 0) $Erreurs[] = "Pas d'utilisateur à modifier!";
	if(!$nomUser || !$abrevUser || !$lieuChargement || !$xMail[0] || !$telUser) $Erreurs[] = "Veuillez remplir tous les champs obligatoires (*).";
	if(count($xMail) == 1)
	{
		if(!estunMail($xMail[0])) $Erreurs[] = "L'adresse mail saisie n'est pas valide!";
		else $mail = $xMail[0];
	}
	if(count($xMail)>1)
	{
		$erreurMail = 0;
		for($i = 0; $i<count($xMail); $i++)
		{
			if(!estUnMail($xMail[$i])) $erreurMail++;
			else
			{
				$mail.= $xMail[$i] ;
				if(count($xMail)-1 != $i) $mail.=";";
			}
		}
		if($erreurMail > 0) $Erreurs[] = "Une des adresses mails n'est pas valide!";
	}
	$mail = getMySqlString($mail);
	//Mise à jour de la base
	if(!$Erreurs)
	{
		$req = "UPDATE utilisateurs SET 
				".($nomUser ? "nom_utilisateur = $nom," : null)."
				abrg_utilisateur = $abrev,
				nom_utilisateur = $nom,
				tel_utilisateur = $tel,
				fax_utilisateur = $fax,
				mail_utilisateur = $mail,
				adresse_ecole = $adresse,
				lieu_chargement = $lieu,
				nom_directeur = $nomDirecteur,
				nb_Classe = $nbClasse,
				actif = $actif
				WHERE id_utilisateur = $id";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (editUtilisateur)</u>: $mail".mysql_error();
		mysql_close($conx);
	}

	return $Erreurs;
}

//Ajoute un utilisateur
function addUtilisateur($abrevUser, $nomUser, $mdpUser, $telUser, $faxUser, $xMail, $adresseEcole, $lieuChargement, $nomDirecteur, $nbClasse, $actif)
{
	//Récupération des variables
	$Erreurs = array();
	
	$abrev = getMySqlString($abrevUser);
	$nom = getMySqlString($nomUser);
	$mdp = getMySqlString($mdpUser);
	$tel = getMySqlString($telUser);
	$fax = getMySqlString($faxUser);
	$mail = "";
	$adresse = getMySqlString($adresseEcole);
	$lieu = getMySqlString($lieuChargement);
	$nom_directeur = getMySqlString($nomDirecteur);
	$nb_classe = getMySqlString($nbClasse);
	
	//Test des erreurs
	if(!$nomUser || !$abrevUser || !$mdpUser || !$lieuChargement || !$xMail[0] || !$telUser) $Erreurs[] = "Veuillez remplir tous les champs obligatoires (*).";
	if(count($xMail) == 1)
	{
		if(!estunMail($xMail[0])) $Erreurs[] = "L'adresse mail saisie n'est pas valide!";
		else $mail = $xMail[0];
	}
	if(count($xMail)>1)
	{
		$erreurMail = 0;
		for($i = 0; $i<count($xMail); $i++)
		{
			if(!estUnMail($xMail[$i])) $erreurMail++;
			else
			{
				$mail.= $xMail[$i] ;
				if(count($xMail)-1 != $i) $mail.=";";
			}
		}
		if($erreurMail > 0) $Erreurs[] = "Une des adresses mails n'est pas valide!";
	}
	$mail = getMySqlString($mail);
	
	//Ajout dans la base
	if(!$Erreurs)
	{
		$req = "INSERT INTO utilisateurs (abrg_utilisateur, nom_utilisateur, mdp_utilisateur, tel_utilisateur, fax_utilisateur, mail_utilisateur, adresse_ecole, lieu_chargement, nom_directeur, nb_classe, actif)
				VALUES ($abrev, $nom, sha1($mdp), $tel, $fax, $mail, $adresse, $lieu, $nom_directeur, $nb_classe, $actif)";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (addUtilisateur)</u>: ".mysql_error();
		mysql_close($conx);
	}

	return $Erreurs;
}

//Supprime un utilisateur
function delUtilisateur($id_utilisateur)
{
	//Récupération des variables
	$Erreurs = array();
	
	$id = getMySqlString($id_utilisateur);
	$nbReservations = count(getLesReservations($pagesNull, null, null, $id_utilisateur));
	
	//Test des erreurs
	if($nbReservations > 0) $Erreurs[] = "Veuillez supprimer les réservations de l'école avant de la supprimer.";
	
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