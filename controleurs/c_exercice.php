<?php
include $_CONFIG['DIR_View']."v_filAriane.php";
//Aiguillage en fonction de l'action choisie

switch($action)
{
	case 'lstExercice':
	{
		$titre = "Les exercices";
		$lesPartiesCorps = getLesPartiesCorps();
		include $_CONFIG['DIR_View']."v_lstExercice.php";
		break;
	}
	case 'abdominaux':
	{
		$titre = "Entrainement des abdominaux";
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."exercices/abdominaux/v_abdominaux.php";
		//include $_CONFIG['DIR_View']."/exercices/v_exAbdominaux.php";
		break;
	}
	case 'lstExAbdominaux':
	{
		$titre = "Liste des exercices pour abdominaux";
		$lesExercicePartieCorps = getLesExercices(1);
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_lstEx.php";
		break;
	}
	case 'lstPgrmAbdominaux':
	{
		if(estConnecte())
		{
			$titre = "Liste des programmes";
			$lesProgrammes = getLesProgrammes(1);
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_lstPgrm.php";
		}
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'dos':
	{
		$titre = "Entrainement du dos";
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."exercices/dos/v_dos.php";
		//include $_CONFIG['DIR_View']."/exercices/v_exDos.php";
		break;
	}
	case 'pectoraux':
	{
		$titre = "Entrainement des pectoraux";
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."exercices/pectoraux/v_pectoraux.php";
		break;
	}
	case 'biceps':
	{
		$titre = "Entrainement des biceps";
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."exercices/biceps/v_biceps.php";
		break;
	}
	case 'lstExBiceps':
	{
		$titre = "Liste des exercices pour biceps";
		$lesExercicePartieCorps = getLesExercices(4);
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_lstEx.php";
		break;
	}
	case 'lstPgrmBiceps':
	{
		if(estConnecte())
		{
			$titre = "Liste des programmes";
			$lesProgrammes = getLesProgrammes(4);
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_lstPgrm.php";
		}
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'triceps':
	{
		$titre = "Entrainement des triceps";
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."exercices/triceps/v_triceps.php";
		break;
	}
	case 'epaules':
	{
		$titre = "Entrainement des épaules";
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."exercices/epaules/v_epaules.php";
		break;
	}
	case 'v_exercice':
	{
		$idExercice = getRequest('idExercice');
		$unExercice = getUnExercice($idExercice);
		$titre = $unExercice['titre'];
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."exercices/v_exercice.php";
		break;
	}
	case 'v_pgrm':
	{
		if(estConnecte())
		{
			$idPgrm = getRequest('idPgrm');
			$unProgramme = getUnProgramme($idPgrm);
			$unProgrammeExercice = getUnProgrammeExercice($idPgrm);
			$titre = $unProgramme['niveau'];
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."exercices/v_pgrm.php";
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