	<!-- Menu de la page -->
	<div id="menu">
		<ul>
			<!-- Suivi -->
			<?php if(estConnecte()) { ?>
			<li <?php if($uc == "suivi") echo "style='background:#226D48'";?>> <a href="index.php?uc=suivi&action=frmSuivi"> Mon suivi </a>
				<ul class="sousMenu">
					<li> <a href="index.php?uc=suivi&action=frmSuivi"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgAdd.png"> Ajouter une fiche de suivi </a></li>
					<li> <a href="index.php?uc=suivi&action=lstSuivi"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgFiche.png"> Voir mes fiches de suivi </a></li>
					<li> <a href="index.php?uc=suivi&action=imc"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuStat.png"> Votre progression </a></li>
				</ul>
			</li>
			<?php } ?>
			
			<!-- Exercices physiques -->
			<li <?php if($uc == "exercice") echo "style='background:#226D48'";?>> <a href="index.php?uc=exercice&action=lstExercice"> Exercices </a>
				<ul class="sousMenu">
					<li> <a href="index.php?uc=exercice&action=abdominaux">Abdominaux</a></li>
					<li> <a href="index.php?uc=exercice&action=dos">Dos</a></li>
					<li> <a href="index.php?uc=exercice&action=pectoraux">Pectoraux</a></li>
					<li> <a href="index.php?uc=exercice&action=biceps">Biceps</a></li>
					<li> <a href="index.php?uc=exercice&action=triceps">Triceps</a></li>
					<li> <a href="index.php?uc=exercice&action=epaules">Epaules</a></li>
				</ul>
			</li>
			
			<!-- Nutrition -->
			<li <?php if($uc == "nutrition") echo "style='background:#226D48'";?>> <a href=""> Nutrition </a>
				<ul class="sousMenu">
					<li> <a href=""> Les lipides </a></li> 
					<li> <a href="index.php?uc=nutrition&action=proteines"> Les protéines </a></li>
					<li> <a href=""> Le sucre </a></li>
					<li> <a href=""> Les nutriments </a></li>
				</ul>
			</li>
			
			<!-- Localisation -->
			<?php if(estConnecte()) { ?>
			<li <?php if($uc == "localisation") echo "style='background:#226D48'";?>> <a href="index.php?uc=localisation&action=frmLocalisation">Où se muscler</a>
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
			<li <?php if($uc == "admin") echo "style='background:#226D48'";?>> <a href="index.php?uc=admin&action="> Gestion des exercices </a>
				<ul class="sousMenu">
					<li> <a href="index.php?uc=admin&action=frmAddExercice"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgAdd.png"> Ajouter un exercice </a></li>
					<li> <a href="index.php?uc=admin&action=frmModifExercice"><img src="<?php echo $_CONFIG['DIR_Image']; ?>tbEdit.png"> Modifier un exercice </a></li>
					<li> <a href="index.php?uc=admin&action=frmDelExercice"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgTrash.png"> Supprimer un exercice </a></li>
				</ul>
			</li>
			<?php } ?>
			
			<!-- Gestion nutrition -->
			<?php if(estAdmin()) { ?>
			<li <?php if($uc == "admin") echo "style='background:#226D48'";?>> <a href="index.php?uc=admin&action="> Gestion nutrition </a>
				<ul class="sousMenu">
					<li> <a href="index.php?uc=admin&action=frmAddExercice"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgAdd.png"> Ajouter un exercice </a></li>
					<li> <a href="index.php?uc=admin&action=frmModifExercice"><img src="<?php echo $_CONFIG['DIR_Image']; ?>tbEdit.png"> Modifier un exercice </a></li>
					<li> <a href="index.php?uc=admin&action=frmDelExercice"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgTrash.png"> Supprimer un exercice </a></li>
				</ul>
			</li>
			<?php } ?>
			
			<li> <a href="index.php?uc=identif&action=frmConnexion"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuUserInfo.png"> <?php if(estConnecte()) echo $_SESSION['login']; else echo "Mon compte"; ?> </a>
				<ul class="sousMenu">
					<?php if(estConnecte()) { ?>
					<li> <a href="index.php?uc=identif&action=frmModifCompte"><img src="<?php echo $_CONFIG['DIR_Image']; ?>sbConfig.png"> Modifier le compte </a> </li>
					<li> <a href="index.php?uc=identif&action=frmModifMdp"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuPassword.png"> Modifier le mot de passe </a> </li>
					<?php } else { ?>
					<li> <a href="index.php?uc=identif&action=frmConnexion"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuConnect.png"> Connexion </a> </li>
					<li> <a href="index.php?uc=identif&action=frmCreerCompte"> Créer un compte </a> </li>
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
