<x-app-layout>
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 mt-5 mb-5">
        <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
            <h1 class="font-bold text-gray-600">{{ $post->name }}</h1>

            <div class="text-lg text-gray-500 mb-2">
                {{ $post->published }}
            </div>

            <div class="text-lg text-gray-500 mb-2">
                {!! $post->extract !!}
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    <figure>
                        @if($post->image)
                            <img class="w-full object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
                        @else
                            <img class="w-full object-cover object-center" src="https://cdn.pixabay.com/photo/2021/02/08/15/02/mountains-5995081_960_720.jpg" alt="">
                        @endif
                    </figure>
                    <div class="text-base text-gray-500 mt-4">
                        {!! $post->body !!}
                    </div>

                    <div class="mt-5 mb-5">
                        <h4 class="font-bold text-gray-700 display-inline" style="display: inline;">Categorías: </h4>
                        
                        @foreach ($post->categories as $category)
                            <a href="{{ route('posts.category', $category) }}" style="background-color: {{ $category->color }}" class="px-3 h-6 text-white rounded-full">{{ $category->name }}</a>
                        @endforeach
                    </div>

                    <div class="mt-5 mb-5">
                        <h4 class="font-bold text-gray-700 display-inline" style="display: inline;">Etiquetas: </h4>
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.tag', $tag) }}" class="px-3 h-6 text-white bg-{{ $tag->color}}-600  rounded-full">{{ $tag->name }}</a>
                        @endforeach
                    </div>

                </div>
                <aside>
                         
                    <h1 class="text-2xl font-bold text-gray-600 mb-4">Posts Relacionados</h1>
                        

                    <ul>
                        @foreach ($similares as $similar)
                            <li class="mb-4">
                                <a class="flex" href="{{ route('post.ver', $similar) }}">
                                    @if($similar->image)
                                        <img class="w-50 h-40 object-cover object-center" src="{{ Storage::url($similar->image->url) }}" /> </a>
                                    @else
                                    <img class="w-36 h-20 object-cover object-center" src="{{ Storage::url('montania.jpg') }}" /> </a>
                                    @endif
                                    <span>Publicado: {{ $similar->published }}</span><br>
                                    <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</x-app-layout>