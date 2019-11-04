<?php
// define variables and set to empty values
session_start();
require_once('../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $id_viaje = test_input($_POST["project"]);
 $email = test_input($_POST["email"]);
 $today = date("Y-m-d H:i:s");

 $sql = "INSERT INTO projects_candidates (id_project, email_user, status, date)
 VALUES ('".$id_viaje."', '".$_SESSION["email"]."', '0', '".$today."')";

 if ($conn->query($sql) === TRUE) {
   echo ("<SCRIPT LANGUAGE='JavaScript'>

     window.location.href='../projects/';
     </SCRIPT>");
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }



}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>

    window.location.href='../projects/';
    </SCRIPT>");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
