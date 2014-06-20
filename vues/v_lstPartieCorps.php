<?php
//Liste des Parties du corps
if(isset($lesPartiesCorps))
{
	foreach($lesPartiesCorps as $unePartieCorps)
	{
		//Variables
		//Utilisateur
		$idPartieCorps = $unePartieCorps['idPartieCorps'];
		$libelle = $unePartieCorps['libelle'];
		//Lignes
		echo "	<a href='index.php?uc=exercice&action=entrainement&idPartieCorps=$idPartieCorps'>
					<fieldset>
						<legend>$libelle</legend>
						<img src='$_CONFIG[DIR_Image]$libelle.png'>
					</fieldset>
				</a>
				<br>";
	}
}