<x-app-layout>
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 mt-5 mb-5">
        <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
            <h1 class="font-bold text-gray-600">{{ $rrhh->nombre }}</h1>

            <div class="text-lg text-gray-500 mb-2">
                {{ $rrhh->telefono }}
            </div>

            <div class="text-lg text-gray-500 mb-2">
                {!! $rrhh->email !!}
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    
                    <div class="text-base text-gray-500 mt-4">
                        {!! $rrhh->file !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>