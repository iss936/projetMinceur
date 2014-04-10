<?php
//Pour éviter le warning de fuseau horaire (si fonction date)
date_default_timezone_set('Europe/Paris'); 

//Variables de configuration
$_CONFIG = array
(
    //Serveur MySql
	"DB_ServerHost" => "localhost",
	"DB_Username" => "root",
    "DB_Password" => "",
    "DB_Database" => "mydietfit_bdd",
    //Chemin des dossiers
    "DIR_Control" => "controleurs/",
    "DIR_View" => "vues/",
    "DIR_Model" => "modules/fonctions/php/",
    "DIR_Dynamic" => "modules/fonctions/js/",
    "DIR_XML" => "modules/fonctions/xml/",
    "DIR_Plugin" => "modules/plugins/",
    "DIR_CSS" => "modules/themes/",
    "DIR_Attachment" => "ressources/documents/",
    "DIR_Image" => "ressources/images/",
	
);
?>
