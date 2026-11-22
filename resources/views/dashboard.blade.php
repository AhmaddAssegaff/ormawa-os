<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-2">
                    <p>{{ __("You're logged in!") }}</p>

                    <p class="text-sm text-gray-600">
                        Role Anda:
                        <span class="font-semibold text-indigo-600">
                            {{ auth()->user()->getRoleNames()->join(', ') ?: 'Belum ada role' }}
                        </span>
                    </p>

                    @role('admin')
                        <div class="pt-2">
                            <a href="/admin" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-xs font-semibold uppercase rounded-md">
                                Buka Panel Admin
                            </a>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
