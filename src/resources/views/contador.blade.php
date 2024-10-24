<x-event-layout>

    <x-slot name="title">Contador</x-slot>
    <h1 class="text-4xl font-bold mb-6 text-center text-indigo-300">Contador</h1>
    
    <!-- Visualización del número y botones -->
    <div class="flex items-center justify-center space-x-6">

        <!-- Mostrar el número -->
        <span class="text-5xl font-bold bg-gray-700 px-6 py-3 rounded-lg shadow-lg">
            {{ $número }}
        </span>

        <!-- Botón para incrementar -->
        <x-button class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition-transform transform hover:scale-110 shadow-lg"
            onclick="location.href='{{ route('contador.inc', ['número' => $número]) }}'">
            ++
        </x-button>

        <!-- Botón para decrementar -->
        <x-button class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-full transition-transform transform hover:scale-110 shadow-lg"
            onclick="location.href='{{ route('contador.dec', ['número' => $número]) }}'">
            --
        </x-button>
    </div>

    <!-- Agregar más botones adicionales si es necesario -->
    <div class="flex justify-center mt-6 space-x-4">
        <!-- Botón para reiniciar -->
        <x-button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full shadow-md"
            onclick="location.href='{{ route('contador.reset') }}'">
            Reiniciar
        </x-button>

        <!-- Botón para duplicar el número -->
        <x-button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-full shadow-md"
            onclick="location.href='{{ route('contador.duplicate', ['número' => $número]) }}'">
            Duplicar
        </x-button>
    </div>

    <x-toast name="alert">
    <div class="fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-white shadow-md p-4 border-l-4 border-red-500 rounded-lg max-w-sm">
        <!-- Contenido del mensaje -->
        <x-toast-message class="text-gray-700 text-sm" />
        
        <!-- Botón de cierre -->
        <x-button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded mt-3 text-xs float-right"
        onclick="document.getElementById('toast-alert').style.display = 'none'">
        Cerrar
        </x-button>
    </div>
</x-toast>


</x-event-layout>


