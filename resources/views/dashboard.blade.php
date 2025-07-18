<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-8 mb-8 text-center">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Bienvenido</h3>
                <p class="text-gray-600 dark:text-gray-100">Gestiona tu inventario de manera fácil y rápida.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Usuarios</h4>
                    <p class="text-gray-500 dark:text-gray-400 mb-4 text-center">Administra los usuarios del sistema.</p>
                    <a href="{{route('usuarios.index')}}" class="px-4 py-2 rounded bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-100 font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition">Ir a Usuarios</a>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Categorías</h4>
                    <p class="text-gray-500 dark:text-gray-400 mb-4 text-center">Gestiona las categorías de productos.</p>
                    <a href="{{route('categorias.index')}}" class="px-4 py-2 rounded bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-100 font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition">Ir a Categorías</a>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Subcategorías</h4>
                    <p class="text-gray-500 dark:text-gray-400 mb-4 text-center">Organiza las subcategorías de productos.</p>
                    <a href="{{route('subcategorias.index')}}" class="px-4 py-2 rounded bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-100 font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition">Ir a Subcategorías</a>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col items-center">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">Productos</h4>
                    <p class="text-gray-500 dark:text-gray-400 mb-4 text-center">Controla los productos del inventario.</p>
                    <a href="{{route('productos.index')}}" class="px-4 py-2 rounded bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-100 font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition">Ir a Productos</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
