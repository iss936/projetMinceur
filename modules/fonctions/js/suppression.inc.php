//--------------------------------------------------------
// Fonctions de suppression avec message de confirmation
//--------------------------------------------------------

//Suppression d'une fiche de nutrition
function confirmDelNutrition(idNutrition)
{
	if(confirm("�tes-vous s�r de vouloir supprimer cette fiche ? \nAttention, cette action est irr�versible!"))
	{
		document.location.href = "index.php?uc=admin&action=delNutrition&idNutrition=" + idNutrition;
	}
}