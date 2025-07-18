<x-app-layout>
    <div class="py-10">
        <div class="max-w-2xl mx-auto px-4">
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white mb-2">Mi Perfil</h1>
                <p class="text-gray-500 dark:text-gray-300">Gestiona tu información personal y seguridad.</p>
            </div>
            <div class="space-y-8">
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="border-t border-gray-200 dark:border-gray-700"></div>
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-8">
                    @include('profile.partials.update-password-form')
                </div>
                <div class="border-t border-gray-200 dark:border-gray-700"></div>
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
