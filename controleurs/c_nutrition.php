<?php
//Aiguillage en fonction de l'action choisie
switch($action)
{
	case 'lstNutrition':
	{
		$titre = "Les categories de nutrition";
		$lesCategories = getLesCategories();
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_lstCategories.php";
		break;
	}
	case 'categorie':
	{
		$idCategorie = getRequest('idCategorie');
		$lesNutritions = getLesNutritions($idCategorie);
		$uneCategorie = getUneCategorie($idCategorie);
		$titre = $uneCategorie['libelleCategorie'];
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_categorie.php";
		break;
	}
	case 'v_nutrition':
	{
		$idNutrition = getRequest('idNutrition');
		$uneNutrition = getUneNutrition($idNutrition);
		$titre = $uneNutrition['titre'];
		include $_CONFIG['DIR_View']."v_headTitre.php";
		include $_CONFIG['DIR_View']."v_nutrition.php";
		break;
	}
	default: 
	{
		echo "Cas d'utilisation inconnu!"; 
		break;
	}

}
?>