<?php
// define variables and set to empty values
session_start();
require_once('../../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 $titulo = test_input($_POST["title"]);
	 $precio = test_input($_POST["price"]);
	 $tipo = test_input($_POST["type"]);
	 $description = test_input($_POST["description"]);
	 $_SESSION['email'];

	$sql = "INSERT INTO projects (id_project_type, titulo, descripcion, precio, email_user)
						VALUES ('".$tipo."', '".$titulo."', '".$description."', '".$precio."','".$_SESSION['email']."')";
	if ($conn->query($sql) === TRUE) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='../../';
    </SCRIPT>");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();

}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='../';
    </SCRIPT>");
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
