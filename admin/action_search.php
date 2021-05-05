<?php
// define variables and set to empty values
session_start();
require_once('cn.php');

if (isset($_POST['query'])) {
	$inpText = $_POST['query'];
	$sql = "SELECT a.nombre, a.apellido FROM user as a WHERE a.active=1 and a.nombre LIKE '%$inpText%' LIMIT 5";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
  // output data of each row
		while($row = $result->fetch_assoc()) {
			echo '<a href="#" class="list-group-item list-group-item-action"><i class="fas fa-angle-right"></i> '.$row["nombre"].' <i class="fas fa-angle-right"></i> Diseñador/Arquitecto</a>';
		}
	} else {
		echo '<a href="#" class="list-group-item list-group-item-action"><i class="far fa-hand-point-right"></i> Ver directorio</a>';
	}
}
?>