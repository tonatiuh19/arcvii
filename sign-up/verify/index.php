<?php
session_start();
require_once('../../admin/cn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["project"]);
  $type = test_input($_POST["type"]);

}else{
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='../../sign-in/';
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
    <link href="signin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
  </head>

  <body class="text-center bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
              <form class="form-signin" action="verifying/" method="post">
                  <img class="mb-4" src="../../../img/logo2.png" alt="" width="" height="72">
                  <h1 class="h3 mb-3 font-weight-normal">Verificar cuenta</h1>

                  <br>
                  <h5>Codigo enviado a tu correo:</h5>
                  <p>Cuenta: <?php echo $email; ?></p>
                  <input type="text" name="code" id="password1" class="form-control" placeholder="XXXXX" ng-model="password.password" ng-required="true" required>
                  <?php echo "  <input type=\"hidden\"  name=\"project\" value=\"".$email."\">\n";
                  echo "  <input type=\"hidden\"  name=\"type\" value=\"".$type."\">\n";?>
                  <br>

                  <input type="submit" value="Validar" class="btn btn-lg btn-primary btn-block" type="submit" name="post">

                </form></div>
            <div class="col-sm-12">    <?php
                echo " <small><a href=\"javascript:document.getElementById('admin').submit();\">Enviar de nuevo</a></small> \n";
                //echo " <a data-toggle=\"modal\" class=\"btn btn-primary btn-sm\" href=\"#\"><i class=\"fas fa-comment-dots\"></i></a> \n";
                //echo " <a data-toggle=\"modal\" class=\"btn btn-success btn-sm\" href=\"#\">Finalizar</a><p></p>\n";
                echo "<form action=\"request/\" id=\"admin\" method=\"post\">\n";
                echo "  <input type=\"hidden\"  name=\"project\" value=\"".$email."\">\n";
                echo "</form>\n";
                echo " <small><a href=\"../../fin.php\">Cerrar Sesión</a></small> \n";
                 ?>
                 <br>


                 <p class="mt-5 mb-3 text-muted">&copy; 2020</p></div>
        </div>
    </div>



  </body>


</html>
