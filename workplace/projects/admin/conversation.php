<?php
require_once('../../../admin/cn.php');

/*$user = $_POST["user"];  where a.id_deliverable=".$row2["id"]."
$message = $_POST["message"];
$today = date("Y-m-d h:i:sa");*/
$idProject = $_POST["idProject"];

$sql = "SELECT id, email_user, message, id_project, date, b.nombre FROM conversation as a inner join user as b on a.email_user=b.email where a.id_project=".$idProject." order by a.date ASC ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<p class="alert alert-info"><strong>'.$row["nombre"].':</strong> '.$row["message"].'';
        echo '<br><code class="text-muted xx-small">'.$row["date"].'</code>';
        echo '</p>';
    }
} else {
  echo '<p class="alert alert-info"><strong>Aun no hay mensajes</strong>';
  echo '</p>';
}

//$conn->close();
 ?>
