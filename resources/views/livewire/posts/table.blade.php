@if ($posts->count())
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="cursor-pointer px-4 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('created_at')">
                    Fecha Creación
                </th>
                <th scope="col" class="cursor-pointer px-4 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('user_id')">
                    Creado por
                </th>
                <th scope="col" class="text-center cursor-pointer px-4 py-1 text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('name')">
                    Título
                </th>
            
                <th scope="col" class="cursor-pointer px-4 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('status')">
                    Estado
                </th>
                
                <th scope="col" class="cursor-pointer px-4 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Categorías
                </th>

                <th scope="col" class="cursor-pointer px-4 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Tags
                </th>

                <th scope="col" class="relative px-4 py-1">
                <span class="sr-only">Editar</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($posts as $post)
                <tr>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $post->published }}
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $post->user->name}}
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $post->name }}
                                </div>
                            </div>
                        </div>
                    </td>
                    

                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ ($post->status == 1) ? 'Borrador' : 'Publicado' }}
                            
                        </div>
                    </td>
                    

                    
                    
                    <td class="text-center  px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        @if(!empty($post->categories))
                               
                            @foreach($post->categories as $cat)
                                
                                <label class="text-center px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $cat->name }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td class="text-center  px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        @if(!empty($post->tags))
                               
                            @foreach($post->tags as $t)
                                
                                <label class="text-center px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $t->name }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('post.ver', $post) }}" class="btn btn-primary">Ver Noticia</a>
                        @can('author', $post)
                            <a href="{{ route('post.edit', $post) }}"  class="btn btn-warning">Editar</a>
                            <a href="{{ route('post.destroy', $post) }}"  class="btn btn-danger">Borrar</a>
                        @endcan
                        
                    </td>
                </tr>
            @endforeach
        <!-- More items... -->
        </tbody>
    </table>
    <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
        {{ $posts->links() }}
    </div>
@else
    <div class="bg-white px-4 py-3 text-gray-500 items-center justify-between border-t border-gray-200 sm:px-6">
    No hay resultados para la búsqueda "{{ $search }}" en la pagina {{ $page }} al mostrar {{ $perPage }} por página.
    </div>
@endif