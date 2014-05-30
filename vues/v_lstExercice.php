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
		$libelleM = strtolower($libelle);
		//Lignes
		echo "	<a href='index.php?uc=exercice&action=$libelleM'><fieldset>
					<legend>$libelle</legend>
					<img src='$_CONFIG[DIR_Image]$libelle.png'>
				</fieldset></a>
				<br>";
	}
}