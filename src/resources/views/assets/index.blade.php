<x-event-layout>
    <x-slot name="title">Activos</x-slot>

    {{-- <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-4"> --}}
    <div class="mb-4 flex justify-start ml-10">
        <form action="{{ route('assets.index') }}" method="GET">
            <input type="text" name="search" id="searchInput" placeholder="Buscar activos..." 
                class="border rounded px-3 py-2 mr-2" 
                value="{{ request('search') }}">
            <button type="submit" 
                class="inline-block px-4 py-2 bg-[#1a237e] text-white rounded hover:bg-[#3949ab] transition-colors duration-200">
                Buscar
             </button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <div class="mx-10">
            <table class="min-w-full bg-white border border-[#e0e0e0] shadow-sm">
                <thead>
                    <tr class="text-white bg-[#1a237e] border-b border-[#e0e0e0]">
                        <th class="py-3 px-4 text-left text-sm font-medium">Nombre</th>
                        <th class="py-3 px-4 text-left text-sm font-medium">Código inventario</th>
                        <th class="py-3 px-4 text-left text-sm font-medium">Código patrimonio</th>
                        <th class="py-3 px-4 text-left text-sm font-medium">Detalle</th>
                        <th class="py-3 px-4 text-left text-sm font-medium" style="width: 200px;">Imagen</th>
                        <th class="py-3 px-4 text-left text-sm font-medium">Tipo</th>
                        <th class="py-3 px-4 text-left text-sm font-medium">Cantidad</th>
                        <th class="py-3 px-4 text-left text-sm font-medium">Alta</th>
                        <th class="py-3 px-4 text-left text-sm font-medium">Baja</th>
                        <th class="py-3 px-4 text-left text-sm font-medium">Observaciones</th>
                        <th class="py-3 px-4 text-left text-sm font-medium">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-[#212121]">
                    @foreach ($assets as $asset)
                        <tr class="border-b border-[#e0e0e0] hover:bg-[#f5f5f5] transition-colors duration-150">
                            <td class="py-3 px-4">{{ $asset->nombre }}</td>
                            <td class="py-3 px-4">{{ $asset->codigo_inventario }}</td>
                            <td class="py-3 px-4">{{ $asset->codigo_patrimonio }}</td>
                            <td class="py-3 px-4">{{ $asset->detalle }}</td>
                            <td class="py-3 px-4">
                                @if($asset->imagen)
                                    @if (Str::startsWith($asset->imagen, 'data:image'))
                                        <img src="{{ $asset->imagen }}" alt="Imagen Base64" class="w-32 h-32 object-cover rounded shadow-sm">
                                    @else
                                        <img src="{{ asset('storage/' . $asset->imagen) }}" alt="Imagen subida" class="w-32 h-32 object-cover rounded shadow-sm">
                                    @endif
                                @else
                                    <span class="text-[#212121]">Sin imagen</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">{{ $asset->tipo }}</td>
                            <td class="py-3 px-4">{{ $asset->cantidad }}</td>
                            <td class="py-3 px-4">{{ $asset->alta }}</td>
                            <td class="py-3 px-4">{{ $asset->baja }}</td>
                            <td class="py-3 px-4">{{ $asset->observaciones }}</td>
                            <td class="py-3 px-4">
                                <div class="flex space-x-3">
                                    <!-- Ver -->
                                    <a href="{{ route('assets.show', $asset->id) }}" 
                                       class="text-[#3949ab] hover:text-[#1a237e] transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                                    <!-- Editar -->
                                    <a href="{{ route('assets.edit', $asset->id) }}" 
                                       class="text-[#3949ab] hover:text-[#1a237e] transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <!-- Eliminar -->
                                    <form action="{{ route('assets.destroy', $asset->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-[#f44336] hover:text-[#d32f2f] transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        </div>
    </div>
</x-event-layout>



