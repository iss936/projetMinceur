<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions sp�cifiques aux cat�gories de nutrition
//------------------------------------------------------------------------------------------------------------------

//R�cup�re une categorie
function getUneCategorie($idCategorie)
{
	//Requ�te
	$req = "SELECT * FROM categorienutrition where idCategorie = ".getMySqlString($idCategorie);
	
	//Ex�cution
	$conx = connexion();
	$res = mysql_query($req, $conx) or die ("<u>Erreur SQL (getUneCategorie)</u>: ".mysql_error()." <br>");
	mysql_close($conx);
	
	//R�cup�ration
	$uneCategorie = mysql_fetch_assoc($res);
	
	return $uneCategorie;
}

//R�cup�re les cat�gories
function getLesCategories()
{
	//Requ�te
	$req = "SELECT * FROM categorienutrition";
	
	//Ex�cution
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