<x-app-layout>
    <div class="py-10 min-h-screen">
        <div class="max-w-lg mx-auto px-4">
            <div class="bg-white dark:bg-gray-900 border-2 border-blue-200 dark:border-blue-700 rounded-2xl shadow-xl p-8">
                <div class="flex items-center gap-2 mb-6">
                    <span class="inline-block text-3xl text-blue-500">📦</span>
                    <h1 class="text-2xl font-extrabold text-gray-800 dark:text-white">Producto</h1>
                </div>
                <ul class="divide-y divide-blue-100 dark:divide-blue-800">
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">ID</span><span class="text-gray-800 dark:text-gray-100">{{ $producto->id }}</span></li>
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">Nombre</span><span class="text-gray-800 dark:text-gray-100">{{ $producto->nombre }}</span></li>
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">Descripción</span><span class="text-gray-800 dark:text-gray-100">{{ $producto->descripcion }}</span></li>
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">Precio</span><span class="text-gray-800 dark:text-gray-100">${{ number_format($producto->precio, 2) }}</span></li>
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">Stock</span><span class="text-gray-800 dark:text-gray-100">{{ $producto->stock }}</span></li>
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">Categoría</span><span class="text-gray-800 dark:text-gray-100">{{ $producto->categoria->nombre }}</span></li>
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">Subcategoría</span><span class="text-gray-800 dark:text-gray-100">{{ $producto->subcategoria->nombre }}</span></li>
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">Fecha de Creación</span><span class="text-gray-800 dark:text-gray-100">{{ $producto->created_at->format('d/m/Y H:i:s') }}</span></li>
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">Última Actualización</span><span class="text-gray-800 dark:text-gray-100">{{ $producto->updated_at->format('d/m/Y H:i:s') }}</span></li>
                </ul>
                <div class="pt-8 flex flex-wrap gap-3 justify-center">
                    <a href="{{ route('productos.index') }}" class="px-5 py-2 rounded-lg bg-blue-500 hover:bg-blue-700 text-white font-semibold shadow transition flex items-center gap-2"><span>←</span> Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>