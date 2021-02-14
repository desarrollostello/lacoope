<div>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm_px-6 lg:px-8">
            <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="bg-white rounded-lg shadow overflow-hidden max-w-4x1 mx-auto p-4 mb-6">
                                    <form action="">
                                        <div>
                                            <label for="name" class="form-label mb-2">Nombre</label>
                                            <input wire:model="name" id="name" placeholder="Ingrese su nombre" class="form-control" />
                                        </div>
                                        <div>
                                            <label for="email" class="form-label mb-2 mt-4">Email</label>
                                            <input wire:model="email" id="email" placeholder="Ingrese su email" class="form-control" />
                                        </div>
                                        <div>
                                            <label for="dni" class="form-label mb-2 mt-4">DNI</label>
                                            <input wire:model="dni" id="dni" placeholder="Ingrese su DNI" class="form-control" />
                                        </div>
                                    </form>
                                </div>
                                <div class="bg-white px-4 flex py-3 items-center justify-left border-t border-gray-200 sm:px-6">
                                    <button wire:click="clear" class="self-center border px-3 py-2 float-left">X</button>
                                    <input 
                                        wire:model="search"
                                        type="text" 
                                        class="self-center form-input rounded-md shadow-sm mt-1 block" 
                                        placeholder="Buscar..." 
                                    />
                                    
                                    
                                    <select wire:model="perPage" class="self-center form-input rounded-md shadow-sm mt-1 block text-gray-500 text-sm">
                                        <option value="1">1 por página</option>
                                        <option value="5">5 por página</option>
                                        <option value="10">10 por página</option>
                                        <option value="15">15 por página</option>
                                        <option value="25">25 por página</option>
                                        <option value="50">50 por página</option>
                                        <option value="100">100 por página</option>
                                    </select>
                                    
                                </div>
                                
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
                                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
                            </div>
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
</div>
