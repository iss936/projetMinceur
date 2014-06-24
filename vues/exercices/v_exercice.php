<div>
<?php 
if($unExercice['video']) echo "<object width='560' height='315'><param name='movie' value='//$unExercice[video]?hl=fr_FR&amp;version=3&amp;rel=0'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='//$unExercice[video]?hl=fr_FR&amp;version=3&amp;rel=0' type='application/x-shockwave-flash' width='560' height='315' allowscriptaccess='always' allowfullscreen='true'></embed></object>"; ?>
<?php echo $unExercice['description'] ?>
</div>