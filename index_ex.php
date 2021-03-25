<?php
require_once('admin/cn.php');
?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
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
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>arcvii</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>
			<div class="protfolio-wrap">

			<!-- Start Header Area -->
			<header class="default-header">
				<nav class="navbar navbar-expand-lg  navbar-light">
					<div class="container">
						  <a class="navbar-brand" href="../">
						  	<img src="img/logo.png" alt="">
						  </a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="text-white lnr lnr-menu"></span>
						  </button>



						  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
						    <ul class="navbar-nav">
						    	<?php
						    	if(isset($_SESSION)){
								    echo "<li><a href=\"dashboard/\">Entrar <i class=\"fas fa-sign-in-alt\"></i></a></li>\n";
								  }else{
                                    echo '<li><a href="sign-up/">Registrarse</a></li>';
                                    echo '<li><a href="sign-in/">Entrar</a></li>';

								  }
						    	?>
						    	<!--<li><a href="#home">Entrar <i class="fas fa-sign-in-alt"></i></a></li>-->
								<li><a href="#home">Publica un proyecto</a></li>
								<!--<li><a href="#portfolio">Portfiolio</a></li>
								<li><a href="#service">Services</a></li>
								<li><a href="#testimonial">Testimonial</a></li>

							    <li class="dropdown">
							      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							        Pages
							      </a>
							      <div class="dropdown-menu">
							        <a class="dropdown-item" href="generic.html">Generic</a>
							        <a class="dropdown-item" href="elements.html">Elements</a>
							      </div>
							    </li>	-->
						    </ul>
						  </div>
					</div>
				</nav>
			</header>
			<!-- End Header Area -->
				<!-- start banner Area -->
				<section class="banner-area relative" id="home">
					<div class="overlay overlay-bg"></div>
					<div class="container">
						<div class="row fullscreen d-flex align-items-center justify-content-center">
							<div class="banner-content col-lg-10">
								<h5 class="text-uppercase">Los mejores expertos existiendo aquí</h5>
								<h1>

									Grandes creativos preparados para hacer realidad tu proyecto
								</h1>
								<a href="#portfolio" class="primary-btn text-uppercase">Explorar</a>
								<a href="sign-in/" class="primary-btn text-uppercase">Publicar un Proyecto</a>
							</div>
						</div>
					</div>
				</section>
				<!-- End banner Area -->

				<!-- Start portfolio-area Area -->
				<section class="portfolio-area section-gap" id="portfolio">
				  <div class="container">
						<div class="row d-flex justify-content-center">
							<div class="menu-content col-lg-10">
								<div class="title text-center">
									<h1 class="mb-10">Trabaja o publica un proyecto en alguna de las siguientes categorías y déjate ayudar por profesionales.</h1>
									<p>Cuidando tus intereses desde el inicio</p>
								</div>
							</div>
						</div>

				    <div class="filters">
				      <ul>
				        <li id="f1" class="active" data-filter="*">Todos</li>
				        <li data-filter=".1">Diseño Arquitectónico e Interiores</li>
				        <li data-filter=".2">Creación de Planos</li>
				        <li data-filter=".3">Visualización Arquitectónica</li>
								<li data-filter=".4">Diseño Gráfico y Marketing Digital para Arquitectura</li>

				      </ul>
				    </div>

				    <div class="filters-content">
				      <div class="row grid">+<script>
							 var jvalue = "navigator.appName is " + navigator.appVersion;
							 //console.log(jvalue);
						 </script>
								<?php
								$sql = "SELECT a.id, a.id_project_type, a.titulo, a.descripcion, a.email_user, a.precio, a.status FROM projects as a WHERE a.status=1";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {

									//$browser = get_browser(null, true);
									//print_r($browser);
									$todayVisit = date("Y-m-d H:i:s");
									$sqlVisit = "INSERT INTO visitos (version, section, timestamp) VALUES ('1','principal', '$todayVisit')";
									$conn->query($sqlVisit);

								    while($row = $result->fetch_assoc()) {
											$rootbeer = (float) $row["precio"];
											$precioDecim = number_format($row["precio"],2,".",",");

								        echo '<a href="sign-in/"> <div class="single-portfolio col-sm-4 all '.$row["id_project_type"].'">
				 				          <div class="item">';
														if ($row["id_project_type"]==1) {
															echo '<img src="img/dai.png" alt="Work 1">';
														}elseif ($row["id_project_type"]==2) {
															echo '<img src="img/cp.png" alt="Work 2">';
														}elseif ($row["id_project_type"]==3) {
															echo '<img src="img/va.png" alt="Work 3">';
														}elseif ($row["id_project_type"]==4) {
															echo '<img src="img/dgma.png" alt="Work 4">';
														}

				 				            echo '<div class="p-inner">
				 				              <h4>'.$row["titulo"].'</h4>

				 				              <div class="cat">Ganancia: <b>$ '.$precioDecim.'</b></div>
				 				            </div>
				 				          </div>
				 				        </div></a>';
								    }
								} else {
								    //echo "0 results";
								}
								$conn->close();
								 ?>

					 			<?php

					 			 ?>

				        <!--<div class="single-portfolio col-sm-4 all 2">
				          <div class="item">
				            <img src="img/p2.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h4>2D Vinyl Design</h4>
				              <div class="cat">Personal</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all 2">
				          <div class="item">
				            <img src="img/p3.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Creative Poster Design</h5>
				              <div class="cat">Agency</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all 3">
				          <div class="item">
				            <img src="img/p4.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Embosed Logo Design</h5>
				              <div class="cat">Portal</div>
				            </div>
				          </div>
				        </div>


				        <div class="single-portfolio col-sm-4 all 3">
				          <div class="item">
				            <img src="img/p6.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h4>2D Vinyl Design</h4>
				              <div class="cat">Personal</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all 2">
				          <div class="item">
				            <img src="img/p2.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Creative Poster Design</h5>
				              <div class="cat">Agency</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all 1">
				          <div class="item">
				            <img src="img/p3.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Embosed Logo Design</h5>
				              <div class="cat">Portal</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all 1">
				          <div class="item">
				            <img src="img/p4.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h4>3D Helmet Design</h4>
				              <div class="cat">Corporate</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all 3">
				          <div class="item">
				            <img src="img/p3.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h4>2D Vinyl Design</h4>
				              <div class="cat">Personal</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all 3">
				          <div class="item">
				            <img src="img/p2.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Creative Poster Design</h5>
				              <div class="cat">Agency</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all 2">
				          <div class="item">
				            <img src="img/p1.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Embosed Logo Design</h5>
				              <div class="cat">Portal</div>
				            </div>
				          </div>
				        </div>-->

				      </div>
				    </div>

				  </div>
				</section>
				<!-- End portfolio-area Area -->


				<!-- Start service Area -->
				<section class="service-area section-gap relative" id="service">
					<div class="overlay overlay-bg"></div>
					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="menu-content pb-60 col-lg-10">
								<div class="title text-center">
									<h1 class="mb-10 text-white">¿Qué ofrecemos?</h1>
									<!--<p>Who are in extremely love with eco friendly system..</p>-->
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- End service Area -->

				<!-- Start services Area -->
				<section class="services-area pb-100" >
					<div class="container">
						<div class="row">
							<div class="col-lg-4">
								<div class="single-service">
									<img class="img-fluid" src="img/s1.png" alt="">
									<h4>Profesionales</h4>
									<p>
										Expertos en cada característica descrita en el proyecto.
									</p>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="single-service">
									<img class="img-fluid" src="img/s2.png" alt="">
									<h4>Págalo como tu decidas</h4>
									<p>
										Aceptamos todas las tarjetas, OXXO.
									</p>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="single-service">
									<img class="img-fluid" src="img/s3.png" alt="">
									<h4>Acompañamiento</h4>
									<p>
										Pagas lo que realmente tienes que invertir. Justo lo necesario para explotar tu idea.
									</p>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- End services Area -->

				<!-- Start review Area -->
				<section class="review-area section-gap" id="testimonial">
					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="menu-content pb-60 col-lg-10">
								<div class="title text-center">
									<h1 class="mb-10">El trabajo dice más que mil palabras</h1>
									<!--<p>Who are in extremely love with eco friendly system..</p>-->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="single-review">
									<!--<img src="img/c1.png" alt="">-->
									<div class="title d-flex flex-row">
										<a href="#"><h4>Renata Garcia</h4></a>
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star"></span>
										</div>
									</div>
									<p>
										Soy recientemente nuevo en esta página, recibo ofertas de acuerdo a mi perfil con frecuencia, hay muchos proyectos diversos para las diferentes necesidades, ha sido sencillo mejorar la actualización del perfil junto con mi portfoliio.
									</p>
								</div>
								<div class="single-review">
									<!--<img src="img/c3.png" alt="">-->
									<div class="title d-flex flex-row">
										<a href="#"><h4>Federico Gomez</h4></a>
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
										</div>
									</div>
									<p>
										Mi experiencia ha sido muy buena.
									</p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="single-review">
									<!--<img src="img/c2.png" alt="">-->
									<div class="title d-flex flex-row">
										<a href="#"><h4>Andres Peña</h4></a>
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
										</div>
									</div>
									<p>
										Creo que por ahora, seguirá siendo mi plataforma de trabajo principal, enfocada exclusivamente a mi perfil.
									</p>
								</div>
								<div class="single-review">
									<!--<img src="img/c4.png" alt="">-->
									<div class="title d-flex flex-row">
										<a href="#"><h4>Alejandro Guzman</h4></a>
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
										</div>
									</div>
									<p>
										Encontre justo lo que buscaba para mi proyecto.
									</p>
								</div>
							</div>
						</div>
				</section>
				<!-- End review Area -->

				<!--<section class="service-area section-gap relative" id="howto">
					<div class="overlay overlay-bg"></div>
					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="menu-content pb-60 col-lg-10">
								<div class="title text-center">
									<div id="accordion" class="">
								  <div class="card text-center">
							      <a class="collapsed card-link primary-btn text-uppercase" data-toggle="collapse" href="#collapseTwo">
							  	    <div class="card-header">
							  	        Collapsible Group Item #2
							  	    </div>
							      </a>
								    <div id="collapseTwo" class="collapse" data-parent="#accordion">
								      <div class="card-body">
								        Lorem ipsum..
								      </div>
								    </div>
								  </div>

								  <div class="card text-center">
							      <a class="collapsed card-link primary-btn text-uppercase" data-toggle="collapse" href="#collapseThree">
							  	    <div class="card-header">
							  	        Collapsible Group Item #3
							  	    </div>
							      </a>
								    <div id="collapseThree" class="collapse" data-parent="#accordion">
								      <div class="card-body">
								        Lorem ipsum..
								      </div>
								    </div>
								  </div>
								</div>
									<!--<p>Who are in extremely love with eco friendly system..</p>-->
								</div>
							</div>
						</div>
					</div>
				</section>-->


				<!-- start footer Area -->
				<footer class="footer-area section-gap">
					<div class="container">
						<div class="row">
							<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
								<div class="single-footer-widget">
									<h6>¡Síguenos!</h6>

									<div class="footer-social d-flex align-items-center">
										<a href="https://www.facebook.com/arcvii.mx/"><i class="fa fa-facebook"></i></a>
										<a href="https://www.instagram.com/arcvii_mx/"><i class="fa fa-instagram"></i></a>
									</div>
								</div>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h6></h6>
									<p>

									</p>
									<p class="footer-text">
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
									arcvii &copy; <a href="terms.html" target="_blank">Términos y condiciones</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</p>
								</div>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h6></h6>
									<p>

									</p>
									<p class="footer-text">
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
									<a class="btn btn-sm btn-outline-link" data-target="#modalIMG" data-toggle="modal" href="#"><i class="fas fa-info-circle"></i> Como funciona arcvii</a>&nbsp;
									<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-body mb-0 p-0">

													<div class="container">
													  <div class="row">
													    <div class="col-12 col-sm-8 col-md-6 col-lg-12">
													      <div class="card ">
													        <div class="card-header ">
													          <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
													            <li class="nav-item">
													              <a class="nav-link active" href="#description" role="tab" aria-controls="description" aria-selected="true">¿Necesitas realizar un proyecto?</a>
													            </li>
													            <li class="nav-item">
													              <a class="nav-link"  href="#history" role="tab" aria-controls="history" aria-selected="false">¿Necesitas trabajar un proyecto?</a>
													            </li>
													          </ul>
													        </div>
													        <div class="card-body">

													           <div class="tab-content mt-3">
													            <div class="tab-pane active" id="description" role="tabpanel">
													              <img src="img/intro/colab.png" alt="" style="width:100%">
													            </div>

													            <div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">
													              <img src="img/intro/workplace.png" alt="" style="width:100%">
													            </div>

													          </div>
													        </div>
													      </div>
													    </div>
													  </div>
													</div>
												</div>
												<div class="modal-footer">
													<div><!--<a href="https://i3.ytimg.com/vi/vr0qNXmkUJ8/maxresdefault.jpg" target="_blank">Download</a>--></div>
													<button class="btn btn-outline-link " data-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
												</div>
											</div>
										</div>
									</div>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</p>
								</div>
							</div>


						</div>
					</div>
				</footer>
				<!-- End footer Area -->
			</div>
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script type="text/javascript">
				$('a[href^="#"]').click(function() {
				     $('html,body').animate({ scrollTop: $(this.hash).offset().top}, 1000);
				     return false;
				     e.preventDefault();
				});
				$('#bologna-list a').on('click', function (e) {
				  e.preventDefault()
				  $(this).tab('show')
				})
			</script>
			<script>$(function() {
					$("li#f1").click(function() {
							//alert("clicked:" + this.id);
					});

					$("li#f1").trigger("click");
			});</script>

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
  			<script src="js/easing.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/parallax.min.js"></script>
			<script src="js/mail-script.js"></script>
			<script src="js/isotope.pkgd.min.js"></script>
			<script src="js/main.js"></script>
		</body>
	</html>
