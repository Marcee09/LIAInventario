<x-event-layout>
    <x-slot name="title">Editar Activo</x-slot>

    <div class="mx-auto w-1/2 mt-10 p-6 bg-white shadow-lg rounded-lg"> 
        <h2 class="text-2xl font-semibold mb-6">Editar Activo</h2>

        <form action="{{ route('assets.update', $asset) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $asset->nombre) }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Código Inventario -->
            <div>
                <label for="codigo_inventario" class="block text-sm font-medium text-gray-700">Código Inventario:</label>
                <input type="text" name="codigo_inventario" id="codigo_inventario" value="{{ old('codigo_inventario', $asset->codigo_inventario) }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Código Patrimonio -->
            <div>
                <label for="codigo_patrimonio" class="block text-sm font-medium text-gray-700">Código Patrimonio:</label>
                <input type="text" name="codigo_patrimonio" id="codigo_patrimonio" value="{{ old('codigo_patrimonio', $asset->codigo_patrimonio) }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Detalle -->
            <div>
                <label for="detalle" class="block text-sm font-medium text-gray-700">Detalle:</label>
                <input type="text" name="detalle" id="detalle" value="{{ old('detalle', $asset->detalle) }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Imagen Actual -->
            <label for="imagen">Imagen actual</label>
            @if($asset->imagen)
                <div class="mt-2">
                    <p>Vista previa de la imagen actual:</p>
                    <img src="{{ asset('storage/' . $asset->imagen) }}" alt="Vista previa" class="w-32 h-32 object-cover mb-2">
                </div>
            @endif

            <!-- Subir nueva imagen -->
            <div>
                <label for="imagen_nueva" class="block text-sm font-medium text-gray-700">Subir nueva imagen (opcional):</label>
                <input type="file" name="imagen" id="imagen_nueva" accept="image/*"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Tipo -->
            <div>
                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo:</label>
                <input type="text" name="tipo" id="tipo" value="{{ old('tipo', $asset->tipo) }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Cantidad -->
            <div>
                <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad', $asset->cantidad) }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Alta -->
            <div>
                <label for="alta" class="block text-sm font-medium text-gray-700">Alta:</label>
                <input type="date" name="alta" id="alta" value="{{ old('alta', $asset->alta ? $asset->alta->format('Y-m-d') : '') }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Baja -->
            <div>
                <label for="baja" class="block text-sm font-medium text-gray-700">Baja:</label>
                <input type="date" name="baja" id="baja" value="{{ old('baja', $asset->baja ? $asset->baja->format('Y-m-d') : '') }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Observaciones -->
            <div>
                <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones:</label>
                <textarea name="observaciones" id="observaciones"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">{{ old('observaciones', $asset->observaciones) }}</textarea>
            </div>

            <!-- Botón para enviar -->
            <div>
                <button type="submit" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Guardar</button>
            </div>

        </form>
    </div>
</x-event-layout>




