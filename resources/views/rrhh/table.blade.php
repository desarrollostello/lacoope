@if ($rrhhs->count())
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="text-center cursor-pointer px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('id')">
                    ID
                </th>
                <th scope="col" class="text-center cursor-pointer px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('nombre')">
                    Nombre
                </th>

                <th scope="col" class="text-center cursor-pointer px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('telefono')">
                    Teléfono
                </th>

                <th scope="col" class="text-center cursor-pointer px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('email')">
                    E-mail
                </th>

                <th scope="col" class="text-center cursor-pointer px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Archivo
                </th>
            
                <th scope="col" class="relative px-6 py-3">
                    
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($rrhhs as $r)
                <tr>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $r->id }}
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $r->nombre }}
                        </div>
                    </td>

                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $r->telefono }}
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $r->email }}
                        </div>
                    </td>

                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $r->file }}
                        </div>
                    </td>

                    <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium">
                        <button wire:click="edit({{ $r->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                        <button wire:click="destroy({{ $r->id }})"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Borrar</button>
                    </td>
                </tr>
            @endforeach
        <!-- More items... -->
        </tbody>
    </table>
    <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
        {{ $rrhhs->links() }}
    </div>
@else
    <div class="bg-white px-4 py-3 text-gray-500 items-center justify-between border-t border-gray-200 sm:px-6">
    No hay resultados para la búsqueda "{{ $search }}" en la pagina {{ $page }} al mostrar {{ $perPage }} por página.
    </div>
@endif