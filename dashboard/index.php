<?php
session_start();
require_once('../admin/cn.php');
if (isset($_SESSION['email'])){
	$maili = $_SESSION['email'];
	$sql = "SELECT active FROM user where email='$maili'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        if ($row["active"]==0) {
						/*echo ("<SCRIPT LANGUAGE='JavaScript'>
				      window.alert('Tu cuenta se encuentra inactiva')
				      window.location.href='../';
				      </SCRIPT>");*/
							echo "<form action=\"../sign-up/verify/\" id=\"my_form\" method=\"post\">\n";
	            echo "  <input type=\"hidden\" name=\"project\" value=\"".$maili."\">\n";
	            echo "  <input type=\"hidden\" name=\"type\" value=\"2\">\n";
	            echo "<input type='submit' name='btnSignIn' value='Sending...' id='btnSignIn' />\n";
	            echo "</form>\n";
	            echo "<script type=\"text/javascript\">\n";
							//echo "window.alert('Tu cuenta se encuentra inactiva')";
	            echo "    document.getElementById('btnSignIn').click();\n";
	            echo "</script>\n";
	        }
	    }
	}

}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../sign-in/';
		</SCRIPT>");
}

if ($_SESSION['type_user']=="3") {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../workplace/';
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
		#logout_sidebar_button {
		    position: absolute;
		    display: inline-block;
		    bottom: 0;
		    left: 15px;
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
							<a class="nav-link" href="myprojects/">
								<span class="fas fa-box-open"></span>
								Proyectos <span class="sr-only"></span>
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
							<a class="nav-link " href="profile/">
								<span class="fas fa-user-cog">&nbsp;</span>
								Mi perfil
							</a>
						</li>

					</ul>
					<p>&nbsp;<ul class="list-inline social-buttons nav nav-sidebar" id="logout_sidebar_button">

						<li class="list-inline-item">
							<a href="https://www.facebook.com/arcvii.mx/" target="_blank">
								<i class="fab fa-facebook"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="https://www.instagram.com/arcvii_mx/" target="_blank">
								<i class="fab fa-instagram"></i>
							</a>
						</li>
					</p><p>&nbsp;<span class="copyright small">Copyright &copy; arcvii 2020</span></p>
				</div>
			</nav>

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">Mi Pizarra</h1>
						<div class="btn-toolbar mb-2 mb-md-0">
							<a class="btn btn-sm btn-outline-info" data-target="#modalIMG" data-toggle="modal" href="#"><i class="fas fa-info-circle"></i> Como funciona arcvii</a>&nbsp;
							<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-body mb-0 p-0">
											<img src="../img/intro/colab.png" alt="" style="width:100%">
										</div>
										<div class="modal-footer">
											<div><!--<a href="https://i3.ytimg.com/vi/vr0qNXmkUJ8/maxresdefault.jpg" target="_blank">Download</a>--></div>
											<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Cerrar</button>
										</div>
									</div>
								</div>
							</div>
							<a href="proy/" class="btn btn-sm btn-outline-primary">Nuevo proyecto <i class="fas fa-plus-square"></i></a>
						</div>
					</div>
				<?php

				$sql7 = "SELECT email_user FROM howto_exp WHERE first=1 and email_user='".$_SESSION['email']."' ";
				$result7 = $conn->query($sql7);

				if ($result7->num_rows > 0) {

				} else {
							$sql8 = "INSERT INTO howto_exp (email_user, first)
							VALUES ('".$_SESSION['email']."', '1')";

							if ($conn->query($sql8) === TRUE) {
								echo ("<script language='javascript'>
										$( document ).ready(function() {
											$('#modalIMG').modal('show');
										});
										</script>");
							} else {
							    echo "Error: " . $sql . "<br>" . $conn->error;
							}
				}

				$sql = "SELECT a.id, a.id_project_type, a.titulo, a.descripcion, a.precio, b.id_project_type, a.status FROM projects as a left join project_type as b on b.id_project_type=a.id_project_type WHERE a.email_user='".$_SESSION['email']."'";
				$result = $conn->query($sql);
				$count = 0;
				if ($result->num_rows > 0) {

					echo "<div class=\"container mt-4\">\n";
					echo "    <div class=\"row\">\n";
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<div class=\"col-auto mb-3\">\n";
						echo "            <div class=\"card\" style=\"width: 18rem;\">\n";
						echo "                <div class=\"card-body\">\n";
						echo "                    <h5 class=\"card-title\">".$row["titulo"]."</h5>\n";
						$sql2 = "SELECT a.*,b.nombre, b.apellido, b.telefono FROM projects_candidates as a INNER JOIN (SELECT id, MAX(date) as TopDate FROM projects_candidates WHERE id_project = ".$row["id"]." and status=0 GROUP BY email_user) AS EachItem ON EachItem.TopDate = a.date AND EachItem.id = a.id inner join user as b on a.email_user=b.email";
						$result2 = $conn->query($sql2);
						echo '<div class="modal fade" id="exampleModal'.$row["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">'.$row["titulo"].'</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">';
						if ($result2->num_rows > 0) {
												echo '<table class="table">
																<tr>
																	<th>Nombre</th>
																	<th>Portfolio</th>
																	<th>Aceptar</th>
																	<th>Mensaje</th>
																</tr>';
						    while($row2 = $result2->fetch_assoc()) {
									echo '<tr>
												    <td>'.$row2["nombre"].' '.$row2["apellido"].'</td>
												    <td>';
														echo "<a href=\"javascript:document.getElementById('portfolio".$row2["email_user"]."').submit();\" class=\"btn btn-primary btn-sm\"><i class=\"fas fa-user-astronaut\"></i> Ver mas</a>\n";
														echo '</td>
												    <td>';
														echo "<a href=\"javascript:document.getElementById('aceptar".$row2["email_user"]."').submit();\" class=\"btn btn-success btn-sm\"><i class=\"fas fa-check-square\"></i></a>\n";
														echo '</td>
														';
														echo '<td>';
														$sql7 = "SELECT message FROM projects_candidates_messages where id_projects_candidates=".$row2["id"]."";
														$result7 = $conn->query($sql7);

														if ($result7->num_rows > 0) {
														    // output data of each row
														    while($row7 = $result7->fetch_assoc()) {
																		if (strlen($row7["message"])>=11) {
																			echo substr($row7["message"], 0, 10)."...";
																		}else{
																			echo $row7["message"];
																		}

														    }
														} else {
														    echo "";
														}
														echo'</td>';
														//echo "<td><a href=\"javascript:document.getElementById('eliminar".$row2["email_user"]."').submit();\" class=\"btn btn-danger btn-sm\"><i class=\"fas fa-times-circle\"></i></a></td>\n";
														echo '
												  </tr>';
													echo "<form action=\"portfolio/\" id=\"portfolio".$row2["email_user"]."\" method=\"post\">\n";
													echo "  <input type=\"hidden\"  name=\"project\" value=\"".$row["id"]."\">\n";
													echo "  <input type=\"hidden\"  name=\"email\" value=\"".$row2["email_user"]."\">\n";
													echo "  <input type=\"hidden\"  name=\"candidate_id\" value=\"".$row2["id"]."\">\n";
													echo "</form>\n";
													echo "<form action=\"portfolio/accept.php\" id=\"aceptar".$row2["email_user"]."\" method=\"post\">\n";
													echo "  <input type=\"hidden\"  name=\"project\" value=\"".$row2["id"]."\">\n";
													echo "  <input type=\"hidden\"  name=\"projectid\" value=\"".$row["id"]."\">\n";
													echo "  <input type=\"hidden\"  name=\"email\" value=\"".$row2["email_user"]."\">\n";
													echo "</form>\n";
													echo "<form action=\"portfolio/delete.php\" id=\"eliminar".$row2["email_user"]."\" method=\"post\">\n";
													echo "  <input type=\"hidden\"  name=\"project\" value=\"".$row2["id"]."\">\n";
													echo "  <input type=\"hidden\"  name=\"email\" value=\"".$row2["email_user"]."\">\n";
													echo "</form>\n";
						        $count++;
						    }
								echo '</table>';;

						} else {
						    echo "0 results";
						}
						echo '</div>
					</div>
				</div>
			</div>';
						if ($count<>0) {
							echo " <h6 class=\"card-subtitle mb-2 text-muted\"><b>Solicitudes: </b><a data-toggle=\"modal\" class=\"btn btn-info btn-sm\" href=\"#exampleModal".$row["id"]."\">".$count."</a></h6>\n";
						}else{
							$sql3 = "SELECT a.*,b.nombre, b.apellido, b.telefono, max(a.date) as 'date' FROM projects_candidates as a INNER JOIN user as b on a.email_user=b.email WHERE a.id_project=".$row["id"]." GROUP by a.id_project";
							$result3 = $conn->query($sql3);

							if ($result3->num_rows > 0) {
								if ($row["status"]==0) {
									echo " <a data-toggle=\"modal\" class=\"btn btn-info btn-sm\" href=\"#\">En espera de aprobacion</a><p></p>\n";
								}else{
									echo " <a class=\"btn btn-primary btn-sm\" href=\"javascript:document.getElementById('admin".$row["id"]."').submit();\">Entrar</a> \n";
									//echo " <a data-toggle=\"modal\" class=\"btn btn-primary btn-sm\" href=\"#\"><i class=\"fas fa-comment-dots\"></i></a> \n";
									//echo " <a data-toggle=\"modal\" class=\"btn btn-success btn-sm\" href=\"#\">Finalizar</a><p></p>\n";
									echo "<form action=\"admin/\" id=\"admin".$row["id"]."\" method=\"post\">\n";
									echo "  <input type=\"hidden\"  name=\"project\" value=\"".$row["id"]."\">\n";
									echo "  <input type=\"hidden\"  name=\"email\" value=\"".$row["email_user"]."\">\n";
									echo "</form>\n";
								}

							} else {
								if ($row["status"]==0) {
									echo " <a data-toggle=\"modal\" class=\"btn btn-info btn-sm\" href=\"#\">En espera de aprobacion</a><p></p>\n";
								}else{
									echo " <a data-toggle=\"modal\" class=\"btn btn-warning btn-sm\" href=\"#\">Sin solicitudes</a><p></p>\n";
								}

							}
						}
						echo " <br><a class=\"btn btn-primary btn-sm\" href=\"javascript:document.getElementById('edit".$row["id"]."').submit();\"><i class=\"fas fa-pencil-alt\"></i></a>\n";
						//echo " <a class=\"btn btn-primary btn-sm\" href=\"#\"><i class=\"fas fa-share-square\"></i></a>\n";
						echo " <a class=\"btn btn-primary btn-sm\" href=\"javascript:document.getElementById('share".$row["id"]."').submit();\"><i class=\"fas fa-share-square\"></i></a>\n";
						echo "<form action=\"share/\" id=\"share".$row["id"]."\" method=\"post\">\n";
						echo "  <input type=\"hidden\"  name=\"project\" value=\"".$row["id"]."\">\n";
						echo "  <input type=\"hidden\"  name=\"email\" value=\"".$row["email_user"]."\">\n";
						echo "</form>\n";
						echo "<form action=\"myprojects/edit/\" id=\"edit".$row["id"]."\" method=\"post\">\n";
						echo "  <input type=\"hidden\"  name=\"project\" value=\"".$row["id"]."\">\n";
						echo "  <input type=\"hidden\"  name=\"email\" value=\"".$row["email_user"]."\">\n";
						echo "</form>\n";
						$count=0;

						//echo "                    <p class=\"card-text\">".substr($row["descripcion"], 0, 50)."</p>\n";
						//echo '<a href="#" class="btn btn-info">Ver mas</a>';
						echo "                </div>\n";
						echo "            </div>\n";
						echo "        </div>\n";
						 }
					echo "      </div>\n";
					echo "    </div>\n";
					//echo "  </div>\n";
				} else {
						echo '
							<section class="bg-light" id="portfolio">
								<div class="jumbotron">
								  <h1 class="display-4">¡Bienvenido!</h1>
								  <p class="lead">En esta seccion podras ver el transcurso de cada uno de tus proyectos (envia nuevos requisitos, libera dinero, porcentaje total del proyecto, etc).</p>
								  <hr class="my-4">
								  <p></p>
								  <p class="lead">
								    <a class="btn btn-primary btn-lg" href="proy/" role="button">Empezar Proyecto</a>
								  </p>
								</div>';
				}
				 ?>



					</section>

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
