<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My income My expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-money"></em>
				</a></li>
				<li class="active">Your expenses activities here:</li>
			</ol>
		</div><!--/.row-->              

		<?php
 
//  $datapoint = array( 
// 	 array("y" => 3373.64, "label" => "Germany" ),
// 	 array("y" => 2435.94, "label" => "France" ),
// 	 array("y" => 612.453, "label" => "Netherlands" )
//  );
 include('includes/dbconnection.php');
 
 $ret=mysqli_query($con,"select ExpenseCost as y,ExpenseItem as label from tblexpense");
 $cnt=1;
 while ($row=mysqli_fetch_assoc($ret)) {
 
 
 
 $dataPoints[]=$row;
 

 
 }
 echo"<div id='namespace' >your overall Expenses from sources</div>
 <div id='chartContainer' style='height: 370px; width: 100%;''></div>";

 ?>

</div>


	<?php include_once('includes/footer.php');?>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>



	<script>
	



window.onload = function() {
 
 var chart = new CanvasJS.Chart("chartContainer", {
	 animationEnabled: true,
	 theme: "light2",
	 title:{
		 text: "categories"
	 },
	 axisY: {
		 title: "in rupees"
	 },
	 data: [{
		 type: "column",
		 yValueFormatString: "rupees",
		 dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	 }]
 });
 chart.render();
  
 }


 
	</script>
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>
<?php } ?>