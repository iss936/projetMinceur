<form method='post' action='<?php echo $urlFrm ?>'>

<fieldset style="width:90%;">

	<label class="alignLabel required"> Titre : </label> 
	<input type="text" name="titreNutrition" style="width:60%;" value="<?php echo $titreNutrition ?>"> <br> <br>
	
	<label class="alignLabel required"> Cat�gorie : </label>
	<select name="idCategorie">
		<?php foreach($lesCategories as $uneCategorie) { ?>
		<option value="<?php echo $uneCategorie['idCategorie'] ?>" <?php if($idCategorie == $uneCategorie['idCategorie']) echo "selected" ?>><?php echo $uneCategorie['libelleCategorie'] ?></option>
		<?php } ?>
	</select> <br> <br>
	
	<label class="alignLabel required"> Contenu : </label> <br>
	<textarea name='contenu' class='ckeditor'><?php echo $contenu ?></textarea>
	
</fieldset> <br>

	<input type="submit" value="Enregistrer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnSave.png);"> &nbsp;
	<input type="reset" value="Effacer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnCancel.png);"> <br>
	<font color="red" size="1">* Champs obligatoires</font> 
	
</form>


