<?php include 'common/head.php'; ?>
    <?php include 'header.php'; ?>
    
        
		
        <?php include 'common/menu.php'; ?>
        
        <div class="container-fluid">
            <div id="imagen-ppal" class="mb-5">
                <img src="img/contacto-header.png" class="imag-responsive" alt="Imagen Header contacto" />
            </div>
        </div>

        <div class="container">
            <div class="row d-flex align-items-center text-center align-items-stretch">
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                    <span class="material-icons color-icon pr-0">location_on</span>
                    <div class="title-icon-contact">DIRECCIÓN</div>
                    <div class="text-icon-contact text-color mt-3">Alsina 140,<br />Carmen de Patagones (B8504BPC)<br /> Buenos Aires, Argentina</div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                    <span class="material-icons color-icon celular pr-0">call</span>
                    <div class="title-icon-contact">TELÉFONO</div>
                    <div class="text-icon-contact text-color mt-3">(02920) 461748</div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                    <span class="material-icons color-icon  celular pr-0">email</span>
                    <div class="title-icon-contact">EMAIL</div>
                    <div class="text-icon-contact text-color mt-3">recepcion@coopatagones.com.ar</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3020.261430142419!2d-62.98556009908461!3d-40.800248592689364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95f6a29df17060db%3A0x75c6aaa740c05e06!2sAdolfo%20Alsina%20140%2C%20Carmen%20de%20Patagones%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses!2sar!4v1612801972131!5m2!1ses!2sar" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                            <div id="formulario-contacto">
                                <form class="needs-validation" novalidate>
									<div class="form-group">
										<label for="nombre" class="bmd-label-floating">NOMBRE</label>
										<input type="text" class="form-control" id="nombre" name="nombre">
									</div>
									<div class="form-group">
										<label for="email" class="bmd-label-floating">EMAIL</label>
										<input type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
									  <label for="mensaje" class="bmd-label-floating">MENSAJE</label>
									  <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
									</div>

									<button type="submit" class="btn btn-primary btn-raised botones">ENVIAR</button>
								  </form>
                            </div>
                </div>
                
            </div>
        </div>

        <?php include 'logos-footer.php'; ?>
<?php include 'common/footer.php'; ?>
