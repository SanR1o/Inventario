<x-app-layout>
    <div class="py-10">
        <div class="max-w-6xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                    <h1 class="text-2xl font-extrabold text-gray-800 dark:text-white">Productos</h1>
                    <a href="{{ route('productos.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition">+ Nuevo producto</a>
                </div>
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="overflow-x-auto rounded-lg">
                    <table class="min-w-full table-auto text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-800 sticky top-0 z-10">
                            <tr>
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">ID</th>
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">Nombre</th>
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">Descripción</th>
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">Precio</th>
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">Stock</th>
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">Categoría</th>
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">Subcategoría</th>
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr class="even:bg-gray-50 even:dark:bg-gray-800 hover:bg-blue-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $producto->id }}</td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $producto->nombre }}</td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $producto->descripcion }}</td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100">${{ number_format($producto->precio, 2) }}</td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $producto->stock }}</td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $producto->categoria->nombre ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $producto->subcategoria->nombre ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100 flex flex-wrap gap-2">
                                        <a href="{{ route('productos.show', $producto->id) }}" class="px-3 py-1 rounded bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 font-semibold hover:bg-green-200 dark:hover:bg-green-800 transition">Ver</a>
                                        <a href="{{ route('productos.edit', $producto->id) }}" class="px-3 py-1 rounded bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 font-semibold hover:bg-blue-200 dark:hover:bg-blue-800 transition">Editar</a>
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 rounded bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 font-semibold hover:bg-red-200 dark:hover:bg-red-800 transition" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>