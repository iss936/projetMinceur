<?php
//Liste des Suivis
if(isset($lesProgrammes))
{
	foreach($lesProgrammes as $unProgramme)
	{
		//Variables
		$niveau = $unProgramme['niveau'];
		$idPgrm = $unProgramme['idProgramme'];
		
		//Lignes
		echo "	<fieldset>
					<legend><a href='index.php?uc=exercice&action=v_pgrm&idPgrm=$idPgrm'>$niveau</a></legend>
				</fieldset>
				<br>";
	}
}