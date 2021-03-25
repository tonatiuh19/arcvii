<?php
session_start();
require_once('../../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $experience = test_input($_POST["description"]);
 $skills = test_input($_POST["skills"]);
 $education = test_input($_POST["education"]);

 $mail = $_SESSION["email"];

  $sql = "UPDATE portfolio SET descripcion='".$experience."', educacion='".$education."', skills='".$skills."' WHERE email_user='".$mail."'";

    if ($conn->query($sql) === TRUE) {
      $_SESSION["email"] =  $mail;
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
                  window.location.href='../';
                  </SCRIPT>");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

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
