<?php
//Aiguillage en fonction de l'action choisie
switch($action)
{
	case 'lstNutrition':
	{
		if(estAdmin())
		{
			$titre = "Gestion des fiches de nutrition";
			$lesNutritions = getLesNutritions();
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_lstNutrition.php";
		}
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'frmModifNutrition':
	{
		if(estAdmin())
		{
			$idNutrition = getRequest('idNutrition');
			$uneNutrition = getUneNutrition($idNutrition);
			$titreNutrition = $uneNutrition['titre'];
			$contenu = $uneNutrition['contenu'];
			$titre = "Modification d'une fiche de nutrition";
			$urlFrm = "index.php?uc=admin&action=vdModifNutrition&idNutrition=$idNutrition";
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_frmModifNutrition.php";
		}
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'vdModifNutrition':
	{
		if(estAdmin())
		{
			$idNutrition = getRequest('idNutrition');
			$titreNutrition = getRequest('titreNutrition');
			$contenu = getRequest('contenu');
			$msgErreurs = editNutrition($idNutrition, $titreNutrition, $contenu);
			$titre = "Modification d'une fiche de nutrition";
			$urlFrm = "index.php?uc=admin&action=vdModifNutrition&idNutrition=$idNutrition";
			
			//Titre
			include $_CONFIG['DIR_View']."v_headTitre.php";
				 
			//Message d'erreurs ou de confirmation
			if($msgErreurs)
			{
				include $_CONFIG['DIR_View']."v_msgErreurs.php";
				include $_CONFIG['DIR_View']."v_frmModifNutrition.php";
			}
			else
			{
				$msgConfirmation[] = "Fiche nutrition changée avec succès!";
				include $_CONFIG['DIR_View']."v_msgConfirmation.php";
				redirection(2, "index.php?uc=admin&action=lstNutrition", "Redirection vers la liste des fiches de nutrition ...", "POINT");
			}
		}
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'frmAddNutrition':
	{
		if(estAdmin())
		{
			$titreNutrition = null;
			$contenu = null;
			$titre = "Ajout d'une fiche de nutrition";
			$urlFrm = "index.php?uc=admin&action=vdAddNutrition";
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_frmModifNutrition.php";
		}
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'vdAddNutrition':
	{
		if(estAdmin())
		{
			$titreNutrition = getRequest('titreNutrition');
			$contenu = getRequest('contenu');
			$msgErreurs = addNutrition($titreNutrition, $contenu);
			$titre = "Ajout d'une fiche de nutrition";
			$urlFrm = "index.php?uc=admin&action=vdAddNutrition";
			
			//Titre
			include $_CONFIG['DIR_View']."v_headTitre.php";
				 
			//Message d'erreurs ou de confirmation
			if($msgErreurs)
			{
				include $_CONFIG['DIR_View']."v_msgErreurs.php";
				include $_CONFIG['DIR_View']."v_frmModifNutrition.php";
			}
			else
			{
				$msgConfirmation[] = "Fiche nutrition ajoutée avec succès!";
				include $_CONFIG['DIR_View']."v_msgConfirmation.php";
				redirection(2, "index.php?uc=admin&action=lstNutrition", "Redirection vers la liste des fiches de nutrition ...", "POINT");
			}
		}
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'espaceGestionExercice':
	{
		if(estConnecte())
		{

			$titre = "Gestion des exercices";
			$bodyParts = getLesPartiesCorps();
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."exercices/v_filtreExercice.php";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    			$bodyPart = $_POST['bodyParts'];
				$idBodyPart = getIdPartieCorps($bodyPart);
				var_dump($idBodyPart[0]);

				var_dump(getLesExercices($idBodyPart[0]));
				die();
			}
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'frmAddExercice':
	{
		if(estConnecte())
		{
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    			$msgErreurs= array();
    			$ok=false;
    			// $bodyPart = ($bodyPart == null) ? '' : $_POST['bodyParts'];
    			$bodyPart = $_POST['bodyParts'];
				$idBodyPart = getIdPartieCorps($bodyPart);
				$titre = $_POST['titre'];
				$resume = $_POST['resume']; 
				$contenu = $_POST['contenu'];
				$imageResume = $_FILES['imageResume']['name'];
				$msgErreurs = verifFormExercice($titre,$resume,$imageResume,$contenu);
				if(sizeof($msgErreurs)>0)
				{
					$titre = "Ajouter un exercice";
					$bodyParts = getLesPartiesCorps();
					include $_CONFIG['DIR_View']."v_headTitre.php";
					include $_CONFIG['DIR_View']."v_msgErreurs.php";
					include $_CONFIG['DIR_View']."exercices/v_frmAddExercice.php";
				}	
				else
				{
					$video = $_POST['videoExerciceY'];
					if($video != '' && $video != null)
						$video = str_replace("/watch?v=", "/v/", $video);

					$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'ressources'.DIRECTORY_SEPARATOR.'imageResume'.
					DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR. $_FILES["imageResume"]["name"];

					if(!file_exists($path))
						move_uploaded_file($_FILES["imageResume"]["tmp_name"],$path);
					

					insertExercice($contenu,$titre,$resume,$path,$bodyPart,$video);
					$titre = "Ajouter un exercice";
					$bodyParts = getLesPartiesCorps();
					include $_CONFIG['DIR_View']."v_headTitre.php";
					$msgConfirmation[] = "Article bien enregistré";
					include $_CONFIG['DIR_View']."v_msgConfirmation.php";
					include $_CONFIG['DIR_View']."exercices/v_frmAddExercice.php";
				}
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
	default: 
	{
		echo "Cas d'utilisation inconnu!"; 
		break;
	}
}
?>