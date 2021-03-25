<?php
require_once('../../../../../admin/cn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pwd = md5(test_input($_POST["pwd"]));
  $email = test_input($_POST["corr"]);

  $sql = "UPDATE user SET pwd='".$pwd."' WHERE email='".$email."'";

  if ($conn->query($sql) === TRUE) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Contraseña guardada exitosamente')
      window.location.href='../../../../../sign-in/';
      </SCRIPT>");
  } else {
      echo "Error updating record: " . $conn->error;
  }

}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>

    window.location.href='../../../';
    </SCRIPT>");
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
