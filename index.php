<?php
//Initialisation de la session
session_start();

//Inclusion des fonctions
require "config.inc.php";
require $_CONFIG['DIR_Model']."fonctions.all.php";

//Cas d'utilisation
$uc = getRequest('uc', "identif");
$action = getRequest('action');

//Haut de page
include $_CONFIG['DIR_View']."v_entete.php";
include $_CONFIG['DIR_View']."v_bandeau.php";
include $_CONFIG['DIR_View']."v_menu.php";

//Aiguillage en fonction du cas d'utilisation
switch($uc)
{
	case 'identif':
	{
		$action = getRequest('action', "frmConnexion");
		include $_CONFIG['DIR_Control']."c_gererCompte.php";
		break;
	}
	case 'suivi':
	{
		if(estConnecte()) include $_CONFIG['DIR_Control']."c_suivi.php";
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'localisation':
	{
		if(estConnecte()) include $_CONFIG['DIR_Control']."c_localisation.php";
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'consult':
	{
		if(estConnecte()) include $_CONFIG['DIR_Control']."c_voirReservation.php";
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'gestion':
	{
		if(estConnecte()) include $_CONFIG['DIR_Control']."c_gererReservation.php";
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'param':
	{
		if(estConnecte())
		{
			if(estEnseignement() || estRoulage()) include $_CONFIG['DIR_Control']."c_gererParametre.php";
			else
			{
				$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
				include $_CONFIG['DIR_View']."v_msgErreurs.php";
			}
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'plan':
	{
		if(estConnecte())
		{
			if(estEnseignement() || estRoulage()) include $_CONFIG['DIR_Control']."c_gererPlanning.php";
			else
			{
				$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
				include $_CONFIG['DIR_View']."v_msgErreurs.php";
			}
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'doc':
	{
		if(estConnecte()) include $_CONFIG['DIR_Control']."c_gererDocument.php";
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'stat':
	{
		if(estConnecte()) include $_CONFIG['DIR_Control']."c_statistiques.php";
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
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