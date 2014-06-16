<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux salles
//------------------------------------------------------------------------------------------------------------------

// R�cup�re une salle
function getUneSalle($idSalle)
{
	//Requ�te
	if(!$idSalle) $idSalle = 0;
	$req = "SELECT * FROM salle WHERE idSalle = ".getMySqlString($idSalle);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getUneSalle)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$uneSalle = mysql_fetch_assoc($res);
	
	return $uneSalle;
}

//R�cup�re les salles
function getLesSalles($lesTypesSalles = null)
{
	//Requ�te
	$req = "SELECT * FROM salle";
	if(count($lesTypesSalles) > 0)
	{
		$req .= " WHERE ";
		for($i=0; $i < count($lesTypesSalles); $i++)
		{
			$req .= "idTypeSalle = ".getMySqlString($lesTypesSalles[$i]);
			if($i != count($lesTypesSalles)-1)
				$req .= " OR ";
		}
	}
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesSalles)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration des lignes
	$lesSalles = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesSalles[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesSalles;
}

//R�cup�re le tableau des salles les plus proches
function getLesSallesOrder($lesSalles, $lat, $long, $rayon)
{
	$lesSallesOrder = array();
	
	foreach($lesSalles as $uneSalle)
	{
		$uneSalle['distance'] = getUneDistance($lat, $long, $uneSalle['latitude'], $uneSalle['longitude']);
		if($uneSalle['distance'] <= $rayon)
			$lesSallesOrder[] = $uneSalle;
	}
	$taille = count($lesSallesOrder);
	
	for($i = $taille-2;$i>=0;$i--)
	{
		for($j=0;$j<=$i;$j++)
		{
			if($lesSallesOrder[$j]['distance'] > $lesSallesOrder[$j+1]['distance'])
			{
				$temp = $lesSallesOrder[$j+1];
				$lesSallesOrder[$j+1] = $lesSallesOrder[$j];
				$lesSallesOrder[$j] = $temp;
			}
		}
	}
	return $lesSallesOrder;
}

//Ajoute une salle
function addSalle($nomSalle, $adresseSalle, $latitude, $longitude, $idTypeSalle)
{
	//R�cup�ration des variables
	$Erreurs = array();
	
	$nom = getMySqlString($nomSalle);
	$adresse = getMySqlString($adresseSalle);
	$lat = getMySqlString($latitude);
	$long = getMySqlString($longitude);
	
	//Test des erreurs
	if(!$nomSalle || !$adresseSalle || !$idTypeSalle) $Erreurs[] = "Veuillez remplir tous les champs obligatoires (*).";

	//Ajout dans la base
	if(!$Erreurs)
	{
		$req = "INSERT INTO salle (nomSalle, adresse, latitude, longitude, idTypeSalle)
				VALUES ($nom, $adresse, $lat, $long, $idTypeSalle)";
		$conx = connexion();
		mysql_query($req, $conx) or $Erreurs[] = "<u>Erreur SQL (addSalle)</u>: ".mysql_error();
		mysql_close($conx);
	}

	return $Erreurs;
}
?>