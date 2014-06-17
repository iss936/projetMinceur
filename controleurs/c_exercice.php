<?php
include $_CONFIG['DIR_View']."v_filAriane.php";
//Aiguillage en fonction de l'action choisie

switch($action)
{
	case 'lstExercice':
	{
		$titre = "Les parties du corps";
		$lesPartiesCorps = getLesPartiesCorps();
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_lstExercice.php";
		break;
	}
	case 'entrainement':
	{
		$idPartieCorps = getRequest('idPartieCorps');
		$unePartieCorps = getUnePartieCorps($idPartieCorps);
		$titre = "Entrainement ".$unePartieCorps['libelle'];
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_entrainement.php";
		break;
	}
	case 'lstEx':
	{
		$idPartieCorps = getRequest('idPartieCorps');
		$unePartieCorps = getUnePartieCorps($idPartieCorps);
		$titre = "Liste des exercices pour ".$unePartieCorps['libelle'];
		$lesExercicePartieCorps = getLesExercices($idPartieCorps);
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_lstEx.php";
		break;
	}
	case 'lstPgrm':
	{
		if(estConnecte())
		{
			$titre = "Liste des programmes";
			$idPartieCorps = getRequest('idPartieCorps');
			$lesProgrammes = getLesProgrammes($idPartieCorps);
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