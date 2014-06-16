<form method='post' action='index.php?uc=localisation&action=vdAddSalle'>
<fieldset style="width:50%;">

	<label class="alignLabel required"> Nom de la salle : </label>
	<input type="text" name="nom" style="width:60%" value="<?php echo $nomSalle ?>"> <br> <br>
	
	<label class="alignLabel required"> Adresse : </label>
	<input type="text" name="adresse" id="address" style="width:60%" value="<?php echo $adresseSalle ?>"> <br> <br>
	
	<label class="alignLabel required"> Type : </label>
	<select name="typeSalle">
	<?php foreach($lesTypesSalles as $unTypeSalle) { ?>
		<option value="<?php echo $unTypeSalle['idTypeSalle'] ?>"><?php echo $unTypeSalle['libelleTypeSalle'] ?></option>
	<?php } ?>
	</select>
	
</fieldset> <br>
	
	<input type="submit" value="Enregistrer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnSave.png);"> &nbsp;
	<input type="reset" value="Effacer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnCancel.png);"> 
	 <br>
	<font color="red" size="1">* Champs obligatoires</font> 

</form>