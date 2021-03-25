<?php
// define variables and set to empty values
session_start();
require_once('../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nombre = test_input($_POST["name"]);
	$apellido = test_input($_POST["last"]);
	$email = test_input($_POST["email"]);
	$pwd2 = test_input(md5($_POST["pwd2"]));
	$pwd = test_input(md5($_POST["pwd"]));
	$pwd_validate = test_input(md5($_POST["pwdSq"]));
	$telefono = test_input($_POST["phone"]);



	$sql3 = "SELECT pwd, email FROM user WHERE email='".$email."' and pwd='".$pwd_validate."'";
	$result3 = $conn->query($sql3);

	if ($result3->num_rows > 0) {
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

	} else {
		/*echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('La contraseña es incorrecta')
			window.location.href='../profile/';
			</SCRIPT>");*/
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
