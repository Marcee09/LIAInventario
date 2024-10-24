<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                @role('registered')
                    <div class="m-4 text-xl text-gray-600 dark:text-gray-200">
                        <b>Usted está registrado en el sistema.</b><br> Para poder acceder a funcionalidades
                         específicas, debe dirigirse personalmente al área de administración de la
                         organización.
                    </div>
                @endrole
                @role('root')
                    <div class="m-4 text-xl text-gray-600 dark:text-gray-200">
                        <b>Usted es usuario raíz.</b><br> Puede acceder a todas las funcionalidades del sistema.
                    </div>
                @else
                    @can('roles-list')
                        <p>Roles List</p>
                    @endcan
                    @can('roles-create')
                        <p>Roles Create</p>
                    @endcan
                    @can('roles-edit')
                        <p>Roles Edit</p>
                    @endcan
                    @can('roles-delete')
                        <p>Roles Delete</p>
                    @endcan
                    @can('users-list')
                        <p>Users List</p>
                    @endcan
                    @can('users-create')
                        <p>Users Create</p>
                    @endcan
                    @can('users-edit')
                        <p>Users Edit</p>
                    @endcan
                    @can('users-delete')
                        <p>Users Delete</p>
                    @endcan
                    @can('root user')
                        <p>Root User</p>
                    @endcan
                @endrole
            </div>
        </div>
    </div>
</x-app-layout>
