@if ($posts->count())
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="text-center cursor-pointer px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('name')">
                    Título
                </th>
                <th scope="col" class="text-center cursor-pointer px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('email')">
                    Extracto
                </th>

                <th scope="col" class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estado
                </th>
                <th scope="col" class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha Creación
                </th>
                

                <th scope="col" class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('rol')">
                    Categorías
                </th>
                <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Editar</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($posts as $post)
                <tr>
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
                            {{ $post->extract }}
                        </div>
                    </td>

                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $post->status }}
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $post->created_at }}
                        </div>
                    </td>

                    
                    
                    <td class="text-center  px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        @if(!empty($post->category))
                                {{ $post->category->name }}
                            @foreach($post->category as $category)
                                <label class="text-center px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $category }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button wire:click="edit({{ $post->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                        <button wire:click="destroy({{ $post->id }})"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Borrar</button>
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