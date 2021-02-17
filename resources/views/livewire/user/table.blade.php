@if ($users->count())
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="text-center cursor-pointer px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('name')">
                    Nombre
                </th>
                <th scope="col" class="text-center cursor-pointer px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('email')">
                    E-mail
                </th>

                <th scope="col" class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    DNI
                </th>
                

                <th scope="col" class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="sortBy('rol')">
                    Rol
                </th>
                <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $user->name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $user->email }}
                                </div>
                                
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $user->email }}
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="text-center text-sm font-medium text-gray-900">
                            {{ $user->dni }}
                        </div>
                    </td>

                    
                    
                    <td class="text-center  px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label class="text-center px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $v }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button wire:click="edit({{ $user->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                        <button wire:click="destroy({{ $user->id }})"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Borrar</button>
                    </td>
                </tr>
            @endforeach
        <!-- More items... -->
        </tbody>
    </table>
    <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
        {{ $users->links() }}
    </div>
@else
    <div class="bg-white px-4 py-3 text-gray-500 items-center justify-between border-t border-gray-200 sm:px-6">
    No hay resultados para la búsqueda "{{ $search }}" en la pagina {{ $page }} al mostrar {{ $perPage }} por página.
    </div>
@endif