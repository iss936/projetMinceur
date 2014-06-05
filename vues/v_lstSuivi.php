<?php
//Liste des Suivis
if(isset($lesSuivis))
{
	echo "<table class='sortable'>
			<tr>
				<th>Date</th>
				<th>Poids</th>
				<th>Taille</th>
				<th>Evenement</th>
			</tr>"; 

	foreach($lesSuivis as $unSuivi)
	{
		//Variables
		//Utilisateur
		$idSuivi = $unSuivi['idSuivi'];
		$date = $unSuivi['date'];
		$poids = $unSuivi['poids'];
		$taille = $unSuivi['taille'];
		$evenement = $unSuivi['evenement'];
		// - Image et lien
		$urlFiche = "index.php?uc=param&action=frmModifUtilisateur&id_utilisateur=$idSuivi";
		$paramTD = "onClick=document.location.href='index.php?uc=param&action=frmModifUtilisateur&id_utilisateur=$idSuivi' title=\"Cliquez ici pour voir l'école\"";
		$imgEdit = "<a href='$urlFiche'><img src='".$_CONFIG['DIR_Image']."imgEdit.png' title=\"Voir l'école\"></a>";
		$imgSuppr = "<a onClick=confirmDelUtilisateur($idSuivi);><img src='".$_CONFIG['DIR_Image']."imgTrash.png' title=\"Supprimer l'école\"></a>";
		
		//Lignes
		echo "<tr class='ligneTableau'>
			<td> $date </td>
			<td> $poids </td>
			<td> $taille </td>
			<td> $evenement</td>
		</tr>";
	}
	echo "</table><br>";
	
	
$nbSuivi = count($lesSuivis);
}
?>
<script src="https://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
	data.addColumn('string', 'Kilogrammes');
    data.addColumn('number', 'Poids');
   
   
    data.addRows(<?php echo $nbSuivi ?>);
 
<?php
$i = 0;
foreach($lesSuivis as $unSuivi)
	{
		//Variables
		$date = $unSuivi['date'];
		$poids = $unSuivi['poids'];
		
		echo "data.setValue($i, 0, '$date');
			data.setValue($i, 1, $poids);";
		$i= $i+1;
	}
?>
	var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(data, {width: 400, height: 240, title: 'Courbes de poids'});
      }
</script>
<div id="chart_div">&nbsp;</div>

