	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
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
		<script src="https://kit.fontawesome.com/460719b847.js"></script>
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
						  <a class="navbar-brand" href="index.html">
						  	<img src="img/logo.png" alt="">
						  </a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="text-white lnr lnr-menu"></span>
						  </button>

						  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
						    <ul class="navbar-nav">
						    	<?php
						    	if(isset($_SESSION)){
								    return true;
								  }else{
								    echo "<li><a href=\"sign-in/\">Entrar <i class=\"fas fa-sign-in-alt\"></i></a></li>\n";
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
								<h5 class="text-uppercase">Los mejores expertos existiendo aqui</h5>
								<h1>
										
									Proyectos grandes para ideas grandes		
								</h1>
								<a href="#portfolio" class="primary-btn text-uppercase">Explorar</a>
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
									<h1 class="mb-10">Proyectos de grandes mentes que te ayudaran a convertir tu idea a realidad.</h1>
									<p>Cuidando tus intereses desde el inicio</p>
								</div>
							</div>
						</div>
				    
				    <div class="filters">
				      <ul>
				        <li class="active" data-filter="*">All</li>
				        <li data-filter=".corporate">Vector</li>
				        <li data-filter=".personal">Raster</li>
				        <li data-filter=".agency">UI/UX</li>
				        <li data-filter=".portal">Printing</li>
				      </ul>
				    </div>
				    
				    <div class="filters-content">
				      <div class="row grid">
				        <div class="single-portfolio col-sm-4 all corporate">
				          <div class="item">
				            <img src="img/p1.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h4>3D Helmet Design</h4>
				              <div class="cat">Corporate</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all personal">
				          <div class="item">
				            <img src="img/p2.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h4>2D Vinyl Design</h4>
				              <div class="cat">Personal</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all agency">
				          <div class="item">
				            <img src="img/p3.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Creative Poster Design</h5>
				              <div class="cat">Agency</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all portal">
				          <div class="item">
				            <img src="img/p4.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Embosed Logo Design</h5>
				              <div class="cat">Portal</div>
				            </div>
				          </div>
				        </div>

				        <div class="single-portfolio col-sm-4 all corporate">
				          <div class="item">
				            <img src="img/p5.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h4>3D Helmet Design</h4>
				              <div class="cat">Corporate</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all personal">
				          <div class="item">
				            <img src="img/p6.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h4>2D Vinyl Design</h4>
				              <div class="cat">Personal</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all agency">
				          <div class="item">
				            <img src="img/p2.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Creative Poster Design</h5>
				              <div class="cat">Agency</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all portal">
				          <div class="item">
				            <img src="img/p3.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Embosed Logo Design</h5>
				              <div class="cat">Portal</div>
				            </div>
				          </div>
				        </div>		
				        <div class="single-portfolio col-sm-4 all corporate">
				          <div class="item">
				            <img src="img/p4.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h4>3D Helmet Design</h4>
				              <div class="cat">Corporate</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all personal">
				          <div class="item">
				            <img src="img/p3.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h4>2D Vinyl Design</h4>
				              <div class="cat">Personal</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all agency">
				          <div class="item">
				            <img src="img/p2.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Creative Poster Design</h5>
				              <div class="cat">Agency</div>
				            </div>
				          </div>
				        </div>
				        <div class="single-portfolio col-sm-4 all portal">
				          <div class="item">
				            <img src="img/p1.jpg" alt="Work 1">
				            <div class="p-inner">
				              <h5>Embosed Logo Design</h5>
				              <div class="cat">Portal</div>
				            </div>
				          </div>
				        </div>					        		        
				        
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
									<h1 class="mb-10 text-white">¿Que ofrecemos?</h1>
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
										Expertos en cada caracerizstica descrita en el proyecto.
									</p>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="single-service">
									<img class="img-fluid" src="img/s2.png" alt="">
									<h4>Pagalo como tu decidas</h4>
									<p>
										Aceptamos todas las tarjetas, OXXO, meses sin intereses.
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
									<h1 class="mb-10">El trabajo dice mas que mil palabras</h1>
									<!--<p>Who are in extremely love with eco friendly system..</p>-->
								</div>
							</div>
						</div>							
						<div class="row">
							<div class="col-lg-6">
								<div class="single-review">
									<img src="img/c1.png" alt="">
									<div class="title d-flex flex-row">
										<a href="#"><h4>Fannie Rowe</h4></a>									
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star"></span>
										</div>
									</div>
									<p>
										Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
									</p>
								</div>	
								<div class="single-review">
									<img src="img/c3.png" alt="">
									<div class="title d-flex flex-row">
										<a href="#"><h4>Lillie Summers</h4></a>									
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
										</div>
									</div>
									<p>
										Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
									</p>
								</div>															
							</div>
							<div class="col-lg-6">
								<div class="single-review">
									<img src="img/c2.png" alt="">
									<div class="title d-flex flex-row">
										<a href="#"><h4>Hulda Sutton</h4></a>									
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
										</div>
									</div>
									<p>
										Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
									</p>
								</div>	
								<div class="single-review">
									<img src="img/c4.png" alt="">
									<div class="title d-flex flex-row">
										<a href="#"><h4>Ruth Burns</h4></a>									
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
										</div>
									</div>
									<p>
										Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
									</p>
								</div>															
							</div>							
						</div>	
				</section>
				<!-- End review Area -->
				

				<!-- start footer Area -->		
				<footer class="footer-area section-gap">
					<div class="container">
						<div class="row">
							<div class="col-lg-5 col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h6>About Us</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
									</p>
									<p class="footer-text">
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</p>	
								</div>
							</div>
							<div class="col-lg-5  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h6>Newsletter</h6>
									<p>Stay update with our latest</p>
									<div class="" id="mc_embed_signup">
										<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
											<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
				                            	<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
				                            	<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>

											<div class="info"></div>
										</form>
									</div>
								</div>
							</div>						
							<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
								<div class="single-footer-widget">
									<h6>Follow Us</h6>
									<p>Let us be social</p>
									<div class="footer-social d-flex align-items-center">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-dribbble"></i></a>
										<a href="#"><i class="fa fa-behance"></i></a>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</footer>	
				<!-- End footer Area -->					
			</div>
			<script type="text/javascript">
				$('a[href^="#"]').click(function() {
				     $('html,body').animate({ scrollTop: $(this.hash).offset().top}, 1000);
				     return false;
				     e.preventDefault();
				});
			</script>
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



