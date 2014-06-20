<?php
//Liste des Parties du corps
if(isset($lesCategories))
{
	foreach($lesCategories as $uneCategorie)
	{
		//Variables
		//Utilisateur
		$idCategorie = $uneCategorie['idCategorie'];
		$libelle = $uneCategorie['libelleCategorie'];
		//Lignes
		echo "	<a href='index.php?uc=nutrition&action=categorie&idCategorie=$idCategorie'>
					<fieldset>
						<legend>$libelle</legend>
					</fieldset>
				</a>
				<br>";
	}
}