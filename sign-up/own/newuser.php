<?php
session_start();
require_once('../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $mail = test_input($_POST["inputEmail"]);
 $name = test_input($_POST["name"]);
 $lastname = test_input($_POST["lastname"]);
 $pwd = test_input($_POST["pwd"]);
 $phone = test_input($_POST["phone"]);

 $sql = "SELECT email FROM user where email='$mail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('¡Este usuario ya existe!')
      window.location.href='../sign-up/';
      </SCRIPT>");    0
    ......
} else {
    $sql = "INSERT INTO user (email, nombre, apellido, pwd, telefono)
    VALUES ('$mail', '$name', '$lastname', '$pwd', '$phone')";

    if ($conn->query($sql) === TRUE) {
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
                  window.location.href='../dashboard/';
                  </SCRIPT>");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
  $conn->close();

}else{
	 echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href='../sign-up/';
      </SCRIPT>");
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>