<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';
session_start();
require_once('../../admin/cn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $mail_i = test_input($_POST["inputEmail"]);
 $name = test_input($_POST["name"]);
 $lastname = test_input($_POST["lastname"]);
 $pwd = md5(test_input($_POST["pwd"]));
 $phone = test_input($_POST["phone"]);
 $today = date("Y-m-d H:i:s");

 $sql = "SELECT email FROM user where email='$mail_i'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('¡Este usuario ya existe!')
      window.location.href='../';
      </SCRIPT>");

} else {
    $sql = "INSERT INTO user (email, nombre, apellido, pwd, telefono, type, date_created)
    VALUES ('$mail_i', '$name', '$lastname', '$pwd', '$phone', '2', '$today')";

    if ($conn->query($sql) === TRUE) {
        $x = rand(12345,99999);
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
            $mail->setFrom('noreply@arcvii.com', 'Bienvenido a arcvii');
            $mail->addAddress(''.$mail_i.'', ''.$name.'');     // Add a recipient

            $mail->addReplyTo('dihola@arcvii.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tu cuenta ha sido creada';
            $mail->Body    = '<p>¡Hola '.$name.'!</p> <p>Bienvenido a la plataforma donde tus sueños pueden hacerse realidad. <p>Para empezar a usar tu cuenta es necesario activarla con el siguiente codigo: <b>'.$x.'</b></p>Te mandamos un abrazo. Cualquier cosa estamos para servirte.</p> <p>Saludos cordiales.<br>Equipo arcvii. <br>dihola@arcvii.com</p>';
            $mail->AltBody = 'Bienvenido';

            $mail->send();

            $_SESSION["email"] =	$mail_i;
            $_SESSION["type_user"] =	2;
            /*echo "<form action=\"../../sign-up/verify/\" id=\"my_form\" method=\"post\">\n";
            echo "  <input type=\"hidden\" name=\"project\" value=\"".$email."\">\n";
            echo "  <input type=\"hidden\" name=\"type\" value=\"2\">\n";
            echo "<input type='submit' name='btnSignIn' value='Sending...' id='btnSignIn' />\n";
            echo "</form>\n";
            echo "<script type=\"text/javascript\">\n";
            echo "    document.getElementById('btnSignIn').click();\n";
            echo "</script>\n";*/
            $sql7 = "INSERT INTO user_code (code, email_user) VALUES ('$x', '".$mail_i."')";

                    if (mysqli_query($conn, $sql7)) {
                      echo ("<SCRIPT LANGUAGE='JavaScript'>
                                  window.location.href='../../dashboard/';
                                  </SCRIPT>");
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }


        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}/**/
  $conn->close();

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


?>
