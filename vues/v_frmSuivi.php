<form>
	<fieldset style="width:50px;">
		<label class="alignLabel required">Date <span class="postscriptum">(JJ/MM/AAAA)</span></label>
		<input name="Date" type="text" class="DatePicker" /> <br> <br>
		
		<label class="alignLabel required">Votre poids <span class="postscriptum">(en kg)</span></label>
		<input name="poids" type="text" id="poids" /> <br> <br>
		
		<label class="alignLabel required">Votre taille <span class="postscriptum">(en cm)</span></label>
		<input name="taille" type="text" id="taille" /> <br> <br>
		
		<label class="alignLabel required">Evenement </label><br/>
		<textarea name="Event" id="Event" rows="10" cols="50">Exemple : début régime, écart sur mon alimentation, reprise du sport, arrêt de la cigarette.</textarea> <br> <br>
	
	</fieldset> <br>
	
	<input type="submit" value="Enregistrer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnSave.png);"> &nbsp;
	<input type="reset" value="Effacer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnCancel.png);"> 
	 <br>
	<font color="red" size="1">* Champs obligatoires</font> 
	
</form>