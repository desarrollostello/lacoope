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
									<li class="nav-item active">
										<a class="nav-link" href="{{ route('home') }}">INICIO<span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('institucional') }}">INSTITUCIONAL</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('servicios') }}">SERVICIOS</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('novedades') }}">NOVEDADES</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{ route('paginarrhh') }}">RECURSOS HUMANOS</a>
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

        <!-- Carrousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="{{ asset('front/img/slider/1.png') }}" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="{{ asset('front/img/slider/2.png') }}" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="{{ asset('front/img/slider/3.png') }}" alt="Third slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="{{ asset('front/img/slider/4.png') }}" alt="Third slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="{{ asset('front/img/slider/5.png') }}" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Siguiente</span>
			</a>
		</div>
		<!-- Fin Carrousel -->
	

         <!-- Under Carrousel -->
         <div class="container-fluid">
			<div class="mycontainer container">
				<div class="row d-flex mt-4 mb-4  align-items-top">
					<div class="col-lg-4 col-md-4 col-sm-12 text-center">
						<img src="{{ asset('front/img/debajo.png') }}" class="img-fluid float-lg-left float-md-left" alt="">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-12">
						<p class="text-left text-coope">Abonando aquel amor de los primeros asociados por la empresa y su enérgica voluntad de llevarla a buen término. 
														Desde 1947, promoviendo el crecimiento económico y social de nuestros asociados, clientes, empleados y de la 
														comunidad en general. Con la misión focalizada en ser una entidad empresaria que representa a toda nuestra composición 
														societaria, con responsabilidad social, trabajo y 
						</p>
						<div class="row align-items-top">
							<div class="col-lg-3 col-md-3 text-center centrar-flex">
								<div>
									<img src="{{ asset('front/img/hacienda-y-remate.png') }}" class="img-fluid" alt="Hacienda y Remates">
									<p class="text-image-servicios negrita">HACIENDA Y REMATES</p>
								</div>
								
							</div>
							<div class="col-lg-3 col-md-3 text-center centrar-flex">
								<div>
									<img src="{{ asset('front/img/granos-e-insumos.png') }} " class="img-fluid" alt="Granos e Insumos">
									<p class="text-image-servicios negrita">GRANOS E INSUMOS</p>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 text-center centrar-flex">
								<div>
									<img src="{{ asset('front/img/servicios-sociales.png') }}" class="img-fluid" alt="Servicios Sociales">
									<p class="text-image-servicios negrita">SERVICIOS SOCIALES</p>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 text-center centrar-flex">
								<div>
									<img src="{{ asset('front/img/supermercados-unicoop.png') }}" class="img-fluid" alt="Supermercados Unicoop">
									<p class="text-image-servicios negrita">SUPERMERCADOS UNICOOP</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			
		</div>
         <!-- Fin Under Carrousel -->

		<!-- Information -->
		<div class="blue mt-5 mb-0">
			<div class="mycontainer container pt-5 pb-5">
				<div class="row d-flex align-items-center">
					<div class="col-lg-4 col-md-4 col-sm-12 text-center text-md-left spacing">
						<span class="text-light informacion">INFORMACIÓN DE INTERÉS PARA EL PRODUCTOR</span>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 text-center centrar-flex">
						<img src="{{ asset('front/img/indice-arrendamiento.png') }}" class="img-fluid" alt="">
					</div>
					<div class="col-lg-2 col-md-2 col-sm-12 text-center centrar-flex">
						<img src="{{ asset('front/img/clima.png') }}" class="img-fluid" alt="">
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 text-center centrar-flex">
						<img src="{{ asset('front/img/noticias-campo.png') }}" class="img-fluid" alt="">
					</div>
				</div>
			</div>
		</div>
		<!-- Fin Information -->
		<!-- HASTA ACA SE REPITE TODO -->

		<!--- Logos -->
		<div class="blue-light mt-0 mb-5">
			<div class="mycontainer container pt-5 pb-5">
				<div class="row d-flex align-items-center text-center">
					<div class="col-lg-4 col-md-4 col-sm-12 text-center text-md-left">
						<span class="text-light informacion"></span>
					</div>
					<div class="col-lg-8 col-md-12 col-sm-12 text-center text-md-left">
						<div class="row justify-center-sm">
							<div class="mb-1_5rem centrar-flex">
                            <img src="{{ asset('front/img/inta.png') }}" class="img-fluid" alt="">
							</div>

							<div class="mb-1_5rem centrar-flex">
								<img src="{{ asset('front/img/senasa.png') }}" class="img-fluid" alt="">
							</div>

							<div class="mb-1_5rem centrar-flex">
								<img src="{{ asset('front/img/arba.png') }}" class="img-fluid" alt="">
							</div>

							<div class="mb-1_5rem centrar-flex">
								<img src="{{ asset('front/img/afip.png') }}" class="img-fluid" alt="">
							</div>

							<div class="mb-1_5rem centrar-flex">
								<img src="{{ asset('front/img/agencia.png') }}" class="img-fluid" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Fin de Logos -------->

		<!-- NOTICAS -->

		
			{{ setlocale(LC_ALL, 'es_ES') }}
			{{ \Carbon\Carbon::setLocale('es') }}
		
			{{ $posts[0]->image }}

		<div class="container-fluid mb-5">
			<div class="mycontainer container">
				<div class="row d-flex align-items-center">
					<!-- primer noticia-->
					<div class="col-12 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center margin-bottom-sm">
						<div class="row d-flex align-items-center width-sm">
							<!--hora y titulo -->
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="notice-date centrar-flex azul">
									<div class="notice-day azul">{{ \Carbon\Carbon::parse($posts[0]->published)->format('d') }}</div>
									<div class="notice-month azul">{{ \Carbon\Carbon::parse($posts[0]->published)->formatLocalized('%B') }}</div>
									<div class="notice-year azul">{{ \Carbon\Carbon::parse($posts[0]->published)->format('Y') }}</div>
								</div>
								<br>
								<br>
								<div class="notice-title azul">{{ $posts[0]->name }}</div>
							</div>
							<!-- imagen-->
							<div class="col-lg-6 col-md-6 col-sm-12 imagen-sm">
								@if ($posts[0]->image)
									<img src="{{ Storage::url($posts[0]->image->url) }}" class="img-fluid padding-top-sm" alt="">
                                @else
									<img src="{{ Storage::url('montania.jpg') }}" class="img-fluid padding-top-sm" alt="">
                                @endif
								
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
									<div class="notice-day azul">{{ \Carbon\Carbon::parse($posts[1]->published)->format('d') }}</div>
									<div class="notice-month azul">{{ \Carbon\Carbon::parse($posts[1]->published)->formatLocalized('%B') }}</div>
									<div class="notice-year azul">{{ \Carbon\Carbon::parse($posts[1]->published)->format('Y') }}</div>
								</div>
								<br>
								<br>
								<div class="notice-title azul">{{ $posts[1]->name }}</div>
							</div>
							<!-- imagen-->
							<div class="col-lg-6 col-md-6 col-sm-12 order-sm-2 order-md-1 order-lg-2 order-2 imagen-sm">
								@if ($posts[1]->image)
									<img src="{{ Storage::url($posts[1]->image->url) }}" class="img-fluid padding-top-sm" alt="">
                                @else
									<img src="{{ Storage::url('montania.jpg') }}" class="img-fluid padding-top-sm" alt="">
                                @endif
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
								@if ($posts[2]->image)
									<img src="{{ Storage::url($posts[2]->image->url) }}" class="img-fluid padding-top-sm" alt="">
                                @else
									<img src="{{ Storage::url('montania.jpg') }}" class="img-fluid padding-top-sm" alt="">
                                @endif
							</div>
							<!--hora y titulo -->
							<div class="col-lg-6 col-md-6 col-sm-12  order-sm-1 order-md-1 order-lg-2 order-1">
								<div class="notice-date centrar-flex">
									<div class="notice-day azul">{{ \Carbon\Carbon::parse($posts[2]->published)->format('d') }}</div>
									<div class="notice-month azul">{{ \Carbon\Carbon::parse($posts[2]->published)->formatLocalized('%B') }}</div>
									<div class="notice-year azul">{{ \Carbon\Carbon::parse($posts[2]->published)->format('Y') }}</div>
								</div>
								<br>
								<br>
								<div class="notice-title azul">{{ $posts[2]->name }}</div>
							</div>
							
						</div>
					</div>
					<!-- termina primer noticia-->

					<!-- cuarta noticia-->
					<div class="col-12 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center margin-bottom-sm">
						<div class="row d-flex align-items-center width-sm">
							<!-- imagen-->
							<div class="col-lg-6 col-md-6 col-sm-12 order-sm-2 order-md-1 order-lg-1 order-2 imagen-sm">
								@if ($posts[3]->image)
									<img src="{{ Storage::url($posts[3]->image->url) }}" class="img-fluid padding-top-sm" alt="">
                                @else
									<img src="{{ Storage::url('montania.jpg') }}" class="img-fluid padding-top-sm" alt="">
                                @endif
							</div>
							<!--hora y titulo -->
							<div class="col-lg-6 col-md-6 col-sm-12 order-sm-1 order-md-2 order-lg-2 order-1">
								<div class="notice-date centrar-flex azul">
									<div class="notice-day azul">{{ \Carbon\Carbon::parse($posts[3]->published)->format('d') }}</div>
									<div class="notice-month azul">{{ \Carbon\Carbon::parse($posts[3]->published)->formatLocalized('%B') }}</div>
									<div class="notice-year azul">{{ \Carbon\Carbon::parse($posts[3]->published)->format('Y') }}</div>
								</div>
								<br>
								<br>
								<div class="notice-title azul">{{ $posts[3]->name }}</div>
							</div>
							
						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- END NOTICIAS -->
		
		<!---- EVENTOS Y BOLETIN -->
		<div class="container-fluid">
			<div class="row d-flex align-items-stretch">
				<div class="col-lg-6 boletin-eventos eventos">
						<div class="row">
							<div class="col-lg-4 col-md-12 eventos-boletin imagen-md"><img src="{{ asset('front/img/eventos.png') }}" alt="" class="image-fluid"></div>
							<div class="col-lg-8 col-md-12 eventos-boletin imagen-md">
								<h2 class="title-eventos-boletin title-evento">Eventos.</h2>
								<p>Aquí te informamos sobre los eventos más relevantes que se producen en el ámbito cooperativo y agroindustrial</p>
								<button type="button" class="btn btn-link buttons-eventos-boletin buttons-eventos">VER EVENTOS</button>
							</div>
						</div>
				</div>
				<div class="col-lg-6 boletin-eventos boletin">
					<div class="row">
						<div class="col-lg-8 imagen-md eventos-boletin">
							<h2 class="title-eventos-boletin title-boletin">Boletín.</h2>
							<p>Suscribite a nuestro boletín de novedades y eventos y recibirás todos los domingos un resúmen de la información más destacada en tu email.</p>
							<span class="input-center-sm">
							@livewire('subscripcion-table', ['desde' => 'front'])
							
							{{--<input style="width: 50%" type="text" class="input-1550 form-control" id="subscribirse" placeholder="E-mail"></span><br/>
							<button type="button" class="btn btn-link buttons-eventos-boletin button-boletin">SUBSCRIBIRSE</button>--}}
							
						</div>
						<div class="col-lg-4 imagen-md padding-top-md eventos-boletin"><img src="{{ asset('front/img/boletin.png') }}" alt="" class="image-fluid"></div>
					</div>
				</div>
			</div>
			
		</div>
		<!-- FIN DE EVENTOS Y BOLETON --->

		<!---- CONTACTENOS Y ESCRIBENOS -->
		<div class="container-fluid">
			<div class="row d-flex align-items-stretch">
				<div class="col-lg-6 back-contactanos">
						<div class="row align-items-center">
							<div class="col-lg-10 offset-lg-2 offset-md-0 col-md-12 col-xs-12 boletin-eventos">
								<h2 class="title-cantact">Contactanos /</h2>
								<p class="text-contactanos">Estimado cliente/asociado: Aquí todas las formas de contacto con nosotros. Puedes escribirnos un correo 
									electrónico usando el formulario de la derecha, llamarnos por teléfono o visitarnos personalmente en nuestras oficinas, de:
								</p>
								<p class="text-contactanos horario">LUNES A VIERNES 8:30 A 12:30 Y 16:30 A 20:30 <br />SABADOS 8:30 A 12:30</p>
								<div id="datos-de-contacto">
									<div class="datos"><span class="material-icons contact-icon celular">stay_current_portrait</span><span class="datos-contacto">(02920) 461748 </span></div>
									<div class="datos"><span class="material-icons contact-icon celular">mail_outline</span><span class="datos-contacto">recepcion@coopatagones.com.ar </span></div>
									<div class="datos"><span class="material-icons contact-icon celular">home</span><span class="datos-contacto">Alsina 140, Carmen de Patagones (B8504BPC) </span></div>
									<div class="datos"><span class="material-icons contact-icon celular">place</span><span class="datos-contacto">Ver ubicación en mapa de Google</span></div>
								</div>
							</div>
						</div>
				</div>
				<div id="escribenos" class="col-lg-6 boletin-eventos boletin">
					<div class="row align-items-center">
						<div class="col-lg-9 col-md-12 col-xs-12">
							<h2 class="title-eventos-boletin title-escribenos negrita-600">Escribenos /</h2>
							<div id="formulario">
								<form class="needs-validation" novalidate>
									<div class="form-group">
										<label for="nombre" class="bmd-label-floating">NOMBRE</label>
										<input type="text" class="form-control" id="nombre" name="nombre">
										<div class="invalid-feedback">Por favor, ingrese un nombre</div>
									</div>
									<div class="form-group">
										<label for="email" class="bmd-label-floating">EMAIL</label>
										<input type="email" class="form-control" id="email" name="email">
										<div class="invalid-feedback">Por favor, ingrese un email</div>
									</div>
									<div class="form-group">
									  <label for="mensaje" class="bmd-label-floating">MENSAJE</label>
									  <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
									  <div class="invalid-feedback">Por favor, ingrese un mensaje</div>
									</div>

									<button type="submit" class="btn btn-primary btn-raised botones">ENVIAR</button>
								  </form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!-- CONTACTENOS Y ESCRIBENOS --->

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

		@livewireScripts


		@if (isset($popup))
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
		
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							
						</div>
						<div class="modal-body" style="padding: 0rem">
							@if($popup->file)
								<img style="max-width: 800px; margin: 0 auto"  class="w-full object-cover object-center" src="{{ Storage::url('popups/' . $popup->file) }}" alt="">
							@else
								<img style="max-width: 800px; margin: 0 auto"  class="w-full object-cover object-center" src="{{ Storage::url('sin-imagen.jpg') }}" alt="">
							@endif
						</div>
						{{-- 
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
						--}}
					</div>
				</div>
			</div>
		@endif
	
		@if ($status == 2)
			<script>
				$(function() {
					$('#myModal').modal('show');
				});
			</script>
		@endif
		<!-- javascripts ---------->
		<script type="text/javascript">
			$("nav .nav-link").on("click", function(){
				var menues = $(".nav li"); 
				menues.removeClass("active");
				$(this).addClass("active");
			});

			$(document).ready(function() {      
				$('.carousel').carousel({
					interval: 2000
				});
		 	});
		</script>
	</body>
</html>
<!-- END FOOTER -->
