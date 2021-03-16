<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Mauro Tello">
		<meta name="generator" content="Mauro Tello">
		<title>Cooperativa de Patagones y Viedma</title>

		<!-- bootstrap  css -->
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

		<link rel="stylesheet" href="{{ mix('css/app.css') }}">

		<link href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/customFront.css') }}" rel="stylesheet">

		
		<script src="{{ asset('js/popper.min.js') }}" type="javascript"></script>	
		<script src="{{ asset('js/jquery-3.5.1.min.js') }}" type="javascript"></script>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		

		<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

			<!-- http://google.github.io/material-design-icons/ -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Favicons -->
        <!--
		<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png" sizes="180x180">
		<link rel="icon" href="img/favicon/favicon-32x32.png" sizes="32x32" type="image/png">
		<link rel="icon" href="img/favicon/favicon-16x16.png" sizes="16x16" type="image/png">
		<link rel="manifest" href="img/favicon/manifest.json">
		<link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#563d7c">
		<link rel="icon" href="img/favicon/favicon.ico">
			-->
		<!--<meta name="msapplication-config" content="favicon/browserconfig.xml">-->
		<meta name="theme-color" content="#026CC0">
	</head>
    <body>

        <!-- Head -->
        <div class="site-header py-1">
			<div class="container-fluid">
				<div class="mycontainer container">
					<div class="row p-0 d-flex">
						<div class="col-lg-6 col-md-12 col-sm-12 col-12 text-light text-lg-left text-md-center text-sm-center text-center">
							<span class="material-icons md-18 align-top reloj">query_builder</span>Lunes a Viernes 8:30 a 12:30 y 16:30 a 20:30 - Sábado 8:30 a 12:30
						</div>
						<div class="col-lg-2 col-md-12 col-sm-12 col-12 text-light text-lg-center text-md-center text-sm-center  text-center">
							<span class="material-icons md-18 align-top reloj">phone</span>(02920) 461748
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-12 text-light text-lg-right text-md-center text-sm-center  text-center">
							<span class="material-icons md-18 align-top reloj">email</span>recepcion@coopatagones.com.ar
						</div>
					</div>
				</div>
			</div>
        </div>
        <!-- Fin Head -->
        
        <!--  menu -->
        <div class="container-fluid">
			<div class="mycontainer container">
				<div class="row d-flex align-items-center pt-2 pb-2">
					<div class="col-lg-2 col-sm-4 d-flex justify-content-center logo">
                    <img class="img-responsive" src="{{ asset('front/img/logo-web.png') }}" width="65%" />
					</div>
					<div class="col-lg-10 col-sm-8 d-flex justify-content-lg-start justify-content-md-end justify-content-sm-end menu">
						<nav class="navbar navbar-expand-lg navbar-light bg-light">
							
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
								<ul class="navbar-nav text-center">
									<li class="nav-item">
										<a class="nav-link" href="{{ route('home') }}">INICIO<span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('institucional') }}">INSTITUCIONAL</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('servicios') }}">SERVICIOS</a>
									</li>
									<li class="nav-item active">
										<a class="nav-link" href="{{ route('novedades') }}">NOVEDADES</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('rrhh') }}">RECURSOS HUMANOS</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('contacto') }}">CONTACTO</a>
									</li>
									<!--
									<li class="nav-item">
										<a class="nav-link" href="#">INGRESO CLIENTES</a>
									</li>
									-->
								</ul>
							</div>
				
						</nav>

						<div id="ingreso-clientes" class="d-flex align-items-center justify-content-lg-end">INGRESO CLIENTES</div>
					</div>
					
				</div>
			</div>
        </div>
        <!-- fin de menu -->

        <div class="container-fluid p-0">
            <div id="imagen-ppal" class="mb-5">
                <img src="{{ asset('front/img/novedades-front.png') }}" class="w-100 imag-responsive" alt="Imagen Institucional" />
            </div>
		</div>
		
		{{ setlocale(LC_ALL, 'es_ES') }}
		{{ \Carbon\Carbon::setLocale('es') }}

        
        <div class="container-fluid mb-5">
			<div class="mycontainer container">
				<div class="row d-flex align-items-center">
					<!-- primer noticia-->
					<div class="col-12 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center margin-bottom-sm">
						<div class="row d-flex align-items-center width-sm">
							<!--hora y titulo -->
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="notice-date centrar-flex azul">
									<div class="notice-day" azul>02</div>
									<div class="notice-month azul">Abr</div>
									<div class="notice-year" azul>2020</div>
								</div>
								<br>
								<br>
								<div class="notice-title azul">En Unicoop nos cuidamos entre todos</div>
							</div>
							<!-- imagen-->
							<div class="col-lg-6 col-md-6 col-sm-12 imagen-sm">
								<img src="{{ asset('front/img/noticias/imagen1.png') }}" class="img-fluid padding-top-sm" alt="">
							</div>
						</div>
					</div>
					<!-- termina primer noticia-->

					<!-- segunda noticia-->
					<div class="col-12 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center margin-bottom-sm">
						<div class="row d-flex align-items-center width-sm">
							<!--hora y titulo -->
							<div class="col-lg-6 col-md-6 col-sm-12 order-sm-1 order-md-2 order-lg-1 order-1">
								<div class="notice-date centrar-flex azul">
									<div class="notice-day azul">02</div>
									<div class="notice-month azul">Abr</div>
									<div class="notice-year azul">2020</div>
								</div>
								<br>
								<br>
								<div class="notice-title azul">ACA Salud informa</div>
							</div>
							<!-- imagen-->
							<div class="col-lg-6 col-md-6 col-sm-12 order-sm-2 order-md-1 order-lg-2 order-2 imagen-sm">
								<img src="{{ asset('front/img/noticias/imagen2.png') }}" class="img-fluid padding-top-sm" alt="">
							</div>
						</div>

					</div>
				</div>

				<div class="row d-flex align-items-center">
					<!-- tercer noticia-->
					<div class="col-12 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center margin-bottom-sm">
						<div class="row d-flex align-items-center width-sm">
							<!-- imagen-->
							<div class="col-lg-6 col-md-6 col-sm-12 order-sm-2 order-md-2 order-lg-1 order-2  imagen-sm">
								<img src="{{ asset('front/img/noticias/imagen3.png') }}" class="img-fluid padding-top-sm" alt="">
							</div>
							<!--hora y titulo -->
							<div class="col-lg-6 col-md-6 col-sm-12  order-sm-1 order-md-1 order-lg-2 order-1">
								<div class="notice-date centrar-flex">
									<div class="notice-day azul">02</div>
									<div class="notice-month azul">Abr</div>
									<div class="notice-year azul">2020</div>
								</div>
								<br>
								<br>
								<div class="notice-title azul">En Unicoop nos cuidamos entre todos</div>
							</div>
							
						</div>
					</div>
					<!-- termina primer noticia-->

					<!-- cuarta noticia-->
					<div class="col-12 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center margin-bottom-sm">
						<div class="row d-flex align-items-center width-sm">
							<!-- imagen-->
							<div class="col-lg-6 col-md-6 col-sm-12 order-sm-2 order-md-1 order-lg-1 order-2 imagen-sm">
								<img src="{{ asset('front/img/noticias/imagen4.png') }}" class="img-fluid padding-top-sm" alt="">
							</div>
							<!--hora y titulo -->
							<div class="col-lg-6 col-md-6 col-sm-12 order-sm-1 order-md-2 order-lg-2 order-1">
								<div class="notice-date centrar-flex azul">
									<div class="notice-day azul">02</div>
									<div class="notice-month azul">Abr</div>
									<div class="notice-year azul">2020</div>
								</div>
								<br>
								<br>
								<div class="notice-title azul">ACA Salud informa</div>
							</div>
							
						</div>

					</div>
				</div>
			</div>
		</div>

		<!---- FIN DE NOTICIAS --->

		<!-- LOGOS PRE FOOTER -->

		<div class="root d-flex logos-pre-footer">
			<div class="col d-flex justify-content-center align-items-center">
				<a href="www.facebook.com/UnicoopSupermercados" target="_blank"><img src="{{ asset('front/img/unicoop.png') }}" class="img-fluid" alt=""></a>
			</div>
			<div class="col d-flex justify-content-center align-items-center">
				<a href="www.coovaeco.com" target="_blank"><img src="{{ asset('front/img/covaeco.png') }}" class="img-fluid" alt=""></a>
			</div>
			<div class="col  d-flex justify-content-center align-items-center">
				<a href="www.lasegunda.com.ar" target="_blank"><img src="{{ asset('front/img/lasegunda.png') }}" class="img-fluid" alt=""></a>
			</div>
			<div class="col  d-flex justify-content-center align-items-center">
				<a href="www.fridevi.com.ar" target="_blank"><img src="{{ asset('front/img/fridevi.png') }}" class="img-fluid" alt=""></a>
			</div>
			<div class="col  d-flex justify-content-center align-items-center">
				<a href="www.acasalud.com.ar" target="_blank"><img src="{{ asset('front/img/aca.png') }}" class="img-fluid" alt=""></a>
			</div>
		</div>
		<!-- // LOGOS PRE FOOTER-->

		<!-- FOOTER -->
				
		<div class="row" id="footer">
			<div class="col-6 texto-footer d-flex justify-content-center align-items-center">LA COOPERATIVA DE PATAGONES Y VIEDMA</div>
			<div class="col-6 logo-footer  d-flex justify-content-center align-items-center">logo</div>
		</div>
			
	
		<!-- javascripts ---------->
		
		
		
		<script type="text/javascript">
			$("nav .nav-link").on("click", function(){
				var menues = $(".nav li"); 
				menues.removeClass("active");
				//alert(this);
				$(this).addClass("active");
			});

			
	</script>
	</body>
</html>
		<!-- END FOOTER -->
