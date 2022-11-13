<?php
	include('../../../../include/db.php');
	$email = $_POST['email'];
	$res = mysqli_query($con, "SELECT * FROM persons WHERE Email='$email' ");
	$array = mysqli_fetch_row($res);
	echo json_encode($array);
?>