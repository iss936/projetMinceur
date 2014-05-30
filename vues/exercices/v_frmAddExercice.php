<<<<<<< HEAD
=======
<h1>Ajouter un exercice </h1> <br>

>>>>>>> 5fc7d662df268377cf3d95e03963b3cef8e24ef0
<div align="center">
	<form action = "index.php?uc=admin&action=frmAddExercice" method = "POST" enctype="multipart/form-data">
<table>
    <tr>
<<<<<<< HEAD
    	<td><b>Parties du corps</b></td>
=======
    	<td><b>parties du corps</b></td>
>>>>>>> 5fc7d662df268377cf3d95e03963b3cef8e24ef0
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
<<<<<<< HEAD
    	<td>Résumé</td>
=======
    	<td><?php echo utf8_decode("RÃ©sumÃ©") ?></td>
>>>>>>> 5fc7d662df268377cf3d95e03963b3cef8e24ef0
    	<td><textarea name="resume" id="resume" rows="10" cols="50"></textarea> <script>
                CKEDITOR.replace( 'resume' );
            </script></td>
    </tr>
    <tr>
<<<<<<< HEAD
    	<td><b>Image</b>(s'affichera avec le Résumé)</td>
=======
    	<td><b>Image</b>(s'affichera avec le <?php echo utf8_decode("RÃ©sumÃ©") ?>)</td>
>>>>>>> 5fc7d662df268377cf3d95e03963b3cef8e24ef0
    	<td><input type = "file" name="imageResume"/>(JPG,PNG ou GIF)</td>
    	</td>
    </tr>
    <tr>
<<<<<<< HEAD
    	<td><b>Contenu de l'exercice</b></td>
=======
    	<td><b>contenu de l'exercice</b></td>
>>>>>>> 5fc7d662df268377cf3d95e03963b3cef8e24ef0
    	<td><textarea name="contenu" id="contenu" rows="10" cols="50"></textarea> <script>
                CKEDITOR.replace( 'contenu' );
            </script></td>
    </tr>
    <tr>
<<<<<<< HEAD
        <td>Sélectionnez maximum 3 images pour le contenu de l'exercice</td>
        <td><input type="file" name="imageExercice[]" multiple/>(JPG,PNG ou GIF) écrire")
          [img] dans le contenu de l'exercice pour afficher une image </td>
    </tr>
<tr>
	<td>Vidéo de l'exercice</td>
=======
        <td><?php echo utf8_decode("sÃ©lectionnez") ?>maximum 3 images pour le contenu de l'exercice</td>
        <td><input type="file" name="imageExercice[]" multiple/>(JPG,PNG ou GIF)<?php echo utf8_decode(" Ã©crire") ?> 
          [img] dans le contenu de l'exercice pour afficher une image </td>
    </tr>
<tr>
	<td><?php echo utf8_decode("vidÃ©o") ?> de l'exercice</td>
>>>>>>> 5fc7d662df268377cf3d95e03963b3cef8e24ef0
	<td><input type = "file" name="videoExercice"/> </td>
</tr>

    <tr>
    	<td><input type="submit" name = "enregistrer" value="enregistrer"/></td>
    	<td><input type="reset" name = "Annuler" value="annuler"/></td>
    </tr>
</table>
</form>
</div>