@if ($popups->count())
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="cursor-pointer px-4 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('start_date')">
                    Fecha Inicio
                </th>
                <th scope="col" class="cursor-pointer px-4 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('end_date')">
                    Fecha Fin
                </th>
                <th scope="col" class="cursor-pointer px-4 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('user_id')">
                    Creado por
                </th>
                <th scope="col" class="text-center cursor-pointer px-4 py-1 text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('name')">
                    Nombre
                </th>
            
                <th scope="col" class="cursor-pointer px-4 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('status')">
                    Estado
                </th>
                
                

                <th scope="col" class="relative px-4 py-1">
                <span class="sr-only">Editar</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($popups as $popup)
                <tr>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $popup->start_date }}
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $popup->end_date }}
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $popup->user->name}}
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $popup->name }}
                                </div>
                            </div>
                        </div>
                    </td>
                    

                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ ($popup->status == 1) ? 'Borrador' : 'Publicado' }}
                            
                        </div>
                    </td>
                    
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('popup.show', $popup) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('popup.edit', $popup) }}"  class="btn btn-warning">Editar</a>
                        <a href="{{ route('popup.destroy', $popup) }}"  class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
            @endforeach
        <!-- More items... -->
        </tbody>
    </table>
    <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
        {{ $popups->links() }}
    </div>
@else
    <div class="bg-white px-4 py-3 text-gray-500 items-center justify-between border-t border-gray-200 sm:px-6">
    No hay resultados para la búsqueda "{{ $search }}" en la pagina {{ $page }} al mostrar {{ $perPage }} por página.
    </div>
@endif