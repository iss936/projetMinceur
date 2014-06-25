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
		echo "<li><a href='index.php?uc=nutrition&action=categorie&idCategorie=$idCategorie'>$libelle</a></li>";
	}
}