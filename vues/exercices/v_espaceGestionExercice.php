<?php
//Liste des exercices
if(isset($lesExercices))
{
	echo "<table class='sortable'>
			<tr>
				<th> <a href='index.php?uc=admin&action=frmModifExercice'><img src='".$_CONFIG['DIR_Image']."imgAdd.png' title='Ajouter un exercice'></a> </th>
				<th>Titre</th>
				<th>Resume</th>
				<th>Date d'ajout</th>
				<th></th>
			</tr>"; 

	foreach($lesExercices as $unExercice)
	{
		//Variables
		$idExercice = $unExercice['idFicheExercice'];
		$titre = $unExercice['titre'];
		$dateAjout = date("d/m/y",strtotime($unExercice['dateAjout']));
		$resume = $unExercice['resume'];
		// - Image et lien
		$urlFiche = "index.php?uc=admin&action=frmModifExercice&idExercice=$idExercice";
		$paramTD = "onClick=document.location.href='index.php?uc=admin&action=frmModifExercice&idExercice=$idExercice' title=\"Cliquez ici pour voir la fiche exercice\"";
		$imgEdit = "<a href='$urlFiche'><img src='".$_CONFIG['DIR_Image']."imgEdit.png' title=\"Voir la fiche exercice\"></a>";
		$imgSuppr = "<a href='index.php?uc=admin&action=deleteExercice&idExercice=$idExercice' onclick='return confirm('voulez-vous supprimer cette article?');'><img src='".$_CONFIG['DIR_Image']."imgTrash.png' title=\"Supprimer la fiche exercice\"></a>";
		 
		//Lignes
		echo "<tr class='ligneTableau'>
			<td width='16'> $imgEdit </td>
			<td $paramTD> $titre </td>
			<td $paramTD> $resume </td>
			<td $paramTD> $dateAjout </td>";
			
		?>
		<td width='16'><a href='index.php?uc=admin&action=deleteExercice&idExercice=<?php echo $idExercice ?>' onclick="return confirm('voulez-vous supprimer cette article?');"><img src="<?php echo $_CONFIG['DIR_Image'].'imgTrash.png';?>" title="Supprimer la fiche exercice"></a> </td>
		</tr>
		<?php
	}
	echo "</table><br>";
}
?>