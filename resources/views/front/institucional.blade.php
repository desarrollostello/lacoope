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
										<a class="nav-link" href="index.php">INICIO<span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item active">
										<a class="nav-link" href="institucional.php">INSTITUCIONAL</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="servicios.php">SERVICIOS</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="novedades.php">NOVEDADES</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="rrhh.php">RECURSOS HUMANOS</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="contacto.php">CONTACTO</a>
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






        <div class="container-fluid">
            <div id="imagen-ppal" class="mb-5">
				<img src="{{ asset('front/img/institucional-header-img.png') }} " class="imag-responsive" alt="Imagen Institucional" />
            </div>
        </div>

        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div id="title-institucional" class="azul mb-4"><h3>Quienes somos / <span class="negrita">Historia</span></h3></div>
                    <div id="texto-institucional">
                        <span class="negrita text-color">El 23 de febrero de 1947 nació la Cooperativa Agrícola, Ganadera e Industrial de Patagones y Viedma, integrada por varios productores de ambas márgenes del río Negro y gente del instituto de colonización de tierras fiscales.<br /><br /></span>
                        <span class="text-color">
                        Iniciada la Asamblea se elige por unaminidad de votos a las autoridades que la coordinarían. El mensaje era claro y contundente: “Los asociados no se agrupan con la finalidad de realizar una buena operación financiera, sino de beneficiarse con la eliminación de intermediarios convirtiéndose en distribuidores de sus propias necesidades de crédito. Para lograrlo no es necesario empezar con grandes capitales ni complejos estatutos, pero si es completamente imprescindible el amor de los primeros asociados por la empresa y su enérgica voluntad de llevarla a buen termino…”.<br /><br />
                        Durante estos años de trabajo incansable, ha sido necesario adaptarse a los cambios manifestados por nuestra sociedad, enfrentando nuevos desafíos y detectando oportunidades. Esa capacidad de nuestros integrantes mantuvo, sin embargo la férrea misión de crecer junto a los socios, los empleados y la sociedad.<br /><br />
                        Fueron y son ellos quienes, día a día, hacen de esta institución algo grande, fomentando el trabajo, el crecimiento y el bienestar de nuestra población.
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-6">
                    <img src="{{ asset('front/img/imagen-institucional.png') }}" alt="Imagen Institucional" width="100%">
                </div>
            </div>
		</div>
		

		<div class="container-fluid blue mt-5 mb-5 pb-5">
    		<div class="container pt-5" style="max-width: 1300px">
				<div id="title-hitos" class="d-flex text-light mb-5">HITOS DE NUESTRA HISTORIA</div>
				<div id="nuestra-historia" class="row d-flex align-items-stretch">

					<div class="col-lg-3 col-md-12 col-sm-12 historia historia-1947">
						<div class="top d-flex align-items-center">
							<div class="redondel back-celeste"></div>
							<div class="line"><hr></div>
						</div>
						
						<div class="historia-number celeste text-md-center1">1947</div>
						<div class="historia-title text-light negrita text-md-center1">NACIMIENTO</div>
						<div class="historia-text text-light text-md-center1">El 23 de Febrero iniciamos el desafio de construir juntos una empresa común</div>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12 historia historia-1970">
						<div class="top d-flex align-items-center">
							<div class="redondel back-celeste"></div>
							<div class="line"><hr></div>
						</div>
						<div class="historia-number celeste text-md-center1">1970</div>
						<div class="historia-title text-light negrita text-md-center1">NUESTRO SUPERMERCADO</div>
						<div class="historia-text text-light text-md-center1">Inauguramos nuestro primer supermercado en la ciudad e Patagones</div>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12 historia historia-1998">
						<div class="top d-flex align-items-center">
							<div class="redondel back-celeste"></div>
							<div class="line"><hr></div>
						</div>
						<div class="historia-number celeste text-md-center1">1998</div>
						<div class="historia-title text-light negrita text-md-center1">NACE UNICOOP</div>
						<div class="historia-text text-light text-md-center1">Creamos y lanzamos la marca que identifica a nuestros supermercados</div>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12 historia historia-2017">
						<div class="top d-flex align-items-center">
							<div class="redondel back-celeste"></div>
							<div class="line"><hr></div>
						</div>
						<div class="historia-number celeste text-md-center1">2017</div>
						<div class="historia-title text-light negrita text-md-center1">NACE UNICOOP</div>
						<div class="historia-text text-light text-md-center1">Ampliando y refuncionalizando todos nuestros supermercados e inauguramos nuevas oficias para una mejor atención</div>
					</div>
        		</div>
    		</div>
		</div>
		

        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div id="title-institucional" class="azul mb-4"><h3>Quienes somos / <span class="negrita">Misiones y Funciones</span></h3></div>
                    <div id="texto-institucional">
                        <span class="negrita text-color">La Cooperativa Agrícola, Ganadera e Industrial de Patagones y Viedma promueve, desde 1947, el crecimiento económico y social de sus asociados, clientes, empleados y de la comunidad en general.<br /><br /></span>
                        <span class="text-color">
                        Su misión está focalizada en ser una entidad empresaria que represente a toda su composición societaria, con responsabilidad social, trabajo y esfuerzo.<br /><br />
                        A lo largo de sus casi setenta años de trayectoria, la Cooperativa ha crecido de manera ininterrumpida, contando con el apoyo de la sociedad, generando valor para la región, y realizando acciones de manera transparente y confiable.<br /><br />
                        La colaboración, la solidaridad, el respeto, la honestidad, la unidad y la lealtad fueron y son los valores que caracterizan a la institución y a sus integrantes.
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-6">
                    <img src="img/imagen-institucional.png" alt="Imagen Institucional" width="100%">
                </div>
            </div>
        </div>
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
