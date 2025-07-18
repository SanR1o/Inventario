<x-app-layout>
    <div class="py-10">
        <div class="max-w-5xl mx-auto px-4">
            <!-- Tarjeta de bienvenida -->
            <div class="rounded-2xl shadow-lg bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 text-white p-8 mb-10 text-center">
                <h2 class="text-3xl font-extrabold mb-2 drop-shadow">¡Bienvenido al Panel!</h2>
                <p class="text-lg opacity-90">Accede rápidamente a la gestión de tu inventario.</p>
            </div>
            <!-- Cards de acceso -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <a href="{{ route('usuarios.index') }}" class="group block rounded-xl bg-white dark:bg-gray-800 shadow hover:shadow-xl transition p-6 border border-gray-100 dark:border-gray-700 hover:-translate-y-1">
                    <div class="font-bold text-blue-600 dark:text-blue-400 text-xl mb-2 group-hover:underline">Usuarios</div>
                    <div class="text-gray-500 dark:text-gray-300 text-sm">Administra los usuarios del sistema.</div>
                </a>
                <a href="{{ route('categorias.index') }}" class="group block rounded-xl bg-white dark:bg-gray-800 shadow hover:shadow-xl transition p-6 border border-gray-100 dark:border-gray-700 hover:-translate-y-1">
                    <div class="font-bold text-purple-600 dark:text-purple-400 text-xl mb-2 group-hover:underline">Categorías</div>
                    <div class="text-gray-500 dark:text-gray-300 text-sm">Gestiona las categorías de productos.</div>
                </a>
                <a href="{{ route('subcategorias.index') }}" class="group block rounded-xl bg-white dark:bg-gray-800 shadow hover:shadow-xl transition p-6 border border-gray-100 dark:border-gray-700 hover:-translate-y-1">
                    <div class="font-bold text-green-600 dark:text-green-400 text-xl mb-2 group-hover:underline">Subcategorías</div>
                    <div class="text-gray-500 dark:text-gray-300 text-sm">Organiza las subcategorías.</div>
                </a>
                <a href="{{ route('productos.index') }}" class="group block rounded-xl bg-white dark:bg-gray-800 shadow hover:shadow-xl transition p-6 border border-gray-100 dark:border-gray-700 hover:-translate-y-1">
                    <div class="font-bold text-pink-600 dark:text-pink-400 text-xl mb-2 group-hover:underline">Productos</div>
                    <div class="text-gray-500 dark:text-gray-300 text-sm">Controla los productos del inventario.</div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
