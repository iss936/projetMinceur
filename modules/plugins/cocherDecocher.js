function verifCheck(form,name)// decoche ou coche tout
{
	var i =document.forms[form].elements[name];
	if(i.checked)
	{
		markAllRows('rowsDeleteForm');//coche
	}
	else
	{
		unMarkAllRows('rowsDeleteForm');//decoche
	}
}
function verifCheck2(form,name,input) //gere exception cocher decocher
{
	var a=document.forms[form].elements[name];
	var cpt=0;
	var nb=true;
	var i = document.forms[form].elements["Valider[]"]; 

		if( input.checked ==false && a.checked )
		{
			a.checked=false;
		}
		for (cpt = 0; cpt < i.length; cpt++) 
		{
			if(i[cpt].checked == true && a.checked == false && nb )
			{
				nb=true;
			}
			else
			{
				nb=false;
			}
		}
		if(nb)
		{
			a.checked=true;
		}
}
function markAllRows(a)// fonction qui coche
{
	$("#"+a).find("input:checkbox:enabled").attr("checked","checked");
	return true
}
function unMarkAllRows(a) //fonction qui decoche
{
	$("#"+a).find("input:checkbox:enabled").removeAttr("checked");
	return true
}