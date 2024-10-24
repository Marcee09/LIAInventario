<x-event-layout>
    <x-slot name="title">Nuevo Activo</x-slot>

    <!-- Centrar el formulario y limitar el ancho a la mitad de la pantalla -->
    <div class="mx-auto w-1/2 mt-10 p-6 bg-white shadow-lg rounded-lg"> 

        <!-- Encabezado del formulario -->
        <h2 class="text-2xl font-semibold mb-6">Registrar Nuevo Activo</h2>

        <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required 
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Código Inventario -->
            <div>
                <label for="codigo_inventario" class="block text-sm font-medium text-gray-700">Código Inventario:</label>
                <input type="text" name="codigo_inventario" id="codigo_inventario" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Código Patrimonio -->
            <div>
                <label for="codigo_patrimonio" class="block text-sm font-medium text-gray-700">Código Patrimonio:</label>
                <input type="text" name="codigo_patrimonio" id="codigo_patrimonio" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Detalle -->
            <div>
                <label for="detalle" class="block text-sm font-medium text-gray-700">Detalle:</label>
                <textarea name="detalle" id="detalle" required
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300"></textarea>
            </div>

            <!-- Imagen -->
            <div>
                <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/*"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">

            </div>

            <!-- Tipo -->
            <div>
                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo:</label>
                <select name="tipo" id="tipo" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
                    <option value="Electrónico">Electrónico</option>
                    <option value="Mueble">Mueble</option>
                    <option value="Vehículo">Vehículo</option>
                </select>
            </div>

            <!-- Cantidad -->
            <div>
                <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Alta -->
            <div>
                <label for="alta" class="block text-sm font-medium text-gray-700">Alta:</label>
                <input type="date" name="alta" id="alta" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <div>
                <label for="baja" class="block text-sm font-medium text-gray-700">Baja:</label>
                <input type="date" name="alta" id="baja" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
            </div>

            <!-- Observaciones -->
            <div>
                <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones:</label>
                <textarea name="observaciones" id="observaciones"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300"></textarea>
            </div>

            <!-- Botón para enviar -->
            <div>
                <button type="submit" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Guardar</button>
            </div>

        </form>
    </div>
</x-event-layout>
