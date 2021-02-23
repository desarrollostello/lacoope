<x-app-layout>
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 mt-5 mb-5">
        <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
            <h1 class="font-bold text-gray-600">{{ $popup->name }}</h1>

            <div class="text-lg text-gray-500 mb-2">
                {{ $popup->start_date }}
            </div>

            <div class="text-lg text-gray-500 mb-2">
                {{ $popup->end_date }}
            </div>

            <div class="text-lg text-gray-500 mb-2">
                {{ $popup->title }}
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    <figure>
                        @if($popup->url)
                            <img class="w-full object-cover object-center" src="{{ Storage::url($popup->url) }}" alt="">
                        @else
                            <img class="w-full object-cover object-center" src="https://cdn.pixabay.com/photo/2021/02/08/15/02/mountains-5995081_960_720.jpg" alt="">
                        @endif
                    </figure>
                    <div class="text-base text-gray-500 mt-4">
                        {!! $popup->text !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>