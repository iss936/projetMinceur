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
		include $_CONFIG['DIR_View']."/exercices/v_exAbdominaux.php";
		break;
	}
	case 'dos':
	{
		include $_CONFIG['DIR_View']."/exercices/v_exDos.php";
		break;
	}
	case 'pectoraux':
	{
		//include $_CONFIG['DIR_View']."v_exPectoraux.php";
		break;
	}
	case 'biceps':
	{
		$titre = "Entrainement des biceps";
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."/exercices/biceps/v_biceps.php";
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
		$titre = "Liste des programmes";
		$lesProgrammes = getLesProgrammes(4);
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_lstPgrm.php";
		break;
	}
	case 'triceps':
	{
		//include $_CONFIG['DIR_View']."v_exBiceps.php";
		break;
	}
	case 'epaules':
	{
		//include $_CONFIG['DIR_View']."v_exBiceps.php";
		break;
	}
	default: 
	{
		echo "Cas d'utilisation inconnu!"; 
		break;
	}
}
?>