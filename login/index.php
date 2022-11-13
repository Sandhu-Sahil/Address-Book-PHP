<?php
	session_start();
	include('../include/db.php');
	$username = trim($_POST['username']);		
	$password = md5($_POST['password']);
	if(strlen($username) > 0 && strlen(trim($_POST['password'])) > 0){
		$check = mysqli_query($con, "SELECT * FROM users WHERE Username='$username' AND Password='$password' ");
		if(mysqli_num_rows($check)==1){
			//fetch details				
			$row = mysqli_fetch_assoc($check);
			$_SESSION['UID'] = $row['ID'];
			$_SESSION['First_Name'] = $row['First_Name'];
			$_SESSION['Last_Name'] = $row['Last_Name'];
			$_SESSION['Username'] = $row['Username'];
			$_SESSION['Last_Login'] = $row['Last_Login'];
			if($_SESSION['Last_Login']==""){
				$_SESSION['Last_Login'] = "Never";
			}
			//last login update
			$dateTime = date('d F Y h:i A');
			mysqli_query($con, "UPDATE users SET Last_Login='$dateTime' WHERE Username='$username' ");
			//success
			echo '<p style="color: #4F8A10;font-weight: bold;">Login Successful. Redirecting...</p>';				
		}
		else{				
			echo '<p style="color: #D8000C;font-weight: bold;">Invalid Credentials.</p>';
		}	
	}
	else{
		echo '<p style="color: #D8000C;font-weight: bold;">Please Fill All The Details.</p>';
	}
?>