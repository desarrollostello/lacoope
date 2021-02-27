<x-app-layout>
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 mt-5 mb-5">
        <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
            <a href="{{ route('popups2') }}" class="btn btn-primary">Volver al Listado</a>
            <h1 class="font-bold text-gray-600 text-center">Nombre del Popup: {{ $popup->name }}</h1>

            <div class="text-lg text-gray-500 mb-2 text-center">
                Fecha de Inicio: {{ $popup->start_date }} | Fecha de Finalización {{ $popup->end_date }}
            </div>

            
            <div class="text-center text-lg text-gray-500 mb-2">
                Título: {{ $popup->title }}
            </div>

            <div class="text-center text-base text-gray-500 mt-4 mb-10">
                Texto: {!! $popup->text !!}
            </div>



            <div class="grid grid-cols-1 lg:grid-cols-1">
                <div class="flex flex-wrap content-center">
                    <figure class="object-center" style="max-width: 600px; margin: 0 auto">
                        @if($popup->file)
                            <img class="w-full object-cover object-center" src="{{ Storage::url('popups/' . $popup->file) }}" alt="">
                        @else
                            <img class="w-full object-cover object-center" src="{{ Storage::url('sin-imagen.jpg') }}" alt="">
                        @endif
                    </figure>
                    
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>