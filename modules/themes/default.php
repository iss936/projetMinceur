<?php require "variables.inc.php"; ?>
/********************/
/* Styles généraux */
/******************/

* {
	margin: 0px;
	padding: 0px;
}

html {
	-webkit-text-size-adjust: none;
}

body {
	margin: 0px;
	background: <?php echo $_VARCSS['BgBody']; ?>;
	text-align: justify;
	font-family: <?php echo $_VARCSS['ContentFontFamily']; ?>;
	font-size: 13px;
}

a {
	color: <?php echo $_VARCSS['FrameBgColor']; ?>;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
	cursor: pointer;
}

img {
	border: none;
}

textarea, select, input, button {
	border: <?php echo $_VARCSS['InputBorderColor']; ?> 1px solid;
}

input[type=text], textarea {
	padding: 0.5px;
}

input[type=submit], input[type=reset], input[type=button] {
	padding: 2px 5px;
	background-repeat: no-repeat;
	background-position: 5px center;
}

input[type=submit]:hover, input[type=reset]:hover, input[type=button]:hover {
	background-color: <?php echo $_VARCSS['FrameFontHover']; ?>;
	cursor: pointer;
}

fieldset {
	width: 80%;
	margin: auto;
	padding: 20px;
	border: <?php echo $_VARCSS['TableBorderColor']; ?> 1px solid;
}

fieldset legend{
	color: <?php echo $_VARCSS['ContentTitleColor']; ?>;
	font-weight: bold;
}

.ui-autocomplete {
	height: 200px;
	max-height: 200px;
	overflow-y: auto;
	overflow-x: hidden;
	padding-right: 20px;
}

/***************************/
/* Styles pour le bandeau */
/*************************/

/*** Cadre du bandeau ***/
#header {
	width: 1000px;
	height: 106px;
	margin: 0px auto;
	background: url(<?php echo $_VARCSS['DirImg']; ?>bgHeader.gif) no-repeat left top;
}

/*** Titre de l'application ***/
#logo {
	width: 710px;
	height: 52px;
	margin: 0px auto 0px 250px;
	padding: 5px 20px;
	background: <?php echo $_VARCSS['ContentBgColor']; ?>;
	font-family: <?php echo $_VARCSS['FrameFontFamily']; ?>;
}

#logo h1 {
	font-weight: normal;
	font-style: italic;
	font-size: 40px;
	color: <?php echo $_VARCSS['FrameBgColor']; ?>;
}

/*** Menu haut ***/
#menu {
	margin: 7px auto;
	height: 30px;
	background: <?php echo $_VARCSS['FrameBgColor']; ?>;
	font-family: <?php echo $_VARCSS['FrameFontFamily']; ?>;
	font-size: 14px;
	font-style: italic;
	color: <?php echo $_VARCSS['FrameFontColor']; ?>;
}

#menu h3 {
	float: right;
	padding: 7px 20px;
	font-family: <?php echo $_VARCSS['FrameFontFamily']; ?>;
	font-size: 14px;
	font-style: italic;
}

#menu img {
	width: 16px;
	margin: -2px 0px;
	padding-right: 2px;
}

#menu ul{
	position: absolute;
	list-style-type: none;
}

#menu li {
	float: left;
}

#menu li a {
	display: block;
	height: 16px;
	padding: 7px 20px;
	text-align: center;
	text-decoration: none;
	color: <?php echo $_VARCSS['FrameFontColor']; ?>;
	border-right: 1px solid <?php echo $_VARCSS['FrameFontColor']; ?>;
	cursor: pointer;
}

#menu li a:hover { 
	background: <?php echo $_VARCSS['ContentTitleColor']; ?>;
	color: <?php echo $_VARCSS['FrameFontColor']; ?>;
}

#menu .sousMenu {
	display: none;
	list-style-type: none;
	z-index: 1;
}

#menu .sousMenu li {
	float: none;
}

#menu .sousMenu li a {
	width: 100%;
	min-width: 100px;
	display: block;
	text-align: left;
	text-decoration: none;
	color: <?php echo $_VARCSS['ContentFontColor']; ?>;
	background: <?php echo $_VARCSS['TableHoverColor']; ?>;
	border-top: 1px solid <?php echo $_VARCSS['FrameFontColor']; ?>;
}

