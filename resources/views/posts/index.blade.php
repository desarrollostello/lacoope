<x-app-layout>
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 mt-5 mb-5">
        <div class="bg-white p-5 overflow-hidden shadow-xl sn:rounded-lg">
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-gray-100 col-span-12">
                    <div class="bg-white rounded-lg shadow overflow-hidden max-w-4x1 mx-auto p-4 mb-6">
                        @foreach ($posts as $p)
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>