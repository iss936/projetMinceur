<?php
//Liste des fiches de nutrition
if(isset($lesNutritions))
{
	echo "<div class='headFrm'><form method='get' action='index.php'>
	<input type='hidden' name='uc' value=$uc>
	<input type='hidden' name='action' value=$action>
	Trier par: <select onChange='document.forms[0].submit();' name='idCategorie' style='width: 30%;'>
					<option value='0' style='color: #808080;'> - Toutes les catégories - </option>";
					foreach($lesCategories as $uneCategorie)
					{
						$id = $uneCategorie['idCategorie'];
						$nom = $uneCategorie['libelleCategorie'];
						echo "<option value=$id "; 
						if($idCategorie == $id) echo "selected";
						echo "> $nom </option>";
					}
	echo "</select></form></div>";
	echo "<table class='sortable'>
			<tr>
				<th> <a href='index.php?uc=admin&action=frmAddNutrition'><img src='".$_CONFIG['DIR_Image']."imgAdd.png' title='Ajouter une fiche nutrition'></a> </th>
				<th>Titre</th>
				<th>Catégorie</th>
				<th>Date d'ajout</th>
				<th></th>
				<th></th>
			</tr>"; 

	foreach($lesNutritions as $uneNutrition)
	{
		//Variables
		$idNutrition = $uneNutrition['idFicheNutrition'];
		$titre = $uneNutrition['titre'];
		$idCategorie = $uneNutrition['idCategorieNutrition'];
		$uneCategorie = getUneCategorie($idCategorie);
		$libelle = $uneCategorie['libelleCategorie'];
		$dateAjout = dateFR($uneNutrition['dateAjout']);
		// - Image et lien
		$urlFiche = "index.php?uc=admin&action=frmModifNutrition&idNutrition=$idNutrition";
		$paramTD = "onClick=document.location.href='index.php?uc=admin&action=frmModifNutrition&idNutrition=$idNutrition' title=\"Cliquez ici pour modifier la fiche nutrition\"";
		$imgEdit = "<a href='$urlFiche'><img src='".$_CONFIG['DIR_Image']."imgEdit.png' title=\"Modifier la fiche nutrition\"></a>";
		$imgVoir = "<a href='index.php?uc=nutrition&action=v_nutrition&idNutrition=$idNutrition'><img src='$_CONFIG[DIR_Image]btnSearch.png' title=\"Voir la fiche de nutrition\"></a>";
		$imgSuppr = "<a onClick=confirmDelNutrition($idNutrition);><img src='".$_CONFIG['DIR_Image']."imgTrash.png' title=\"Supprimer la fiche nutrition\"></a>";
		
		//Lignes
		echo "<tr class='ligneTableau'>
			<td width='16'> $imgEdit </td>
			<td $paramTD> $titre </td>
			<td $paramTD> $libelle </td>
			<td $paramTD> $dateAjout </td>
			<td $paramTD> $imgVoir </td>
			<td width='16'> $imgSuppr </td>
		</tr>";
	}
	echo "</table><br>";
}