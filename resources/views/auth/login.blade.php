<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-[60vh]">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Iniciar sesión</h1>
        <p class="text-gray-500 dark:text-gray-300 mb-6">Accede a tu cuenta para gestionar el inventario</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-base font-medium mb-1" />
                <x-text-input id="email" class="block mt-1 w-full px-4 py-3 text-lg rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-base font-medium mb-1" />
                <x-text-input id="password" class="block mt-1 w-full px-4 py-3 text-lg rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-100" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mt-2">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordarme') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:underline focus:outline-none" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>

            <div>
                <x-primary-button class="w-full py-3 text-lg font-semibold bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 transition-all">
                    {{ __('Entrar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
