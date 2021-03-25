<?php
require_once('../../../admin/cn.php');

$user = $_POST["user"];
$message = $_POST["message"];
$today = date("Y-m-d H:i:sa");
$idProject = $_POST["idProject"];

$sql = "INSERT INTO conversation (email_user, id_project, date, message)
VALUES ('$user', '$idProject', '$today','$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//$conn->close();
 ?>
