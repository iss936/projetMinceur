<?php
if($lesNutritions)
{
	echo "<ul>";
	foreach ($lesNutritions as $uneNutrition)
	{
		$unTitre = $uneNutrition['titre'];
		$unId = $uneNutrition['idFicheNutrition'];
		echo "	<li><a href='index.php?uc=nutrition&action=v_nutrition&idNutrition=$unId'>$unTitre</a></li>";
	}
	echo "</ul>";
} 
else
{
	echo "<fieldset>Pas de fiches de nutrition disponibles pour le moment.</fieldset>";
}
?>