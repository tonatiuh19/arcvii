<?php
// define variables and set to empty values
session_start();
require_once('../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $id = test_input($_POST["project"]);
 $projectid = test_input($_POST["projectid"]);
 $email = test_input($_POST["email"]);
 $today = date("Y-m-d H:i:s");
 $status = 2;

 $sql = "UPDATE projects_candidates SET status=3 WHERE id=".$id."";

if ($conn->query($sql) === TRUE) {
  echo ("<SCRIPT LANGUAGE='JavaScript'>

    window.location.href='../';
    </SCRIPT>");
} else {
    echo "Error updating record: " . $conn->error;
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


$sql2 = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

?>