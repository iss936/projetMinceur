<?php
//Variables
$titre = "Authentification";
$id = isset($_COOKIE['id_utilisateur']) ? $_COOKIE['id_utilisateur'] : getRequest('id_utilisateur');
$lesUtilisateurs = getLesUtilisateurs(null, null, 1, 1);
//Titre
include $_CONFIG['DIR_View']."v_headTitre.php";

//Message d'erreurs par défaut
if(isset($action) && $action != 'frmConnexion') 
{
	$msgErreurs[] = "Votre session a expiré! Reconnectez-vous!";
	include $_CONFIG['DIR_View']."v_msgErreurs.php";
}

//Retour authentification
include $_CONFIG['DIR_View']."v_frmConnexion.php";

?>