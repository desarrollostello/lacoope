<x-app-layout>
    
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 mt-5 mb-5">
        <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
            
            <a href="{{ route('post.create') }}" class="btn btn-primary">Nueva Noticia</a>

            <div class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @foreach ($posts as $p)
                    @if($p->status == 2)
                        <div class="card">
                    @else
                        <div class="card" style="border: 2px solid red">
                    @endif
                    
                        <img src="
                                @if ($p->image)
                                    {{ Storage::url($p->image->url) }}
                                @else
                                    {{ Storage::url('montania.jpg') }}
                                @endif
                                " 
                            class="card-img-top w-full h-80"
                            alt="Imagen de la Noticia"
                        >
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->name }}</h5> Fecha de creación: {{ $p->published }} | <b>Estado: @if($p->status == 1) Borrador @else Publicado @endif</b>
                            <p class="card-text">{!! $p->extract !!}</p>
                            
                            <div class="border-t-2 border-gray-400 pt-2 pb-2 block overflow-hidden">
                                <span class="text-sm text-gray-700 font-bold ml-3">Categorías: </span>
                                @foreach ($p->categories as $category)
                                    <a href="{{ route('posts.category', $category) }}" class="inline-block px-4 h-6 text-white bg-{{ $category->color}}-600  rounded-full">{{ $category->name }}</a>
                                @endforeach
                            </div>

                            <div class="pt-3 pb-4 block h-auto overflow-hidden">
                                @foreach ($p->tags as $tag)
                                    <a href="{{ route('posts.tag', $tag) }}" class="inline-block float-right px-3 h-6 text-white bg-{{ $tag->color}}-600  rounded-full">{{ $tag->name }}</a>
                                @endforeach
                                <span class="text-sm text-gray-700 font-bold float-right mr-3">Etiquetas: </span>
                            </div>

                            
                        </div>
                        <div class="card-footer text-muted">
                            <div class="overflow-hidden pt-2">
                                <a href="{{ route('posts.show', $p) }}" class="btn btn-primary">Ver Noticia</a>
                                <a href="{{ route('post.edit', $p) }}"  class="btn btn-warning">Editar Noticia</a>
                            </div>
                        </div>
                    </div>

                    {{-- 
                    <article class="w-full h-80 bg-cover bg-center mb-8"
                                 style="overflow: hidden; background-image: url(@if($p->image) {{ Storage::url($p->image->url) }} @else https://cdn.pixabay.com/photo/2021/02/08/15/02/mountains-5995081_960_720.jpg  @endif)">
            
                        <div class="w-full h-full px-8 flex flex-col justify-center" style="align-items: center">
                            <div class="w-full block" style="align-self:center; display: block">
                                @foreach ($p->categories as $category)
                                    <a href="{{ route('posts.category', $category) }}" class="inline-block px-3 h-6 text-white bg-{{ $category->color}}-600  rounded-full">{{ $category->name }}</a>
                                @endforeach
                            </div>
                            <div class="w-full block"  style="align-self:center">
                                <h1 class="text4xl lead-8 font-bold">
                                    <a class="text-white" href="{{ route('posts.show', $p) }}">{{ $p->name }}</a><small>{{ $p->published }}</small>
                                </h1>
                            </div>
                            <div class="w-full block" style="align-self:center; display: block">
                                @foreach ($p->tags as $tag)
                                    <a href="{{ route('posts.tag', $tag) }}" class="inline-block float-right px-3 h-6 text-white bg-{{ $tag->color}}-600  rounded-full">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            <a href="{{ route('post.edit', $p) }}">Editar</a>
                        </div>
                    </article>
                        --}}
                @endforeach
            </div>

            <div class="mb-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

</x-app-layout>