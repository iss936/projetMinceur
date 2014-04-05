<?php
//------------------------------------------------------------------------------------------------------------------
// Fonctions générales
//------------------------------------------------------------------------------------------------------------------

//Connexion à la base mysql
function connexion()
{
	//Variables
	global $_CONFIG;
	$hote = $_CONFIG['DB_ServerHost'];
	$login = $_CONFIG['DB_Username'];
	$mdp = $_CONFIG['DB_Password'];
	$bd = $_CONFIG['DB_Database'];

	//Connexion
	$connexion = @mysql_connect($hote, $login, $mdp) or die("<u>Erreur SQL (Connexion au serveur impossible)</u>: ".mysql_error()." <br>");
	@mysql_select_db($bd, $connexion) or die("<u>Erreur SQL (Sélection de la base impossible)</u>: ".mysql_error()." <br>");
	return $connexion;
}

//Connexion au serveur FTP
function connexionFTP()
{
	//Variables
	global $_CONFIG;
	$hote = $_CONFIG['FTP_ServerHost'];
	$login = $_CONFIG['FTP_Username'];
	$mdp = $_CONFIG['FTP_Password'];
	$dir = $_CONFIG['FTP_Directory'];

	//Connexion
	$connexion = ftp_connect($hote) or die("<u>Erreur (connexionFTP 1)</u>:  Impossible de se connecter au serveur FTP! <br>");
	ftp_login($connexion, $login, $mdp) or die("<u>Erreur (connexionFTP 2)</u>: Impossible de s'authentifier sur le serveur FTP! <br>");
	ftp_chdir($connexion, $dir) or die("<u>Erreur (connexionFTP 3)</u>:  Impossible de se rendre dans le dossier! <br>");

	return $connexion;
}


//Actualisation de la page
function redirection($tps = 0, $url = null, $msg = null, $typeImg = null)
{
	global $_CONFIG;
	$dirImg = $_CONFIG['DIR_Image'];

	//Redirection vers la même page si pas d'url défini
	if(!$url) $url = $_SERVER['REQUEST_URI']."&refresh=1";

	//Image de reload
	switch($typeImg)
	{
		case 'CIRCLE': echo "<img src='".$dirImg."loadCircle.gif'> $msg"; break;
		case 'POINT': echo "<img src='".$dirImg."loadPoint.gif'> $msg"; break;
		case 'BAR': echo "$msg <br> <img src='".$dirImg."loadBar.gif'>"; break;
		case 'LINK': echo "<img src='".$dirImg."loadBack.png'> <a href='$url'>$msg</a>"; break;
		default: echo $msg; break;
	}

	//Pour éviter une boucle infini d'actualisation
	if(!isset($_REQUEST['refresh']) && $typeImg != "LINK") 
		exit('<meta http-equiv="refresh" content="'.$tps.'; url='.$url.'">');
}

