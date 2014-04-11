<form method='post' action='index.php?uc=identif&action=vdModifMdp'>

<fieldset style="width:50%;">

	<label class="alignLabel required"> Mot de passe actuel : </label> 
	<input type="password" name="oldPass" style="width:60%;"> <br> <br>
	
	<label class="alignLabel required"> Nouveau mot de passe : </label> 
	<input type="password" name="newPass" style="width:60%;"> <br> <br> 
	
	<label class="alignLabel required"> Confirmez le nouveau mot de passe : </label>
	<input type="password" name="confirmPass" style="width:60%;">
	
</fieldset> <br>

	<input type="submit" value="Enregistrer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnSave.png);"> &nbsp;
	<input type="reset" value="Effacer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnCancel.png);"> <br>
	<font color="red" size="1">* Champs obligatoires</font> 
	
</form>


