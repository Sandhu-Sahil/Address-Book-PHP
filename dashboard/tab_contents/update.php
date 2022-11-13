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
	                        <li role="presentation" class="active"><a href="/Address-Book/address-book/dashboard/tab_contents/update.php">Update</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/tab_contents/view.php">View All</a></li>
	                        <li role="presentation"><a href="/Address-Book/address-book/dashboard/logout/" aria-controls="logout">Logout</a></li>
	                    </ul>
						<div class="container">
							<div class="row">
								<div class="col-sm-2"></div>
								<div class="col-sm-6">
									<form class="form-vertical" role="form" id="updatePersonForm">
										<p class="text-center" id="updateRes"></p>
										<?php
											$fetch = mysqli_query($con,"SELECT * FROM persons");
											if(mysqli_num_rows($fetch)<=0){
												echo '<h3 class="text-center font">No Records Found.</h3>';
											}
											else{
										?>
										<div class="row">
											<div class="col-sm-4">
												<label>Select Person</label>
											</div>
											<div class="form-group col-sm-6">							        		
												<select class="form-control" id="pemail" name="email">
													<option value=0>Choose...</option>
													<?php 	    				    		
														while($row = mysqli_fetch_array($fetch)){
															echo '<option value="'.$row['Email'].'">'.$row['Email'].'</option>';
														}
													?>
												</select>
											</div>
											<div class="col-sm-3"></div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<label>First Name</label>
											</div>
											<div class="form-group col-sm-6">							        		
												<input type="text" class="form-control" name="updatefn" id="updatefn" autocomplete="off" />
											</div>
											<div class="col-sm-3"></div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<label>Last Name</label>
											</div>
											<div class="form-group col-sm-6">							        		
												<input type="text" class="form-control" name="updateln" id="updateln" autocomplete="off" />
											</div>
											<div class="col-sm-3"></div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<label>Mobile</label>
											</div>
											<div class="form-group col-sm-6">							        		
												<input type="text" class="form-control" name="updatemobile" id="updatemobile" autocomplete="off" />
											</div>
											<div class="col-sm-3"></div>
										</div>	
										<div class="row">
											<div class="col-sm-4">
												<label>Permanant Address</label>
											</div>
											<div class="form-group col-sm-6">							        		
												<textarea maxlength="250" class="form-control" name="updatepermanant" id="updatepermanant" autocomplete="off"></textarea>
											</div>
											<div class="col-sm-3"></div>
										</div>	
										<div class="row">
											<div class="col-sm-4">
												<label>Temporary Address</label>
											</div>
											<div class="form-group col-sm-6">							        		
												<textarea maxlength="250" class="form-control" name="updatetemporary" id="updatetemporary" autocomplete="off"></textarea>
											</div>
											<div class="col-sm-3"></div>
										</div>
										<div class="row">
											<div class="col-sm-4">
											</div>
											<div class="col-sm-3">
												<input type="submit" class="btn btn-success" value="Update" id="updateBtn" />						        			
											</div>
											<div class="col-sm-3">
												<input type="reset" class="btn btn-danger" value="Reset" id="resetBtn" />
											</div>						        		
										</div>
										<?php } ?>
									</form>	 
								</div>
								<div class="col-sm-2"></div>
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
				//update
				//get previous data
				$('#pemail').change(function(){
					var pemail = $(this).val();
					if(pemail!=0){
						var dataString = 'email='+pemail;
						$.ajax({
					        url: 'tasks/update/fetch.php',
					        type: 'POST',
					        dataType: 'json',
					        data: dataString,
					        async: false,
					        success: function (data){
					        	var name = data[1].split(' ');
					        	var mobile = data[2];
					        	var permanant = data[4];
					        	var temporary = data[5];
					            $('#updatefn').val(name[0]);
					            $('#updateln').val(name[1]);
					            $('#updatemobile').val(mobile);
					            $('#updatepermanant').val(permanant);
					            $('#updatetemporary').val(temporary);
					        },
					    });					    
					}
					return false;
				});
				//update the data
				$('#updatePersonForm').submit(function(){
					var formData = new FormData($(this)[0]);
					$.ajax({
				        url: 'tasks/update/',
				        type: 'POST',
				        data: formData,
				        async: true,
				        success: function (data){
				            $('#updateRes').html(data);				            
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