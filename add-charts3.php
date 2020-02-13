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
				<li class="active">Your yearly-income activities here:</li>
			</ol>
		</div><!--/.row-->              

		<?php
 

$fdate="2015";
$tdate="2021";
 include('includes/dbconnection.php');
 $sum=0;
 $sum1=0;
 $sum2=0;
 $sum3=0;
 $sum4=0;
 $sum5=0;
 $ret=mysqli_query($con,"SELECT IncomeMoney as y,year(IncomeDate) as label FROM tblincome  where (year(IncomeDate) BETWEEN '$fdate' and '$tdate')");
 $cnt=1;
 while ($row=mysqli_fetch_assoc($ret)) {
  $dataPoints[]=$row;

  if($row[label]=='2015')
     {
        $sum=$sum+$row[y];
     }
    elseif($row[label]=='2016')
    {
        $sum1=$sum1+$row[y];
    }
    elseif($row[label]=='2017')
    {
        $sum2=$sum2+$row[y];
    }
    elseif($row[label]=='2018')
    {
        $sum3=$sum3+$row[y];
    }
    elseif($row[label]=='2019')
    {
        $sum4=$sum4+$row[y];
    }
    elseif($row[label]=='2020')
    {
        $sum5=$sum5+$row[y];
    }
    elseif($row[label]=='2021')
    {
        $sum6=$sum6+$row[y];
    }


 }
//  echo $sum."hi<br>";
//  echo $sum1."hi<br>";
//  echo $sum2."hi<br>";
//  echo $sum3."hi<br>";
//  echo $sum4."hi<br>";
//  echo $sum5."hi<br>";
//  echo $sum6."hi<br>";



    $datapoint = array( 
        array("y" => $sum, "label" => "2015" ),
        array("y" => $sum1, "label" => "2016" ),
        array("y" => $sum2, "label" => "2017" ),
        array("y" => $sum3, "label" => "2018" ),
        array("y" => $sum4, "label" => "2019" ),
        array("y" => $sum5, "label" => "2020" ),
        array("y" => $sum6, "label" => "2021" )
    );
//  print_r($dataPoints);
 echo"<div id='namespace' >your income in years</div>
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
		 text: "in year"
	 },
	 axisY: {
		 title: "in rupees"
	 },
	 data: [{
		 type: "line",
		 yValueFormatString: "rupees",
		 dataPoints: <?php echo json_encode($datapoint, JSON_NUMERIC_CHECK); ?>
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