<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">
	   
<html>

<!-- Mentions d'entête -->
<head>
	<title> MyDietFit </title>
	<meta name="robots" content="noindex, nofollow">
	<meta name="author" content="Lionel Lienafa">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	<link rel="icon" type="image/ico" href="<?php echo $_CONFIG['DIR_Image']; ?>favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo $_CONFIG['DIR_CSS']; ?>default.php" media="screen" title="Principal">
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
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<script type="text/javascript">
  /* Déclaration des variables  */
  
  var geocoder;
  var map;
  var markers = new Array();
  var i = 0;

  /* Initialisation de la carte  */
  function initialize() {
  
  var input = document.getElementById('address');
  var options = {
		  types: ['geocode'],
		  componentRestrictions: {country: 'fr'}
		};
	autocomplete = new google.maps.places.Autocomplete(input, options);
  
   /* Instanciation du geocoder  */
   geocoder = new google.maps.Geocoder();
   var paris = new google.maps.LatLng(48.8566667, 2.3509871);
   var myOptions = {
    zoom: 15,
    center: paris,
    mapTypeId: google.maps.MapTypeId.HYBRID
   }
   /* Chargement de la carte  */
   map = new google.maps.Map(document.getElementById("map"), myOptions);
  }

  /* Fonction de géocodage déclenchée en cliquant surle bouton "Geocoder"  */
  function codeAddress(adresse,lat,lng) {
   /* Récupération de la valeur de l'adresse saisie */
   var address = adresse;
   /* Appel au service de geocodage avec l'adresse en paramètre */
   geocoder.geocode( { 'address': address}, function(results, status) {
    /* Si l'adresse a pu être géolocalisée */
    if (status == google.maps.GeocoderStatus.OK) {
		var position = new google.maps.LatLng(lat,lng);
     /* Récupération de sa latitude et de sa longitude */
     /*document.getElementById('lat').value = results[0].geometry.location.lat();
     document.getElementById('lng').value = results[0].geometry.location.lng();*/
     map.setCenter(position);
	 map.setZoom(18);
     /* Affichage du marker */
     var marker = new google.maps.Marker({
      map: map,
	  title: adresse,
      position: position
     });
	 
	var infowindow = new google.maps.InfoWindow({
		content: adresse
	});
	
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});
	 
     /* Permet de supprimer le marker précédemment affiché */
     markers.push(marker);
     if(markers.length > 1)
      markers[(i-1)].setMap(null);
      i++;
     } else {
      alert("Le geocodage n\'a pu etre effectue pour la raison suivante: " + status);
     }
    });
  }
google.maps.event.addDomListener(window, 'load', initialize);
	</script>
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
