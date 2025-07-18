<x-app-layout>
    <div class="py-10 min-h-screen">
        <div class="max-w-lg mx-auto px-4">
            <div class="bg-white dark:bg-gray-900 border-2 border-blue-200 dark:border-blue-700 rounded-2xl shadow-xl p-8">
                <div class="flex items-center gap-2 mb-6">
                    <span class="inline-block text-3xl text-blue-500">🏷️</span>
                    <h1 class="text-2xl font-extrabold text-gray-800 dark:text-white">Categoría</h1>
                </div>
                <ul class="divide-y divide-blue-100 dark:divide-blue-800">
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">ID</span><span class="text-gray-800 dark:text-gray-100">{{ $categoria->id }}</span></li>
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">Nombre</span><span class="text-gray-800 dark:text-gray-100">{{ $categoria->nombre }}</span></li>
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">Fecha de Creación</span><span class="text-gray-800 dark:text-gray-100">{{ $categoria->created_at->format('d/m/Y H:i:s') }}</span></li>
                    <li class="py-3 flex justify-between"><span class="font-semibold text-gray-500 dark:text-gray-400">Última Actualización</span><span class="text-gray-800 dark:text-gray-100">{{ $categoria->updated_at->format('d/m/Y H:i:s') }}</span></li>
                </ul>
                <div class="pt-8 flex flex-wrap gap-3 justify-center">
                    <a href="{{ route('categorias.index') }}" class="px-5 py-2 rounded-lg bg-blue-500 hover:bg-blue-700 text-white font-semibold shadow transition flex items-center gap-2"><span>←</span> Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>