<?php
//Initialisation de la session
session_start();

//Inclusion des fonctions
require "config.inc.php";
require $_CONFIG['DIR_Model']."fonctions.all.php";

//Cas d'utilisation
$uc = getRequest('uc', "identif");
$action = getRequest('action');

$lesPartiesCorps = getLesPartiesCorps();
$lesCategories = getLesCategories();

//Haut de page
include $_CONFIG['DIR_View']."v_entete.php";
include $_CONFIG['DIR_View']."v_bandeau.php";
include $_CONFIG['DIR_View']."v_menu.php";

//Aiguillage en fonction du cas d'utilisation
switch($uc)
{
	case 'identif':
	{
		$action = getRequest('action', "index");
		include $_CONFIG['DIR_Control']."c_gererCompte.php";
		break;
	}
	case 'suivi':
	{
		if(estConnecte()) include $_CONFIG['DIR_Control']."c_suivi.php";
		else
		{
			$msgErreurs[] = "Vous n'�tes pas autoris� � acc�der � cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'localisation':
	{
		if(estConnecte()) include $_CONFIG['DIR_Control']."c_localisation.php";
		else
		{
			$msgErreurs[] = "Vous n'�tes pas autoris� � acc�der � cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'nutrition':
	{
		$action = getRequest('action', "lstNutrition");
		include $_CONFIG['DIR_Control']."c_nutrition.php";
		break;
	}
	case 'exercice':
	{
		$action = getRequest('action', "lstExercice");
		include $_CONFIG['DIR_Control']."c_exercice.php";
		break;
	}
	case 'admin':
	{
		if(estAdmin()) include $_CONFIG['DIR_Control']."c_admin.php";
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

//Pied de page
include $_CONFIG['DIR_View']."v_pied.php";
?>