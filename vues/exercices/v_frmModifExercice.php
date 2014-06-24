<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<div align="left">
<a href="index.php?uc=admin&action=espaceGestionExercice"> << Gestion des exercices </a>
</div>
<br />
<?php  if(isset($unExercice)) 
		{echo "actuel:"?> <img src= "/ressources/imageResume/images/<?php echo $unExercice['imageResume'];?>" height="100" width="50"><?php } ?> 
<div align="center">
	<form action = "index.php?uc=admin&action=frmModifExercice&idExercice=<?php if(isset($unExercice)) echo $unExercice['idFicheExercice']; ?>" method = "POST" enctype="multipart/form-data">
<table>
    <tr>
    	<td><b>Parties du corps</b></td>
    	<td><select name="bodyParts">
    	<?php
    	foreach ($bodyParts as $parts) {
			if(isset($unExercice) && $parts['idPartieCorps'] == $unExercice['idPartieCorps'])
                echo "<option selected>".$parts['libelle']."</option>";
            else
    		  echo "<option>".$parts['libelle']."</option>";
    	}
    	?>
    </select></td>
    </tr>
	<tr>
		<td>* Titre</td>
		<td><input type="text" name="titre" value="<?php if(isset($unExercice)){echo $unExercice['titre'];}?>"/></td>
	</tr>
     <tr>
    	<td>* Résumé</td>
    	<td><textarea name="resume" maxlength="200" cols="30" rows="5" ><?php if(isset($unExercice)){echo $unExercice['resume'];}?></textarea></td>
    </tr>
    <tr>
        <td>* Image du résumé</td>
        <td ><input type = "file" name="imageResume" value=""/> </td>
    </tr>
    <tr>
    	<td><b>* Contenu de l'exercice</b>(maximum 3 image)</td>
    	<td><textarea name="contenu" id="contenu" rows="10" cols="50"><?php if(isset($unExercice)){echo $unExercice['description'];}?></textarea> <script>
                var pathckf = '/modules/plugins/ckeditor';
                var editor = CKEDITOR.replace('contenu',
                {
                    filebrowserBrowseUrl : pathckf + '/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl : pathckf + '/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl : pathckf + '/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl : pathckf + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl : pathckf + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl : pathckf + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    filebrowserWindowWidth : '1500',
                    filebrowserWindowHeight : '700'
                }      
                 
            );
            </script></td>
    </tr>
<tr>
	<td>Vidéo de l'exercice</td>
	<td>Saisissez un lien Youtube<input type ="text" name="videoExerciceY" value="<?php if(isset($unExercice)){echo $unExercice['video'];}?>"/></td>
</tr>

    <tr>
    	<td colspan="2"><input type="submit" name = "enregistrer" value="Enregistrer" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnSave.png);"/> &nbsp;
						<input type="reset" name = "Annuler" value="Annuler" class="btnImage" style="background-image: url(<?php echo $_CONFIG['DIR_Image']; ?>btnCancel.png);"/></td>
    </tr>
</table>
</form>
</div>
<!-- <embed
width="420" height="345"
src="https://www.youtube.com/v/EbnV6b5evHw"
type="application/x-shockwave-flash">
</embed>
 -->
