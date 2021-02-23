<div>
    <div class="mb-4">
        <label for="date" class="form-label mb-2">Fecha de Publicación</label>
        <input type="date" wire:model.lazy="date" id="date" placeholder="Ingrese un título" class="form-control" required/>
    </div>

    <div class="mb-4">
        <label for="name" class="form-label mb-2">Título</label>
        <input type="text" wire:model.lazy="name" id="name" placeholder="Ingrese un título" class="form-control" required/>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-4">
        <label for="status" class="form-label mb-2">Estado</label>
        <label>
            <input wire:model="status" type="radio" id="status" name="status" value="1", checked=true>Borrador
        </label>

        <label>
            <input wire:model="status" type="radio" id="status" name="status" value="2", checked=false>Publicado
        </label>
    </div>


    <div class="mb-4">
        <label for="extract" class="form-label mb-2">Extracto</label>

        <textarea id="extract" name="extract" rows="4" cols="50" class="form-control" placeholder="Ingrese un Extracto" required wire:model.lazy="extract"></textarea>
    </div>

    <div class="mb-4">
        <label for="body" class="form-label mb-2">Contenido</label>

       <textarea id="body" name="body" rows="4" cols="80" class="form-control" placeholder="Ingrese el cuerpo de la Noticia" required wire:model.lazy="body"></textarea>
    </div>

    <div class="form-group">
        <p>Categorías</p>

        @foreach ($categories as $category)
            <label class="mr-3">
                <div class="n-check" id="divPermisos">
                    <label class="new-control new-checkbox checkbox-primary">
                    <input 
                        name="categories[]"
                        wire:model.lazy="categoriesSelected"
                        value="{{ $category->id }}" 
                        type="checkbox" 
                        class="new-control-input checkbox-rol">{{ $category->name }}
                        
                    </label>
                </div>  
            </label>
        @endforeach
    </div>


    <div class="form-group">
        <p>Etiquetas</p>

        @foreach ($tags as $tag)
        
            <label class="mr-3">
                <div class="n-check" id="divPermisos">
                    <label class="new-control new-checkbox checkbox-primary">
                    <input 
                        name="tags[]"
                        wire:model.lazy="tagsSelected"
                        value="{{ $tag->id }}" 
                        type="checkbox" 
                        class="new-control-input checkbox-rol">{{ $tag->name }}
                        
                    </label>
                </div>  
            </label>
        @endforeach
    </div>

</div>
