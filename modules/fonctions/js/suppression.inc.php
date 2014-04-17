//--------------------------------------------------------
// Fonctions de suppression avec message de confirmation
//--------------------------------------------------------

//Suppression d'un utilisateur
function confirmDelUtilisateur(id_utilisateur)
{
	if(confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur? \nAttention, cette action est irréversible!"))
	{
		document.location.href = "index.php?uc=param&action=delUtilisateur&id_utilisateur=" + id_utilisateur;
	}
}

//Suppression d'un car
function confirmDelCar(id_car)
{
	if(confirm("Êtes-vous sûr de vouloir supprimer ce car? \nAttention, cette action est irréversible!"))
	{
		document.location.href = "index.php?uc=param&action=delCar&id_car=" + id_car;
	}
}

//Suppression d'un conducteur
function confirmDelConducteur(id_conducteur)
{
	if(confirm("Êtes-vous sûr de vouloir supprimer ce conducteur? \nAttention, cette action est irréversible!"))
	{
		document.location.href = "index.php?uc=param&action=delConduc&id_conduc=" + id_conducteur;
	}
}

//Suppression du planning des maternelles
function confirmDelPlanningMater()
{
	if(confirm("Êtes-vous sûr de vouloir supprimer le planning des maternelles? \nAttention, cette action est irréversible!"))
	{
		document.location.href = "index.php?uc=plan&action=delPlanning&type=maternelles";
	}
}

//Suppression du planning des primaires
function confirmDelPlanningPrim()
{
	if(confirm("Êtes-vous sûr de vouloir supprimer le planning des primaires? \nAttention, cette action est irréversible!"))
	{
		document.location.href = "index.php?uc=plan&action=delPlanning&type=primaires";
	}
}

//Suppression du planning des cars
function confirmDelPlanningCar()
{
	if(confirm("Êtes-vous sûr de vouloir supprimer le planning des cars? \nAttention, cette action est irréversible!"))
	{
		document.location.href = "index.php?uc=plan&action=delPlanning&type=cars";
	}
}

//Suppression d'un document
function confirmDelDocument(id_document, id_reservation)
{
	if(confirm("Êtes-vous sûr de vouloir supprimer ce document ? \nAttention, cette action est irréversible!"))
	{
		document.location.href = "index.php?uc=doc&action=delDocument&id_document=" + id_document + "&id_reservation=" + id_reservation;
	}
}