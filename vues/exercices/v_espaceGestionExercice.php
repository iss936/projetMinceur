<?php
//Liste des exercices
if(isset($lesExercices))
{
	echo "<div class='headFrm'><form method='get' action='index.php'>
	<input type='hidden' name='uc' value=$uc>
	<input type='hidden' name='action' value=$action>
	Trier par: <select onChange='document.forms[0].submit();' name='idPartieCorps' style='width: 30%;'>
					<option value='0' style='color: #808080;'> - Toutes les parties du corps - </option>";
					foreach($lesPartiesCorps as $unePartieCorps)
					{
						$id = $unePartieCorps['idPartieCorps'];
						$nom = $unePartieCorps['libelle'];
						echo "<option value=$id "; 
						if($idPartieCorps == $id) echo "selected";
						echo "> $nom </option>";
					}
	echo "</select></form></div>";
	echo "<table class='sortable'>
			<tr>
				<th> <a href='index.php?uc=admin&action=frmModifExercice'><img src='".$_CONFIG['DIR_Image']."imgAdd.png' title='Ajouter un exercice'></a> </th>
				<th>Titre</th>
				<th>Resumé</th>
				<th>Partie du corps</th>
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
		$idPartieCorps = $unExercice['idPartieCorps'];
		$unePartieCorps = getUnePartieCorps($idPartieCorps);
		$libelle = $unePartieCorps['libelle'];
		// - Image et lien
		$urlFiche = "index.php?uc=admin&action=frmModifExercice&idExercice=$idExercice";
		$paramTD = "onClick=document.location.href='index.php?uc=admin&action=frmModifExercice&idExercice=$idExercice' title=\"Cliquez ici pour voir la fiche exercice\"";
		$imgEdit = "<a href='$urlFiche'><img src='".$_CONFIG['DIR_Image']."imgEdit.png' title=\"Voir la fiche exercice\"></a>";
		$imgSuppr = "<a onClick=confirmDelUtilisateur($idExercice);><img src='".$_CONFIG['DIR_Image']."imgTrash.png' title=\"Supprimer la fiche exercice\"></a>";
		
		//Lignes
		echo "<tr class='ligneTableau'>
			<td width='16'> $imgEdit </td>
			<td $paramTD> $titre </td>
			<td $paramTD> $resume </td>
			<td $paramTD> $libelle </td>
			<td $paramTD> $dateAjout </td>
			<td width='16'> $imgSuppr </td>
		</tr>";
	}
	echo "</table><br>";
}
?>