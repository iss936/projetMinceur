<h1>Bienvenue sur MyDietFit </h1><br>

<?php if(!estConnecte()) { ?>
	<div style="display: inline-block"><h4><a style="color: #32CAED" href="index.php?uc=identif&action=frmConnexion">Connectez-vous</a> ou <a style="color: #32CAED" href="index.php?uc=identif&action=frmCreerCompte">creez-vous un compte</a> pour bénéficier de plus de fonctionnalités.</h1></div><br><br>
<?php } ?>

<div style="float: left; width: 66%">
	<h2>Article de la semaine: <?php echo $unExercice['titre'] ?></h2>
	<p><?php echo $unExercice['resume'] ?></p>
	<p><?php echo $unExercice['description'] ?></p>
	<iframe width="560" height="315" src="//www.youtube.com/embed/Jx00BIi-E28?rel=0" frameborder="0" allowfullscreen></iframe>
</div>
<div style="float:right; width: 33%; margin-bottom: 20px">
	<h1>Derniers articles</h1>
	<?php foreach($les5Exercices as $unExercice) { ?>
		<p><a href="index.php?uc=exercice&action=v_exercice&idExercice=<?php echo $unExercice['idFicheExercice'] ?>"><?php echo $unExercice['titre'] ?></a></p>
	<?php } ?>
</div>
<div style="float:right; width: 33%; margin-bottom: 20px">
	<h1>Réseaux sociaux</h1>
</div>
<div style="float:right; width: 33%; margin-bottom: 20px">
	<h1>Pub</h1>
</div>

<!-- <embed
width="420" height="345"
src="<?php echo $unExercice['video'] ?>"
type="application/x-shockwave-flash">
</embed> -->