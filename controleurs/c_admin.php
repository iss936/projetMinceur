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
			$idCategorie = $uneNutrition['idCategorieNutrition'];
			$lesCategories = getLesCategories();
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
			$idCategorie = getRequest('idCategorie');
			$msgErreurs = editNutrition($idNutrition, $titreNutrition, $contenu, $idCategorie);
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
			$idCategorie = null;
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
			$idCategorie = getRequest('idCategorie');
			$msgErreurs = addNutrition($titreNutrition, $contenu, $idCategorie);
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
	case 'delNutrition':
	{
		if(estAdmin())
		{
			$idNutrition = getRequest('idNutrition');
			$msgErreurs = delNutrition($idNutrition);
			
			//Message d'erreurs ou de confirmation
			if($msgErreurs)
			{
				include $_CONFIG['DIR_View']."v_msgErreurs.php";
				include $_CONFIG['DIR_View']."v_lstNutrition.php";
			}
			else
			{
				$msgConfirmation[] = "Fiche nutrition supprimée avec succès!";
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
			include $_CONFIG['DIR_View']."v_headTitre.php";
			/*$bodyParts = getLesPartiesCorps();
			
			include $_CONFIG['DIR_View']."exercices/v_filtreExercice.php";*/

		
    			/*$bodyPart = $_POST['bodyParts'];
				$idBodyPart = getIdPartieCorps($bodyPart);*/
				//$lesExercices = getLesExercices($idBodyPart[0]);
				$lesExercices = getLesExercices();
				include $_CONFIG['DIR_View']."exercices/v_espaceGestionExercice.php";
				
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'deleteExercice':
	{
		$idExercice = $_GET['idExercice'];
		if(estConnecte())
		{
			if(getFicheProgrammeExercice($idExercice) != null)
				delExerciceProg($idExercice);
			delExercice($idExercice);
			
			$titre = "Gestion des exercices";
			$lesExercices = getLesExercices();
			include $_CONFIG['DIR_View']."v_headTitre.php";
			$msgConfirmation[] = "Article supprimé";
			include $_CONFIG['DIR_View']."v_msgConfirmation.php";
			include $_CONFIG['DIR_View']."exercices/v_espaceGestionExercice.php";
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'frmModifExercice':
	{
		if(isset($_GET['idExercice']))
			$idExercice =$_GET['idExercice'];
		else
			$idExercice = "";
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
				$msgErreurs = verifFormExercice($titre,$resume,$imageResume,$contenu,$idExercice);
				if(sizeof($msgErreurs)>0)
				{
					if(!isset($idExercice) || $idExercice=="")
						$titre = "Ajouter un exercice";
					else
					{
						$titre = "Modifier un exercice";
						$unExercice = getUnExercice($idExercice);
					}
						
					$bodyParts = getLesPartiesCorps();
					include $_CONFIG['DIR_View']."v_headTitre.php";
					include $_CONFIG['DIR_View']."v_msgErreurs.php";
					include $_CONFIG['DIR_View']."exercices/v_frmModifExercice.php";
				}	
				else //aucune erreur detectée
				{
					$video = $_POST['videoExerciceY'];
					if($video != '' && $video != null)
						$video = str_replace("/watch?v=", "/v/", $video);

					$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'ressources'.DIRECTORY_SEPARATOR.'imageResume'.
					DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR. $_FILES["imageResume"]["name"];

					if(!file_exists($path))
						move_uploaded_file($_FILES["imageResume"]["tmp_name"],$path);
						
					//$path= str_replace('controleurs'.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR, "", $path);
					
					if(!isset($idExercice) || $idExercice=="")
					{
						insertExercice($contenu,$titre,$resume,$imageResume,$bodyPart,$video);
						$titre = "Ajouter un exercice";
						$bodyParts = getLesPartiesCorps();
						include $_CONFIG['DIR_View']."v_headTitre.php";
						$msgConfirmation[] = "Article bien enregistré";
						include $_CONFIG['DIR_View']."v_msgConfirmation.php";
						include $_CONFIG['DIR_View']."exercices/v_frmModifExercice.php";
					}
					else //modification du formulaire
					{
						updateExercice($idExercice,$contenu,$titre,$resume,$imageResume,$idBodyPart[0],$video);
						$titre = "Gestion des exercices";
						$lesExercices = getLesExercices();
						$bodyParts = getLesPartiesCorps();
						include $_CONFIG['DIR_View']."v_headTitre.php";
						$msgConfirmation[] = "Article bien modifié";
						include $_CONFIG['DIR_View']."v_msgConfirmation.php";
						include $_CONFIG['DIR_View']."exercices/v_espaceGestionExercice.php";
					}
					
					
					
					
				}
			}
			else// on affiche le formulaire 
			{
				if($idExercice == "")
				{
					$titre = "Ajouter un exercice";
					$bodyParts = getLesPartiesCorps();
				}
				else
				{
					$titre = "Modifier un exercice";
					$bodyParts = getLesPartiesCorps();
					$unExercice = getUnExercice($idExercice);
				
				}
				include $_CONFIG['DIR_View']."v_headTitre.php";
				include $_CONFIG['DIR_View']."exercices/v_frmModifExercice.php";
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