<x-event-layout>
    <x-slot name="title">Detalle de activos</x-slot>

    <!-- Contenedor principal para centrar el contenido -->
    <div class="ml-10 mr-10 mt-6 bg-white border border-gray-300 p-6 rounded-lg shadow">
        <!-- Título -->
        <h2 class="text-2xl font-semibold mb-4">Detalles del Activo</h2>

        <!-- Información del activo -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <p><span class="font-semibold">Nombre:</span> {{ $asset->nombre }}</p>
            <p><span class="font-semibold">Código Inventario:</span> {{ $asset->codigo_inventario }}</p>
            <p><span class="font-semibold">Código Patrimonio:</span> {{ $asset->codigo_patrimonio }}</p>
            <p><span class="font-semibold">Detalle:</span> {{ $asset->detalle }}</p>
            <p><span class="font-semibold">Tipo:</span> {{ $asset->tipo }}</p>
            <p><span class="font-semibold">Cantidad:</span> {{ $asset->cantidad }}</p>
            <p><span class="font-semibold">Alta:</span> {{ $asset->alta }}</p>
            <p><span class="font-semibold">Baja:</span> {{ $asset->baja }}</p>
            <p><span class="font-semibold">Observaciones:</span> {{ $asset->observaciones }}</p>

            <!-- Mostrar imagen -->
            <div class="col-span-1 sm:col-span-2">
                <p class="font-semibold mb-2">Imagen:</p>
                @if($asset->imagen)
                    @if (Str::startsWith($asset->imagen, 'data:image'))
                        <img src="{{ $asset->imagen }}" alt="Imagen Base64" class="w-64 h-64 object-contain">
                    @else
                        <img src="{{ asset('storage/' . $asset->imagen) }}" alt="Imagen subida" class="w-64 h-64 object-contain">
                    @endif
                @else
                    <span>Sin imagen disponible</span>
                @endif
            </div>
        </div>

        <!-- Botón para volver al listado de activos -->
        <div class="mt-6">
            <a href="{{ route('assets.index') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Volver al listado</a>
        </div>
    </div>
</x-event-layout>
