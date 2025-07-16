<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
 <!--
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
-->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        Sistema de Inventario
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="{{route('usuarios.index') }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-200 ease-in-out transform hover:scale-105">
                            Gestionar Usuarios
                        </a>
                        <a href="{{route('categorias.index') }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-200 ease-in-out transform hover:scale-105">
                            Gestionar Categorías
                        </a>
                        <a href="{{route('subcategorias.index') }}" 
                           class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-200 ease-in-out transform hover:scale-105">
                            Gestionar Subcategorías
                        </a>
                        <a href="{{route('productos.index') }}" 
                           class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-200 ease-in-out transform hover:scale-105">
                            Gestionar Productos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
