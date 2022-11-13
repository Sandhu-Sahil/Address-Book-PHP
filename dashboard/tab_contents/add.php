<?php
	include('../include/db.php');
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
	                        <li role="presentation" class="active"><a href="/Address-Book/address-book/dashboard/tab_contents/add.php">Add</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/tab_contents/update.php">Update</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/tab_contents/view.php">View All</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/logout/" aria-controls="logout">Logout</a></li>
	                    </ul>
	                    <div class="tab-content">
							<div class="container">
								<div class="row">
									<div class="col-sm-2"></div>
									<div class="col-sm-6">		
										<form class="form-vertical" role="form" id="addPersonForm">
											<p class="text-center" id="res"></p>
											<div class="row">
												<div class="col-sm-4">
													<label>First Name</label>
												</div>
												<div class="form-group col-sm-6">							        		
													<input type="text" class="form-control" name="fn" id="fn" autocomplete="off" />
												</div>
												<div class="col-sm-3"></div>
											</div>
											<div class="row">
												<div class="col-sm-4">
													<label>Last Name</label>
												</div>
												<div class="form-group col-sm-6">							        		
													<input type="text" class="form-control" name="ln" id="ln" autocomplete="off" />
												</div>
												<div class="col-sm-3"></div>
											</div>
											<div class="row">
												<div class="col-sm-4">
													<label>Mobile</label>
												</div>
												<div class="form-group col-sm-6">							        		
													<input type="text" class="form-control" name="mobile" id="mobile" autocomplete="off" />
												</div>
												<div class="col-sm-3"></div>
											</div>
											<div class="row">
												<div class="col-sm-4">
													<label>Email</label>
												</div>
												<div class="form-group col-sm-6">							        		
													<input type="email" class="form-control" name="email" id="email" autocomplete="off" />
												</div>
												<div class="col-sm-3"></div>
											</div>	
											<div class="row">
												<div class="col-sm-4">
													<label>Permanant Address</label>
												</div>
												<div class="form-group col-sm-6">							        		
													<textarea maxlength="250" class="form-control" name="permanant" id="permanant" autocomplete="off"></textarea>
												</div>
												<div class="col-sm-3"></div>
											</div>	
											<div class="row">
												<div class="col-sm-4">
													<label>Temporary Address</label>
												</div>
												<div class="form-group col-sm-6">							        		
													<textarea maxlength="250" class="form-control" name="temporary" id="temporary" autocomplete="off"></textarea>
												</div>
												<div class="col-sm-3"></div>
											</div>
											<div class="row">
												<div class="col-sm-4">
												</div>
												<div class="col-sm-3">
													<input type="submit" class="btn btn-success" value="Add" id="addBtn" />						        			
												</div>
												<div class="col-sm-3">
													<input type="reset" class="btn btn-danger" value="Reset" id="resetBtn" />
												</div>						        		
											</div>
										</form>	 
									</div>
									<div class="col-sm-2"></div>
								</div>
							</div>
						</div>
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
				//add
				$('#addPersonForm').submit(function(){
					var formData = new FormData($(this)[0]);
					$.ajax({
				        url: 'tasks/add/',
				        type: 'POST',
				        data: formData,
				        async: true,
				        success: function (data){
				            $('#res').html(data);				            
				        },
				        cache: false,
				        contentType: false,
				        processData: false
				    });
					$(this)[0].reset();			
					return false;
				});  	
			});
		</script>
	</body>
</html>
