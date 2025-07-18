<x-app-layout>
    <div class="py-10">
        <div class="max-w-6xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                    <h1 class="text-2xl font-extrabold text-gray-800 dark:text-white">Usuarios</h1>
                    <a href="{{ route('usuarios.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition">+ Nuevo usuario</a>
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
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">Email</th>
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">Rol</th>
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">Creado</th>
                                <th class="px-4 py-3 text-left font-bold text-gray-600 dark:text-gray-300 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="even:bg-gray-50 even:dark:bg-gray-800 hover:bg-blue-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $user->id }}</td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $user->name }}</td>
                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $user->email }}</td>
                                    <td class="px-4 py-3">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                            @if($user->role == 'admin') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                            @elseif($user->role == 'coordinador') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                            @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif">
                                            @switch($user->role)
                                                @case('admin') Administrador @break
                                                @case('coordinador') Coordinador @break
                                                @default {{ ucfirst($user->role) }}
                                            @endswitch
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-gray-500 dark:text-gray-400">{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td class="px-4 py-3 flex flex-wrap gap-2">
                                        <a href="{{ route('usuarios.show', $user->id) }}" class="px-3 py-1 rounded bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 font-semibold hover:bg-green-200 dark:hover:bg-green-800 transition">Ver</a>
                                        <a href="{{ route('usuarios.edit', $user->id) }}" class="px-3 py-1 rounded bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 font-semibold hover:bg-blue-200 dark:hover:bg-blue-800 transition">Editar</a>
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 rounded bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 font-semibold hover:bg-red-200 dark:hover:bg-red-800 transition" onclick="return confirm('¿Estás seguro de eliminar este usuario? Esta acción no se puede deshacer.')">Eliminar</button>
                                            </form>
                                        @else
                                            <span class="text-gray-400 dark:text-gray-600">(Tu cuenta)</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                        No hay usuarios registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($users->count() > 0)
                    <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                        Total de usuarios: {{ $users->count() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
