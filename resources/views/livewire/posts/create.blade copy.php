<x-app-layout>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-4 lg:px-6">
            <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
                <div class="grid grid-cols-12 gap-4">
                    <div class="bg-white col-span-12">
                        <h2 class="mb-6">Nuevo Post</h2>
                            @include('livewire.posts.form')
                        <button wire:click="store" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-2 rounded ml-4">Guardar!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


 
