<?php
session_start();
require_once('../../../admin/cn.php');
if (isset($_SESSION['email'])){


}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location.href='../sign-in/';
		</SCRIPT>");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = test_input($_POST["project"]);
  $email = test_input($_POST["email"]);
  $email=$_SESSION['email'];
	$sql4 = "SELECT nombre, apellido, type FROM user WHERE email='$email'";
	$result4 = $conn->query($sql4);

	if ($result4->num_rows > 0) {
	    // output data of each row
	    while($row4 = $result4->fetch_assoc()) {
	        $nombre=$row4["nombre"];
					$apellido=$row4["apellido"];
	    }
	} else {
	    echo "0 results";
	}

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
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../"><img src="../../../img/logo.png" class="img-responsive" style="width:18%"></a>

		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="../../fin.php">Cerrar sesion</a>
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
							<a class="nav-link " href="../">
								<span class="fas fa-box-open"></span>
								Buscar Proyecto <span class="sr-only"></span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link active" href="../../">
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
							<a class="nav-link" href="../portfolio/">
								<span class="fas fa-battery-three-quarters">&nbsp;</span>
								Mi portfolio
							</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link " href="../profile/">
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
        <?php

        $sql = "SELECT a.id, a.id_project_type, a.titulo as 'proyecto', a.descripcion, a.precio, b.titulo FROM projects as a inner join project_type as b on b.id_project_type=a.id_project_type WHERE a.id='".$id."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $rootbeer = (float) $row["precio"];
                echo '<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">'.$row["proyecto"].'</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">


                    <a href="proy/" class="btn btn-sm btn-success">Necesito ayuda </a>
                    </div>
                  </div>';
                echo '<div class="modal fade" id="newDeliv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Nuevo entregable</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form action="saving/" method="post">
                               <div class="form-row">
                                 <div class="form-group col-md-6">
                                   <label for="inputEmail4">Titulo:</label>
                                   <input type="text" class="form-control" id="inputEmail4" name="titulo" placeholder="Entregable" required>
                                   <input type="hidden" class="form-control" id="inputEmail4" name="idProject" value="'.$id.'" required>
                                 </div>
                                 <div class="form-group col-md-6">
                                   <label for="inputPassword4">Pago:</label>
                                   <input type=number min=1 max='.$rootbeer.' class="form-control" name="pago" id="inputPassword4" placeholder="$ por este entregable" required>
                                 </div>
                               </div>
                               <div class="form-group">
                                 <label for="inputAddress2">Descipcion:</label>
                                 <input type="date" class="form-control" min="'.$today.'" name="date" max="2025-12-31" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
                               </div>
                               <div class="form-group">
                                 <label for="inputAddress2">Descipcion:</label>
                                 <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3" required></textarea>
                               </div>
                             </div>
                             <div class="modal-footer">

                               <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Añadir</button></form>
                            </div>
                          </div>
                        </div>
                      </div>';
                echo '<div class="container">
                        <div class="row">
                            <div class="col-sm-6">';
                            $rootbeer = (float) $row["precio"];
                            //Deliverables
                            $sql2 = "SELECT LEFT (descripcion, 50) as descripcion,id, titulo,  deadline, price, status FROM deliverables WHERE id_project=".$id."";
                            $result2 = $conn->query($sql2);

                            if ($result2->num_rows > 0) {
                                $precioDecim = number_format($row["precio"],2,".",",");
                                echo '<p><h4 class="h4 mr-5"><b>Precio total: </b>$'.$precioDecim.'</h4></p>
                                      ';
                                while($row2 = $result2->fetch_assoc()) {
                                  $roottequila = (float) $row2["price"];
                                  if ($row2["status"]=="0") {
                                    echo '<div class="card text-white bg-secondary mb-3" style="max-width: ">';
                                  }elseif ($row2["status"]=="1") {
                                    echo '<div class="card text-white bg-success mb-3" style="max-width: ">';
                                  }elseif ($row2["status"]=="2") {
                                    echo '<div class="card text-white bg-warning mb-3" style="max-width: ">';
                                  }
                                    $precioDeliv = number_format($row2["price"],2,".",",");
                                    $date = new DateTime($row2["deadline"]);
                                    $new_format = $date->format('d-m-Y');
                                    echo ' <div class="card-header"><h5 class="float-left">'.$row2["titulo"].' | $'.$precioDeliv.'<br>'.$new_format.'</h5>';
                                    if ($row2["status"]=="2") {
                                      echo '<span class="btn btn-secondary btn-sm float-right mr-1">Cancelado</span>';
                                    }else{

                                      //echo '<a data-toggle="modal" alt="Cancelar Entregable" class="btn btn-danger btn-sm float-right" href="#cancel'.$row2["id"].'">X</a>';
                                      //          echo '<a class="btn btn-primary btn-sm float-right mr-1" data-toggle="modal" href="#edit'.$row2["id"].'">Editar</a>';
                                      //          echo '&nbsp;<a class="btn btn-success btn-sm float-right mr-1" href="#" role="button">Liberar Entregable</a>&nbsp;';
                                    }


                                              echo '</div>
                                            <div class="card-body">
                                              <span class="card-text">'.$row2["descripcion"].'</span>
                                            </div>
                                          </div>';
                                          echo '<div class="modal fade" id="cancel'.$row2["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      ';
                                                      echo "<form action=\"cancel/\" id=\"cancelar".$row2["id"]."\" method=\"post\">\n";
                                                      echo '<input type="hidden" class="form-control" id="inputEmail4" name="idProject" value="'.$row2["id"].'" required>
                                                            <input type="hidden" class="form-control" id="inputEmail4" name="id" value="'.$id.'" required>';
                                                      echo "  <input type=\"hidden\"  name=\"email\" value=\"".$row2["email_user"]."\">\n";

                                                      echo '
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Si</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>';

                                 echo '<div class="modal fade" id="edit'.$row2["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">'.$row2["titulo"].'</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="updating/" method="post">
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputEmail4">Titulo:</label>
                                                  <input type="text" class="form-control" id="inputEmail4" name="titulo" value="'.$row2["titulo"].'" required>
                                                  <input type="hidden" class="form-control" id="inputEmail4" name="idProject" value="'.$row2["id"].'" required>
                                                  <input type="hidden" class="form-control" id="inputEmail4" name="id" value="'.$id.'" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputPassword4">Pago:</label>
                                                  <input type=number min=1 max='.$rootbeer.' class="form-control" name="pago" id="inputPassword4" value="'.$row2["price"].'" required>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="inputAddress2">Descipcion:</label>
                                                <input type="date" class="form-control" min="'.$today.'" name="date" value="'.$row2["deadline"].'" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
                                              </div>
                                              <div class="form-group">
                                                <label for="inputAddress2">Descipcion:</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3" required>'.$row2["descripcion"].'</textarea>
                                              </div>
                                            </div>
                                            <div class="modal-footer">

                                              <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Guardar</button></form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>';
                                }
                            } else {
                                echo '<div class="jumbotron">
                                        <h1 class="display-4">Aun no tienes entregables</h1>
                                        <p class="lead">En esta zona recibiras entregables a completar y poder recibir tu pago.</p>
                                        <p class="lead">

                                        </p>
                                      </div>';
                            }
                            $today = date("Y-m-d");

                            echo '<div class="modal fade" id="newDeli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Nuevo Entregable</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="saving/" method="post">
                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="inputEmail4">Titulo:</label>
                                              <input type="text" class="form-control" id="inputEmail4" name="titulo" placeholder="Entregable" required>
                                              <input type="hidden" class="form-control" id="inputEmail4" name="idProject" value="'.$id.'" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="inputPassword4">Pago:</label>
                                              <input type=number min=1 max='.$rootbeer.' class="form-control" name="pago" id="inputPassword4" placeholder="$ por este entregable" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputAddress2">Descipcion:</label>
                                            <input type="date" class="form-control" min="'.$today.'" name="date" max="2025-12-31" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputAddress2">Descipcion:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3" required></textarea>
                                          </div>
                                        </div>
                                        <div class="modal-footer">

                                          <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Añadir</button></form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>';
                            echo'</div>
                            <div class="col-sm-6">';?>
														<?php
                            //chat

														echo '<style>textarea {
														   resize: none;
														}</style>';
														echo	'<div class="container">
																		    <div class="row">
																		        <div class="col-sm-12"><form id="formChat" role="form">
																							<div class="form-group">
																								<input type="hidden" class="form-control" id="user" name="user" value="'.$_SESSION['email'].'">
																								<input type="hidden" class="form-control" id="user" name="idProject" value="'.$id.'">
																							</div>
																							<div class="form-group">
																								<div class="row">
																									<div class="col-md-12" >
																										<div id="conversation" style="height:400px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">


																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="form-group">
																								<!--<label for="message">Mensaje:</label>
																								<textarea id="message" name="message" placeholder="Ingresa el mensaje"  class="form-control" rows="3"></textarea>
																							</div>
																							<button  class="btn btn-primary" >Enviar</button>-->
																							<div class="input-group mb-3">
																									<!-- Button trigger modal -->
																									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#adjuntos">
																									  <i class="fas fa-paperclip"></i> Adjuntos
																									</button>

																									<!-- Modal -->

																							</div>
																							<div class="input-group mb-3">
																							  <textarea id="message" name="message" class="form-control" placeholder="Ingresa el mensaje..." rows="3" aria-label="Recipient" aria-describedby="basic-addon2"></textarea>
																							  <div class="input-group-append">
																							    <button id="send" class="btn btn-primary" type="button">Enviar</button>
																							  </div>
																							</div>
																						</form></div>
																						<div class="modal fade" id="adjuntos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
																							<div class="modal-dialog modal-lg" role="document">
																								<div class="modal-content">
																									<div class="modal-body">
																									<div class="row">
																											<div class="col-sm-6">
																											<form action="updating/file.php" method="post" enctype="multipart/form-data" id="myformattach">
																												<div class="form-group">
																													<input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
																													<input type="hidden" name="folderId" value="'.$id.'" id="exampleFormControlFile1">
																												</div>
																											</form>
																											<button type="submit" class="btn btn-success" form="myformattach">Actualizar</button>

																											</div>
																											<div class="col-sm-6">';
																											foreach(glob('../../../admin/attach/'.$id.'/*.{jpg,pdf}', GLOB_BRACE) as $file) {
																												if (preg_match('/(\.jpg|\.png|\.bmp)$/', $file)) {
																													echo '<a class="btn btn-light" href="'.$file.'" target="_blank" role="button"><i class="far fa-file-image"></i> '.substr($file, strrpos($file, '/') + 1).'</a><br>';
																												}else{
																													echo '<a class="btn btn-light" href="'.$file.'" target="_blank" role="button"><i class="far fa-file-pdf"></i> '.substr($file, strrpos($file, '/') + 1).'</a><br>';
																												}

																													//echo "www.yourdomain.com/path/to/dir/" . $file; //or basename($file)
																											}
																											echo '
																											</div>
																									</div>
																									</div>
																									<div class="modal-footer">
																										<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Atras</button>
																									</div>
																								</div>
																							</div>
																						</div>
																		    </div>
																		</div>';



                            echo'</div>
                        </div>
                    </div>';

            }
        } else {
            echo "0 results";
        }
         ?>






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

    	<script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    	<script src="chatController.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>




    </body>
    </html>
