<?php
//Aiguillage en fonction de l'action choisie
switch($action)
{
	case 'frmAddExercice':
	{
		if(estConnecte())
		{
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    			$msgErreurs= array();
				$bodyPart = $_POST['bodyParts'];
				$idBodyPart = getIdPartieCorps($bodyPart);
				$ok=false;
				$titre = $_POST['titre'];
				//verif titre
				if($titre==null)
				{
					$titre = "Ajouter un exercice";
					$bodyParts = getLesPartiesCorps();
					$ok=true;
					include $_CONFIG['DIR_View']."v_headTitre.php";
					$msgErreurs[] = "Saisir un titre";
					include $_CONFIG['DIR_View']."v_msgErreurs.php";
					include $_CONFIG['DIR_View']."exercices/v_frmAddExercice.php";
				}
				
				$resume = $_POST['resume']; 
				// on compte dans le resume le nb d'image importé
				if(mb_substr_count($resume, "<img ") >1 || $resume==null)
				{	
					$ok=true;
					// $resume = getRequest('resume');
					$titre = "Ajouter un exercice";
					$bodyParts = getLesPartiesCorps();
					include $_CONFIG['DIR_View']."v_headTitre.php";
					$msgErreurs[] = "Saisir un resume avec une seule image";
					include $_CONFIG['DIR_View']."v_msgErreurs.php";
					include $_CONFIG['DIR_View']."exercices/v_frmAddExercice.php";
				}
				
				$contenu = $_POST['contenu'];
				// on compte dans le contenu le nb d'image importé
				if(mb_substr_count($contenu, "<img ") >3 || $contenu==null)
				{	
					$ok=true;
					// $resume = getRequest('resume');
					$titre = "Ajouter un exercice";
					$bodyParts = getLesPartiesCorps();
					include $_CONFIG['DIR_View']."v_headTitre.php";
					$msgErreurs[] = "Saisir le contenu avec maximum 3 images";
					include $_CONFIG['DIR_View']."v_msgErreurs.php";
					include $_CONFIG['DIR_View']."exercices/v_frmAddExercice.php";
				}
				//pas d'erreur de saisie
				if(!$ok)
				{
					insertExercice($contenu,$titre,$resume,$bodyPart);
					$titre = "Ajouter un exercice";
					$bodyParts = getLesPartiesCorps();
					include $_CONFIG['DIR_View']."v_headTitre.php";
					include $_CONFIG['DIR_View']."exercices/v_frmAddExercice.php";
					echo " réussi";
				}
				/*var_dump($contenu);
				die();*/

			}
			else// on affiche le formulaire d'ajout
			{
				$titre = "Ajouter un exercice";
				$bodyParts = getLesPartiesCorps();
				include $_CONFIG['DIR_View']."v_headTitre.php";
				include $_CONFIG['DIR_View']."exercices/v_frmAddExercice.php";
			}
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'vdAddExercice':
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
			
			//En-tête
			include $_CONFIG['DIR_View']."v_headTitre.php";
			
			//Récupération du dernier suivi
			$leSuivi = getDernierSuivi($_SESSION['idUtilisateur']);
			if($leSuivi)
			{
				$taille = $leSuivi['taille'];
				$poids = $leSuivi['poids'];
				$imc = $poids/(($taille/100)*($taille/100));
				include $_CONFIG['DIR_View']."v_imc.php";
			}
			else "	<fieldset style='width:95%:'>
						Aucune fiche de suivi n'a été trouvée. <br>
						Veuillez renseigner tout d'abord une fiche.
					</fieldset>";
		}
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
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