<?php
	session_start();
	include('../include/db.php');
	if(! (isset($_SESSION['UID']))){
		header("Location:../");
	}
	$row = mysqli_fetch_array(mysqli_query($con, "SELECT count(*) FROM persons"));
	$personsCount = $row[0];
?>
<html>
	<head>
		<title>Dashboard - Address Book</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/custom.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-1">
				</div>
                <div class="col-sm-10">
                	<h1 class="title text-center">Address Book</h1>
                    <div class="card">
	                    <ul class="nav nav-tabs" role="tablist">
	                        <li role="presentation" class="active"><a href="/Address-Book/address-book/dashboard/" >Home</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/tab_contents/add.php">Add</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/tab_contents/update.php">Update</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/tab_contents/view.php">View All</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/logout/" aria-controls="logout">Logout</a></li>
	                    </ul>
	                    <div class="tab-content">
	                    	<!-- Home -->
	                        <div role="tabpanel" class="tab-pane active" id="home">	                        	
	                        	<div class="container">
	                        		<div class="row">
		                        		<div class="col-sm-2"></div>   	
			                        	<div class="col-sm-5">
			                        		<h4 class="font">Welcome to your address book, <?php echo $_SESSION['First_Name'].' '.$_SESSION['Last_Name']; ?>!</h4>
			                        		<table class="table borderless">
				                        		<tr>
				                        			<td>Name</td>
				                        			<td>:</td>
				                        			<td><?php echo $_SESSION['First_Name'].' '.$_SESSION['Last_Name']; ?></td>
				                        		</tr>
				                        		<tr>
				                        			<td>Username</td>
				                        			<td>:</td>
				                        			<td><?php echo $_SESSION['Username']; ?></td>
				                        		</tr>
				                        		<tr>
				                        			<td>Last Login</td>
				                        			<td>:</td>
				                        			<td><?php echo $_SESSION['Last_Login']; ?></td>
				                        		</tr>
				                        		<tr>
				                        			<td>Persons in Address Book</td>
				                        			<td>:</td>
				                        			<td><?php echo $personsCount; ?></td>
				                        		</tr>
				                        	</table>
			                        	</div>
			                        	<div class="col-sm-2"></div>   	
			                        	
	                        		</div>
	                        	</div>	                        	
	                        		                        	
	                        </div>
	                    </div>
                    </div>
				</div>
            </div>
		</div>
		<script type="text/javascript" src="../js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</body>
</html>