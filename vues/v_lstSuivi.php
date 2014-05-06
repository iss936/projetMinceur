<?php
//Liste des Suivis
if(isset($lesSuivis))
{
	echo "<table class='sortable'>
			<tr>
				<th>Date</th>
				<th>Poids</th>
				<th>Taille</th>
				<th>Evenement</th>
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
		$paramTD = "onClick=document.location.href='index.php?uc=param&action=frmModifUtilisateur&id_utilisateur=$idSuivi' title=\"Cliquez ici pour voir l'école\"";
		$imgEdit = "<a href='$urlFiche'><img src='".$_CONFIG['DIR_Image']."imgEdit.png' title=\"Voir l'école\"></a>";
		$imgSuppr = "<a onClick=confirmDelUtilisateur($idSuivi);><img src='".$_CONFIG['DIR_Image']."imgTrash.png' title=\"Supprimer l'école\"></a>";
		
		//Lignes
		echo "<tr class='ligneTableau'>
			<td> $date </td>
			<td> $poids </td>
			<td> $taille </td>
			<td> $evenement</td>
		</tr>";
	}
	echo "</table><br>";

}
?>