#menu .sousMenu li a:hover {
	background: <?php echo $_VARCSS['ContentTitleColor']; ?>;
	color: <?php echo $_VARCSS['FrameFontColor']; ?>;
}

#menu li:hover > .sousMenu {
	display: block; 
}


/************************************/
/* Styles pour le corps de la page */
/**********************************/

/*** Contenu de la page ***/
#content {
	width: 940px;
	margin: 0px auto;
	padding: 20px 30px 30px 30px;
	text-align: center;
	background: <?php echo $_VARCSS['ContentBgColor']; ?>;
	color: <?php echo $_VARCSS['ContentFontColor']; ?>;
	-webkit-text-size-adjust: 100%;
}

#content h2 {
	font-weight: bold;
	font-size: 20px;
	font-variant: small-caps; 
	font-family: <?php echo $_VARCSS['FrameFontFamily']; ?>;
	text-align: center;
	text-decoration: underline;
	color: <?php echo $_VARCSS['ContentTitleColor']; ?>;
}

#content h3 {
	margin: 20px auto 2px auto;
	padding: 3px;
	font-size: 16px;
	font-style: italic;
	font-family: <?php echo $_VARCSS['FrameFontFamily']; ?>;
	text-align: center;
	background: <?php echo $_VARCSS['ContentTitleColor']; ?>;
	color: <?php echo $_VARCSS['FrameFontColor']; ?>;
}

#content table {
	width: 100%;
	font-size: 13px;
	text-align: center;
	padding: 2px;
	border-collapse: collapse;
	border: <?php echo $_VARCSS['TableBorderColor']; ?> 1px solid;
}

#content table.trajet {
	border:0px black solid;
	margin:auto;
	width: 100%;
}

#content table.effectif {
	width:93%;
	margin:auto;
}

#content table.mail {
	margin-bottom:20px;
	border:0;
	width: 100%;
	float: left;
	text-align: left;
}

#content th, #content td, #content tr {
	padding: 5px;
	border: <?php echo $_VARCSS['TableBorderColor']; ?> 1px solid;
}

#content th {
	font-weight: bold;
	background: <?php echo $_VARCSS['BgBody']; ?>;
	color: <?php echo $_VARCSS['FrameBgColor']; ?>;
}

#content table img{
	width: 16px;
}

#content .alignImg {
	margin: -2px 0px;
}

#content .headFrm {
	margin-bottom: 5px;
	padding: 5px;
	background: <?php echo $_VARCSS['BgBody']; ?>;
	border: <?php echo $_VARCSS['TableBorderColor']; ?> 2px solid;
}

#content .frm {
	margin: auto;
}

#content .frm label {
	float: left;
	display: inline;
	padding-left: 4%;
	text-align: left;
}

#content label.alignLabel {
	float: left;
	display: inline;
	text-align: left;
	width: 35%;
	border: 0px black solid;
}

#content .frm label[for] {
	float: none;
	width: auto;
	padding: 1px;
	padding-right: 5%;
}

#content .frm .postscriptum {
	text-align: left;
	color: <?php echo $_VARCSS['ContentTitleColor']; ?>;
}

#content .frm .frmAjoutRes {
	float: left;
	width: 93%;
	margin-left: 29px;
}

#content .frm textarea.trajet {
	width:91%;
}

#content .frm textarea.commentaire {
	width: 92%;
}

#content .postscriptum {
	color: <?php echo $_VARCSS['ContentTitleColor']; ?>;
	font-style: italic;
	font-weight: normal;
	font-size: 11px;
}

#content .postscriptum img{
	width: 10px;
	height: 10px;
}

#content .navigPages {
	color: <?php echo $_VARCSS['ContentFontColor']; ?>;
	font-style: italic;
}

#content .navigPages a {
	color: <?php echo $_VARCSS['FootFontColor']; ?>;
	font-style: normal;
	font-weight: bold;
	text-decoration: none;
}

#content .navigPages a:hover {
	color: <?php echo $_VARCSS['ContentFontColor']; ?>;
	text-decoration: underline;
}

#content .btnImage {
	padding-left: 25px;
}

#content .btnImageSansLbl {
	width: 27px;
	padding-left: 16px;
	color: transparent;
	text-indent: -9999px;
}

