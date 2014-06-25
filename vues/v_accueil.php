<h1>Bienvenue sur MyDietFit </h1><br>

<?php if(!estConnecte()) { ?>
	<div style="display: inline-block"><h4><a style="color: #32CAED" href="index.php?uc=identif&action=frmConnexion">Connectez-vous</a> ou <a style="color: #32CAED" href="index.php?uc=identif&action=frmCreerCompte">créez-vous un compte</a> pour bénéficier de plus de fonctionnalités.</h1></div><br><br>
<?php } ?>

<div style="float: left; width: 66%">
	<h2><a href="index.php?uc=exercice&action=v_exercice&idExercice=<?php echo $unExercice['idFicheExercice'] ?>">Article de la semaine: <?php echo $unExercice['titre'] ?></a></h2><br>
	<?php if($unExercice['video']) echo "<object width='560' height='315'><param name='movie' value='//$unExercice[video]?hl=fr_FR&amp;version=3&amp;rel=0'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='//$unExercice[video]?hl=fr_FR&amp;version=3&amp;rel=0' type='application/x-shockwave-flash' width='560' height='315' allowscriptaccess='always' allowfullscreen='true'></embed></object>"; ?><br><br>
	<p><?php echo $unExercice['resume'] ?></p>
</div>
<div style="float: right; width: 33%">
	<div style="margin-bottom: 20px">
		<h1>Derniers articles</h1>
		<?php foreach($les5Exercices as $unExercice) { ?>
			<p><a href="index.php?uc=exercice&action=v_exercice&idExercice=<?php echo $unExercice['idFicheExercice'] ?>"><?php echo $unExercice['titre'] ?></a></p>
		<?php } ?>
	</div>
	<div style="margin-bottom: 20px">
		<h1>Réseaux sociaux</h1>
		
		<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FMydietfit%2F1448820132054161%3Fref_type%3Dbookmark&amp;width&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:290px;" allowTransparency="true"></iframe>
		
	</div>
	<div style="margin-bottom: 20px">
		<h1>Pub</h1>
		<li id="ad300x250" class="adblock"> 
		<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- homme -->
		<ins class="adsbygoogle"
			style="display:inline-block;width:300px;height:250px"
			data-ad-client="ca-pub-8869699117199259"
			data-ad-slot="7561605500"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		</li>
	</div>
</div>