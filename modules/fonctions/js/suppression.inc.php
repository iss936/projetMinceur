//--------------------------------------------------------
// Fonctions de suppression avec message de confirmation
//--------------------------------------------------------

//Suppression d'une fiche de nutrition
function confirmDelNutrition(idNutrition)
{
	if(confirm("Êtes-vous sûr de vouloir supprimer cette fiche ? \nAttention, cette action est irréversible!"))
	{
		document.location.href = "index.php?uc=admin&action=delNutrition&idNutrition=" + idNutrition;
	}
}