#content .contact {
	width: 40%;
	padding: 30px 40px;
	text-align: left;
}

.ligneTableau:hover { 
	background: <?php echo $_VARCSS['TableHoverColor']; ?>;
	cursor: pointer;
}

.msgConfirmation {
	width: 50%;
	margin: auto;
	padding: 5px 10px;
	border: <?php echo $_VARCSS['MsgConfirm']; ?> 1px solid;
	color: <?php echo $_VARCSS['MsgConfirm']; ?>;
	list-style: none;
	text-align: left;
}

.msgConfirmation li {
	padding: 2px 2px 2px 25px;
	background: url(<?php echo $_VARCSS['DirImg']; ?>msgConfirm.png) no-repeat left 2px; 
}

.msgErreur {
	width: 50%;
	margin: auto;
	padding: 5px 10px;
	border: <?php echo $_VARCSS['MsgError']; ?> 1px solid;
	color: <?php echo $_VARCSS['MsgError']; ?>;
	list-style: none;
	text-align: left;
}

.msgErreur li {
	padding: 2px 2px 2px 25px;
	background: url(<?php echo $_VARCSS['DirImg']; ?>msgError.png) no-repeat left 2px; 
}

/* Styles pour la page de connexion */
#connexion {
	padding: 10px;
	margin: auto;
	width: 50%;
	font-size: 15px;
	font-weight: bold;
	background: <?php echo $_VARCSS['FrameBgColor']; ?>;
	color: <?php echo $_VARCSS['FrameFontColor']; ?>;
	-webkit-text-size-adjust: none;
}

#connexion .connect {
	margin: auto;
	padding: 20px 10px;
	width: 95%;
	font-size: 15px;
	font-weight: normal;
	color: <?php echo $_VARCSS['ContentFontColor']; ?>;
	filter: progid:DXImageTransform.Microsoft.Gradient(GradientType=1, StartColorStr='<?php echo $_VARCSS['ContentFontHover']; ?>', EndColorStr='<?php echo $_VARCSS['ContentBgColor']; ?>'); /* Dégradé sur IE */
	background: -moz-radial-gradient(<?php echo $_VARCSS['ContentFontHover']; ?>, <?php echo $_VARCSS['ContentBgColor']; ?>); /* Dégradé sur Mozilla */
	background: -webkit-gradient(radial, center center, 10, center center, 480, from(<?php echo $_VARCSS['ContentFontHover']; ?>), to(<?php echo $_VARCSS['ContentBgColor']; ?>));  /* Dégradé sur les autres navigateurs */
}

/*** Contenu de la fiche ***/
#fiche {
	background: white;
	width: 750px;
	margin: auto;
	padding: 35px 0px;
	border: <?php echo $_VARCSS['ContentFontHover']; ?> 1px solid;
	border-collapse: none;
	-moz-box-shadow: 1px 1px 12px #777; /*Ombre compatible sur firefox à condition de prefixer*/
	-webkit-box-shadow: 1px 1px 12px #777; /*Compatible safari et chrome idem*/
	box-shadow: 1px 1px 12px #777; /*Pour anticiper une compatibilité sur les autres navigateurs*/
}

#fiche .logo {
	float: left;
	margin: 0 0 0 35px;
}

#fiche .creation {
	float: right;
	margin: 10px 40px 0 0;
}

#fiche fieldset {
	width: 87%;
	padding: 10px;
	border: <?php echo $_VARCSS['TableBorderColor']; ?> 1px solid;
}

#fiche .transporteur {
	text-align: left;
}

#fiche .title {
	font-size: 14px;
	font-weight: bold;
	background: <?php echo $_VARCSS['BgBody']; ?>;
	color: <?php echo $_VARCSS['FrameBgColor']; ?>;
}

#fiche .subtitle {
	font-size: 11px;
	font-weight: normal;
	color: <?php echo $_VARCSS['ContentFontColor']; ?>;
}

#fiche .subtitle img{
	margin: -1px 0px;
	width: 10px;
}

#fiche .toolbar {
	margin-top: -1px;
	padding: 5px 10px;
	background: white;
	font-weight: bold;
}

#fiche .toolbar img {
	margin: -3px 10px;
	padding: 0px;
}

