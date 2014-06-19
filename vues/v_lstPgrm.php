<?php
//Liste des programmes
if($lesProgrammes)
{
	echo "<ul>";
	foreach($lesProgrammes as $unProgramme)
	{
		//Variables
		$niveau = $unProgramme['niveau'];
		$idPgrm = $unProgramme['idProgramme'];
		
		//Lignes
		echo "<li><a href='index.php?uc=exercice&action=v_pgrm&idPgrm=$idPgrm'>$niveau</a></li>";
	}
	echo "</ul>";
}
else
{
	echo "<fieldset>Pas de programmes disponibles pour le moment.</fieldset>";
}