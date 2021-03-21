<x-app-layout>
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
            <h1 class="uppercase txt-center text-2xl font-bold">Nuevo Curriculum</h1>

            {!! Form::open(['route' => 'rrhh.store', 'autocomplete' => 'off', 'files' => true]) !!}
                @include('rrhh.partials.form')
                {!! Form::submit('Cargar Curriculum', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

</x-app-layout>