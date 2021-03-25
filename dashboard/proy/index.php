<?php
session_start();
require_once('../../admin/cn.php');


$todayVisit = date("Y-m-d H:i:s");
$sqlVisit = "INSERT INTO visitos (version, section, timestamp) VALUES ('1','form_newproject', '$todayVisit')";
$conn->query($sqlVisit);
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
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

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
    .img {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 40%;
    }
	</style>

  <!-- Bootstrap core CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">
  <link href="form-validation.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../../"><img src="../../img/logo.png" class="img-responsive" style="width:18%"></a>

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
              <a class="nav-link active" href="../myprojects">
                <span class="fas fa-box-open"></span>
              Proyectos <span class="sr-only"></span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../">
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
            <li class="nav-item">
              <a class="nav-link" href="../profile">
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
        <br>
        <p><img src="img/idea.jpg" class="rounded img" alt="Your Idea" style="width:10%"></p>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                  <form action="saving/" method="post">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Titulo del proyecto:</label>
                      <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Render Casa" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput1">Precio:*</label>
                      <input type="number" class="form-control" name="price" id="exampleFormControlInput1" placeholder="40,000" required>

                    </div>

                    <div class="form-group">
                      <label for="sel1">Tipo de proyecto:</label>
                      <select class="form-control" id="sel1" name="type">
                        <?php
                        header('Content-Type: text/html; charset=UTF-8');
                        $sql = "SELECT id_project_type, titulo FROM project_type";
                        mysqli_set_charset($conn,'utf8');
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row["id_project_type"].'">'.$row["titulo"].'</option>';
                            }
                        } else {
                            echo "0 results";
                        }
                         ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Descipcion detallada:</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required></textarea>
                    </div>
                    <h5><small>*Se cobrará a tu freelancer el 13% del total del precio por cargo del servicio.<a data-toggle="modal" class="btn btn-link" href="#infoPay">Ver mas</a></small></h5><br>
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <div class="modal fade" id="infoPay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Calculadora ejemplo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="usr">Si tu proyecto vale:</label>
                              <span class="input-group-addon"></span>
                               <input class="form-control" id="amount1" type="text" value="4000">
                            </div>
                            <div class="form-group">
                              <label for="pwd">Tu experto recibira:</label>
                                <input id="amount2" type="hidden" value="0.13">
                              <br>$ <span id="result"></span>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                          </div>
                        </div>
                      </div>
                    </div>

                  </form>
              </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
      </main>
    </div>
  </div>

    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
$("#amount1").keyup(calc);
$("#amount2").keyup(calc);

function calc() {

    $('#result').html(
        parseFloat($('#amount1').val(), 10)-(parseFloat($('#amount1').val(), 10) * parseFloat($("#amount2").val(), 10)).toFixed(3)
    );
}
$( document ).ready( calc );
</script>
      <!-- Icons -->
      <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
      <script>
        feather.replace()
      </script>

      <!-- Graphs -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
      <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script type="text/javascript">
      $(".DropdownClass").change(function () {
        if ($(this).attr('name') == 'Count') {
          var number = $(this).val();

          $('.CommonAttribute').hide().slice( 0, number ).show();
        }
      });
    </script>

  </body>
  </html>
