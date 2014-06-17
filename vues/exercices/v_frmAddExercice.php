<div align="center">
	<form action = "index.php?uc=admin&action=frmAddExercice" method = "POST" enctype="multipart/form-data">
<table>
    <tr>
    	<td><b>Parties du corps</b></td>
    	<td><select name="bodyParts">
    	<?php
    	foreach ($bodyParts as $parts) {
    		if($parts['libelle'] == $bodyParts[0]['libelle'])
                echo "<option selected>".$parts['libelle']."</option>";
            else if($parts['libelle'] != $bodyParts[0]['libelle'])
    		  echo "<option>".$parts['libelle']."</option>";
    	}
    	?>
    </select></td>
    </tr>
	<tr>
		<td>* Titre</td>
		<td><input type="text" name="titre"/></td>
	</tr>
     <tr>
    	<td>* Résumé (maximum une image)</td>
    	<td><textarea name="resume" id="resume" rows="10" cols="50"></textarea> <script>
                var pathckf = '/modules/plugins/ckeditor';
                var editor = CKEDITOR.replace('resume',
                {
                    filebrowserBrowseUrl : pathckf + '/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl : pathckf + '/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl : pathckf + '/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl : pathckf + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl : pathckf + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl : pathckf + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    filebrowserWindowWidth : '1000',
                    filebrowserWindowHeight : '700'
                }      
                 
            );
            </script></td>
    </tr>
    <tr>
    	<td><b>* contenu de l'exercice</b>(maximum 3 image)</td>
    	<td><textarea name="contenu" id="contenu" rows="10" cols="50"></textarea> <script>
                var pathckf = '/modules/plugins/ckeditor';
                var editor = CKEDITOR.replace('contenu',
                {
                    filebrowserBrowseUrl : pathckf + '/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl : pathckf + '/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl : pathckf + '/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl : pathckf + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl : pathckf + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl : pathckf + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    filebrowserWindowWidth : '1000',
                    filebrowserWindowHeight : '700'
                }      
                 
            );
            </script></td>
    </tr>
<tr>
	<td>vidéo de l'exercice</td>
	<td><input type = "file" name="videoExercice"/> </td>
</tr>

    <tr>
    	<td><input type="submit" name = "enregistrer" value="enregistrer"/></td>
    	<td><input type="reset" name = "Annuler" value="annuler"/></td>
    </tr>
</table>
</form>
</div>