#fiche .toolbar img:hover {
	filter: alpha(opacity=70);
	opacity: 0.7;
}

#fiche .separateur {
	width : 90%;
	margin: auto;
	border-top: <?php echo $_VARCSS['ContentFontColor']; ?> 1px solid;
}

#fiche table {
	width: 90%;
	margin: auto;
	border: <?php echo $_VARCSS['TableBorderColor']; ?> 1px solid;
}

#fiche th, #fiche td, #fiche tr {
	border: <?php echo $_VARCSS['TableBorderColor']; ?> 1px solid;
	text-align: left;
	vertical-align: top;
}

#fiche th {
	text-align: center;
}

#fiche .tabNomChamp {
	background: white;
	font-style: italic;
	font-weight: bold;
	width: 30%;
}

#fiche .titre {
	color: <?php echo $_VARCSS['FrameBgColor']; ?>;
	margin-left: 5%;
	text-decoration: underline;
	font-weight: bold;
	text-align: left;
}

#fiche .attention {
	text-align:left;
	margin-left:5%;
	width: 90%;
}

#fiche .adresse {
	border: 0px black solid;
	width: auto;
	display: block;
	margin-left:25px;
	margin-top:-16px;
	font-weight: bold;
}

#fiche .mail {
	display: block;
	margin-left:50px;
	margin-top:-16px;
	font-weight: bold;
}

/*** Contenu du billet collectif ***/

#billet {
	background: white;
	width: 750px;
	margin: auto;
	padding: 35px 0px;
	border: <?php echo $_VARCSS['ContentFontHover']; ?> 1px solid;
	border-collapse: none;
	-moz-box-shadow: 1px 1px 12px #777; /*Ombre compatible sur firefox à condition de prefixer*/
	-webkit-box-shadow: 1px 1px 12px #777; /*Compatible safari et chrome idem*/
	box-shadow: 1px 1px 12px #777; /*Pour anticiper une compatibilité sur les autres navigateurs*/
}

#billet fieldset {
	width: 87%;
	padding: 10px;
	border: <?php echo $_VARCSS['TableBorderColor']; ?> 1px solid;
}

#billet .separateur {
	width : 90%;
	margin: auto;
	border-top: <?php echo $_VARCSS['ContentFontColor']; ?> 1px solid;
}

#billet table {
	width: 90%;
	margin: auto;
	
	border: <?php echo $_VARCSS['TableBorderColor']; ?> 0px solid;
}

#billet td, #billet tr {
	border: <?php echo $_VARCSS['TableBorderColor']; ?> 0px solid;
	text-align: left;
	vertical-align: top;
	padding: 20px;
}

#billet th {
	border: <?php echo $_VARCSS['TableBorderColor']; ?> 1 solid;
	text-align: center;
}

#billet .vehicule {
	margin-top:-17px;
	margin-left:70px;
}

#billet .conducteur {
	margin-top:-17px;
	margin-left:100px;
}

#billet textarea {
	width: 84%;
	height: 100px;
}

/*** Histogramme ***/
#graph { 
	position: relative;
	margin: 0 auto;
	width: 670px;
	height: 300px;
	background: white;
	border: <?php echo $_VARCSS['FrameFontHover']; ?> 1px solid;
	font: 9px Helvetica, Geneva, sans-serif;
}

#graph li {
	position: absolute;  
	text-align: center; 
	list-style: none;
	width: 50px;
}	

#graph li.bar {
	bottom: 0;
	border: 1px solid grey;    
	color: #000;
	background: <?php echo $_VARCSS['FrameFontHover']; ?>;
}	

#graph li.mois { 	
	bottom: -28px;
}

#graph li p {
	position: relative; 
	top: -13px;
}

/********************************/
/* Styles pour le pied de page */
/******************************/

#footer {
	width: 980px;
	height: 20px;
	margin: 0px auto;
	padding: 10px;
	color: <?php echo $_VARCSS['FootFontColor']; ?>;
}

#footer p {
	margin: 0px;
	text-align: center;
	font-size: 11px;
}

#footer a {
	color: <?php echo $_VARCSS['FootFontColor']; ?>;
	text-decoration: underline;
}

#footer a:hover {
	color: <?php echo $_VARCSS['FootFontHover']; ?>;
	text-decoration: none;
}