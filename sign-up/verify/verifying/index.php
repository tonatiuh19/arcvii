<?php
require_once('../../../admin/cn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $code = test_input($_POST["code"]);
  $email = test_input($_POST["project"]);

  $sql = "SELECT a.type, b.code FROM user as a LEFT JOIN user_code as b on a.email=b.email_user WHERE a.email='".$email."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          if ($row["code"]==$code) {
            $sql2 = "UPDATE user SET active='1' WHERE email='".$email."'";

            if ($conn->query($sql2) === TRUE) {
              if ($row["type"]==2) {
                echo "a dash";
                $_SESSION["email"] =	$email;
                $_SESSION["type_user"] =	$row["type"];
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                            window.location.href='../../../dashboard/';
                            </SCRIPT>");
              }else if ($row["type"]==3) {
                echo "a work";
                $_SESSION["email"] =	$email;
                $_SESSION["type_user"] =	$row["type"];
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                            window.location.href='../../../workplace/';
                            </SCRIPT>");
              }
            } else {
                echo "Error updating record: " . $conn->error;
            }

          }else{
            //echo "aqui";
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.location.href='../sorry/';
                        </SCRIPT>");
          }
      }
  } else {
      echo "no entre";
  }


}else{
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='../../../sign-in/';
    </SCRIPT>");
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
