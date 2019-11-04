<?php
// define variables and set to empty values
session_start();
require_once('../../../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 $titulo = test_input($_POST["title"]);
	 $precio = test_input($_POST["price"]);
	 $tipo = test_input($_POST["type"]);
   $id = test_input($_POST["idProject"]);
	 $description = test_input($_POST["description"]);
	 $_SESSION['email'];

   $sql = "UPDATE projects SET id_project_type='".$tipo."', titulo='".$titulo."', descripcion='".$description."', precio='".$precio."' WHERE id=".$id."";

   if ($conn->query($sql) === TRUE) {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
       window.location.href='../../';
       </SCRIPT>");
   } else {
       echo "Error updating record: " . $conn->error;
   }
	$conn->close();

}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='../../';
    </SCRIPT>");
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
