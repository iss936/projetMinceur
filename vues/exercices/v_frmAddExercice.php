<h1>Ajouter un exercice </h1> <br>

<div align="center">
	<form action = "index.php?uc=admin&action=frmAddExercice" method = "POST" enctype="multipart/form-data">
<table>
    <tr>
    	<td><b>parties du corps</b></td>
    	<td><select name="bodyparts">
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
    	<td><?php echo utf8_decode("Résumé") ?></td>
    	<td><textarea name="resume" id="resume" rows="10" cols="50"></textarea> <script>
                CKEDITOR.replace( 'resume' );
            </script></td>
    </tr>
    <tr>
    	<td><b>Image</b>(s'affichera avec le <?php echo utf8_decode("Résumé") ?>)</td>
    	<td><input type = "file" name="imageResume"/>(JPG,PNG ou GIF)</td>
    	</td>
    </tr>
    <tr>
    	<td><b>contenu de l'exercice</b></td>
    	<td><textarea name="contenu" id="contenu" rows="10" cols="50"></textarea> <script>
                CKEDITOR.replace( 'contenu' );
            </script></td>
    </tr>
    <tr>
        <td><?php echo utf8_decode("sélectionnez") ?>maximum 3 images pour le contenu de l'exercice</td>
        <td><input type="file" name="imageExercice[]" multiple/>(JPG,PNG ou GIF)<?php echo utf8_decode(" écrire") ?> 
          [img] dans le contenu de l'exercice pour afficher une image </td>
    </tr>
<tr>
	<td><?php echo utf8_decode("vidéo") ?> de l'exercice</td>
	<td><input type = "file" name="videoExercice"/> </td>
</tr>

    <tr>
    	<td><input type="submit" name = "enregistrer" value="enregistrer"/></td>
    	<td><input type="reset" name = "Annuler" value="annuler"/></td>
    </tr>
</table>
</form>
</div>