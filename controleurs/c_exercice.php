<?php
//Aiguillage en fonction de l'action choisie
switch($action)
{
	case 'abdominaux':
	{
		include $_CONFIG['DIR_View']."/exercices/v_exAbdominaux.php";
		break;
	}
	case 'dos':
	{
		include $_CONFIG['DIR_View']."/exercices/v_exDos.php";
		break;
	}
	case 'pectoraux':
	{
		//include $_CONFIG['DIR_View']."v_exPectoraux.php";
		break;
	}
	case 'biceps':
	{
		//include $_CONFIG['DIR_View']."v_exBiceps.php";
		break;
	}

}
?>