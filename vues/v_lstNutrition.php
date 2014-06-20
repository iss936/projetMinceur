<?php
//Liste des Ecoles
if(isset($lesNutritions))
{
	echo "<table class='sortable'>
			<tr>
				<th> <a href='index.php?uc=admin&action=frmAddNutrition'><img src='".$_CONFIG['DIR_Image']."imgAdd.png' title='Ajouter une fiche nutrition'></a> </th>
				<th>Titre</th>
				<th>Date d'ajout</th>
				<th></th>
			</tr>"; 

	foreach($lesNutritions as $uneNutrition)
	{
		//Variables
		$idNutrition = $uneNutrition['idFicheNutrition'];
		$titre = $uneNutrition['titre'];
		$dateAjout = $uneNutrition['dateAjout'];
		// - Image et lien
		$urlFiche = "index.php?uc=admin&action=frmModifNutrition&idNutrition=$idNutrition";
		$paramTD = "onClick=document.location.href='index.php?uc=admin&action=frmModifNutrition&idNutrition=$idNutrition' title=\"Cliquez ici pour voir la fiche nutrition\"";
		$imgEdit = "<a href='$urlFiche'><img src='".$_CONFIG['DIR_Image']."imgEdit.png' title=\"Voir la fiche nutrition\"></a>";
		$imgSuppr = "<a onClick=confirmDelUtilisateur($idNutrition);><img src='".$_CONFIG['DIR_Image']."imgTrash.png' title=\"Supprimer la fiche nutrition\"></a>";
		
		//Lignes
		echo "<tr class='ligneTableau'>
			<td width='16'> $imgEdit </td>
			<td $paramTD> $titre </td>
			<td $paramTD> $dateAjout </td>
			<td width='16'> $imgSuppr </td>
		</tr>";
	}
	echo "</table><br>";
}