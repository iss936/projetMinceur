<?php
$home = "<a href='index.php?uc=identif&action=index'><img src='".$_CONFIG['DIR_Image']."home.gif'></a>";

$niveau1 = "<a href='index.php?uc=exercice&action=lstExercice'>Les parties du corps</a>";

$abdominaux = "<a href='index.php?uc=exercice&action=abdominaux'>Entrainement des abdominaux</a>";
$dos = "<a href='index.php?uc=exercice&action=dos'>Entrainement du dos</a>";
$pectoraux = "<a href='index.php?uc=exercice&action=pectoraux'>Entrainement des pectoraux</a>";
$biceps = "<a href='index.php?uc=exercice&action=biceps'>Entrainement des biceps</a>";
$triceps = "<a href='index.php?uc=exercice&action=triceps'>Entrainement des triceps</a>";
$epaules = "<a href='index.php?uc=exercice&action=epaules'>Entrainement des épaules</a>";

echo "<div style='text-align:justify'>";

if($action == "lstExercice") {
	echo $home;
}



if($action == "abdominaux") {
	echo $home." > ".$niveau1;
}

if($action == "dos") {
	echo $home." > ".$niveau1;
}

if($action == "pectoraux") {
	echo $home." > ".$niveau1;
}

if($action == "biceps") {
	echo $home." > ".$niveau1;
}

if($action == "triceps") {
	echo $home." > ".$niveau1;
}

if($action == "epaules") {
	echo $home." > ".$niveau1;
}



if($action == "lstExAbdominaux") {
	echo $home." > ".$niveau1." > ".$abdominaux;
}

if($action == "lstPgrmAbdominaux") {
	echo $home." > ".$niveau1." > ".$abdominaux;
}

if($action == "lstExBiceps") {
	echo $home." > ".$niveau1." > ".$biceps;
}

if($action == "lstPgrmBiceps") {
	echo $home." > ".$niveau1." > ".$biceps;
}

echo "</div>";
?>