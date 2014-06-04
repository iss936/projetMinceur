<form method='post' action='index.php?uc=identif&action=vdCreerCompte'>
<fieldset style="width:50%;">

	<label class="alignLabel required"> Login : </label>
	<input type="text" name="login" style="width:60%" value="<?php echo $loginUtilisateur ?>"> <br> <br>
	
	<label class="alignLabel required"> Mot de passe : </label>
	<input type="password" name="mdp" style="width:60%" value="<?php echo $mdpUtilisateur ?>"> <br> <br>
	
	<label class="alignLabel required"> Confirmation : </label>
	<input type="password" name="confirm" style="width:60%" value="<?php echo $confirm ?>"> <br> <br>
	
	<label class="alignLabel required"> Prénom : </label> 
	<input type="text" name="prenom" style="width:60%" value="<?php echo $prenomUtilisateur ?>"> <br> <br>
	
	<label class="alignLabel required"> Nom : </label> 
	<input type="text" name="nom" style="width:60%" value="<?php echo $nomUtilisateur ?>"> <br> <br> 
	
	<label class="alignLabel required"> Téléphone : </label>
	<input type="text" name="tel" style="width:60%" value="<?php echo $telUtilisateur ?>"> <br> <br>
	
	<label class="alignLabel required"> Mail : </label>
	<input type="text" name="mail" style="width:60%" value="<?php echo $mailUtilisateur ?>"> <br> <br>
	
	<label class="alignLabel required"> Adresse : </label>
	<textarea type="text" name="adresse" style="width:60%"><?php echo $adresseUtilisateur ?></textarea> <br> <br>

</fieldset> <br>
	
	<input type="submit" value="Enregistrer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnSave.png);"> &nbsp;
	<input type="reset" value="Effacer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnCancel.png);"> 
	 <br>
	<font color="red" size="1">* Champs obligatoires</font> 

</form>


