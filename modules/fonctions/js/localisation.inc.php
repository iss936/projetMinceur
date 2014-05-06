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