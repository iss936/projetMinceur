<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux salles
//------------------------------------------------------------------------------------------------------------------

// Récupère une salle
function getUneSalle($idSalle)
{
	//Requête
	if(!$idSalle) $idSalle = 0;
	$req = "SELECT * FROM salle WHERE idSalle = ".getMySqlString($idSalle);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getUneSalle)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$uneSalle = mysql_fetch_assoc($res);
	
	return $uneSalle;
}

//Récupère les salles
function getLesSalles($lesTypesSalles = null)
{
	//Requête
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
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesSalles)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération des lignes
	$lesSalles = array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesSalles[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesSalles;
}

//Récupère le tableau des salles les plus proches
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

?>