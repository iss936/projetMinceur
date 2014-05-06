<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques à la localisation
//------------------------------------------------------------------------------------------------------------------

//Récupère une distance entre deux points
function getUneDistance($lat_A, $long_A, $lat_B, $long_B)
{
	$a = pi() / 180;
	$lat1 = $lat_A * $a;
	$lat2 = $lat_B * $a;
	$lon1 = $long_A * $a;
	$lon2 = $long_B * $a;
	$t1 = sin($lat1) * sin($lat2);
	$t2 = cos($lat1) * cos($lat2);
	$t3 = cos($lon1 - $lon2);
	$t4 = $t2 * $t3;
	$t5 = $t1 + $t4;
	$rad_dist = atan(-$t5/sqrt(-$t5 * $t5 +1)) + 2 * atan(1);
	$result = ($rad_dist * 3437.74677 * 1.1508) * 1.6093470878864446;
	return $result;
}

?>