//Associe le choix du car
function associerCar(oSelect)
{
	//Valeurs des listes déroulantes
	var id_car = oSelect.options[oSelect.selectedIndex].value;
	
	//Traitement
	if(id_car != 0)
	{
		//Variables liées aux listes déroulantes
		var txtCar = oSelect.options[oSelect.selectedIndex].text;
		var boolCar = false;
	
		//Variables liées à la table
		var oTBody = document.getElementById("carsAffectes").getElementsByTagName("tbody")[0];
		var oTBodyNbLignes = oTBody.rows.length;
		var oTR, oTD;
		var i = 0;
		
		//Recherche si la structure existe déjà
		while(oTBodyNbLignes > 0 && i < oTBodyNbLignes && boolCar == false)
		{
			if(oTBody.rows[i].cells[0].getElementsByTagName("input")[0].value == id_car) boolCar = true;
			i++;
		}

		//Si le car choisi n'est pas associé
		if(boolCar == false)
		{
			var trStyle = document.getElementById("aucunCar").style;
			trStyle.display = "none";
			
			oTR = oTBody.insertRow(-1);
			
			oTD = oTR.insertCell(0);
			oTD.width = "100%";
			oTD.innerHTML = "<input type=\"hidden\" name=\"xCar[][id_car]\" value=\"" + id_car + "\"> " + txtCar;
		
			oTD = oTR.insertCell(1);
			oTD.width = "16";
			oTD.innerHTML = "<a href='javascript:dissocierCar(" + id_car + ");'><img src='<?php echo $_CONFIG['DIR_Image']; ?>imgRemove.png' title='Dissocier ce car'></a>";
		}
	}
	else alert("Choississez au moins un car pour l'associer à cette fiche!");
}

//Dissocie le car choisi
function dissocierCar(id_car)
{
	//Variables
	var oTBody = document.getElementById("carsAffectes").getElementsByTagName("tbody")[0];
	var oTBodyNbLignes = oTBody.rows.length;
	var boolDel = false;
	var i = 0;
	
	//Recherche de la structure à dissocier
	while(oTBodyNbLignes > 0 && i < oTBodyNbLignes && boolDel == false)
	{		
		//Suppression si la ligne correspond
		if(oTBody.rows[i].cells[0].getElementsByTagName("input")[0].value == id_car)
		{
			oTBody.deleteRow(i);
			boolDel = true;
		}
		
		//Incrémentation
		i++;
	}
	var nbLignes = oTBody.rows.length;
		if(nbLignes == 0)
		{
			var trStyle = document.getElementById("aucunCar").style;
			trStyle.display = "";
		}
}

//Associe le choix du conducteur
function associerConduc(oSelect)
{
	//Valeurs des listes déroulantes
	var id_conducteur = oSelect.options[oSelect.selectedIndex].value;
	
	//Traitement
	if(id_conducteur != 0)
	{
		//Variables liées aux listes déroulantes
		var txtConducteur = oSelect.options[oSelect.selectedIndex].text;
		var boolConducteur = false;
	
		//Variables liées à la table
		var oTBody = document.getElementById("conducAffectes").getElementsByTagName("tbody")[0];
		var oTBodyNbLignes = oTBody.rows.length;
		var oTR, oTD;
		var i = 0;
		
		//Recherche si la structure existe déjà
		while(oTBodyNbLignes > 0 && i < oTBodyNbLignes && boolConducteur == false)
		{
			if(oTBody.rows[i].cells[0].getElementsByTagName("input")[0].value == id_conducteur) boolConducteur = true;
			i++;
		}

		//Si le conducteur choisi n'est pas associé
		if(boolConducteur == false)
		{
			var trStyle = document.getElementById("aucunConduc").style;
			trStyle.display = "none";
			
			oTR = oTBody.insertRow(-1);
			
			oTD = oTR.insertCell(0);
			oTD.width = "100%";
			oTD.innerHTML = "<input type=\"hidden\" name=\"xConduc[][id_conducteur]\" value=\"" + id_conducteur + "\"> " + txtConducteur;
		
			oTD = oTR.insertCell(1);
			oTD.width = "16";
			oTD.innerHTML = "<a href='javascript:dissocierConduc(" + id_conducteur + ");'><img src='<?php echo $_CONFIG['DIR_Image']; ?>imgRemove.png' title='Dissocier ce conducteur'></a>";
		}
	}
	else alert("Choississez au moins un conducteur pour l'associer à cette fiche!");
}

//Dissocie le conducteur choisi
function dissocierConduc(id_conducteur)
{
	//Variables
	var oTBody = document.getElementById("conducAffectes").getElementsByTagName("tbody")[0];
	var oTBodyNbLignes = oTBody.rows.length;
	var boolDel = false;
	var i = 0;
	
	//Recherche de la structure à dissocier
	while(oTBodyNbLignes > 0 && i < oTBodyNbLignes && boolDel == false)
	{		
		//Suppression si la ligne correspond
		if(oTBody.rows[i].cells[0].getElementsByTagName("input")[0].value == id_conducteur)
		{
			oTBody.deleteRow(i);
			boolDel = true;
		}
		
		//Incrémentation
		i++;
	}
	var nbLignes = oTBody.rows.length;
		if(nbLignes == 0)
		{
			var trStyle = document.getElementById("aucunConduc").style;
			trStyle.display = "";
		}
}