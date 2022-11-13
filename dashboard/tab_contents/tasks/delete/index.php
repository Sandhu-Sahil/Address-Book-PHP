<?php
	include('../../../../include/db.php');	
	$id = trim($_POST['id']);
	//delete him
	mysqli_query($con, "DELETE FROM persons WHERE ID='$id' ");
	if(mysqli_error($con)==""){
		echo '<p style="color: #4F8A10;font-weight: bold;">Person Removed Successfully!</p>';
	}
	else{
		echo '<p style="color: #D8000C;font-weight: bold;">Something Went Wrong, Try Again.</p>';
	}
?>