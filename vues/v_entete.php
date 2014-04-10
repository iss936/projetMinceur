<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">
	   
<html>

<!-- Mentions d'entête -->
<head>
	<title> MyDietFit </title>
	<meta name="robots" content="noindex, nofollow">
	<meta name="author" content="Soumare Issa">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	<link rel="icon" type="image/ico" href="<?php echo $_CONFIG['DIR_Image']; ?>favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo $_CONFIG['DIR_CSS']; ?>default.php" media="screen" title="Principal">
	<link rel="stylesheet" type="text/css" href="<?php echo $_CONFIG['DIR_CSS']; ?>print.php" media="print">
	<link rel="stylesheet" type="text/css" href="<?php echo $_CONFIG['DIR_Plugin']; ?>JQuery/css/custom-theme/jquery-ui-1.8.17.custom.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_CONFIG['DIR_Plugin']; ?>TimePicker/jquery-ui-timepicker-addon.css">
	<script type="text/javascript" src="<?php echo $_CONFIG['DIR_Dynamic']; ?>javascript.all.php"></script>
	<script type="text/javascript" src="<?php echo $_CONFIG['DIR_Plugin']; ?>SortTable.js"></script>
	<script type="text/javascript" src="<?php echo $_CONFIG['DIR_Plugin']; ?>JQuery/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $_CONFIG['DIR_Plugin']; ?>JQuery/js/jquery-ui-1.8.17.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo $_CONFIG['DIR_Plugin']; ?>JQuery/js/jquery.ui.datepicker-fr.js"></script>
	<script type="text/javascript" src="<?php echo $_CONFIG['DIR_Plugin']; ?>TimePicker/jquery-ui-timepicker-addon.js"></script>
	<script type="text/javascript" src="<?php echo $_CONFIG['DIR_Plugin']; ?>TimePicker/localization/jquery-ui-timepicker-fr.js"></script>
	<script type="text/javascript" src="<?php echo $_CONFIG['DIR_Plugin']; ?>ckeditor/ckeditor.js"></script>
	<script type="text/javascript"> 
	//Initialisation des DatePicker
	$(function() {
		$(".DatePicker").datepicker({
			showOn: "both",
			buttonImage: "<?php echo $_CONFIG['DIR_Image']; ?>datePicker.ico",
			buttonText: "Choisir la date",
			buttonImageOnly: true,
			showAnim: "slideDown"
		});
	});
	//Initialisation des TimePicker
		$(function() {
			$(".TimePicker").timepicker();
		});
	//Initialisation des champs obligatoires
	$(function() {
		makeRequired();
	});
	//DialogBox
	$(function() {
		$( "#dialog1" ).dialog({autoOpen: false, title: 'Commentaires'});
		$( "#opener1" ).click(function() {
		$( "#dialog1" ).dialog( "open" ); })
	});
	$(function() {
		$( "#dialog2" ).dialog({autoOpen: false, title: 'Commentaires'});
		$( "#opener2" ).click(function() {
		$( "#dialog2" ).dialog( "open" ); })
	});
	$(function() {
		$( "#dialog3" ).dialog({autoOpen: false, title: 'Commentaires'});
		$( "#opener3" ).click(function() {
		$( "#dialog3" ).dialog( "open" ); })
	});
	$(function() {
		$( "#dialog4" ).dialog({autoOpen: false, title: 'Commentaires'});
		$( "#opener4" ).click(function() {
		$( "#dialog4" ).dialog( "open" ); })
	});
	</script>
</head>

<!-- Corps de la page -->
<body>
