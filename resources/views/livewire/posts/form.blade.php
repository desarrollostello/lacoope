<div class="mb-4">
    <label for="created_at" class="form-label mb-2">Fecha de Publicación</label>
    <input type="date" wire:model="created_at" id="created_at" placeholder="Ingrese un título" class="form-control" required/>
</div>

<div class="mb-4">
    <label for="name" class="form-label mb-2">Título</label>
    <input type="text" wire:model="name" id="name" placeholder="Ingrese un título" class="form-control" required/>
</div>

{{-- 
<div class="mb-4">
    <label for="extract" class="form-label mb-2">Categorías</label>
    <select wire:model="categorySelected" name="" id="categorySelected" class="form-control">
        <option value="Seleccionar">Seleccionar</option>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select>
</div>
--}}

<div class="mb-4">
    <label for="extract" class="form-label mb-2">Estado</label>
    <label>
        <input type="radio" id="status" name="status" value="1", checked=true>Borrador
    </label>

    <label>
        <input type="radio" id="status" name="status" value="2", checked=false>Publicado
    </label>
</div>





<div class="mb-4">
    <label for="extract" class="form-label mb-2">Extracto</label>
    <textarea wire:model="extract" id="extract" name="extract" rows="4" cols="50" class="form-control" placeholder="Ingrese un Extracto" required></textarea>
</div>

<div class="mb-4">
    <label for="body" class="form-label mb-2">Contenido</label>
    <textarea wire:model="body" id="body" name="body" rows="4" cols="80" class="form-control" placeholder="Ingrese el cuerpo de la Noticia" required></textarea>
</div>

<div class="form-group">
    <p>Categorías</p>

    @foreach ($categories as $category)
        <label class="mr-3">
            <div class="n-check" id="divPermisos">
                <label class="new-control new-checkbox checkbox-primary">
                <input 
                    name="tags[]" 
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
                    value="{{ $tag->id }}" 
                    type="checkbox" 
                    class="new-control-input checkbox-rol">{{ $tag->name }}
                    
                </label>
            </div>  
        </label>
    @endforeach
</div>


