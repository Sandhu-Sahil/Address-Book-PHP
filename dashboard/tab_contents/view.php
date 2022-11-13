<?php
	include('../../include/db.php');
?>
<html>
	<head>
		<title>Dashboard - Address Book</title>
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/custom.css">
		<link rel="stylesheet" type="text/css" href="../css/custom.css">
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
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/">Home</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/tab_contents/add.php">Add</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/tab_contents/update.php">Update</a></li>
	                        <li role="presentation" class="active"><a href="/Address-Book/address-book/dashboard/tab_contents/view.php">View All</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/logout/" aria-controls="logout">Logout</a></li>
	                    </ul>
						<p class="text-center" id="deleteRes"></p>
						<table class="table table-condensed table-responsive">
							<thead>	
								<tr>
									<th>Name</th>
									<th>Mobile</th>
									<th>Email</th>
									<th>Permanent Address</th>
									<th>Temporary Address</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$res = mysqli_query($con, "SELECT * FROM persons");
									while($row = mysqli_fetch_array($res)){
										echo '<tr id="'.$row['ID'].'">
												<td>'.$row['Name'].'</td>
												<td>'.$row['Mobile'].'</td>
												<td>'.$row['Email'].'</td>
												<td style="word-wrap:break-word;">'.$row['Permanant_Address'].'</td>
												<td>'.$row['Temporary_Address'].'</td>
												<td><button class="btn btn-danger" id="'.$row['ID'].'">Remove</button></td>
											</tr>';				
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
            </div>
		</div>
		<script type="text/javascript" src="../../js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
				//reset btn
				$('.btn-danger').click(function(){
					$('#res').text('');
					$('#updateRes').text('');
				});
				//delete a person
				$("button").click(function(event){
					var id = event.target.id;					
					if($.isNumeric(id)){
						if(confirm("Are sure to delete this person?")){
							$.ajax({
						        url: 'tasks/delete/',
						        type: 'POST',
						        data: 'id='+id,
						        async: false,
						        success: function (data){
									var objID = '#' + id;
									$('#deleteRes').html(data);
									$(objID).hide(500);
									setTimeout(function(){ $('#deleteRes').text(''); }, 2000);
						        },
						    });		
						}
					}
					return false;
				}); 	
			});
		</script>
	</body>
</html>
