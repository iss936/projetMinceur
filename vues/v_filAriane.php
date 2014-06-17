<?php
$home = "<a href='index.php?uc=identif&action=index'><img src='$_CONFIG[DIR_Image]home.gif'></a>";

$niveau1 = "<a href='index.php?uc=exercice&action=lstExercice'>Les parties du corps</a>";

$idPartieCorps = getRequest('idPartieCorps');
$unePartieCorps = getUnePartieCorps($idPartieCorps);
$libelle = $unePartieCorps['libelle'];
$niveau2 = "<a href='index.php?uc=exercice&action=entrainement&idPartieCorps=$idPartieCorps'>Entrainement $libelle</a>";


echo "<div style='text-align:justify'>";

if($action == "lstExercice") {
	echo $home;
}

if($action == "entrainement") {
	echo $home." > ".$niveau1;
}

if($action == "lstEx") {
	echo $home." > ".$niveau1." > ".$niveau2;
}

if($action == "lstPgrm") {
	echo $home." > ".$niveau1." > ".$niveau2;
}

if($action == "v_exercice") {
	$idExercice = getRequest('idExercice');
	$unExercice = getUnExercice($idExercice);
	$idPartieCorps = $unExercice['idPartieCorps'];
	$unePartieCorps = getUnePartieCorps($idPartieCorps);
	$libelle = $unePartieCorps['libelle'];
	$niveau2 = "<a href='index.php?uc=exercice&action=entrainement&idPartieCorps=$idPartieCorps'>Entrainement $libelle</a>";
	$lstEx = "<a href='index.php?uc=exercice&action=lstEx&idPartieCorps=$idPartieCorps'>Liste des exercices pour $libelle</a>";
	echo $home." > ".$niveau1." > ".$niveau2." > ".$lstEx;
}

if($action == "v_pgrm") {
	$idProgramme = getRequest('idPgrm');
	$unProgramme = getUnProgramme($idProgramme);
	$idPartieCorps = $unProgramme['idPartieCorps'];
	$unePartieCorps = getUnePartieCorps($idPartieCorps);
	$libelle = $unePartieCorps['libelle'];
	$niveau2 = "<a href='index.php?uc=exercice&action=entrainement&idPartieCorps=$idPartieCorps'>Entrainement $libelle</a>";
	$lstPgrm = "<a href='index.php?uc=exercice&action=lstPgrm&idPartieCorps=$idPartieCorps'>Liste des programmes pour $libelle</a>";
	echo $home." > ".$niveau1." > ".$niveau2." > ".$lstPgrm;
}
echo "</div><br>";
?>