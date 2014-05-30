<?php
//Aiguillage en fonction de l'action choisie
switch($action)
{
	case 'proteines':
	{
		
		include $_CONFIG['DIR_View']."/nutritions/v_proteines.php";
		break;
	}

}
?>