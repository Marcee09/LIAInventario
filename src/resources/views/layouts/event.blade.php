<x-app-layout>

    <x-slot name="header">
        <h2 class="font-bold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <x-event-listener />

    <div class="p-3 relative">
        <div
            class="absolute top-2 w-2/4 left-1/2 transform -translate-x-1/2 z-50 items-center justify-center text-xl font-extrabold text-center text-white">

            <x-toast name="info">
                <div class="bg-cyan-500 text-slate-800 shadow-lg p-6 border border-transparent rounded-md">
                    <x-toast-message />
                </div>
            </x-toast>

            <x-toast name="success">
                <div class="bg-green-600 shadow-lg p-6 border border-transparent rounded-md">
                    <x-toast-message />
                </div>
            </x-toast>

            <x-toast name="error">
                <div class="bg-red-600 shadow-lg p-6 border border-transparent rounded-md">
                    <x-toast-message />
                </div>
            </x-toast>

            <x-toast name="warning">
                <div class="bg-yellow-600 shadow-lg p-6 border border-transparent rounded-md">
                    <x-toast-message />
                </div>
            </x-toast>
        </div>
        {{ $slot }}
    </div>

</x-app-layout>
