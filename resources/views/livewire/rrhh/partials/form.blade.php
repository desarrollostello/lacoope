
    <div>
        <div class="form-group">
            <label for="nombre" class="form-label mb-2">Nombre</label>
            <input wire:model.defer="nombre" id="nombre" placeholder="Ingrese su nombre" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="telefono" class="form-label mb-2">Teléfono</label>
            <input wire:model.defer="telefono" id="telefono" placeholder="Ingrese su teléfono" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="email" class="form-label mb-2">E-mail</label>
            <input wire:model.defer="email" id="email" placeholder="Ingrese su E-mail" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="file" class="bmd-label-floating">Añade tu CV</label>
            <input type="file" class="form-control-file" id="file" name="file" required>
        </div>
        
    </div>                            

