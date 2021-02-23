<x-app-layout>
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
            <h1 class="uppercase txt-center text-2xl font-bold">Nuevo Post</h1>

            {!! Form::open(['route' => 'post.store', 'autocomplete' => 'off', 'files' => true]) !!}
                @include('posts.partials.form')
                {!! Form::submit('Crear Noticia', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

</x-app-layout>
@section('css')
    <style>
        .image-wrapper{
            postion: relative;
            padding-bottom: 56.25%
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%
        }
    </style>
@endsection
