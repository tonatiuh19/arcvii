<?php
session_start();
require_once('../admin/cn.php');
if (isset($_SESSION['email'])){

}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../sign-in/';
		</SCRIPT>");
}

?>
<!doctype html>
<html lang="en">
<head>
		<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../../../favicon.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<title>arcvii</title>
	<style type="text/css">
		hr.style5 {
			background-color: #fff;
			border-top: 2px dashed #8c8b8b;
		}
	</style>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>

</head>

<body>
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../"><img src="../img/logo.png" class="img-responsive" style="width:18%"></a>

		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="fin.php">Cerrar sesion</a>
			</li>
		</ul>

	</nav>

	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						&nbsp;
						<li class="nav-item">
							<a class="nav-link" href="projects/">
								<span class="fas fa-box-open"></span>
								Buscar Proyecto <span class="sr-only"></span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link active" href="../dashboard/">
								<i class="fas fa-paint-brush"></i>
								Mis Trabajos
							</a>
						</li>


					</ul>

					<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">

						<a class="d-flex align-items-center text-muted" href="#">

						</a>
					</h6>

					<ul class="nav flex-column mb-2">
						<li class="nav-item ">
							<a class="nav-link " href="portfolio/">
								<span class="fas fa-battery-three-quarters">&nbsp;</span>
								Mi portfolio
							</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link " href="profile/">
								<span class="fas fa-user-cog">&nbsp;</span>
								Mi perfil
							</a>
						</li>

					</ul>
					<div class="fixed-bottom"><p>&nbsp;<ul class="list-inline social-buttons">
						<li class="list-inline-item">
							<a href="#">
								<i class="fab fa-twitter"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<i class="fab fa-facebook"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<i class="fab fa-instagram"></i>
							</a>
						</li>
					</ul></p><p>&nbsp;<span class="copyright small">Copyright &copy; arcvii 2018</span></p></div>
				</div>
			</nav>

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

				<div id="1">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">Mis trabajos</h1>
						<div class="btn-toolbar mb-2 mb-md-0">
							<a href="myprojects/" class="btn btn-sm btn-outline-primary">Buscar Proyecto <i class="fas fa-plus-square"></i></a>
						</div>
					</div>
					<section class="bg-light" id="portfolio">
						<?php
						$sql2 = "SELECT a.id, a.id_project, a.status, a.date, b.id_project_type, b.titulo, b.descripcion, b.precio, a.email_user FROM projects_candidates AS a inner join projects as b on a.id_project=b.id WHERE a.date = (SELECT MAX(date) FROM projects_candidates WHERE email_user='".$_SESSION["email"]."' and status='1')";
						$result2 = $conn->query($sql2);

						if ($result2->num_rows > 0) {
							echo "<div class=\"container mt-4\">\n";
							echo "    <div class=\"row\">\n";
								while($row2= $result2->fetch_assoc()) {
									echo "<div class=\"col-auto mb-3\">\n";
									echo "            <div class=\"card\" style=\"width: 18rem;\">\n";
									echo "                <div class=\"card-body\">\n";
									echo "                    <h5 class=\"card-title\">".$row2["titulo"]."</h5>\n";
									echo "                    <h6 class=\"card-subtitle mb-2 text-muted\">Genancia $ ".number_format($row2["precio"],2,".",",")."</h6>\n";
									echo "                    <p class=\"card-text\">".substr($row2["descripcion"], 0, 50)."</p>\n";
									echo '<a data-toggle="modal" href="#myModal'.$row2["id"].'" class="btn btn-info">Ver mas</a>';
									if ($row2["status"]=="0") {
										echo "                    <a href=\"#\" class=\"btn btn-warning\">Esperando</a>\n";
									}elseif ($row2["status"]=="1") {
										echo "                    <a href=\"javascript:document.getElementById('admin".$row2["id"]."').submit();\" class=\"btn btn-success\">Entrar</a>\n";

									}elseif ($row2["status"]=="2") {
										//echo "                    <a href=\"javascript:document.getElementById('my_form').submit();\" class=\"btn btn-danger\">Esperando</a>\n";
									}
									echo "<form action=\"projects/admin/\" id=\"admin".$row2["id"]."\" method=\"post\">\n";
									echo "  <input type=\"hidden\"  name=\"project\" value=\"".$row2["id_project"]."\">\n";
									echo "  <input type=\"hidden\"  name=\"email\" value=\"".$row2["email_user"]."\">\n";
									echo "</form>\n";
									echo "                </div>\n";
									echo "            </div>\n";
									echo "        </div>\n";
									echo '<div class="modal fade" id="myModal'.$row2["id"].'">
													<div class="modal-dialog">
														<div class="modal-content">

															<!-- Modal Header -->
															<div class="modal-header">
																<h4 class="modal-title">'.$row2["titulo"].'</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>

															<!-- Modal body -->
															<div class="modal-body">
																'.$row2["descripcion"].'
															</div>

															<!-- Modal footer -->
															<div class="modal-footer">

																<button type="button" class="btn btn-success" data-dismiss="modal">Aplicar</button>
															</div>

														</div>
													</div>
												</div>
									';

								}
								echo "      </div>\n";
								echo "    </div>\n";
						} else {
							echo '<div class="jumbotron">
								<h1 class="display-4">¡Bienvenido!</h1>
								<p class="lead">En esta seccion podras actualizar transcurso de cada uno de tus proyectos (avances, evidencias, resultados, etc).</p>
								<hr class="my-4">
								<p></p>
								<p class="lead">';
									$sql = "SELECT experiencia FROM portfolio WHERE email_user='".$_SESSION['email']."'";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {

											echo "<a class=\"btn btn-primary btn-lg\" href=\"projects/\" role=\"button\">Busca un proyecto</a>\n";
									} else {
											echo "<a class=\"btn btn-primary btn-lg\" href=\"portfolio/\" role=\"button\">Empieza llenando tu portfolio</a>\n";
									}
								echo '</p>
							</div>';
						}
						 ?>
					</section>
				</div>
			</main>
			</div>
			</div>
<script type="text/javascript">
	function setTwoNumberDecimal(event) {
	    this.value = parseFloat(this.value).toFixed(2);
	}
	$('#price').html(Math.floor($('.#price').html()));
</script>
<script type="text/javascript">
	$(function() {
		$('[data-toggle="tooltip"]').tooltip({
			html: true
		});
	});
</script>
<script type="text/javascript">
  Conekta.setPublicKey('key_Lc3mLsmPDnNJsv5zYhzAkjA');


  var conektaSuccessResponseHandler = function(token) {
    var $form = $("#card-form");
    //Add the token_id in the form
     $form.append($('<input type="hidden" name="conektaTokenId" id="conektaTokenId">').val(token.id));
    $form.get(0).submit(); //Submit
  };

  var conektaErrorResponseHandler = function(response) {
    var $form = $("#card-form");
    $form.find(".card-errors").text(response.message_to_purchaser);
    $form.find("button").prop("disabled", false);

  };

  //jQuery generate the token on submit.
  $(function () {
    $("#card-form").submit(function(event) {
      var $form = $(this);
      // Prevents double clic
      $form.find("button").prop("disabled", true);
      Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);

      return false;
    });
  });
</script>
<script type="text/javascript">
	$('#btnClick').on('click',function(){
		if($('#1').css('display')!='none'){
			$('#2').show().siblings('div').hide();
		}else if($('#2').css('display')!='none'){
			$('#1').show().siblings('div').hide();
		}
	});

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
    <!-- Bootstrap core JavaScript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
    	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    	<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    	<script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>




    </body>
    </html>
