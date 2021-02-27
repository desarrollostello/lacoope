@props(['post'])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if($post->image)
        <img class="w-full h-72 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="" />
    @else
    <img class="w-full h-72 object-cover object-center" src="{{ Storage::url('montania.jpg') }}" alt="" />
    @endif
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('post.show', $post) }}">{{ $post->name }}</a>
        <span class="text-gray-700 text-base">(Fecha de Publicación: {{ $post->published }})</span>
        </h1>
        <div class="text-gray-700 text-base">{!! $post->extract !!}</div>
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <a href="{{ route('posts.tag', $tag) }}" class="inline-block bg-gray-200 reounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{ $tag->name }}</a>
        @endforeach
    </div>
</article>