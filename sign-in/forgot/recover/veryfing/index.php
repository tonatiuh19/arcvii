<?php
require_once('../../../../admin/cn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $code = test_input($_POST["code"]);
  $email = test_input($_POST["email"]);

  $sql = "SELECT code FROM user_code WHERE email_user='".$email."' and code='".$code."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {


  } else {

    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Codigo Invalido')
      window.location.href='../../../../sign-in/';
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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <!--<a class="navbar-brand" href="#"><img src="../img/logo.png" class="img-responsive" style="width:18%"></a>-->
			<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../"><img src="../../../../img/logo.png" class="img-responsive" style="width:18%"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


    </nav>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3"><i class="fas fa-key"></i> Recuperar contraseña</h1><br>
          <form action="update/" method="post">
            <?php
            $y = "again";
          echo '
            <div class="form-group">
              <label for="exampleInputEmail1">Ingrsa la nueva contraseña:</label>
              <input type="password" name="inputPassword1" id="password1" class="form-control" placeholder="Contraseña" ng-model="password.password" ng-required="true" required>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Vuelve a ingresar la contraseña:</label>
              <input type="password" name="pwd" id="password2" class="form-control" placeholder="Repetir Contraseña" required>
              <input type="hidden" name="corr" class="form-control" value="'.$email.'" required>

            </div>

            <button type="submit" class="btn btn-primary">Reiniciar contraseña</button><br></form>';

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
    <script type="text/javascript">
      var password1 = document.getElementById('password1');
      var password2 = document.getElementById('password2');

      var checkPasswordValidity = function() {
          if (password1.value != password2.value) {
              password1.setCustomValidity('Las contraseñas deben coincidir.');
          } else {
              password1.setCustomValidity('');
          }
      };

      password1.addEventListener('change', checkPasswordValidity, false);
      password2.addEventListener('change', checkPasswordValidity, false);
    </script>
  </body>
</html>
