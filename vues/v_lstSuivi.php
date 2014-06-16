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
		
		//Lignes
		echo "<tr>
			<td> ".dateFR($date)." </td>
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
		$date = dateFR($unSuivi['date']);
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

