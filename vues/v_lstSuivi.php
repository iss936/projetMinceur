<?php
//Liste des Suivis
if(isset($lesSuivis))
{
	echo "<table class='sortable'>
			<tr>
				<th> <a href='index.php?uc=param&action=frmAddUtilisateur'><img src='".$_CONFIG['DIR_Image']."imgAdd.png' title='Ajouter une �cole'></a> </th>
				<th>Date</th>
				<th>Poids</th>
				<th>Taille</th>
				<th>Evenement</th>
				<th></th>
			</tr>"; 

	foreach($lesSuivis as $unSuivi)
	{
		//Variables
		//Utilisateur
		$idSuivi = $unSuivi['idSuivi'];
		$date = $unSuivi['date'];
		$poids = $unSuivi['poids'];
		$taille = $unSuivi['taille'];
		$evenement = $unSuivi['evenement'];
		// - Image et lien
		$urlFiche = "index.php?uc=param&action=frmModifUtilisateur&id_utilisateur=$idSuivi";
		$paramTD = "onClick=document.location.href='index.php?uc=param&action=frmModifUtilisateur&id_utilisateur=$idSuivi' title=\"Cliquez ici pour voir l'�cole\"";
		$imgEdit = "<a href='$urlFiche'><img src='".$_CONFIG['DIR_Image']."imgEdit.png' title=\"Voir l'�cole\"></a>";
		$imgSuppr = "<a onClick=confirmDelUtilisateur($idSuivi);><img src='".$_CONFIG['DIR_Image']."imgTrash.png' title=\"Supprimer l'�cole\"></a>";
		
		//Lignes
		echo "<tr class='ligneTableau'>
			<td width='16'> $imgEdit </td>
			<td $paramTD> $date </td>
			<td $paramTD> $poids </td>
			<td $paramTD> $taille </td>
			<td $paramTD> $evenement</td>
			<td width='16'> $imgSuppr </td>
		</tr>";
	}
	echo "</table><br>";

}

?>