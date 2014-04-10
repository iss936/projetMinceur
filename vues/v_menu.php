	<!-- Menu de la page -->
	<div id="menu">
		<ul>
			<!-- Exercices physiques -->
			<?php if(estConnecte()) { ?>
			<li> <a href=""> Exercices </a>
				<ul class="sousMenu">
				<li> <a href=""> Abdominaux </a></li>
				<li> <li> <a href=""> biceps </a></li>
				<li> <a href=""> Dos</a></li>
				</ul>
			</li>
			<?php } ?>
			
			<!-- Nutrition -->
			<?php if(estConnecte()) { ?>
			<li> <a href=""> Nutrition </a>
				<ul class="sousMenu">
				<li> <li> <a href=""> les lipides </a></li>
				<li> <li> <a href=""> les protéines </a></li>
				<li> <li> <a href=""> le sucre </a></li>
				</ul>
			</li>
			<?php } ?>
			
			<!-- Localisation -->
			<?php if(estConnecte()) { ?>
			<li> <a href="index.php?uc=localisation&action=frmLocalisation"> Localisation </a>
				<ul class="sousMenu">
				
				</ul>
			</li>
			<?php } ?>
			
			<!-- Suivi -->
			<?php if(estConnecte()) { ?>
			<li> <a href="index.php?uc=suivi&action=frmSuivi"> Mon suivi </a>
				<ul class="sousMenu">
					<li> <a href="index.php?uc=suivi&action=frmSuivi"> Ajouter une fiche de suivi </a></li>
					<li> <a href="index.php?uc=suivi&action=lstSuivi"> Voir mes fiches de suivi </a></li>
					<li> <a href="index.php?uc=suivi&action="> Voir courbe </a></li>
					<li> <a href="index.php?uc=suivi&action="> Calculer IMC </a></li>
				</ul>
			</li>
			<?php } ?>
			
			<li> <a href="index.php?uc=identif&action=frmConnexion"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuAccount.png"> Mon compte </a>
				<ul class="sousMenu">
					<?php if(estConnecte()) { ?>
					<li> <a href="index.php?uc=identif&action=frmModifCompte"><img src="<?php echo $_CONFIG['DIR_Image']; ?>sbConfig.png"> Modifier le compte </a> </li>
					<li> <a href="index.php?uc=identif&action=frmModifMdp"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuPassword.png"> Modifier le mot de passe </a> </li>
					<li> <a href="index.php?uc=identif&action=deconnexion"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuDisconnect.png"> Déconnexion </a> </li>
					<?php } else { ?>
					<li> <a href="index.php?uc=identif&action=frmConnexion"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuConnect.png"> Connexion </a> </li>
					<?php } ?>
				</ul>
			</li>
			
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
			<?php if(estConnecte() && estUtilisateur()) { ?>
			<li> <a href="index.php?uc=stat&action=frmStat"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuStat.png"> Statistiques</a>
				<ul class="sousMenu">
					<!--<li><a href="index.php?uc=stat&action=frmStat"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuStat.png"> Nombre de réservations / mois</a></li>
					<li><a href="index.php?uc=stat&action=frmDestiRecu"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuStat.png"> Destinations récurrentes / écoles</a></li>-->
				</ul>
			</li>
			<?php } ?>
			
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
			
			<!-- Aide -->
			<li> <a href="index.php?uc=identif&action=contact"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuAide.png"> Aide </a>
				<ul class="sousMenu">
					<li> <a href="<?php echo $_CONFIG['DIR_Attachment']; ?>Guide.pdf" target="_blank"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuGuide.png"> Guide d'utilisation </a> </li>
					<li> <a href="index.php?uc=identif&action=contact"><img src="<?php echo $_CONFIG['DIR_Image']; ?>menuContact.png"> Contact </a> </li>
				</ul>
			</li>
		</ul>
		<?php if(estConnecte()) echo "<h3><img src=\"".$_CONFIG['DIR_Image']."menuUserInfo.png\"> <u>"."</u> ".$_SESSION['login']."</h3>"; ?>
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
