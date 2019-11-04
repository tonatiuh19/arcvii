<?php
// define variables and set to empty values
session_start();
require_once('../../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 $titulo = test_input($_POST["titulo"]);
	 $precio = test_input($_POST["pago"]);
	 $date = test_input($_POST["date"]);
   $id = test_input($_POST["idProject"]);
   $idP = test_input($_POST["id"]);
	 $description = test_input($_POST["descripcion"]);
	 $_SESSION['email'];

    $sql = "UPDATE deliverables SET titulo='".$titulo."', descripcion='".$description."',deadline='".$date."', price='".$precio."' WHERE id=".$id."";

    if ($conn->query($sql) === TRUE) {
      echo "<form action=\"../\" id=\"my_form\" method=\"post\">\n";
      echo "  <input type=\"hidden\" name=\"project\" value=\"".$idP."\">\n";
      //echo "  <input type=\"hidden\" name=\"email\" value=\"".$viaje."\">\n";
      echo "<input type='submit' name='btnSignIn' value='Saving...' id='btnSignIn' />\n";
      echo "</form>\n";
      echo "<script type=\"text/javascript\">\n";
      echo "    document.getElementById('btnSignIn').click();\n";
      echo "</script>\n";
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
