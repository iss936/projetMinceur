<p><?php echo $unProgramme['description'] ?></p> <br>
<?php if(isset($unProgrammeExercice)) { ?>
	<table>
		<tr>
			<th>Exercices</th>
			<th>Séries</th>
			<th>Répétitions</th>
			<th>Repos</th>
		</tr>
		<?php foreach($unProgrammeExercice as $uneLigne) {
		$idExercice = $uneLigne['idFicheExercice'];
		$unExercice = getUnExercice($idExercice);
		$titre = $unExercice['titre'];
		$serie = $uneLigne['serie'];
		$repetition = $uneLigne['repetition'];
		$repos = $uneLigne['repos'];
		$paramTD = "onClick=document.location.href='index.php?uc=exercice&action=v_exercice&idExercice=$idExercice' title=\"Cliquez ici pour voir l'exercice\"";
		
		echo "	<tr class='ligneTableau'>
					<td $paramTD>$titre</td>
					<td $paramTD>$serie</td>
					<td $paramTD>$repetition</td>
					<td $paramTD>$repos</td>
				</tr>";
		} ?>
	</table>
<?php } ?>