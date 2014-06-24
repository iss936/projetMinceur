//---------------------------------------------------
// Fonctions g�n�rales
//---------------------------------------------------

//R�cup�re la valeur d'une variable pass� dans l'url (method GET)


function getVarUrl(nomVar)
{
	nomVar = nomVar + "=";
	var tailleVar = nomVar.length;
	var result = false;
	var uri = location.href.substr(location.href.indexOf("?")+1) + "&"; //R�cup�re l'URI (...&nomVar=valeur&...&)
	
	if (uri.indexOf("#") != -1) //Permet de r�cup�rer l'URI sans le hash (#... => invisible pour le moteur des recherches)
		uri = uri.substring(0, uri.indexOf("#")) + "&";
		
	if (uri.indexOf(nomVar) != -1) //Si la variable est envoy�e dans l'URL
	{
		tailleVar = uri.indexOf(nomVar) + tailleVar; //Taille jusqu'� nomVar= (...&nomVar=)
		result = uri.substr(tailleVar); //R�cup�re la suite de l'URI � partir de la valeur de nomVar (valeur&...&)
		result = result.substr(0, result.indexOf("&")); //R�cup�re la valeur de nomVar
	}
	return result;
}

//R�cup�re la valeur de l'input choisi
function getInputValue(name)
{
	return document.forms[0].elements[name].value;
}

//R�cup�re la valeur de l'option choisie dans un select
function getSelectedOptionValue(select_name)
{
	return document.forms[0].elements[select_name].options[document.forms[0].elements[select_name].selectedIndex].value;
}

//R�cup�re le text de l'option choisie dans un select
function getSelectedOptionText(select_name)
{
	return document.forms[0].elements[select_name].options[document.forms[0].elements[select_name].selectedIndex].text;
}

//Affiche un div
function afficheDIV(idDiv)
{
	var divStyle = document.getElementById(idDiv).style;
	divStyle.display = "block";
}

//Masque un div
function masqueDIV(idDiv)
{
	var divStyle = document.getElementById(idDiv).style;
	divStyle.display = "none";
}

//Affiche/Masque un div
function afficheMasqueDIV(idDiv)
{
	var divStyle = document.getElementById(idDiv).style;
	if(divStyle.display != "block") divStyle.display = "block";
	else divStyle.display = "none";
}

//Affiche/Masque derni�re ligne d'une tableau
function afficheMasqueTR(idTr)
{
	for(var i=1; i<=5; i++)
	{
		var trStyle = document.getElementById(idTr+i).style;
		if(trStyle.display != "") trStyle.display = "";
		else trStyle.display = "none";
	}
}

//Copie et colle un champ
function copieColle(chpACopier, chpOuColler)
{
	document.forms[0].elements[chpOuColler].value = document.forms[0].elements[chpACopier].value;
}

//Inverse les cases coch�s dans le checkbox
function cocheOnOff(cocheCheckbox, nameCheckboxs)
{
	$("input[name='" + nameCheckboxs + "']").each //Pour chaque checkbox du tableau
	(
		function()
		{
			if(cocheCheckbox.checked) //Si le main checkbox est coch�
				$(this).attr("checked", true);
			else  //Sinon on d�coche tout
				$(this).attr("checked", false);
		}
	);	
}

//Affiche un ast�risque pour un champ obligatoire
function makeRequired(idElement) 
{
	var idLabel = "label.required";
	if(idElement) idLabel = "label[id='" + idElement + "']";
	
	//Pour chaque label avec la classe 'required'
	$(idLabel).each 
	(
		function()
		{
			//Variables
			var endHtml = "";
			var txtHtml = $(this).html();
			var pos2pt = txtHtml.lastIndexOf(":");
			
			//Traitement s'il y a : dans le label
			if(pos2pt != -1) 
			{
				endHtml = txtHtml.substr(pos2pt);
				txtHtml = txtHtml.substr(0, pos2pt);
			}
			
			//Ajout de l'ast�risque
			if($(this).has("font[color='red']").length != 0) $("label > font[color='red']").html("*");
			else $(this).html(txtHtml + " <font color=\"red\">*</font> " + endHtml);
		}
	);
}

//Enl�ve l'ast�risque pour un champ obligatoire
function unmakeRequired(idElement) 
{
	var idLabel = "label.required";
	if(idElement) idLabel = "label[id='" + idElement + "']";
	
	//Pour chaque label avec la classe 'required'
	$(idLabel).each 
	(
		function()
		{
			//Enl�ve l'ast�risque
			$(this).find("font[color='red']").replaceWith("");
		}
	);
}

//Calcul automatiquement la somme de deux inputs
function somme_input(){
   var somme=0;
   var result = document.getElementById('somme');
   for(var i = 1; i <= 2; i++){
      var element = document.getElementById('el_'+i);
      if(element.value!='' && !isNaN(element.value)){
         somme += parseInt(element.value);
		}
   }
   result.value = somme;
}

function CopierColler()
{
	var dateAller = document.forms[0].elements['dateA'].value;
	var lieuDepartAller = document.forms[0].elements['lieuDA'].value;
	var lieuArriveeAller = document.forms[0].elements['lieuAA'].value;
	
	document.forms[0].elements['dateR'].value = dateAller;
	document.forms[0].elements['lieuDR'].value = lieuArriveeAller;
	document.forms[0].elements['lieuAR'].value = lieuDepartAller;

}

//R�initialisation du mot de passe
function confirmInitMdp(id_utilisateur)
{
	if(confirm("�tes-vous s�r de vouloir r�initialiser le mot de passe cet utilisateur? \nAttention, cette action est irr�versible!"))
	{
		document.location.href = "index.php?uc=param&action=initMdp&id_utilisateur=" + id_utilisateur;
	}
}

function addInput()
{
	var oTBody = document.getElementById("mail").getElementsByTagName("tbody")[0];
	oTR = oTBody.insertRow(-1);
	oTR.style.border = "0";
			
	oTD = oTR.insertCell(0);
	oTD.style.border = "0";
	oTD.style.padding = "0";
	oTD.style.width = "37%";
	oTD.innerHTML = "<label style='float:left'>Adresse mail secondaire :</label>";
	
	oTD = oTR.insertCell(1);
	oTD.style.border = "0";
	oTD.style.padding = "0";
	oTD.innerHTML = "<input type=\"text\" style=\"width:89%\" name=\"xMail[]\" > <a onClick='delInput(-1)'><img src='<?php echo $_CONFIG['DIR_Image']; ?>imgRemove.png' title='Dissocier cette adresse mail'></a>";

}

function delInput(idTR)
{
	var oTBody = document.getElementById("mail").getElementsByTagName("tbody")[0];
	var oTBodyNbLignes = oTBody.rows.length;
	var boolDel = false;
	var i = 0
	if(idTR == -1)
	{
		oTBody.deleteRow(-1);
		boolDel = true;
	}
	while(oTBodyNbLignes > 0 && i < oTBodyNbLignes && boolDel == false)
	{		
		//Suppression si la ligne correspond
		if(oTBody.rows[i].cells[1].getElementsByTagName("input")[0].value == idTR)
		{
			oTBody.deleteRow(i);
			boolDel = true;
		}
		
		//Incr�mentation
		i++;
	}
}