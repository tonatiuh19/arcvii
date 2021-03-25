<?php
session_start();
require_once('../../admin/cn.php');
if (isset($_SESSION['email'])){

}else{
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='../../sign-in/';
    </SCRIPT>");
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
							<a class="nav-link " href="../projects/">
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
              <a class="nav-link" href="../portfolio/">
                <span class="fas fa-battery-three-quarters">&nbsp;</span>
                Mi portfolio
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" href="../profile/">
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
        <div id="1">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Mi perfil</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#profileEdit">
                  Editar <span class="fas fa-pencil-alt"></span>
                </button>
                <!--<button class="btn btn-sm btn-outline-secondary">Export</button>-->
              </div>
              <!--<button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>-->
            </div>
          </div>




          <?php
          $mail = $_SESSION['email'];
          $sql = "SELECT * FROM user where email="."'".$mail."'"."";
          $result = $conn->query($sql);

          if ($result->num_rows >= 1) {
            $pwd = $row["pwd"];
            while($row = $result->fetch_assoc()) {
              echo "<table class=\"table table-borderless\">\n";
              echo "            <tr>\n";
              echo "              <th>Nombre:</th>\n";
              echo "              <td>".$row["nombre"]."</td>\n";
              echo "            </tr>\n";
              echo "            <tr>\n";
              echo "              <th>Apellido:</th>\n";
              echo "              <td>".$row["apellido"]."</td>\n";
              echo "            </tr>\n";
              echo "            <tr>\n";
              echo "              <th>Email:</th>\n";
              echo "              <td>".$row["email"]."</td>\n";
              echo "            </tr>\n";
              echo "            <tr>\n";
              echo "              <th>Contraseña:</th>\n";
              echo "              <td>***********</td>\n";
              echo "            </tr>\n";
              echo "            <tr>\n";
              echo "              <th >Telefono:</th>\n";
              echo "              <td>".$row["telefono"]."</td>\n";


              echo "            </tr>\n";
              echo "          </table>      \n";
              echo '  <div class="modal fade" id="profileEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Editar Perfil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="edit_profile.php" method="post" name="myForm" >
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Nombre</label>
                            <input type="text" name="name" class="form-control"  value="'.$row["nombre"].'" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Apellido</label>
                            <input type="text" name="last" class="form-control"  value="'.$row["apellido"].'" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" name="email" class="form-control"  value="'.$row["email"].'" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Telefono</label>
                            <input type="text" name="phone" class="form-control"  value="'.$row["telefono"].'" required>
                            <input type="hidden" name="laLeydelMonte" class="form-control"  value="'.$row["pwd"].'" >
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Contraseña</label>
                            <input type="password" name="pwd" class="form-control" id="text_field1" placeholder="Nueva Contraseña">
                            <input type="password" name="pwd2" class="form-control" id="text_field2" placeholder="Vuelve a escribir la contraseña">
                          </div>
                          <div id="idshowpwd" style="display:none" class="alert alert-danger" role="alert">
                            Las contraseñas no coinciden
                          </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Atras</button>
                        <button type="button" id="submit_button" class="btn btn-primary">
                          Actualizar
                        </button>
                        <div class="modal fade bg-dark" id="validatePWD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog " role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Ingresa la contraseña actual:</label>
                                  <input type="password" name="pwdSq" class="form-control"   required>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Atras</button>
                                <button type="submit" class="btn btn-success">Actualizar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>';

            }
          } else {
            echo "0 results";
          }

          ?>
        </div>

      </main>
    </div>
  </div>
  <script type="text/javascript">
    var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
      if (password.value != ''){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Las contraseñas no coinciden");
          } else {
            confirm_password.setCustomValidity('');
          }
      }

    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  </script>
  <script type="text/javascript">
   $('#btnClick').on('click',function(){
    if($('#1').css('display')!='none'){
      $('#2').show().siblings('div').hide();
    }else if($('#2').css('display')!='none'){
      $('#1').show().siblings('div').hide();
    }
  });
</script>
<script type="text/javascript">
  var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Las contraseñas no coinciden");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>

    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="validateProfile.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    </body>

    </html>