<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>


<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <?php
$uid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select FullName from tbluser where ID='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['FullName'];

?>

<!-- linkking to change the password -->
                <div class="profile-usertitle-name" ><a href="user-profile.php"><?php echo $name; ?></a></div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>

            <div class="clear"></div>
            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>

        </div>
<!-- division yaha bata suru -->
        <div class="divider"></div>
        
        <ul class="nav menu">
            <li class="active"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Home</a></li>
            
            <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                <em class="fa fa-navicon">&nbsp;</em>Incomes <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-3">
                    <li><a class="" href="add-income.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Incomes
                    </a></li>
                    <li><a class="" href="manage-income.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Manage Incomes
                    </a></li>
                    
                </ul>

            </li>

            </li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-5">
                <em class="fa fa-navicon">&nbsp;</em>Incomes Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-5">
                    <li><a class="" href="income-datewise-reports.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Daywise Incomes
                    </a></li>
                    <li><a class="" href="income-monthwise-reports.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Monthwise Incomes
                    </a></li>
                    <li><a class="" href="income-yearwise-reports.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Yearwise Incomes
                    </a></li>
                    
                </ul>
            </li>
           
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="add-expense.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Expenses
                    </a></li>
                    <li><a class="" href="manage-expense.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Manage Expenses
                    </a></li>
                    
                </ul>

            </li>
           
  <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-navicon">&nbsp;</em>Expense Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="expense-datewise-reports.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Daywise Expenses
                    </a></li>
                    <li><a class="" href="expense-monthwise-reports.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Monthwise Expenses
                    </a></li>
                    <li><a class="" href="expense-yearwise-reports.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Yearwise Expenses
                    </a></li>
                    
                </ul>
        


            <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
                <em class="fa fa-navicon">&nbsp;</em>Visual Reports <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-4">
                    <li><a class="" href="add-charts.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>income categories
                    </a></li>
                    <li><a class="" href="add-charts2.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> expense categories 
                    </a></li>
                    <li><a class="" href="add-charts3.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>income graph  
                    </a></li>
                    <li><a class="" href="add-charts4.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>expense graph
                    </a></li>
                    <li><a class="" href="all.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Overall Reports
                    </a></li>
                    
                </ul>

            </li>

            <li class="parent "><a data-toggle="collapse" href="#sub-item-6">
                <em class="fa fa-navicon">&nbsp;</em>Do My Taxes <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-6">
                    <li><a class="" href="add-monthly-taxes.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Monthly
                    </a></li>
                    <!-- <li><a class="" href="add-yearly-taxes.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Yearly
                    </a></li> -->
                    
                </ul>

            </li>

            




<!--             
            <li><a href="user-profile.php"><em class="fa fa-user">&nbsp;</em> Profile</a></li>
             <li><a href="change-password.php"><em class="fa fa-clone">&nbsp;</em> Change Password</a></li> -->
<!-- <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li> -->

        </ul>
    </div>