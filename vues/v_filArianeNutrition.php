<?php
$home = "<a href='index.php?uc=identif&action=index'><img src='$_CONFIG[DIR_Image]home.gif'></a>";

$niveau1 = "<a href='index.php?uc=nutrition&action=lstNutrition'>Les catégories de nutrition</a>";

echo "<div style='text-align:justify'>";

if($action == "lstNutrition") {
	echo $home;
}

if($action == "categorie") {
	echo $home." > ".$niveau1;
}

if($action == "v_nutrition") {
	$idNutrition = getRequest('idNutrition');
	$uneNutrition = getUneNutrition($idNutrition);
	$idCategorie = $uneNutrition['idCategorieNutrition'];
	$uneCategorie = getUneCategorie($idCategorie);
	echo $home." > ".$niveau1." > ".
}

echo "</div><br>";
?>