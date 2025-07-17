<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalles del Usuario
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- Header con información básica -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 mb-6">
                        <div class="flex items-center space-x-4">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                    {{ $user->name }}
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400">
                                    {{ $user->email }}
                                </p>
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full mt-2
                                    @if($user->role == 'admin') 
                                        bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                    @elseif($user->role == 'coordinador') 
                                        bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                    @else 
                                        bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                    @endif">
                                    @switch($user->role)
                                        @case('admin')
                                            👑 Administrador
                                            @break
                                        @case('coordinador')
                                            📋 Coordinador
                                            @break
                                        @default
                                            {{ ucfirst($user->role) }}
                                    @endswitch
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Información detallada -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        
                        <!-- Información personal -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                                📋 Información Personal
                            </h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID de Usuario</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">#{{ $user->id }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre Completo</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $user->name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo Electrónico</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                        <a href="mailto:{{ $user->email }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400">
                                            {{ $user->email }}
                                        </a>
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rol en el Sistema</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                        @switch($user->role)
                                            @case('admin')
                                                Administrador - Acceso completo al sistema
                                                @break
                                            @case('coordinador')
                                                Coordinador - Gestión de inventario (sin eliminar)
                                                @break
                                            @default
                                                {{ ucfirst($user->role) }}
                                        @endswitch
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Información de cuenta -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                                ⏰ Información de Cuenta
                            </h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Registro</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $user->created_at->format('d/m/Y H:i:s') }}
                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                            ({{ $user->created_at->diffForHumans() }})
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Última Actualización</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $user->updated_at->format('d/m/Y H:i:s') }}
                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                            ({{ $user->updated_at->diffForHumans() }})
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado de la Cuenta</label>
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        ✓ Activa
                                    </span>
                                </div>
                                @if($user->email_verified_at)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Verificado</label>
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            ✓ Verificado el {{ $user->email_verified_at->format('d/m/Y') }}
                                        </span>
                                    </div>
                                @else
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Verificado</label>
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                            ⚠ Pendiente de verificación
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Estadísticas (opcional - para futuras funcionalidades) 
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg mb-6">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                            📊 Estadísticas de Actividad
                        </h4>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="text-center">
                                <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">-</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Productos creados</p>
                            </div>
                            <div class="text-center">
                                <p class="text-2xl font-bold text-green-600 dark:text-green-400">-</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Últimas modificaciones</p>
                            </div>
                            <div class="text-center">
                                <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">-</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Sesiones activas</p>
                            </div>
                            <div class="text-center">
                                <p class="text-2xl font-bold text-orange-600 dark:text-orange-400">{{ $user->created_at->diffInDays() }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Días en el sistema</p>
                            </div>
                        </div>
                    </div>-->

                    <!-- Botones de acción -->
                    <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('usuarios.edit', $user->id) }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            📝 Editar Usuario
                        </a>
                        
                        @if($user->id !== auth()->id())
                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                                        onclick="return confirm('¿Estás seguro de eliminar este usuario? Esta acción no se puede deshacer.')">
                                    🗑️ Eliminar Usuario
                                </button>
                            </form>
                        @else
                            <span class="bg-gray-400 text-white font-bold py-2 px-4 rounded cursor-not-allowed">
                                🚫 No puedes eliminar tu propia cuenta
                            </span>
                        @endif
                        
                        <a href="{{ route('usuarios.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            ← Volver a la Lista
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
