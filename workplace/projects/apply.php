<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';
// define variables and set to empty values
session_start();
require_once('../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $id_viaje = test_input($_POST["project"]);
 $email = test_input($_POST["email"]);
 $msg_apply = test_input($_POST["message_apply"]);
 $today = date("Y-m-d H:i:s");
 $validate = False;


 $sql3 = "SELECT email_user FROM portfolio WHERE email_user='".$_SESSION["email"]."'";
  $result3 = $conn->query($sql3);

  if ($result3->num_rows > 0) {
      $validate = True;
  } else {
      $validate = False;
  }

if ($validate) {
  $sql = "INSERT INTO projects_candidates (id_project, email_user, status, date)
  VALUES ('".$id_viaje."', '".$_SESSION["email"]."', '0', '".$today."')";

  if ($conn->query($sql) === TRUE) {
     $sql2 = "SELECT email_user FROM projects WHERE id=".$id_viaje." ";
     $result2 = $conn->query($sql2);

     if ($result2->num_rows > 0) {
         // output data of each row
         while($row2 = $result2->fetch_assoc()) {
             $mail_i=$row2["email_user"];
             $sql5 = "SELECT id FROM projects_candidates WHERE status=0 and email_user='".$_SESSION["email"]."' and id_project='".$id_viaje."'";
            $result5 = $conn->query($sql5);

            if ($result5->num_rows > 0) {
                // output data of each row
                while($row5 = $result5->fetch_assoc()) {
                  $sql = "INSERT INTO projects_candidates_messages (id_projects_candidates, message)
                  VALUES ('".$row5["id"]."', '".$msg_apply."')";

                  if ($conn->query($sql) === TRUE) {
                    //echo "New record created successfully";
                  } else {
                    //echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                }
            } else {
                echo "0 results";
            }
         }
     } else {
         echo "0 results";
     }
    $body = "Tienes una solicitud nueva en uno de tus proyectos. Ingresa a tu dashboard para aceptarla.";
    $subject = "Solicitud nueva proyecto arcvii";
    $setFrom = "Proyectos arcvii";
    mailer($mail_i, $body, $subject, $setFrom, $conn);
    echo ("<SCRIPT LANGUAGE='JavaScript'>

      window.location.href='../projects/';
      </SCRIPT>");
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}else{
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Llena tu portfolio para poder aplicar.')
    window.location.href='../portfolio/';
    </SCRIPT>");
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

function mailer($mail_i, $body, $subject, $setFrom, $conn){

  $sql = "SELECT nombre, apellido FROM user WHERE email='".$mail_i."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $name = $row["nombre"];
      }
  } else {
      echo "0 results";
  }
  $mail = new PHPMailer(true);

  try {
      //Server settings
     $mail->SMTPDebug = 2;                                       // Enable verbose debug output
     // $mail->isSMTP();                                            // Set mailer to use SMTP
      $mail->Host       = 'mail.arcvii.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'fg@arcvii.com';                     // SMTP username
      $mail->Password   = 'tonatiuh19';                               // SMTP password
      $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
      $mail->Port       = 469;                                    // TCP port to connect to


      //Recipients
      $mail->setFrom('noreply@arcvii.com', $setFrom);
      $mail->addAddress(''.$mail_i.'', ''.$name.'');     // Add a recipient

      $mail->addReplyTo('dihola@arcvii.com', 'Information');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');

      // Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    = '<p>¡Hola '.$name.'!</p> <p>'.$body.'<br><br>Equipo arcvii. <br>dihola@arcvii.com</p>';
      $mail->AltBody = 'Bienvenido';

      $mail->send();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}


?>
