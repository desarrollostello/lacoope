<div class="form-group">
    <label for="start_date" class="form-label mb-2">Fecha de Inicio</label>
    {!! Form::date('start_date', null, ['class'=>'form-control']) !!}
    @error('start_date')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="end_date" class="form-label mb-2">Fecha de Inicio</label>
    {!! Form::date('end_date', null, ['class'=>'form-control']) !!}
    @error('end_date')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('name', 'Nombre:')  !!}
    {!! Form::text('name', null, ['class' =>'form-control', 'placeholder'=> 'Ingrese el Nombre del Popup']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('title', 'Título:')  !!}
    {!! Form::text('title', null, ['class' =>'form-control', 'placeholder'=> 'Ingrese el Título del Popup']) !!}

    @error('title')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('text', 'Cuerpo del Popup') !!}
    {!! Form::textarea('text', null, ['class'=>'form-control']) !!}
    @error('text')
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
            @isset($popup->url)
                <img id="picture" src="{{ Storage::url($popup->url) }}" alt="">
            @else
                <img id="picture" src="{{ Storage::url('montania.jpg') }}" alt="">
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