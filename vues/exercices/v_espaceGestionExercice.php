<div align="center">
<form action = "index.php?uc=admin&action=espaceGestionExercice" method = "POST" enctype="multipart/form-data">
	partie du corps: <select name="bodyParts">
    	<?php
    	foreach ($bodyParts as $parts) {
    		if($parts['libelle'] == $bodyParts[0]['libelle'])
                echo "<option selected>".$parts['libelle']."</option>";
            else if($parts['libelle'] != $bodyParts[0]['libelle'])
    		  echo "<option>".$parts['libelle']."</option>";
    	}
    	?>
    </select> <input type = "submit" name = "filtrer" value = "filtrer" />
</form>
</div>
<hr>