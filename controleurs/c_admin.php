<?php
//Aiguillage en fonction de l'action choisie
switch($action)
{
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
					$msgConfirmation[] = "Article bien enregistr�";
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
			else "<fieldset style='width:95%:'> Aucune fiche de suivi n'a �t� trouv�e. </fieldset>";
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
				include $_CONFIG['DIR_View']."v_imc.php";
			}
			else "	<fieldset style='width:95%:'>
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