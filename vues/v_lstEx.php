<?php
//Liste des Suivis
if(isset($lesExercicePartieCorps))
{
	foreach($lesExercicePartieCorps as $unExercicePartieCorps)
	{
		//Variables
		$idExercice = $unExercicePartieCorps['idFicheExercice'];
		$unExercice = getUnExercice($idExercice);
		$titre = $unExercice['titre'];
		$resume = $unExercice['resume'];
		$id = $unExercice['idFicheExercice'];
		
		//Lignes
		echo "	<fieldset>
					<legend><a href='index.php?uc=exercice&action=v_exercice&idExercice=$id'>$titre</a></legend>
					<p>$resume</p>
				</fieldset>
				<br>";
	}
}