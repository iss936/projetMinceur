<?php
//Liste des Suivis
if($lesExercicePartieCorps)
{
	foreach($lesExercicePartieCorps as $unExercicePartieCorps)
	{
		//Variables
		$idExercice = $unExercicePartieCorps['idFicheExercice'];
		$unExercice = getUnExercice($idExercice);
		$titre = $unExercice['titre'];
		$resume = $unExercice['resume'];
		$id = $unExercice['idFicheExercice'];
		$image = $unExercice['imageResume'];
		
		//Lignes
		echo "	<fieldset>
					<legend><a href='index.php?uc=exercice&action=v_exercice&idExercice=$id'>$titre</a></legend>";
		if($image) echo "<img src='/ressources/imageResume/images/$image' style='float: left'>";
		echo "			<p>$resume</p>
				</fieldset>
				<br>";
	}
}
else
{
	echo "<fieldset>Pas d'exercices disponibles pour le moment.</fieldset>";
}