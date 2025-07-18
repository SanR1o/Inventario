<x-app-layout>
    <div class="py-10">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8">
                <h1 class="text-2xl font-extrabold text-gray-800 dark:text-white mb-6 text-center">Detalles del Producto</h1>
                <div class="space-y-8">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Información de Producto</h2>
                        <div class="space-y-2">
                            <div>
                                <span class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">ID</span>
                                <span class="block text-lg text-gray-800 dark:text-gray-100">{{ $producto->id }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Nombre</span>
                                <span class="block text-lg text-gray-800 dark:text-gray-100">{{ $producto->nombre }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Descripción</span>
                                <span class="block text-lg text-gray-800 dark:text-gray-100">{{ $producto->descripcion }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Precio</span>
                                <span class="block text-lg text-gray-800 dark:text-gray-100">${{ number_format($producto->precio, 2) }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Stock</span>
                                <span class="block text-lg text-gray-800 dark:text-gray-100">{{ $producto->stock }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Categoría</span>
                                <span class="block text-lg text-gray-800 dark:text-gray-100">{{ $producto->categoria->nombre }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Subcategoría</span>
                                <span class="block text-lg text-gray-800 dark:text-gray-100">{{ $producto->subcategoria->nombre }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <span class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Fecha de Creación</span>
                            <span class="block text-lg text-gray-800 dark:text-gray-100">{{ $producto->created_at->format('d/m/Y H:i:s') }} <span class="text-xs text-gray-500 dark:text-gray-400">({{ $producto->created_at->diffForHumans() }})</span></span>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Última Actualización</span>
                            <span class="block text-lg text-gray-800 dark:text-gray-100">{{ $producto->updated_at->format('d/m/Y H:i:s') }} <span class="text-xs text-gray-500 dark:text-gray-400">({{ $producto->updated_at->diffForHumans() }})</span></span>
                        </div>
                    </div>
                    <div>
                        <span class="block text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Estado de Producto</span>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">✓ Activa</span>
                    </div>
                </div>
                <div class="pt-8 flex flex-wrap gap-3 justify-center">
                    <a href="{{ route('productos.index') }}" class="px-6 py-2 rounded-lg bg-gray-500 hover:bg-gray-700 text-white font-semibold shadow transition">Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>