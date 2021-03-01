<?php include 'common/head.php'; ?>
    <?php include 'header.php'; ?>
    
        
		
        <?php include 'common/menu.php'; ?>
        
        <div class="container-fluid">
            <div id="imagen-ppal" class="mb-5">
                <img src="img/rrhh.png" class="imag-responsive" alt="Imagen Recursos Humanos" />
            </div>
        </div>

        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-6 col-md-12 col-sm-12">
                        <div id="title-institucional" class="azul mb-4"><h3><span class="negrita">¿Te gustaría trabajar en la Cooperativa?</span></h3></div>
                        <div id="texto-institucional">
                                <span class="text-color">
                                    <div id="title-institucional" class="mb-4"><h5>No dejes pasar esta oportunidad<br /><br />Nuestra Cooperativa está seleccionando personal.<br />
                                        Envianos tu solicitud, completando el siguiente formulario y adjuntando tu CV.</h5></div>
                                </span>
                            
                        </div>
                        <div id="formulario-rrhh" class="mt-6">
                            <span class="negrita">* Todos los datos son requeridos</span>

                            <div class="row align-items-center mt-5">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <div id="formulario-rrhh-1">
                                        <form>
                                            <div class="form-group">
                                                <label for="nombre" class="bmd-label-floating">NOMBRE</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre">
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="bmd-label-floating">EMAIL</label>
                                                <input type="email" class="form-control" id="email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono" class="bmd-label-floating">TELÉFONO</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono">
                                            </div>

                                            <div class="form-group">
                                                <label for="telefono" class="bmd-label-floating">Añade tu CV</label>
                                                <input type="file" class="form-control-file" id="cv" name="cv">
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-raised botones">ENVIAR</button>
                                        </form>
                                    </div>
                                </div>
                            </div>



                        </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-6">
                    <img src="img/rrhh-cv.png" alt="Imagen Recursos Humanos" width="100%">
                </div>
            </div>
        </div>

        <?php include 'logos-footer.php'; ?>
<?php include 'common/footer.php'; ?>
