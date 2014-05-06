<?php
//Aiguillage en fonction de l'action choisie
switch($action)
{
	case 'frmLocalisation':
	{
		if(estConnecte())
		{
			$titre = "Localisation";
			$display = true;
			$rayon = null;
			$adresse = null;
			$lesSallesOrder = null;
			$typeSalle = null;
			$lesTypesSalles = getLesTypesSalles();
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_frmLocalisation.php";
		}
		else include $_CONFIG['DIR_View']."i_retourConnexion.php";
		break;
	}
	case 'vdLocalisation':
	{
		if(estConnecte())
		{
			$titre = "Resultat";
			$display = false;
			$adresse = getRequest('adresse');
			$rayon = getRequest('rayon');
			$typeSalle = getRequest('typeSalle');
			$lesSalles = getLesSalles($typeSalle);
			$lesTypesSalles = getLesTypesSalles();
			$adresseModif = str_replace(' ', '+', $adresse); //Traitement des espaces
			$adresseModif = str_replace('é', 'e', $adresseModif); //Traitement accent
			$url = "http://maps.googleapis.com/maps/api/geocode/json?address=$adresseModif&sensor=false";
			$req = file_get_contents($url);
			$gps = json_decode($req, true);
			$lat = $gps['results'][0]['geometry']['location']['lat'];
			$long = $gps['results'][0]['geometry']['location']['lng'];
			
			//Titre
			include $_CONFIG['DIR_View']."v_headTitre.php";
			
			//Message d'erreurs ou de confirmation
			$lesSallesOrder = getLesSallesOrder($lesSalles,$lat,$long,$rayon);
			include $_CONFIG['DIR_View']."v_frmLocalisation.php";
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