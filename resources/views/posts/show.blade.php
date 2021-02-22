<x-app-layout>
    
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 mt-5 mb-5">
        <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
            <h1 class="font-bold text-gray-600">{{ $post->name }}</h1>

            <div class="text-lg text-gray-500 mb-2">
                {{ $post->extract }}
            </div>

            <div class="grid grid-cols-3">
                <div class="col-span-2">
                    <figure>
                        <img src="{{ Storage::url($post->image->url) }}" alt="">
                    </figure>

                </div>
                <aside>

                </aside>
            </div>
        </div>
    </div>
</x-app-layout>