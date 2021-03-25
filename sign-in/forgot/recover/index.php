<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';
require_once('../../../admin/cn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);


  $sql = "SELECT email FROM user WHERE email='".$email."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $sql2 = "SELECT code FROM user_code WHERE email_user='".$email."'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
      $x = rand(12345,99999);
      $sql3 = "UPDATE user_code SET code='$x' WHERE email_user='".$email."'";

      if ($conn->query($sql3) === TRUE) {
        //echo "Record updated successfullyU";
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
            $mail->setFrom('noreply@arcvii.com', 'Recuperar contrasena arcvii');
            $mail->addAddress(''.$email.'', ''.$email.'');     // Add a recipient

            //$mail->addReplyTo('dihola@arcvii.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'El codigo para recuperar se encuentra a continuacion';
            $mail->Body    = '<p>Codigo: <b>'.$x.'</b></p> <br>Equipo arcvii. <br>dihola@arcvii.com</p>';
            $mail->AltBody = 'Recuperacion';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      } else {
        echo "Error updating record: " . $conn->error;
      }

    } else {
      $x = rand(12345,99999);
      $sql4 = "INSERT INTO user_code (code, email_user) VALUES ('$x', '".$email."')";

      if ($conn->query($sql4) === TRUE) {
          echo "New record created successfullyI";
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
              $mail->setFrom('noreply@arcvii.com', 'Recuperar contrasena arcvii');
              $mail->addAddress(''.$email.'', ''.$email.'');     // Add a recipient

              //$mail->addReplyTo('dihola@arcvii.com', 'Information');
              //$mail->addCC('cc@example.com');
              //$mail->addBCC('bcc@example.com');

              // Attachments
              //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
              //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

              // Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = 'El codigo para recuperar se encuentra a continuacion';
              $mail->Body    = '<p>Codigo: <b>'.$x.'</b></p> <br>Equipo arcvii. <br>dihola@arcvii.com</p>';
              $mail->AltBody = 'Recuperacion';

              $mail->send();
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
      } else {
          /*echo "aqui";
          echo "Error: " . $sql4 . "<br>" . $conn->error;*/
      }

    }

  } else {

    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Usuario Invalido')
      window.location.href='../../../sign-in/';
      </SCRIPT>");
  }



}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>

    window.location.href='../../';
    </SCRIPT>");
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>arcvii</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <!--<a class="navbar-brand" href="#"><img src="../img/logo.png" class="img-responsive" style="width:18%"></a>-->
			<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../"><img src="../../../img/logo.png" class="img-responsive" style="width:18%"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


    </nav>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3"><i class="fas fa-key"></i> Recuperar contraseña</h1><br>
          <form action="veryfing/" method="post">
            <?php
            $y = "again";
          echo '
            <div class="form-group">
              <label for="exampleInputEmail1">Ingresa el codigo que enviamos a tu correo:</label>
              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="code" placeholder="XXXXX" required>
              <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$email.'" name="email">
              <small id="emailHelp" class="form-text text-muted">Revisa tu bandeja de entrada o carpeta de spam.</small>
            </div>

            <button type="submit" class="btn btn-primary">Reiniciar contraseña</button><br></form>';
            echo "<a href=\"javascript:document.getElementById('portfolio".$y."').submit();\" class=\"btn btn-link\">Vovler a enviar</a>\n";

            echo "<form action=\"../recover/\" id=\"portfolio".$y."\" method=\"post\">\n";
            echo "  <input type=\"hidden\"  name=\"email\" value=\"".$email."\">\n";
            echo "</form>\n";
            ?>


        </div>
      </div>



    </main>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; arcvii 2020</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">

              <li class="list-inline-item">
                <a href="#" target="_blank">
                  <i class="fab fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">

              <li class="list-inline-item">
                <a href="https://arcvii.com/terms.html">Terminos de uso</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
