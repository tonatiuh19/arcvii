<?php
session_start();
//require_once('../../admin/cn.php');
if (isset($_SESSION['email'])){
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='../dashboard/';
    </SCRIPT>");
}

if(isset($_POST['post'])) {
		// print_r($_POST);
		$url = "https://www.google.com/recaptcha/api/siteverify";
		$data = [
			'secret' => "6LfDmMsUAAAAAByYxebfzvCZB6fl21ou2m0PPsP3",
			'response' => $_POST['token'],
			// 'remoteip' => $_SERVER['REMOTE_ADDR']
		];
		$options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );
		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);
		$res = json_decode($response, true);
		if($res['success'] == true) {
			// Perform you logic here for ex:- save you data to database
  			/*echo '<div class="alert alert-success">
			  		<strong>Success!</strong> Your inquiry successfully submitted.
		 		  </div>';*/
          /*echo '  <script>
              changeRecord();
            </script>';*/
            include("login.php");

		} else {
			echo '<div class="alert alert-warning">
					  <strong>Error!</strong> You are not a human.
				  </div>';
		}
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
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  </head>

  <body class="text-center">
    <div class="card text-center">
      <div class="card-header bg-dark">
        <a href="../"><img src="../img/logo.png" class="img-fluid" alt="Responsive image"></a>
      </div>
      <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                  <!--<form class="form-signin" action="login.php" method="post" id="rec">-->
                  <form class="form-signin" action="login.php" method="post" id="myForm" name="myForm">
                    <a href="../"><img class="mb-4" src="../img/logo2.png" alt="" width="100" height="100"></a>
                    <h1 class="h3 mb-3 font-weight-normal">Inicia Sesión</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="mail" id="inputEmail" class="form-control" placeholder="Correo Electronico" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Contraseña" required>
                    <!--<div class="checkbox mb-3">
                      <label>
                        <input type="checkbox" value="remember-me"> Remember me
                      </label>
                    </div>-->
                    <input type="submit" value="Iniciar sesión" class="btn btn-lg btn-primary btn-block" type="submit" name="post">
                    <input type="hidden" id="token" name="token">
                    <p><a class="nav-link" href="forgot/">Olvide mi contraseña</a></p>
                    <p class="mt-5 mb-3 text-muted"><a href="../sign-up/">Regístrate</a></p>
                    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>

                  </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://www.google.com/recaptcha/api.js?render=6LfDmMsUAAAAAC9l-8T9jzJ_QSus-EIY12vnzvOj"></script>
  <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfDmMsUAAAAAC9l-8T9jzJ_QSus-EIY12vnzvOj', {action: 'homepage'}).then(function(token) {
           //console.log(token);
           document.getElementById("token").value = token;
        });
    });
  </script>
  <script>
  function changeRecord()
  {
    document.getElementById("myForm").action = "login.php";
  }
  </script>

</html>
