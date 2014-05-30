<?php
//Liste des Suivis
if(isset($lesProgrammes))
{
	foreach($lesProgrammes as $unProgramme)
	{
		//Variables
		$niveau = $unProgramme['niveau'];
		//Lignes
		echo "	<a><fieldset>
					<legend>$niveau</legend>
				</fieldset></a>
				<br>";
	}
}