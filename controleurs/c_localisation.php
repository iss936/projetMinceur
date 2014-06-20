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
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'vdLocalisation':
	{
		if(estConnecte())
		{
			$adresse = getRequest('adresse');
			$rayon = getRequest('rayon');
			$typeSalle = getRequest('typeSalle');
			$lesSalles = getLesSalles($typeSalle);
			$lesTypesSalles = getLesTypesSalles();
			$msgErreurs = null;
			if(!$typeSalle) $msgErreurs[] = "Veuillez cocher au moins un type de salle.";
			if(!$adresse) $msgErreurs[] = "Veuillez renseigner une adresse.";
			if(count($msgErreurs) < 1)
			{
				$titre = "Resultat";
				$display = false;
				
				
				$adresseModif = str_replace(' ', '+', $adresse); //Traitement des espaces
				$adresseModif = str_replace('é', 'e', $adresseModif); //Traitement accent
				$url = "http://maps.googleapis.com/maps/api/geocode/json?address=$adresseModif&sensor=false";
				$req = file_get_contents($url);
				$gps = json_decode($req, true);
				$lat = $gps['results'][0]['geometry']['location']['lat'];
				$long = $gps['results'][0]['geometry']['location']['lng'];
				$lesSallesOrder = getLesSallesOrder($lesSalles,$lat,$long,$rayon);
				
				include $_CONFIG['DIR_View']."v_headTitre.php";
				include $_CONFIG['DIR_View']."v_frmLocalisation.php";
			}
			else
			{
				$titre = "Localisation";
				$display = true;
				$lesSallesOrder = null;
				include $_CONFIG['DIR_View']."v_msgErreurs.php";
				include $_CONFIG['DIR_View']."v_headTitre.php";
				include $_CONFIG['DIR_View']."v_frmLocalisation.php";
			}
		}
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'frmAddSalle':
	{
		if(estConnecte())
		{
			$titre = "Ajout d'une salle";
			$nomSalle = null;
			$adresseSalle = null;
			$lesTypesSalles = getLesTypesSalles();
			include $_CONFIG['DIR_View']."v_headTitre.php";
			include $_CONFIG['DIR_View']."v_frmAddSalle.php";
		}
		else
		{
			$msgErreurs[] = "Vous n'êtes pas autorisé à accéder à cette page!";
			include $_CONFIG['DIR_View']."v_msgErreurs.php";
		}
		break;
	}
	case 'vdAddSalle':
	{
		if(estConnecte())
		{
			$titre = "Ajout d'une salle";
			$nomSalle = getRequest('nom');
			$adresseSalle = getRequest('adresse');
			$idTypeSalle = getRequest('typeSalle');
			$adresseModif = str_replace(' ', '+', $adresseSalle); //Traitement des espaces
			$adresseModif = str_replace('é', 'e', $adresseModif); //Traitement accent
			$url = "http://maps.googleapis.com/maps/api/geocode/json?address=$adresseModif&sensor=false";
			$req = file_get_contents($url);
			$gps = json_decode($req, true);
			$lat = $gps['results'][0]['geometry']['location']['lat'];
			$long = $gps['results'][0]['geometry']['location']['lng'];
			$msgErreurs = addSalle($nomSalle, $adresseSalle, $lat, $long, $idTypeSalle);
			
			include $_CONFIG['DIR_View']."v_headTitre.php";
			 
			if($msgErreurs)
			{
				include $_CONFIG['DIR_View']."v_msgErreurs.php";
				include $_CONFIG['DIR_View']."v_frmAddSalle.php";
			}
			else
			{
				$msgConfirmation[] = "Salle ajoutée avec succès!";
				include $_CONFIG['DIR_View']."v_msgConfirmation.php";
				redirection(2, "index.php?uc=identif&action=index", "Redirection vers l'accueil ...", "POINT");
				
			}	
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