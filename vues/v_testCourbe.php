<script src="https://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"><!--
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
	data.addColumn('string', 'Kilogrammes');
    data.addColumn('number', 'Poids');
   
    data.addRows(5);
 
	data.setValue(0, 0, '60');
	data.setValue(0, 1, 60);
	
	data.setValue(1, 0, '80')
	data.setValue(1, 1, 70);
	
	data.setValue(2, 0, '100')
	data.setValue(2, 1, 80);
	
	data.setValue(3, 0, '120')
	data.setValue(3, 1, 85);
	
	data.setValue(4, 0, '140')
	data.setValue(4, 1, 90);
	
	
 
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 400, height: 240, title: 'Courbes de poids'});
		
		
    //hAxis: {title: 'Q(m3/h)',   minValue: 0, maxValue: 44, textStyle:{ fontSize : 9}},
    //vAxis: {title: 'H(m.c.a.)', minValue: 0, maxValue: 18, textStyle:{ fontSize : 9}, gridlines:{ color: '#aaa', count: 10}},
      }
// --></script>
<div id="chart_div">&nbsp;</div>