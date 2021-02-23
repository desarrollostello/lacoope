<div class="form-group">
    <label for="published" class="form-label mb-2">Fecha de Publicación</label>
    {{-- <input type="date" id="published" name="published" class="form-control" required/>--}}
    {!! Form::date('published', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Nombre:')  !!}
    {!! Form::text('name', null, ['class' =>'form-control', 'placeholder'=> 'Ingrese el Título de la Noticia']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="form-group">
    <p class="font-weight-bold">Categorías: </p>
    @foreach ($categories as $category)
        <label class="mr-3">
            {!! Form::checkbox('categories[]', $category->id, null)  !!}
            {{ $category->name }}
        </label>
    @endforeach
    
    @error('categories')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas: </p>
    @foreach ($tags as $tag)
        <label class="mr-3">
            {!! Form::checkbox('tags[]', $tag->id, null)  !!}
            {{ $tag->name }}
        </label>
    @endforeach
    <hr>
    @error('tags')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado: </p>
        <label>
            {!! Form::radio('status', 1, true) !!} Borrador
        </label>
        <label>
            {!! Form::radio('status', 2) !!} Publicado
        </label>
        
        @error('status')
            <br>
            <small class="text-danger">{{ $message }}</small>
        @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($post->image)
                <img id="picture" src="{{ Storage::url($post->image->url) }}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2021/02/08/15/02/mountains-5995081_960_720.jpg" alt="">
            @endif
        </div>
        
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrará en la noticia')  !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extractos') !!}
    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}
    @error('extract')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo de la Noticia') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    @error('body')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>