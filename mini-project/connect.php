<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$Contact_no = $_POST['Contact_no'];
	$Email_id = $_POST['email'];
	$Subject = $_POST['Subject'];
	$Description = $_POST['Description'];

	// Database connection
	$conn = new mysqli('localhost','root','','mproj_pcpf');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration_2(firstName, lastName, Contact_no, Email_id, Subject, Description) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $firstName, $lastName, $Contact_no, $Email_id, $Subject, $Description);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>