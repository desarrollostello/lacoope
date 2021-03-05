<div>
    <div class="form-group">
        <label for="name" class="form-label mb-2">Nombre</label>
        <input wire:model.defer="name" id="name" placeholder="Ingrese su nombre" class="form-control" required/>
    </div>


    <div class="form-group">
        <label for="name" class="mt-4 form-label mb-2">Color (   {{ $this->color }}  )</label>
        <label style="display: inline">
            <input type="text" id="color" name="color" class="form-control" wire:model.defer="color" style="color:antiquewhite; background-color:{{ $this->color }}" />
        </label>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            $('#color').colorpicker();
            $('#color').on('colorpickerChange', function(event) {
                Livewire.emit('changeColor', event.color.toString())
            });
            
        })
        
    </script>
</div>                            

              

