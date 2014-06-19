<?php
//Aiguillage en fonction de l'action choisie
switch($action)
{
	case 'frmSuivi':
	{
		if(estConnecte())
		{
			$titre = "Mon suivi";
			$date = null;
			$poids = null;
			$taille = null;
			$evenement = null;
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_frmSuivi.php";
		}
		else
		{
			$msgErreurs[] = "Vous n'�tes pas autoris� � acc�der � cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
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
				$msgConfirmation[] = "Fiche suivi ajout� avec succ�s!";
				include $_CONFIG['DIR_View']."v_msgConfirmation.php";
				redirection(2, "index.php?uc=identif&action=frmConnexion", "Redirection vers l'accueil ...", "POINT");
			}
		}
		else
		{
			$msgErreurs[] = "Vous n'�tes pas autoris� � acc�der � cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
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
			
			//En-t�te
			include $_CONFIG['DIR_View']."v_headTitre.php";
			
			//R�cup�ration des �coles
			$lesSuivis = getLesSuivis($_SESSION['idUtilisateur']);
			if($lesSuivis)
				include $_CONFIG['DIR_View']."v_lstSuivi.php";
			else echo "<fieldset style='width:95%'> Aucune fiche de suivi n'a �t� trouv�e. </fieldset>";
		}
		else
		{
			$msgErreurs[] = "Vous n'�tes pas autoris� � acc�der � cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'imc':
	{
		if(estConnecte())
		{
			//------------
			// Variables
			//------------
			
			$titre = "Indice de Masse Corporelle";
			
			//------------
			// Vues
			//------------
			
			//En-t�te
			include $_CONFIG['DIR_View']."v_headTitre.php";
			
			//R�cup�ration du dernier suivi
			$leSuivi = getDernierSuivi($_SESSION['idUtilisateur']);
			if($leSuivi)
			{
				$taille = $leSuivi['taille'];
				$poids = $leSuivi['poids'];
				$imc = $poids/(($taille/100)*($taille/100));
				$poidsDenutrition = 15*(($taille/100)*($taille/100));
				include $_CONFIG['DIR_View']."v_imc.php";
			}
			else echo "	<fieldset style='width:95%:'>
							Aucune fiche de suivi n'a �t� trouv�e. <br>
							Veuillez renseigner tout d'abord une fiche.
						</fieldset>";
		}
		else
		{
			$msgErreurs[] = "Vous n'�tes pas autoris� � acc�der � cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
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