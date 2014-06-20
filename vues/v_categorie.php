<?php
	foreach ($lesNutritions as $uneNutrition)
	{
		$unTitre = $uneNutrition['titre'];
		$unId = $uneNutrition['idFicheNutrition'];?>
		<fieldset>
			<legend><a href="index.php?uc=nutrition&action=v_nutrition&idNutrition=<?php echo $unId?>"><?php echo $unTitre?></a></legend>
		</fieldset>
	<?php } ?>
