<?php
//Aiguillage en fonction de l'action choisie
switch($action)
{
	case 'frmLocalisation':
	{
		if(estConnecte())
		{
			$titre = "Localisation";
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_frmLocalisation.php";
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'vdSuivi':
	{
		if(estConnecte())
		{
			$titre = "Mon suivi";
			$date = getRequest('date');
			$poids = getRequest('poids');
			$taille = getRequest('taille');
			$evenement = getRequest('evenement');
			$msgErreurs = addSuivi($date, $poids, $taille, $evenement);
			
			//Titre
			include $_CONFIG['DIR_View']."v_headTitre.php";
			
			//Message d'erreurs ou de confirmation
			if($msgErreurs)
			{
				include $_CONFIG['DIR_View']."v_msgErreurs.php";
				include $_CONFIG['DIR_View']."v_frmSuivi.php";
			}
			else
			{
				$msgConfirmation[] = "Fiche suivi ajouté avec succès!";
				include $_CONFIG['DIR_View']."v_msgConfirmation.php";
				redirection(2, "index.php?uc=identif&action=frmConnexion", "Redirection vers l'accueil ...", "POINT");
			}
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'lstSuivi':
	{
		if(estConnecte())
		{
			//------------
			// Variables
			//------------
			
			$titre = "Mes fiches de suivi";
			$nbPagesNull = 0; 
			
			//------------
			// Vues
			//------------
			
			//En-tête
			include $_CONFIG['DIR_View']."v_headTitre.php";
			
			//Récupération des écoles
			$lesSuivis = getLesSuivis($_SESSION['idUtilisateur']);
			if($lesSuivis)
				include $_CONFIG['DIR_View']."v_lstSuivi.php";
			else "<fieldset style='width:95%:'> Aucune fiche de suivi n'a été trouvée. </fieldset>";
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