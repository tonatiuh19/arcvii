<?php
// define variables and set to empty values
session_start();
require_once('../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nombre = test_input($_POST["name"]);
	$apellido = test_input($_POST["last"]);
	$email = test_input($_POST["email"]);
	$pwd2 = test_input($_POST["pwd2"]);
	$pwd =  md5(test_input($_POST["pwd"]));
	$telefono = test_input($_POST["phone"]);

	if ($pwd=="") {
		$sql = "UPDATE user SET nombre='$nombre', apellido='$apellido', email='$email', telefono='$telefono' WHERE email='".$email."'";

		if ($conn->query($sql) === TRUE) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>

				window.location.href='../profile/';
				</SCRIPT>");
		} else {
		    echo "Error updating record: " . $conn->error;
		}
	}else{
		$sql = "UPDATE user SET nombre='$nombre', apellido='$apellido', email='$email', pwd='$pwd', telefono='$telefono' WHERE email='".$email."'";

		if ($conn->query($sql) === TRUE) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>

				window.location.href='../profile/';
				</SCRIPT>");
		} else {
		    echo "Error updating record: " . $conn->error;
		}
	}



	$conn->close();



}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>

		window.location.href='../profile/';
		</SCRIPT>");
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


?>
