<?php
	include('../../../../include/db.php');	
	$fn = trim($_POST['fn']);
	$ln = trim($_POST['ln']);		
	$name = $fn.' '.$ln;
	$mobile = trim($_POST['mobile']);		
	$email = trim($_POST['email']);
	$permanant = trim($_POST['permanant']);
	$temporary = trim($_POST['temporary']);
	if(strlen($fn) > 0 && strlen($ln) > 0 && strlen($mobile) > 0 && strlen($email) > 0 && strlen($permanant) > 0 && strlen($temporary) > 0){
		//if person is already added
		$check = mysqli_query($con, "SELECT * FROM persons WHERE Email='$email' ");
		if(mysqli_num_rows($check)==1){
			echo '<p style="color: #9F6000;font-weight: bold;">This person is already added.</p>';
		}
		else{
			mysqli_query($con, "INSERT INTO persons(Name,Mobile,Email,Permanant_Address,Temporary_Address) VALUES('$name','$mobile','$email','$permanant','$temporary') ");
			if(mysqli_error($con)==""){
				echo '<p style="color: #4F8A10;font-weight: bold;">Person Added Successfully!</p>';
			}
			else{
				echo '<p style="color: #D8000C;font-weight: bold;">Something Went Wrong, Try Again.</p>';
			}
		}	
	}
	else{
		echo '<p style="color: #D8000C;font-weight: bold;">Please Fill All The Details.</p>';
	}					
?>