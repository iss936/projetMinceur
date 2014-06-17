<fieldset>
	<legend><a href="index.php?uc=exercice&action=lstEx&idPartieCorps=<?php echo $unePartieCorps['idPartieCorps'] ?>">Exercice <?php echo $unePartieCorps['libelle'] ?></a></legend>
	<p><?php echo $unePartieCorps['descEx'] ?></p>
</fieldset>
<br>
<?php if(estConnecte()) { ?>
	<fieldset>
		<legend><a href="index.php?uc=exercice&action=lstPgrm&idPartieCorps=<?php echo $unePartieCorps['idPartieCorps'] ?>">Programme <?php echo $unePartieCorps['libelle'] ?></a></legend>
		<p><?php echo $unePartieCorps['descPgrm'] ?></p>
	</fieldset>
<?php } ?>