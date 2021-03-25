<?php
session_start();
require_once('../../admin/cn.php');
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
		.upload-button {
    padding: 4px;
    border: 1px solid black;
    border-radius: 5px;
    display: block;
    float: left;
}

.profile-pic {
    max-width: 200px;
    max-height: 200px;
    display: block;
}

.file-upload {
    display: none;
}
#logout_sidebar_button {
    position: absolute;
    display: inline-block;
    bottom: 0;
    left: 15px;
}

#csvfile {
  display: none;
}
	</style>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
	<style type="text/css">
		.padding-xs { padding: .25em; }
	</style>

</head>

<body>
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../"><img src="../../img/logo.png" class="img-responsive" style="width:18%"></a>

		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="../fin.php">Cerrar sesion</a>
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
							<a class="nav-link" href="../projects/">
								<span class="fas fa-box-open"></span>
								Buscar Proyecto <span class="sr-only"></span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link " href="../">
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
							<a class="nav-link active" href="../portfolio/">
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
					</ul>
				</div>
			</nav>

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

				<div id="1">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">Mi Portfolio</h1>
						<div class="btn-toolbar mb-2 mb-md-0">
							<!--<a href="../proy/" class="btn btn-sm btn-outline-primary">Añadir proyecto <i class="fas fa-plus-square"></i></a>-->
						</div>
					</div>
					<section class="bg-light" id="portfolio">
						<?php echo "&nbsp;" ?>
						<?php
						$sql = "SELECT descripcion, skills, educacion, id FROM portfolio where email_user='".$_SESSION['email']."'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							//echo "<div class=\"py-5\">\n";

						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	?>
								<div class="container">
						            <div class="row">
						                <div class="col">
															<h3>CV</h3>
						                  <form action="updating/" method="post" id="formData">
						                    <div class="form-group">
						                      <label for="exampleFormControlTextarea1">Perfil:</label>
						                      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="2" required><?php echo $row["descripcion"]; ?></textarea>
						                    </div>
																<div class="form-group">
						                      <label for="exampleFormControlTextarea1">Habilidades:</label>
						                      <textarea class="form-control" id="exampleFormControlTextarea1" name="skills" rows="2" required><?php echo $row["skills"]; ?></textarea>
						                    </div>
																<div class="form-group">
						                      <label for="exampleFormControlTextarea1">Educacion:</label>
						                      <textarea class="form-control" id="exampleFormControlTextarea1" name="education" rows="2" required><?php echo $row["educacion"]; ?></textarea>

						                    </div>

						                    <!--<button type="submit" class="btn btn-success">Actualizar</button>-->
																<input type="button" name="btn" value="Actualizar" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-success" />
																<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
															    <div class="modal-dialog">
															        <div class="modal-content">
															            <div class="modal-header">
															                <h4>¿Estas seguro de actualizar tus datos?</h4>
															            </div>

															            <div class="modal-footer">
															                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
															                <a href="#" id="submit" class="btn btn-success success">Actualizar</a>
															            </div>
															        </div>
															    </div>
															</div>
						                  </form>
						              </div>
													<div class="col">
														<h3>Foto de perfil</h3>
														<form action="updating/file_image.php" method="post" enctype="multipart/form-data">
															<div class="form-group">
																<input type="hidden" name="folderId" value="<?php echo $_SESSION['email']; ?>" id="exampleFormControlFile1">

																<!--<label for="exampleFormControlFile1">Portfolio:</label>-->
																<?php

																$folder_path = "user/".$_SESSION['email']."/profile/";
																if (!file_exists($folder_path)) {
																	echo '<img class="profile-pic" src="user/profile_vector.png" height="80" width="80"/><br>
																	<div class="upload-button btn btn-info btn-sm" id="firstbtn">Actualizar imagen</div>
																	<input class="file-upload" id="filename" name="fileToUpload" type="file" accept="image/*"/>';
															  }else{
																	foreach(glob('user/'.$_SESSION['email'].'/profile/*.{jpg,png}', GLOB_BRACE) as $file) {
																		if (preg_match('/(\.jpg|\.png|\.bmp)$/', $file)) {
																		 	echo '<img class="profile-pic" src="'.$file.'" height="80" width="80"/><br>';
																		}
																	}
																	echo '
																	<div class="upload-button btn btn-info btn-sm" id="firstbtn">Actualizar imagen</div>
																	<input class="file-upload" id="filename" name="fileToUpload" type="file" accept="image/*"/>';
																}
																 ?>

															</div>
															<button type="submit" id="csvfile" class="btn btn-success">Actualizar</button>
														</form>
														<p><br></p>
														<h3>Portfolio</h3>
															En esta seccion puedes incluir un portfilio describiendo tu experiencia y aumentar tus probabilidades de trabajar en mas proyectos (PDF & JPG).
																<?php
																echo '<table class="table">

																				<tbody>';
																foreach(glob('user/'.$_SESSION['email'].'/*.{jpg,pdf}', GLOB_BRACE) as $file) {

																	if (preg_match('/(\.jpg|\.png|\.bmp)$/', $file)) {
																		echo '<tr>
																			      <td>';
																						echo '<a class="btn btn-light" href="'.$file.'" target="_blank" role="button"><i class="far fa-file-image"></i> '.substr($file, strrpos($file, '/') + 1).'</a><br>';
																						echo '</td>';
																			      //echo '<td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>';
																						echo "<td><form action=\"delete/\"  method=\"post\">\n";
																						echo "  <input type=\"hidden\"  name=\"file\" value=\"".$file."\">\n";
																						echo '<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>';
																						echo "</form></td>\n";
																			    echo '</tr>';
																	}else{
																		echo '<tr>
																			      <td>';
																						echo '<a class="btn btn-light" href="'.$file.'" target="_blank" role="button"><i class="far fa-file-pdf"></i> '.substr($file, strrpos($file, '/') + 1).'</a><br>';
																						echo '</td>';
																			     // echo '<td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>';
																					 echo "<td><form action=\"delete/\"  method=\"post\">\n";
																					 echo "  <input type=\"hidden\"  name=\"file\" value=\"".$file."\">\n";
																					 echo '<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>';
																					 echo "</form></td>\n";
																			    echo '</tr>';
																	}

																}
																echo '</tbody>
																		</table>';

																 ?>
														<form action="updating/file.php" method="post" enctype="multipart/form-data">
		 													<div class="form-group">
			 													<input type="hidden" name="folderId" value="<?php echo $_SESSION['email']; ?>" id="exampleFormControlFile1">
															</div><br>
															<input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload"><br>
															<button type="submit" class="btn btn-success">Actualizar</button>
														</form>

												</div>
						            </div>

						        </div>


								<?php
						     }

							//echo "  </div>\n";
						} else { ?>
							<div class="container">
											<div class="row">
													<div class="col">
														<h3>CV</h3>
														<form action="saving/" method="post" id="formData">
															<div class="form-group">
																<label for="exampleFormControlTextarea1">Perfil:</label>
																<textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="2" placeholder="¿Como te describes a ti mismo?" required></textarea>
															</div>
															<div class="form-group">
																<label for="exampleFormControlTextarea1">Habilidades:</label>
																<textarea class="form-control" id="exampleFormControlTextarea1" name="skills" rows="2" placeholder="¿Cuales son tus habilidades?" required></textarea>
															</div>
															<div class="form-group">
																<label for="exampleFormControlTextarea1">Educacion:</label>
																<textarea class="form-control" id="exampleFormControlTextarea1" name="education" rows="2" placeholder="¿Tienes alguna certificacion o curso?" required></textarea>

															</div>

															<!--<button type="submit" class="btn btn-success">Actualizar</button>-->
															<input type="button" name="btn" value="Actualizar" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-success" />
															<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																<div class="modal-dialog">
																		<div class="modal-content">
																				<div class="modal-header">
																						<h4>¿Estas seguro de actualizar tus datos?</h4>
																				</div>

																				<div class="modal-footer">
																						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
																						<a href="#" id="submit" class="btn btn-success success">Actualizar</a>
																				</div>
																		</div>
																</div>
														</div>
														</form>
												</div>
												<div class="col">
													<h3>Foto de perfil</h3>
													<form action="updating/file_image.php" method="post" enctype="multipart/form-data">
														<div class="form-group">
															<input type="hidden" name="folderId" value="<?php echo $_SESSION['email']; ?>" id="exampleFormControlFile1">

															<!--<label for="exampleFormControlFile1">Portfolio:</label>-->
															<?php

															$folder_path = "user/".$_SESSION['email']."/profile/";
															if (!file_exists($folder_path)) {
																echo '<img class="profile-pic" src="user/profile_vector.png" height="80" width="80"/><br>
																<div class="upload-button btn btn-info btn-sm" id="firstbtn">Actualizar imagen</div>
																<input class="file-upload" id="filename" name="fileToUpload" type="file" accept="image/*"/>';
															}else{
																foreach(glob('user/'.$_SESSION['email'].'/profile/*.{jpg,png}', GLOB_BRACE) as $file) {
																	if (preg_match('/(\.jpg|\.png|\.bmp)$/', $file)) {
																		echo '<img class="profile-pic" src="'.$file.'" height="80" width="80"/><br>';
																	}
																}
																echo '
																<div class="upload-button btn btn-info btn-sm" id="firstbtn">Actualizar imagen</div>
																<input class="file-upload" id="filename" name="fileToUpload" type="file" accept="image/*"/>';
															}
															 ?>

														</div>
														<button type="submit" id="csvfile" class="btn btn-success">Actualizar</button>
													</form>
													<p><br></p>
													<h3>Portfolio</h3>
															En esta seccion puedes incluir un portfilio describiendo tu experiencia y aumentar tus probabilidades de trabajar en mas proyectos (PDF & JPG).
															<?php
															echo '<table class="table">

																			<tbody>';
															foreach(glob('user/'.$_SESSION['email'].'/*.{jpg,pdf}', GLOB_BRACE) as $file) {

																if (preg_match('/(\.jpg|\.png|\.bmp)$/', $file)) {
																	echo '<tr>
																					<td>';
																					echo '<a class="btn btn-light" href="'.$file.'" target="_blank" role="button"><i class="far fa-file-image"></i> '.substr($file, strrpos($file, '/') + 1).'</a><br>';
																					echo '</td>';
																					//echo '<td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>';
																					echo "<td><form action=\"delete/\"  method=\"post\">\n";
																					echo "  <input type=\"hidden\"  name=\"file\" value=\"".$file."\">\n";
																					echo '<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>';
																					echo "</form></td>\n";
																				echo '</tr>';
																}else{
																	echo '<tr>
																					<td>';
																					echo '<a class="btn btn-light" href="'.$file.'" target="_blank" role="button"><i class="far fa-file-pdf"></i> '.substr($file, strrpos($file, '/') + 1).'</a><br>';
																					echo '</td>';
																				 // echo '<td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>';
																				 echo "<td><form action=\"delete/\"  method=\"post\">\n";
																				 echo "  <input type=\"hidden\"  name=\"file\" value=\"".$file."\">\n";
																				 echo '<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>';
																				 echo "</form></td>\n";
																				echo '</tr>';
																}

															}
															echo '</tbody>
																	</table>';

															 ?>
													<form action="updating/file.php" method="post" enctype="multipart/form-data">
														<div class="form-group">
															<input type="hidden" name="folderId" value="<?php echo $_SESSION['email']; ?>" id="exampleFormControlFile1">
														</div><br>
														<input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload"><br>
														<button type="submit" class="btn btn-success">Actualizar</button>
													</form>

											</div>
											</div>

									</div>


						<?php }
						$conn->close();
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
	$('#submit').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
	    //alert('submitting');
	    $('#formData').submit();
	});
	$('#submit2').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
	    //alert('submitting');
	    $('#formData2').submit();
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

		$("#filename").change(function (e) {
	  if (this.files.length > 0) {
	    $("#csvfile").show();
			$("#firstbtn").hide();
	  } else {
			$("#firstbtn").show();
	    $("#csvfile").hide();
	  }
	});

	$("#csvfile").change(function (e) {

	});

$(document).ready(function() {


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});

	/*00var ext = $('#fileToUpload').val().split('.').pop().toLowerCase();
	if($.inArray(ext, ['pdf','jpg']) == -1) {
	    alert('invalid extension!');
	}*/
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
