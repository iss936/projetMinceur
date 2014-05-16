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
			<?php if(estConnecte()) { ?>
			<li <?php if($uc == "exercice") echo "style='background:#226D48'";?>> <a href=""> Exercices </a>
				<ul class="sousMenu">
				<li> <a href="index.php?uc=exercice&action=abdominaux">Abdominaux</a></li>
				<li> <a href="index.php?uc=exercice&action=dos">Dos</a></li>
				<!-- <li> <a href="">Pectoraux</a></li>
				<li> <a href="">Biceps</a></li> -->
				</ul>
			</li>
			<?php } ?>
			
			<!-- Nutrition -->
			<?php if(estConnecte()) { ?>
			<li <?php if($uc == "nutrition") echo "style='background:#226D48'";?>> <a href=""> Nutrition </a>
				<ul class="sousMenu">
				<!-- <li> <li> <a href=""> les lipides </a></li> -->
					<li> <a href="index.php?uc=nutrition&action=proteines"> Les protéines </a></li>
				<!-- <li> <li> <a href=""> le sucre </a></li> -->
				</ul>
			</li>
			<?php } ?>
			
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
			
			<!-- Salles
			<?php if(estAdmin()) { ?>
			<li> <a href="index.php?uc=localisation&action="> Gestion des salles </a>
				<ul class="sousMenu">
					<li> <a href="index.php?uc=salle">Ajouter une salle </a></li>
					<li> <a href="index.php?uc=salle">Modifier une salle </a></li>
					<li> <a href="index.php?uc=salle">Supprimer une salle </a></li>
				</ul>
			</li>
			<?php } ?> -->
			
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
			
			<!-- Demandes -->
			<!--<?php /*if(estConnecte()) { ?>
			<li> <a href="index.php?uc=consult&action=frmRecherche"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuUserInfo.png"> Demandes </a>
				<ul class="sousMenu">
					<li> <a href="index.php?uc=gestion&action=frmAjout"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuAdd.png"> Faire une demande </a> </li>
					<li> <a href="index.php?uc=consult&action=lstSuivi"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuSuivi.png"> Suivi des demandes </a> </li>
					<li> <a href="index.php?uc=gestion&action=frmAjout"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuAdd.png"> Faire une demande</a> </li>
					<li> <a href="index.php?uc=consult&action=lstEnAttente"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuWaiting.png"> Demandes ponctuelles en attente </a> </li>
					<li> <a href="index.php?uc=consult&action=lstValidFinal"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuChk.png"> Demandes ponctuelles en cours</a> </li>
					<li> <a href="index.php?uc=consult&action=lstRecu"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuRecur.png"> Demandes récurrentes en cours</a> </li>
					<li> <a href="index.php?uc=consult&action=lstEnCours"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuProcess.png"> Demandes ponctuelles validées </a> </li>
					<li> <a href="index.php?uc=consult&action=lstEnCours&recu=1"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuRecur.png"> Demandes récurrentes validées</a> </li>
					<li> <a href="index.php?uc=consult&action=lstFinalise"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuChk.png"> Demandes finalisées</a> </li>
					<li> <a href="index.php?uc=consult&action=frmRecherche"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuSearch.png"> Rechercher des demandes </a> </li>
				</ul>
			</li>
			<?php } */?>-->
			
			<!-- Statistiques -->
			<!-- <?php if(estConnecte() && estUtilisateur()) { ?>
			<li <?php if($uc == "stat") echo "style='background:#226D48'";?>> <a href="index.php?uc=stat&action=frmStat"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuStat.png"> Statistiques</a>
				<ul class="sousMenu">
					<!--<li><a href="index.php?uc=stat&action=frmStat"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuStat.png"> Nombre de réservations / mois</a></li>
					<li><a href="index.php?uc=stat&action=frmDestiRecu"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuStat.png"> Destinations récurrentes / écoles</a></li>
				</ul>
			</li>
			<?php } ?> -->
			
			<!-- Paramètre -->
		<!-- 	<?php /*if(estConnecte() && $_SESSION['idUtilisateur']<4) { ?>
			<li> <a href="index.php?uc=param&action=lstParamUtilisateur"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuPrm.png"> Paramétrage </a>
				<ul class="sousMenu">
					<li> <a href="index.php?uc=param&action=lstParamUtilisateur"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuEcole.png"> Gestion des écoles </a> </li>
					<li> <a href="index.php?uc=param&action=frmChangeConsigne&accueil=1"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgEdit.png"> Consigne de l'accueil</a> </li>
					<li> <a href="index.php?uc=param&action=frmChangeConsigne&accueil=0"><img src="<?php echo $_CONFIG['DIR_Image']; ?>imgEdit.png"> Consigne d'ajout d'une demande</a> </li>
					<li> <a href="index.php?uc=param&action=lstParamCar"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuCar.png"> Gestion des cars </a> </li>
					<li> <a href="index.php?uc=param&action=lstParamConduc"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuConducteur.png"> Gestion des conducteurs </a> </li>
				</ul>
			</li>
			<?php } */?> --!>
			
			<!-- Aide 
			<li> <a href="index.php?uc=identif&action=contact"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuAide.png"> Aide </a>
				<ul class="sousMenu">
					<li> <a href="<?php echo $_CONFIG['DIR_Attachment']; ?>Guide.pdf" target="_blank"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuGuide.png"> Guide d'utilisation </a> </li>
					<li> <a href="index.php?uc=identif&action=contact"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuContact.png"> Contact </a> </li>
				</ul>
			</li>-->
			
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
