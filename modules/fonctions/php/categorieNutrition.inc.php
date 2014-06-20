<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions spécifiques aux catégories de nutrition
//------------------------------------------------------------------------------------------------------------------

//Récupère une categorie
function getUneCategorie($idCategorie)
{
	//Requête
	$req = "SELECT * FROM categorienutrition where idCategorie = ".getMySqlString($idCategorie);
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUneCategorie)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//Récupération
	$uneCategorie = mysql_fetch_assoc($res);
	
	return $uneCategorie;
}

//Récupère les catégories
function getLesCategories()
{
	//Requête
	$req = "SELECT * FROM categorienutrition";
	
	//Exécution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die("<u>Erreur SQL (getLesCategories)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	$lesCategories= array();
	$ligne = mysql_fetch_assoc($res);
	while($ligne != false)
	{
		$lesCategories[] = $ligne;
		$ligne = mysql_fetch_assoc($res);
	}
	
	return $lesCategories;
}
?>