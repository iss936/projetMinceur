<?php
//Aiguillage en fonction de l'action choisie
switch($action)
{
	case 'index':
	{
		$unExercice = getLeDernierExercice();
		$les5Exercices = getLes5DerniersExercices();
		include $_CONFIG['DIR_View']."v_accueil.php";
		break;
	}
	case 'frmConnexion': 
	{	
		if(estConnecte())
		{
			$unExercice = getLeDernierExercice();
			$les5Exercices = getLes5DerniersExercices();
			include $_CONFIG['DIR_View']."v_accueil.php";
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'vdConnexion': 
	{	
		if(estConnecte())
		{
			$unExercice = getLeDernierExercice();
			$les5Exercices = getLes5DerniersExercices();
			include $_CONFIG['DIR_View']."v_accueil.php";
		}
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
			$prenomUtilisateur = $user['prenom'];
			$nomUtilisateur = $user['nom'];
			$telUtilisateur = $user['telephone'];
			$mailUtilisateur = $user['mail'];
			$adresseUtilisateur = $user['adresse'];
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_frmModifCompte.php";
		}
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'vdModifCompte':
	{
		if(estConnecte())
		{
			//Si l'utilisateur est en train de modifier son compte
			$titre = "Modification du compte";
			$prenomUtilisateur = getRequest('prenom');
			$nomUtilisateur = getRequest('nom');
			$telUtilisateur = getRequest('tel');
			$mailUtilisateur = getRequest('mail');
			$adresseUtilisateur = htmlentities(getRequest('adresse'));
			$idUtilisateur = $_SESSION['idUtilisateur'];
			$msgErreurs = editUtilisateur($idUtilisateur, $prenomUtilisateur, $nomUtilisateur, $telUtilisateur, $mailUtilisateur, $adresseUtilisateur);
			 
			//Titre
			include $_CONFIG['DIR_View']."v_headTitre.php";
			 
			//Message d'erreurs ou de confirmation
			if($msgErreurs)
			{
				$urlFrm = 'index.php?uc=identif&action=vdModifCompte';
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
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
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
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
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
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
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
		$loginUtilisateur = null;
		$mdpUtilisateur = null;
		$confirm = null;
		$prenomUtilisateur = null;
		$nomUtilisateur = null;
		$telUtilisateur = null;
		$mailUtilisateur = null;
		$adresseUtilisateur = null;
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_frmAddCompte.php";
		break;
	}
	case 'vdCreerCompte':
	{
		$titre = "Création d'un nouveau compte";
		$loginUtilisateur = getRequest('login');
		$mdpUtilisateur = getRequest('mdp');
		$confirm = getRequest('confirm');
		$prenomUtilisateur = getRequest('prenom');
		$nomUtilisateur = getRequest('nom');
		$telUtilisateur = getRequest('tel');
		$mailUtilisateur = getRequest('mail');
		$adresseUtilisateur = getRequest('adresse');
		$msgErreurs = addUtilisateur($loginUtilisateur, $mdpUtilisateur, $confirm, $prenomUtilisateur, $nomUtilisateur, $telUtilisateur, $mailUtilisateur, $adresseUtilisateur);
			
		//Titre
		include $_CONFIG['DIR_View']."v_headTitre.php";
			
		//Message d'erreurs ou de confirmation
		if($msgErreurs)
		{
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
			include $_CONFIG['DIR_View']."v_frmAddCompte.php";
		}
		else
		{
			$msgConfirmation[] = "Compte créé avec succès!";
			include $_CONFIG['DIR_View']."v_msgConfirmation.php";
			redirection(10, "index.php?uc=identif&action=frmConnexion", "Redirection vers l'accueil ...", "POINT");
		}
		break;
	}
	default: 
	{
		echo "Cas d'utilisation inconnu!"; 
		break;
	}
}
?>