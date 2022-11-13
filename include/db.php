<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
	$dbname = "address-book-main";

    // Create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
		echo "testing connection 2 fail";
    }
	// $servername = "localhost";
	// $username = "root";
	// $password = "";

	// // Create connection
	// $conn = mysqli_connect($servername, $username, $password);

	// // Check connection
	// if (!$conn) {
	// 	die("Connection failed: " . mysqli_connect_error());
	// 	echo "testing connection 2 ";
	// } else{
	// 	mysqli_select_db($con, "address-book");
	// }
	// $con = mysqli_connect("localhost",'root', '');
	// if(mysqli_connect_errno($con)){
	// 	echo "Error establishing database connection.". mysqli_connect_error();
	// 	exit();
	// }
	// else{
	// 	mysqli_select_db($con, "address-book");
	// }
?>