<script>
var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }
function showPosition(position)
{
	map.setCenter(new google.maps.LatLng(position.coords.latitude,position.coords.longitude));
	map.setZoom(17);
}
</script>

<?php
if(!$display) echo "<img src='".$_CONFIG['DIR_Image']."imgDown.png'> <a href='#' onclick='javascript:afficheMasqueDIV(\"Recherche\")'>Formulaire de recherche</a> <img src='".$_CONFIG['DIR_Image']."imgDown.png'>";
?>

<div align="left">
<form action="index.php?uc=localisation&action=vdLocalisation" id="Recherche" method="POST" <?php if(!$display) echo 'style="display: none"'; ?>>
<fieldset style="width:95%">
	<legend>Rechercher sur un rayon de <select name="rayon">
										<option <?php if($rayon==5) echo "selected" ?>>5</option>
										<option <?php if($rayon==10) echo "selected" ?>>10</option>
										<option <?php if($rayon==15) echo "selected" ?>>15</option>
										<option <?php if($rayon==20) echo "selected" ?>>20</option>
									</select> km </legend>
		<input type="text" name="adresse" id="address" value="<?php echo $adresse ?>" size='50'> ou <input type="button" value="Se localiser" onclick="getLocation()">
		<br> <br>
		
	<?php foreach($lesTypesSalles as $unTypeSalle) { ?>
		<input type="checkbox" 
			<?php if($typeSalle) {
					foreach($typeSalle as $idType) {
						if($idType == $unTypeSalle['idTypeSalle']) echo "checked='checked'";
					} 
				} ?> 
		name="typeSalle[]" value="<?php echo $unTypeSalle['idTypeSalle'] ?>"> <?php echo $unTypeSalle['libelleTypeSalle'] ?>
		<br>
	<?php } ?>
	<br>
	
	<input type="submit" value="Rechercher"/>
</fieldset>
</form>
</div>
<br>


<?php if($lesSallesOrder) { ?>
<table>
	<tr>
		<th>Nom de la salle</th>
		<th>Distance (km)</th>
		<th>Type</th>
		<th>Voir sur la carte</th>
	</tr>
<?php foreach($lesSallesOrder as $uneSalle) { ?>
	<tr>
		<td><?php echo $uneSalle['nomSalle'] ?></td>
		<td><?php echo round(getUneDistance($lat, $long, $uneSalle['latitude'], $uneSalle['longitude']), 2) ?></td>
		<td><?php $type = getUnTypeSalle($uneSalle['idTypeSalle']); echo $type['libelleTypeSalle']; ?>
		<td><img src="<?php echo $_CONFIG['DIR_Image']; ?>btnSearch.png" onclick="codeAddress('<?php echo $uneSalle['adresse']?>', <?php echo $uneSalle['latitude']?>, <?php echo $uneSalle['longitude']?>)"></td>
	</tr>
<?php } ?>
</table>
<?php } ?>

<br>

<div id="map" style="width: 100%; height: 400px; <?php if($display) echo 'display: none'; ?>"></div>

<!-- <iframe src="https://mapsengine.google.com/map/embed?mid=zYbVwSPB5_Qk.k-FXEUFYh-aM" width="640" height="480"></iframe> -->