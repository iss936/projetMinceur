//---------------------------------------------------
// Informations li�es � une demande
//---------------------------------------------------

//Affiche le formulaire d'ajout pour une demande ponctuelle
function onFrmAddPonct()
{
	afficheDIV('date_aller');
	afficheDIV('date_retour');
	masqueDIV('date_debut_fin');
}

//Affiche le formulaire d'ajout pour une demande r�currente
function onFrmAddRecu()
{
	masqueDIV('date_aller');
	masqueDIV('date_retour');
	afficheDIV('date_debut_fin');
}
