<div class="container py-8">
    <div>
        <h1 class="text-2xl text-gray-900 pb-2 px-6 md:px-12">
            Equipos para la construcción.
        </h1>
    </div>
    <div class="bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <div class="flex bg-white px-4 py-3 border-t border-gray-200">
            <x-jet-input class="w-full" placeholder="buscar ..." type="text" wire:model="search" />
            <div class="ml-6 block">
                <select wire:model="perPage" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="20">20 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>
            @if($search !=='')
                <button wire:click="clear" class="border-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 ml-6 px-2 block">X</button>
            @endif
        </div>
        <div class="bg-white px-4">
            @if($equipos->count())
                <table class="min-w-full divide-y divide-gray-200"> <!--<table class="table-fixed w-full">-->
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Grupo</th>
                            <th wire:click="order('name')" class="cursor-pointer px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                                {{-- sort --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th wire:click="order('marca')" class="cursor-pointer px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Marca
                                {{-- sort --}}
                                @if ($sort == 'marca')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th wire:click="order('tipo')" class="cursor-pointer px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Tipo
                                {{-- sort --}}
                                @if ($sort == 'tipo')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Tarífa</th>
                            <th           class="bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($equipos as $key=>$equipo)
                        <tr>
                            <td class="px-2 py-3">{{ $equipo->grupo_equipo->name }}</td>
                            <td>{{ $equipo->name }}</td>
                            <td>{{ $equipo->marca }}</td>
                            <td>{{ $equipo->tipo }}</td>
                            <td>{{ $equipo->tarifa }}</td>
                            <td>{{ $equipo->updated_at->format('m/Y') }}</td>
                            <td class="px-2">
                                <button class="bg-blue-500 hover:bg-blue-700 uppercase text-white text-xs leading-4 font-medium py-1 px-2 rounded">
                                        Proveedor
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4 mb-2">
                    {{$equipos->links()}}
                </div>
            @else
                <div class="px-4 py-3 border-t border-gray-200 text-gray-500 sm:px-6">
                    No hay resultados para la busqueda "{{$search}}" en la página {{$page}} al mostrar {{$perPage}} equipos por página.
                </div>
            @endif
        </div>
    </div>
</div>