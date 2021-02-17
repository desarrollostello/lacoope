<div>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">

                <div class="grid grid-cols-12 gap-4">
                    <div class="bg-gray-100 col-span-4">
                        <div class="bg-white rounded-lg shadow overflow-hidden max-w-4x1 mx-auto p-4 mb-6">
                            @include("livewire.category.$view")
                        </div>
                        
                    </div>
                    <div class="bg-gray-300 col-span-8">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        
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
                                        
                                        @include('livewire.category.table')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                
  
            </div>
        </div>
    </div>
</div>

