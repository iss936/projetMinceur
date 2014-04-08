<form method='post' action='index.php?uc=suivi&action=vdSuivi'>
	<fieldset style="width:50px;">
		<label class="alignLabel required">Date <span class="postscriptum">(JJ/MM/AAAA)</span></label>
		<input name="date" type="text" class="DatePicker" value="<?php echo $date ?>" /> <br> <br>
		
		<label class="alignLabel required">Votre poids <span class="postscriptum">(en kg)</span></label>
		<input name="poids" type="text" id="poids" value="<?php echo $poids ?>" /> <br> <br>
		
		<label class="alignLabel required">Votre taille <span class="postscriptum">(en cm)</span></label>
		<input name="taille" type="text" id="taille" value="<?php echo $taille ?>" /> <br> <br>
		
		<label class="alignLabel required">Evenement <span class="postscriptum">début régime, écart sur alimentation, reprise du sport, arrêt de la cigarette</span></label><br/>
		<textarea name="evenement" id="Event" rows="10" cols="50"><?php echo $evenement ?></textarea> <br> <br>
	
	</fieldset> <br>
	
	<input type="submit" value="Enregistrer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnSave.png);"> &nbsp;
	<input type="reset" value="Effacer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnCancel.png);"> 
	 <br>
	<font color="red" size="1">* Champs obligatoires</font> 
	
</form>