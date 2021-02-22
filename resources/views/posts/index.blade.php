<x-app-layout>
    
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 mt-5 mb-5">
        <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $p)
                    <article class="w-full h-80 bg-cover bg-center" style="background-color: blue"
                                 style="background-image: url({{ Storage::url($p->image->url) }})">
                                <img src="{{ Storage::url($p->image->url) }}" alt="Imagen del post" />
            
                        <div class="w-full h-full px-8 flex flex-col justify-center" style="align-items: center">
                            <div class="w-full block" style="align-self:center; display: block">
                                @foreach ($p->tags as $tag)
                            <a href="" class="inline-block px-3 h-6 text-white bg-{{ $tag->color}}-600  rounded-full">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            <div class="w-full block"  style="align-self:center">
                                <h1 class="text4xl lead-8 font-bold">
                                <a class="text-white" href="{{ route('posts.show', $p) }}">{{ $p->name }}</a>
                                </h1>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mb-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

</x-app-layout>