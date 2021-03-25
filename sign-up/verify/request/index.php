<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';
require_once('../../../admin/cn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["project"]);
  $x = rand(12345,99999);
  $sql = "UPDATE user_code SET code='$x' WHERE email_user='".$email."'";

  if (mysqli_query($conn, $sql)) {
    $sql2 = "SELECT code FROM user_code WHERE email_user='".$email."'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
      while($row2 = $result2->fetch_assoc()) {
          $code = $row2["code"];
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
          $mail->setFrom('noreply@arcvii.com', 'Activar cuenta arcvii');
          $mail->addAddress(''.$email.'', ''.$email.'');     // Add a recipient

          //$mail->addReplyTo('dihola@arcvii.com', 'Information');
          //$mail->addCC('cc@example.com');
          //$mail->addBCC('bcc@example.com');

          // Attachments
          //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'El codigo para activar tu cuenta se encuentra a continuacion';
          $mail->Body    = '<p>Codigo: <b>'.$code.'</b></p> <br>Equipo arcvii. <br>dihola@arcvii.com</p>';
          $mail->AltBody = 'Recuperacion';

          $mail->send();
          echo "<form action=\"../\" id=\"my_form\" method=\"post\">\n";
          echo "  <input type=\"hidden\" name=\"project\" value=\"".$email."\">\n";
          //echo "  <input type=\"hidden\" name=\"email\" value=\"".$viaje."\">\n";
          echo "<input type='submit' name='btnSignIn' value='Sending...' id='btnSignIn' />\n";
          echo "</form>\n";
          echo "<script type=\"text/javascript\">\n";
          echo "    document.getElementById('btnSignIn').click();\n";
          echo "</script>\n";
      } catch (Exception $e) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.location.href='../../../sign-in/';
          </SCRIPT>");
      }
    } else {
      $sql5 = "INSERT INTO user_code (code, email_user) VALUES ('$x', '".$email."')";

      if (mysqli_query($conn, $sql5)) {
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
            $mail->setFrom('noreply@arcvii.com', 'Activar cuenta arcvii');
            $mail->addAddress(''.$email.'', ''.$email.'');     // Add a recipient

            //$mail->addReplyTo('dihola@arcvii.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'El codigo para activar tu cuenta se encuentra a continuacion';
            $mail->Body    = '<p>Codigo: <b>'.$x.'</b></p> <br>Equipo arcvii. <br>dihola@arcvii.com</p>';
            $mail->AltBody = 'Recuperacion';

            $mail->send();
            echo "<form action=\"../\" id=\"my_form\" method=\"post\">\n";
            echo "  <input type=\"hidden\" name=\"project\" value=\"".$email."\">\n";
            //echo "  <input type=\"hidden\" name=\"email\" value=\"".$viaje."\">\n";
            echo "<input type='submit' name='btnSignIn' value='Sending...' id='btnSignIn' />\n";
            echo "</form>\n";
            echo "<script type=\"text/javascript\">\n";
            echo "    document.getElementById('btnSignIn').click();\n";
            echo "</script>\n";
        } catch (Exception $e) {
          echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.location.href='../../../sign-in/';
            </SCRIPT>");
        }
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  } else {

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
