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
				<li class="active">Your Current Balance</li>
			</ol>
		</div><!--/.row-->

		
<?php

//Yearly Expense
$userid=$_SESSION['detsuid'];
$query5=mysqli_query($con,"select sum(ExpenseCost)  as totalexpense from tblexpense where UserId='$userid';");
$result5=mysqli_fetch_array($query5);
$sum_total_expense=$result5['totalexpense'];
 ?>
					<div class="">
						<!-- <h4>Total Expenses</h4> -->
						<div  data-percent="<?php echo $sum_total_expense;?>" ><span class="percent"><?php if($sum_total_expense==""){
echo "0";
} else {
// echo $sum_total_expense;
}

$query5=mysqli_query($con,"select sum(IncomeMoney)  as totalexpense from tblincome where UserId='$userid';");
$result5=mysqli_fetch_array($query5);
$sum_total_income=$result5['totalexpense'];
?>
			<div class="">
				<!-- <h4>Total Income</h4> -->
				<div  data-percent="<?php echo $sum_total_income;?>" ><span class="percent"><?php if($sum_total_income==""){
echo "0";
} else {
// echo $sum_total_income;


$balance=$sum_total_income-$sum_total_expense;
if($balance<=1000)
	{
		echo"<div class='alert alert-success'><center>
		<strong>hey!</strong> Your Budget is in deficit. Maintain your balance before expense exceeds. 
	 </center> </div>";
		
	}
	else{
		echo"<div class='alert alert-success'><center>
		<strong></strong> Your Budget is in surplus.
		  </center></div>";
	}
echo"<center><br><h3><strong>Your balance currently: ".$balance."</strong></h3></center>";
}


 $datapoint = array( 
	 array("y" => $sum_total_income, "label" => "income" ),
	 array("y" => $sum_total_expense, "label" => "expense" )
 );
 
 
//  print_r($datapoint);

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
		 text: "Income/Expense Detail"
	 },
	 axisY: {
		 title: "income from"
	 },
	 data: [{
		 type: "pie",
		 yValueFormatString: "Rupees",
		 dataPoints: <?php echo json_encode($datapoint, JSON_NUMERIC_CHECK); ?>
	 }]
 });
 chart.render();
  
 }
	</script>
<center><div id="chartContainer" style="height: 370px; width: 33.33%;"></div></center>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
<?php } ?>