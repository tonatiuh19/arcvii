<?php
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
            include("newuser.php");

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
	<script
	  src="https://code.jquery.com/jquery-3.4.1.js"
	  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	<script src="js/msdropdown/jquery.dd.js" type="text/javascript"></script>
	<script src="js/msdropdown/jquery.dd.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />
</head>

<body class="text-center">
    <div class="card text-center">
    <div class="card-header bg-dark">
      <a href="../"><img src="../../../img/logo.png" class="img-fluid" alt="Responsive image"></a>
    </div>
    <div class="card-body">
      <div class="container">
          <div class="row">
              <div class="col-sm-6">
                <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">El talento es prioridad</h5>
                      <small>&nbsp;</small>
                    </div>
                    <p class="mb-1">Red amplia de ingenio que te permitirá estar al tanto de cada fase del proyecto asi como pagar el precio justo y necesario para tu necesidad.</p>
                    <small>&nbsp;</small>
                  </a>
                  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Administración total</h5>
                      <small>&nbsp;</small>
                    </div>
                    <p class="mb-1">Síentete con la libertad de decidir, coordinar y organizar tu proyecto con el completo acompañamiento y soporte de nuestro equipo.</p>
                    <small>&nbsp;</small>
                  </a>
                  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">¡Tu negocio puede crecer!</h5>
                      <small>&nbsp;</small>
                    </div>
                    <p class="mb-1">Amplia tus canales, mercados y productos con freelancers. Genera contenido que mantenga a tus clientes interesados en tu marca ¡y mucho más!</p>
                    <small>&nbsp;</small>
                  </a>
                </div>
              </div>
              <div class="col-sm-6">
                 <form class="f" action="#" method="post">
									<div class="alert alert-danger alert-dismissible fade show" id="validEmail" style="display:none;">
 									  Ingresa un correo valido.
 									</div>
                  <input type="email" id="inputEmail" name="inputEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="Correo Electronico" onkeyup="checkEmail(); return false;" required autofocus>
                  <br>
                  <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                  <input type="text" name="lastname" class="form-control" placeholder="Apellido" required>
                  <br>
                  <label for="inputPassword" class="sr-only">Password</label>
                  <input type="password" name="inputPassword1" id="password1" class="form-control" placeholder="Contraseña" ng-model="password.password" ng-required="true" id="password-to-verify" required>
                  <input type="password" name="pwd" id="password2" class="form-control" placeholder="Repetir Contraseña" required>
                  <br>
									<div class="alert alert-danger alert-dismissible fade show" id="validPhone" style="display:none;">
 									  Ingresa un numero de telefono valido.
 									</div>
									<div class="input-group mb-3">
									  <div class="input-group-prepend">
											<select name="webmenu" id="webmenu" class="custom-select" style="width:70px;">
										    <option value="+52" data-image="img/flag-mex.png"></option>
												<option value="+1" data-image="img/flag-usa.png"></option>
												<option value="+1" data-image="img/flag-canada.png"></option>
												<option value="" >Otro</option>

										  </select>
									  </div>
									  <!--<input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Telefono (Diez digitos)">-->
										<input type="text" name="phone" id="phone" class="form-control" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" onkeyup="check(); return false;" placeholder="Telefono (Diez digitos)" required>
									</div>

                  <!--<input type="text" name="phone" id="phone" class="form-control" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" onkeyup="check(); return false;" placeholder="Telefono (+520000000000)" required>-->
                  <br>
                  <input type="submit" value="Registrarme" class="btn btn-lg btn-primary btn-block" type="submit" name="post">
                  <input type="hidden" id="token" name="token">
                  <small>Al registrarme acepto <a href="arcvii.com/terms.html" target="_blank">Terminos y Condiciones</a></small>
                </form>
              </div>
          </div>
      </div>
    </div>
    <div class="card-footer text-muted">
      ¿Ya estas registrado? <a href="../sign-in/">Ingresa</a>
    </div>
  </div>
	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '523236744973362');
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1"
src="https://www.facebook.com/tr?id=523236744973362&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
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
	$('#validEmail').hide();
	$('#validPhone').hide();

	function check()
	{

    var pass1 = document.getElementById('phone');


    var message = document.getElementById('validPhone');

   var goodColor = "#0C6";
    var badColor = "#FF9B37";

    /*if(pass1.value.length!=10){

        //pass1.style.backgroundColor = badColor;
        $('#validPhone').show();
    }else{
			$('#validPhone').hide();
			return true;
		}*/
	}
	function checkEmail()
	{

    var pass1 = document.getElementById('inputEmail');


    var message = document.getElementById('validEmail');

   var goodColor = "#0C6";
    var badColor = "#FF9B37";

    /*if(pass1.value.length!=10){

        //pass1.style.backgroundColor = badColor;
        $('#validEmail').show();
    }else{
			$('#validEmail').hide();
		}*/
	}
</script>
<script>
  grecaptcha.ready(function() {
      grecaptcha.execute('6LfDmMsUAAAAAC9l-8T9jzJ_QSus-EIY12vnzvOj', {action: 'homepage'}).then(function(token) {
         //console.log(token);
         document.getElementById("token").value = token;
      });
  });
</script>
<script language="javascript">
$(document).ready(function(e) {
try {
$("body select").msDropDown();
} catch(e) {
alert(e.message);
}
});
</script>

</html>
