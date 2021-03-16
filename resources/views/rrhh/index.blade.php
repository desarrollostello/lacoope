<x-app-layout>
    
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 mt-5 mb-5">
        <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
            
            {{-- <a href="{{ route('post.create') }}" class="btn btn-primary">Nueva Noticia</a>--}}

            <div class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @foreach ($rrhhs as $rrhh)
                    {{ $rrhh->nombre }}
                @endforeach
            </div>

            <div class="mb-4">
                {{ $rrhhs->links() }}
            </div>
        </div>
    </div>

</x-app-layout>