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
		
		//Lignes
		echo "	<a><fieldset>
					<legend>$titre</legend>
					<p>$resume</p>
				</fieldset></a>
				<br>";
	}
}