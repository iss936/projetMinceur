	<!-- Menu de la page -->
	<div id="menu">
		<ul>
			<!-- Suivi -->
			<?php if(estConnecte()) { ?>
			<li <?php if($uc == "suivi") echo "style='background:#32CAED'";?>> <a href="index.php?uc=suivi&action=frmSuivi"> Mon suivi </a>
				<ul class="sousMenu">
					<li> <a href="index.php?uc=suivi&action=frmSuivi"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgAdd.png"> Ajouter une fiche de suivi </a></li>
					<li> <a href="index.php?uc=suivi&action=lstSuivi"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgFiche.png"> Voir mes fiches de suivi </a></li>
					<li> <a href="index.php?uc=suivi&action=imc"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuStat.png"> Votre progression </a></li>
					<!-- <li> <a href="index.php?uc=suivi&action=frmObjectif"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgAdd.png"> Ajouter un objectif </a></li> -->
				</ul>
			</li>
			<?php } ?>
			
			<!-- Exercices physiques -->
			<li <?php if($uc == "exercice") echo "style='background:#32CAED'";?>> <a href="index.php?uc=exercice&action=lstExercice"> Exercices </a>
				<ul class="sousMenu">
					<?php foreach($lesPartiesCorps as $unePartieCorps) { ?>
					<li> <a href="index.php?uc=exercice&action=entrainement&idPartieCorps=<?php echo $unePartieCorps['idPartieCorps'] ?>"><?php echo $unePartieCorps['libelle'] ?></a></li>
					<?php } ?>
				</ul>
			</li>
			
			<!-- Nutrition -->
			<li <?php if($uc == "nutrition") echo "style='background:#32CAED'";?>> <a href=""> Nutrition </a>
				<ul class="sousMenu">
					<li> <a href=""> Les lipides </a></li> 
					<li> <a href="index.php?uc=nutrition&action=proteines"> Les protéines </a></li>
					<li> <a href=""> Le sucre </a></li>
					<li> <a href=""> Les nutriments </a></li>
				</ul>
			</li>
			
			<!-- Localisation -->
			<?php if(estConnecte()) { ?>
			<li <?php if($uc == "localisation") echo "style='background:#32CAED'";?>> <a href="index.php?uc=localisation&action=frmLocalisation">Où se muscler</a>
				<ul class="sousMenu">
					<?php if(estAdmin()) { ?>
					<li> <a href="index.php?uc=localisation&action=frmLocalisation"> Rechercher une salle </a></li>
					<li> <a href="index.php?uc=localisation&action=frmAddSalle"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgAdd.png"> Ajouter une salle </a></li>
					<?php } ?>
				</ul>
			</li>
			<?php } ?>
			
			<!-- Gestion des exercices -->
			<?php if(estAdmin()) { ?>
			<li <?php if($uc == "admin" && stripos($action, "exercice")) echo "style='background:#32CAED'";?>> <a href="index.php?uc=admin&action=espaceGestionExercice"> Gestion des exercices </a></li>
			<?php } ?>
			
			<!-- Gestion nutrition -->
			<?php if(estAdmin()) { ?>
			<li <?php if($uc == "admin" && stripos($action, "nutrition")) echo "style='background:#32CAED'";?>> <a href="index.php?uc=admin&action=frmAddNutrition"> Gestion nutrition </a>
			</li>
			<?php } ?>
			
			<li> <a href="index.php?uc=identif&action=frmConnexion"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuUserInfo.png"> <?php if(estConnecte()) echo $_SESSION['login']; else echo "Mon compte"; ?> </a>
				<ul class="sousMenu">
					<?php if(estConnecte()) { ?>
					<li> <a href="index.php?uc=identif&action=frmModifCompte"><img src="<?php echo $_CONFIG['DIR_Image']; ?>sbConfig.png"> Modifier le compte </a> </li>
					<li> <a href="index.php?uc=identif&action=frmModifMdp"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuPassword.png"> Modifier le mot de passe </a> </li>
					<?php } else { ?>
					<li> <a href="index.php?uc=identif&action=frmConnexion"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuConnect.png"> Connexion </a> </li>
					<li> <a href="index.php?uc=identif&action=frmCreerCompte"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgAdd.png"> Créer un compte </a> </li>
					<?php } ?>
				</ul>
			</li>
	
			<?php if(estConnecte()) { ?>
			<li> <a href="index.php?uc=identif&action=deconnexion"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuDisconnect.png"> Déconnexion </a> </li>
			<?php } ?>
			
		</ul>
		<!-- <?php if(estConnecte()) echo "<h3><img src=\"".$_CONFIG['DIR_Image']."menuUserInfo.png\"> <u>"."</u> ".$_SESSION['login']."</h3>"; ?> -->
	</div>
</div>
			
<!-- Corps de la page -->
<div id="content">
	<noscript>				
		<ul class='msgErreur'>
			<li> Votre navigateur n'est pas capable d'exécuter les scripts contenus dans cette page. </li>
			<li> <b>Veuillez activer JavaScript ou mettre à jour votre navigateur Internet.</b> </li>
		</ul> <br>
	</noscript>