//Retourne une chaine valide
function convertChaine($chaineNonValide)
{
	//Traitement de la chaine
	$chaineNonValide = preg_replace('`\s+`', '_', trim($chaineNonValide));
	$chaineNonValide = str_replace("'", "_", $chaineNonValide);
	$chaineNonValide = preg_replace('`_+`', '_', trim($chaineNonValide));
	$chaineValide = strtr($chaineNonValide, "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ", "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
	
	return $chaineValide;
}

//Permet de récupérer une variable request
function getRequest($nomChamp, $elseValue = null)
{
	return (isset($_REQUEST[$nomChamp]) && $_REQUEST[$nomChamp]) ? $_REQUEST[$nomChamp] : $elseValue;
}

//Permet de récupérer une chaine de caractère mysql
function getMySqlString($champ, $elseValue = null, $noCote = 0)
{
	//Encadrement des chaines par des côtes
	$cote = ($noCote) ? null : "'";
	
	//Si $champ contient quelque chose
	if(isset($champ) && $champ) $result = $cote.mysql_real_escape_string($champ, connexion()).$cote;
	//Si $champ est vide, alors NULL
	else if(is_null($champ) || $champ == "") $result = "NULL"; 
	//Sinon, on prend $elseValue
	else $result = $cote.mysql_real_escape_string($elseValue, connexion()).$cote; 

	return $result;
}

//Retourne une chaine valide
function valideChaine($chaineNonValide)
{
	$chaineNonValide = preg_replace('`\s+`', '_', trim($chaineNonValide));
	$chaineNonValide = str_replace("'", "_", $chaineNonValide);
	$chaineNonValide = preg_replace('`_+`', '_', trim($chaineNonValide));
	$chaineValide = strtr($chaineNonValide, "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ", "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
	return ($chaineValide);
}

//Permet de convertir une date FR en US
function dateUS($dateFR)
{
	$split = explode("/", $dateFR); //Array{20,08,1990}
	$jour = $split[0];
	$mois = $split[1];
	$annee = $split[2];
	$dateFinale = $annee."-".$mois."-".$jour; //1990-08-20
	
	return $dateFinale;
}

//Permet de convertir une date US en FR
function dateFR($date, $type = 1)
{
	//Valeur de retour
	$dateFinale = null;

	//S'il y a une date
	if($date)
	{
		$dateFinale = $date;
		$split = explode(" ", $date); //1990-08-20 (18:19:30)

		//Si date + heure
		if(count($split) == 2)
		{
			//Séparation de la date et de l'heure
			$splitDate = explode("-", $split[0]); //Array{1990,08,20}
			$splitHeure = explode(":", $split[1]); //Array{18,19,30}
			if(count($splitDate) == 3) { $annee = $splitDate[0]; $mois = $splitDate[1]; $jour = $splitDate[2]; }
			if(count($splitHeure) == 3) { $heure = $splitHeure[0]; $minute = $splitHeure[1]; }

			//Valeur en fonction du type
			switch($type)
			{
				case 1: $dateFinale = $jour."/".$mois."/".$annee." à ".$heure."h".$minute; break; //20/08/1990 à 18h19
				case 2: $dateFinale = $jour."/".$mois."/".$annee; break; //20/08/1990
				case 3: $dateFinale = $heure."h".$minute; break; //18h19
			}
		}
		//Si date ou heure seulement
		else
		{
			//Séparation de la date et de l'heure
			$splitDate = explode("-", $date); //Array{1990,08,20}
			$splitHeure = explode(":", $date); //Array{18,19,30}
			if(count($splitDate) == 3 && $type == 1) { $annee = $splitDate[0]; $mois = $splitDate[1]; $jour = $splitDate[2]; }
			if(count($splitHeure) == (2 || 3) && $type == 2) { $heure = $splitHeure[0]; $minute = $splitHeure[1]; }

			//Valeur en fonction du type
			switch($type)
			{
				case 1: $dateFinale = $jour."/".$mois."/".$annee; break; //20/08/1990
				case 2: $dateFinale = $heure."h".$minute; break; //18h19
			}
		}
	}

	return $dateFinale;
}

//Compare deux dates
function compareDates($date1, $date2, $operateur = "=")
{
	//Variables
	$result = false;

	$splitDate1 = explode("/", $date1); //Array{20,08,1990}
	$jour1 = isset($splitDate1[0]) ? $splitDate1[0] : null; //20
	$mois1 = isset($splitDate1[1]) ? $splitDate1[1] : null; //08
	$annee1 = isset($splitDate1[2]) ? $splitDate1[2] : null; //1990

	$splitDate2 = explode("/", $date2); //Array{30,12,1997}
	$jour2 = isset($splitDate2[0]) ? $splitDate2[0] : null; //30
	$mois2 = isset($splitDate2[1]) ? $splitDate2[1] : null; //12
	$annee2 = isset($splitDate2[2]) ? $splitDate2[2] : null; //1997

	//Compare les dates en fonction de l'opérateur
	switch($operateur)
	{
		case "=":
		{
			if($date1 == $date2) $result = true;
			break;
		}
		case "!=":
		{
			if($date1 != $date2) $result = true;
			break;
		}
		case ">":
		{
			if($annee1 > $annee2) $result = true;
			else if($annee1 == $annee2)
			{
				if($mois1 > $mois2) $result = true;
				else if($mois1 == $mois2)
				{
					if($jour1 > $jour2) $result = true;
				}
			}
			break;
		}
		case ">=":
		{
			if($annee1 > $annee2) $result = true;
			else if($annee1 == $annee2)
			{
				if($mois1 > $mois2) $result = true;
				else if($mois1 == $mois2)
				{
					if($jour1 >= $jour2) $result = true;
				}
			}
			break;
		}
		case "<":
		{
			if($annee1 < $annee2) $result = true;
			else if($annee1 == $annee2)
			{
				if($mois1 < $mois2) $result = true;
				else if($mois1 == $mois2)
				{
					if($jour1 < $jour2) $result = true;
				}
			}
			break;
		}
		case "<=":
		{
			if($annee1 < $annee2) $result = true;
			else if($annee1 == $annee2)
			{
				if($mois1 < $mois2) $result = true;
				else if($mois1 == $mois2)
				{
					if($jour1 <= $jour2) $result = true;
				}
			}
			break;
		}
		case "?": //Vérifie si la date1 est dans le calendrier
		{
			$result = checkdate ($mois1, $jour1, $annee1);
			break;
		}
		default:
		{
			break;
		}
	}

	return $result;
}

//Permet de convertir un delai en date FR
function delaiToDate($delai, $date = null)
{
	//Variables
	$dateFinale = null;
	$date = (!$date) ? date("d/m/Y") : $date;
	
	//S'il y a une date
	if($date)
	{
		$dateFinale = $date;
		$splitDate = explode("/", $date); //01/01/2011

		//Si date + heure
		if(count($splitDate) == 3)
		{
			//Séparation de la date
			$jour = intval($splitDate[0]) - $delai; //1 - 60
			$mois = intval($splitDate[1]); //1
			$annee = intval($splitDate[2]); //2011

			//Boucle pour avoir la date finale
			while($jour < 0) //-59 //-28
			{
				$mois--; //0 //11
				if($mois == 0) 
				{
					$mois = 12; 
					$annee--; //2011 - 1
				}
				$jour += cal_days_in_month(CAL_GREGORIAN, $mois, $annee); //-59 + 31 //-28 + 30	
			}
			
			//Ajout des 0 au jour et mois 
			if($jour < 10) $jour = "0".$jour; //02
			if($mois < 10) $mois = "0".$mois;
			$dateFinale = $jour."/".$mois."/".$annee; //02/12/2010
		}
	}

	return $dateFinale;
}

//Compare deux heures
function compareHeures($time1, $time2, $operateur = "=")
{
	//Variables
	$result = false;

	$splitTime1 = explode(":", $time1); //Array{20,08,30}
	$heure1 = isset($splitTime1[0]) ? $splitTime1[0] : null; //20
	$minute1 = isset($splitTime1[1]) ? $splitTime1[1] : null; //08
	$seconde1 = isset($splitTime1[2]) ? $splitTime1[2] : null; //30

	$splitTime2 = explode(":", $time2); //Array{19,12,20}
	$heure2 = isset($splitTime2[0]) ? $splitTime2[0] : null; //19
	$minute2 = isset($splitTime2[1]) ? $splitTime2[1] : null; //12
	$seconde2 = isset($splitTime2[2]) ? $splitTime2[2] : null; //20

	//Compare les dates en fonction de l'opérateur
	switch($operateur)
	{
		case "=":
		{
			if($time1 == $time2) $result = true;
			break;
		}
		case "!=":
		{
			if($time1 != $time2) $result = true;
			break;
		}
		case ">":
		{
			if($heure1 > $heure2) $result = true;
			else if($heure1 == $heure2)
			{
				if($minute1 > $minute2) $result = true;
				else if($minute1 == $minute2)
				{
					if($seconde1 > $seconde2) $result = true;
				}
			}
			break;
		}
		case ">=":
		{
			if($heure1 > $heure2) $result = true;
			else if($heure1 == $heure2)
			{
				if($minute1 > $minute2) $result = true;
				else if($minute1 == $minute2)
				{
					if($seconde1 >= $seconde2) $result = true;
				}
			}
			break;
		}
		case "<":
		{
			if($heure1 < $heure2) $result = true;
			else if($heure1 == $heure2)
			{
				if($minute1 < $minute2) $result = true;
				else if($minute1 == $minute2)
				{
					if($seconde1 < $seconde2) $result = true;
				}
			}
			break;
		}
		case "<=":
		{
			if($heure1 < $heure2) $result = true;
			else if($heure1 == $heure2)
			{
				if($minute1 < $minute2) $result = true;
				else if($minute1 == $minute2)
				{
					if($seconde1 <= $seconde2) $result = true;
				}
			}
			break;
		}
		default:
		{
			break;
		}
	}

	return $result;
}

//Vérification d'une date
function estUneDate($date)
{
	$regex = "#^(0[1-9]|[12][0-9]|3[01])[/](0[1-9]|1[012])[/](19|20)\d\d$#";
	return preg_match($regex, $date);
}

 //Vérification d'une heure au format HH:MM
function estUneHeure($heure)
{
	return preg_match("/^[0-9]{2}:[0-9]{2}$/",$heure);
}

//Vérification d'un email
function estUnMail($mail)
{
	return filter_var($mail, FILTER_VALIDATE_EMAIL);
}

//Envoie un e-mail
function envoiMail($sujet, $msg, $destinataire = null)
{
	global $_CONFIG;

	//Initialisation du serveur SMTP
	if($_CONFIG['EML_UseZimbraSMTP'])
	{
		ini_set("SMTP", $_CONFIG['EML_ServerSMTP']);
		ini_set("smtp_port", $_CONFIG['EML_PortSMTP']);
	}

	//Contenu du mail
	$sujet = "Réservation - ".$sujet;
	$entete = "From: \"Application des demandes de réservations\" <noreply@mairie-aubervilliers.fr> \n";
	$entete .= "MIME-Version: 1.0 \n";
	$entete .= "Content-type: text/html; charset='ISO-8859-1'";
	$msg = "<html> <body>
			$msg <br> <br>
			<hr>
			<font size='2'>
			NE M'IMPRIMEZ QUE SI NÉCESSAIRE. <br>
			Ce message a été généré automatiquement par l'application. <br>
			Ne répondez pas à ce message, car vous n'obtiendrez pas de réponse. <br> <br>
			<font color='grey'>
			<u>CONFIDENTIALITÉ:</u> <br>
			Ce message et les éventuelles pièces attachées sont confidentiels. <br>
			Si vous n'êtes pas dans la liste des destinataires: <br>
			Veuillez ne pas divulguer, stocker ou copier l'information qu'il contient sur un quelconque support. <br>
			</font>
			</font>
			</body> </html>";

	//Envoie du mail
	if(!$destinataire) $destinataire = "'Administrateur du logiciel' <".$_CONFIG['EML_MailTo'].">";
	else $destinataire = str_replace(';', ',', $destinataire);
	mail($destinataire, $sujet, $msg, $entete) or die("<u>Erreur (envoiMail)</u>: Impossible d'envoyer le mail! $destinataire<br>");
}

//Extraire la consigne enregistrer dans le fichier Consigne.txt
function getMsgConsigne()
{
	global $_CONFIG;
	$ouvre=file_get_contents($_CONFIG['DIR_Attachment'].$_CONFIG['FIC_Consignes'],"r"); // ouverture fichier en lecture "r"
	return $ouvre;
}

//Extraire la consigne enregistrer dans le fichier Consigne.txt
function getMsgConsigneAjoutRes()
{
	global $_CONFIG;
	$ouvre=file_get_contents($_CONFIG['DIR_Attachment'].$_CONFIG['FIC_Consignes_AjoutRes'],"r"); // ouverture fichier en lecture "r"
	return $ouvre;
}

function getLaSemaine($week,$year) {
   $week_dates = array();
   // Get timestamp of first week of the year
   $first_day = mktime(12,0,0,1,1,$year);
   $first_week = date("W",$first_day);
   if ($first_week > 1) {
       $first_day = strtotime("+1 week",$first_day); // skip to next if year does not begin with week 1
   }
   // Get timestamp of the week
   $timestamp = strtotime("+$week week",$first_day);
   // Adjust to Monday of that week
   $what_day = date("w",$timestamp); // I wanted to do "N" but only version 4.3.9 is installed :-(
   if ($what_day==0) {
       // actually Sunday, last day of the week. FIX;
       $timestamp = strtotime("-6 days",$timestamp);
   } elseif ($what_day > 1) {
       $what_day--;
       $timestamp = strtotime("-$what_day days",$timestamp);
   }
   $week_dates[1] = date("Y-m-d",$timestamp); // Monday
   $week_dates[2] = date("Y-m-d",strtotime("+1 day",$timestamp)); // Tuesday
   $week_dates[3] = date("Y-m-d",strtotime("+2 day",$timestamp)); // Wednesday
   $week_dates[4] = date("Y-m-d",strtotime("+3 day",$timestamp)); // Thursday
   $week_dates[5] = date("Y-m-d",strtotime("+4 day",$timestamp)); // Friday
   $week_dates[6] = date("Y-m-d",strtotime("+5 day",$timestamp)); // Saturday
   $week_dates[7] = date("Y-m-d",strtotime("+6 day",$timestamp)); // Sunday
   return($week_dates);
}

//Récupère la date en toute lettre FR
function dateJourMois($date)
{
	//Valeur de retour
	$dateFinale = null;

	//S'il y a une date
	if($date)
	{
		//Variables
		$dateFinale = $date;
		if(strstr($date, "-")) $date = dateFR($date);
		$split = explode("/", $date); //10/01/2011
		$jourDt = intval($split[0]);
		$moisDt = intval($split[1]);
		$anneeDt = intval($split[2]);
		$timeDt = strtotime($anneeDt."-".$moisDt."-".$jourDt);

		//Jour
		switch (date("N", $timeDt))
		{
			case 1: $jour = "lundi"; break;
			case 2: $jour = "mardi"; break;
			case 3: $jour = "mercredi"; break;
			case 4: $jour = "jeudi"; break;
			case 5: $jour = "vendredi"; break;
			case 6: $jour = "samedi"; break;
			case 7: $jour = "dimanche"; break;
		}

		//Mois
		switch (date("n", $timeDt))
		{
			case 1: $mois = "janvier"; break;
			case 2: $mois = "février"; break;
			case 3: $mois = "mars"; break;
			case 4: $mois = "avril"; break;
			case 5: $mois = "mai"; break;
			case 6: $mois = "juin"; break;
			case 7: $mois = "juillet"; break;
			case 8: $mois = "août"; break;
			case 9: $mois = "septembre"; break;
			case 10: $mois = "octobre"; break;
			case 11: $mois = "novembre"; break;
			case 12: $mois = "décembre"; break;
		}

		$dateFinale = $jour." ".$jourDt." ".$mois." ".$anneeDt;
	}

	return $dateFinale;
}

function getLeJour($numJour)
{
	switch($numJour)
	{
		case 1: $jour = "Lundi"; break;
		case 2: $jour = "Mardi"; break;
		case 3: $jour = "Mercredi"; break;
		case 4: $jour = "Jeudi"; break;
		case 5: $jour = "Vendredi"; break;
		case 6: $jour = "Samedi"; break;
		case 7: $jour = "Dimanche"; break;
	}
	return $jour;
}

?>