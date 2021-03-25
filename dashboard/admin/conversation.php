<?php
require_once('../../admin/cn.php');

/*$user = $_POST["user"];  where a.id_deliverable=".$row2["id"]."
$message = $_POST["message"];
$today = date("Y-m-d h:i:sa");*/
$idProject = $_POST["idProject"];

$sql = "SELECT id, email_user, message, id_project, date, b.nombre FROM conversation as a inner join user as b on a.email_user=b.email where a.id_project=".$idProject." order by a.date ASC ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $text = $row["message"];
      $matches = array();
      $matches_mail = array();
      // returns all results in array $matches
      preg_match_all('/[0-9]{3}[\-][0-9]{7}|[0-9]{3}[\s][0-9]{7}|[0-9]{3}[\s][0-9]{3}[\s][0-9]{4}|[0-9]{10}|[0-9]{3}[\-][0-9]{3}[\-][0-9]{4}/', $text, $matches);
      $matches = $matches[0];

      $pattern = '/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/';
      preg_match_all($pattern, $text, $matches_mail);

      //var_dump($matches);
      if (count($matches) >= 1 ){
        echo '<p class="alert alert-info"><strong>'.$row["nombre"].':</strong> <b>Mensaje invalido</b>';
        echo '<br><code class="text-muted xx-small">'.$row["date"].'</code>';
        echo '</p>';
      }/*else if(count($matches_mail) >= 1){
        echo '<p class="alert alert-info"><strong>'.$row["nombre"].':</strong> <b>Mensaje invalido</b>';
        echo '<br><code class="text-muted xx-small">'.$row["date"].'</code>';
        echo '</p>';
      }*/
      else{
        echo '<p class="alert alert-info"><strong>'.$row["nombre"].':</strong> '.$row["message"].'';
        echo '<br><code class="text-muted xx-small">'.$row["date"].'</code>';
        echo '</p>';
      }

    }
} else {
  echo '<p class="alert alert-info"><strong>Aun no hay mensajes</strong>';
  echo '</p>';
}

//$conn->close();
 ?>
