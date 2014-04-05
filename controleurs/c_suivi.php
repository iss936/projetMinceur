<?php
//Aiguillage en fonction de l'action choisie
switch($action)
{
	case 'frmSuivi':
	{
		if(estConnecte())
		{
			$titre = "Mon suivi";
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_frmSuivi.php";
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'frmConnexion': 
	{	
		if(estConnecte()) include $_CONFIG['DIR_View']."v_accueil.php";
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'vdConnexion': 
	{	
		if(estConnecte()) include $_CONFIG['DIR_View']."v_accueil.php";
		else
		{
			//Variables
			$titre = "Authentification";
			
			$id = getRequest('idUtilisateur');
			$pass = getRequest('PassUser');
			$okConnect = authentification($id, $pass);
			
			//Test d'authentification
			if($okConnect)
			{
				redirection(1, null, "En cours de connexion ...", "BAR");
			}
			else
			{
				$msgErreurs[] = "Erreur d'authentification!";
				$lesUtilisateurs = getLesUtilisateurs(null,null,1,1);
				$id = isset($_COOKIE['idUtilisateur']) ? $_COOKIE['idUtilisateur'] : getRequest('idUtilisateur');
				include $_CONFIG['DIR_View']."v_headTitre.php";
				include $_CONFIG['DIR_View']."v_msgErreurs.php";
				include $_CONFIG['DIR_View']."v_frmConnexion.php";
			}
		}
		break;
	}
	case 'frmModifCompte':
	{
		if(estConnecte())
		{
			$titre = "Modification du compte";
			$urlFrm = 'index.php?uc=identif&action=vdModifCompte';
			$idUtilisateur = $_SESSION['idUtilisateur'];
			$modifEnseignement = false;
			$user = getUnUtilisateur($idUtilisateur);
			$abrg_utilisateur = $user['abrg_utilisateur'];
			$nom_utilisateur = $user['nom_utilisateur'];
			$tel_utilisateur = $user['tel_utilisateur'];
			$fax_utilisateur = $user['fax_utilisateur'];
			$xMail = explode(";", $user['mail_utilisateur']);
			$adresse_ecole = $user['adresse_ecole'];
			$lieu_chargement = $user['lieu_chargement'];
			$nom_directeur = $user['nom_directeur'];
			$nb_classe = $user['nb_classe'];
			$actif = $user['actif'];
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_frmModifCompte.php";
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'vdModifCompte':
	{
		if(estConnecte())
		{
			//Si l'utilisateur est en train de modifier son compte
			$titre = "Modification du compte";
			$abrg_utilisateur = getRequest('abrg');
			$nom_utilisateur = getRequest('nom');
			$tel_utilisateur = getRequest('tel');
			$fax_utilisateur = getRequest('fax');
			$adresse_ecole = htmlentities(getRequest('adresseEcole'));
			$lieu_chargement = htmlentities(getRequest('lieuCharge'));
			$nom_directeur = getRequest('nomDirecteur');
			$nb_classe = getRequest('nbClasse');
			$actif = getRequest('actif_ecole', 0);
			$xMail = getRequest('xMail');
			$idUtilisateur = $_SESSION['idUtilisateur'];
			$msgErreurs = editUtilisateur($idUtilisateur, $abrg_utilisateur, $nom_utilisateur, $tel_utilisateur, $fax_utilisateur, $xMail, $adresse_ecole, $lieu_chargement, $nom_directeur, $nb_classe, $actif);
			 
			//Titre
			include $_CONFIG['DIR_View']."v_headTitre.php";
			 
			//Message d'erreurs ou de confirmation
			if($msgErreurs)
			{
				$urlFrm = 'index.php?uc=identif&action=vdModifCompte';
				$modifEnseignement = false;
				include $_CONFIG['DIR_View']."v_msgErreurs.php";
				include $_CONFIG['DIR_View']."v_frmModifCompte.php";
			}
			else
			{
				$msgConfirmation[] = "Compte changé avec succès!";
				include $_CONFIG['DIR_View']."v_msgConfirmation.php";
				redirection(2, "index.php?uc=identif&action=frmConnexion", "Redirection vers l'accueil ...", "POINT");
				
			}	
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'frmModifMdp':
	{	
		if(estConnecte()) 
		{
			$titre = "Modification du mot de passe";
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_frmModifMdp.php";
		}			
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'vdModifMdp':
	{	
		if(estConnecte())
		{
			//Si l'utilisateur est en train de changer son mot de passe
			$titre = "Modification du mot de passe";
			$oldPass = getRequest('oldPass');
			$newPass = getRequest('newPass');
			$confirmPass = getRequest('confirmPass');
			$msgErreurs = modifMdp($oldPass, $newPass, $confirmPass);
			
			//Titre
			include $_CONFIG['DIR_View']."v_headTitre.php";
			
			//Message d'erreurs ou de confirmation
			if($msgErreurs)
			{
				//Formulaire pour changer son mot de passe
				include $_CONFIG['DIR_View']."v_msgErreurs.php";
				include $_CONFIG['DIR_View']."v_frmModifMdp.php";
			}
			else
			{
				$msgConfirmation[] = "Mot de passe changé avec succès!";
				include $_CONFIG['DIR_View']."v_msgConfirmation.php";
				redirection(2, "index.php?uc=identif&action=frmConnexion", "Redirection vers l'accueil ...", "POINT");
			}
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'deconnexion':
	{
		estDeconnecte();
		redirection(1, 'index.php', "En cours de déconnexion ...", "BAR");
		break;
	}
	case 'contact':
	{
		$titre = "Contact";
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_contact.php";
		break;
	}
	case 'frmCreerCompte':
	{
		$titre = "Création d'un nouveau compte";
		$prenomUtilisateur = null;
		$nomUtilisateur = null;
		$telUtilisateur = null;
		$mailUtilisateur = null;
		$adresseUtilisateur = null;
		$urlFrm = null;
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_frmModifCompte.php";
		break;
	}
	default: 
	{
		echo "Cas d'utilisation inconnu!"; 
		break;
	}
}
?>