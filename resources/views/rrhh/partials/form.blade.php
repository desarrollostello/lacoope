
    <div>
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre:')  !!}
            {!! Form::text('nombre', null, ['class' =>'form-control', 'placeholder'=> 'Ingrese su nombre', 'required'=>'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('telefono', 'Teléfono:')  !!}
            {!! Form::text('telefono', null, ['class' =>'form-control', 'placeholder'=> 'Ingrese su Teléfono', 'required'=>'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-mail:')  !!}
            {!! Form::email('email', null, ['class' =>'form-control', 'placeholder'=> 'Ingrese su E-mail', 'required'=>'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('file', 'Curriculum:')  !!}
            {!! Form::text('file', null, ['class' =>'form-control', 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('file', 'Cargue su Curriculum')  !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'pdf/*']) !!}
        </div>
        
    </div>                            

