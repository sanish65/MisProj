
<?php
 
$datapoint = array( 
	array("y" => 3373.64, "label" => "Germany" ),
	array("y" => 2435.94, "label" => "France" ),
	array("y" => 612.453, "label" => "Netherlands" )
);

$datapoint1 = array( 
	array("y" => 3373.64, "label" => "nepal" ),
	array("y" => 2435.94, "label" => "nepal" ),
	array("y" => 612.453, "label" => "nepal" )
);


// print_r($datapoint);
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "in rupees"
	},
	axisY: {
		title: "income from"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($datapoint1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}

window.onload = function() {
 
 var chart = new CanvasJS.Chart("chartContainer2", {
	 animationEnabled: true,
	 theme: "light2",
	 title:{
		 text: "in rupees"
	 },
	 axisY: {
		 title: "income from"
	 },
	 data: [{
		 type: "column",
		 yValueFormatString: "#,##0.## tonnes",
		 dataPoints: <?php echo json_encode($datapoint1, JSON_NUMERIC_CHECK); ?>
	 }]
 });
 chart.render();
  
 }

</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>  