<?php
//Liste des Suivis
if(isset($lesPartiesCorps))
{
	foreach($lesPartiesCorps as $unePartieCorps)
	{
		//Variables
		//Utilisateur
		$idPartieCorps = $unePartieCorps['idPartieCorps'];
		$libelle = $unePartieCorps['libelle'];
		//Lignes
		echo "	<fieldset>
					<legend><a href='index.php?uc=exercice&action=entrainement&idPartieCorps=$idPartieCorps'>$libelle</a></legend>
					<img src='$_CONFIG[DIR_Image]$libelle.png'>
				</fieldset>
				<br>";
	}
}