<?php
if($lesNutritions)
{
	foreach ($lesNutritions as $uneNutrition)
	{
		$unTitre = $uneNutrition['titre'];
		$unId = $uneNutrition['idFicheNutrition'];
		echo "	<fieldset>
					<legend><a href='index.php?uc=nutrition&action=v_nutrition&idNutrition=$unId'>$unTitre</a></legend>
				</fieldset>";
	}
} 
else
{
	echo "<fieldset>Pas de fiches de nutrition disponibles pour le moment.</fieldset>";
}
?>