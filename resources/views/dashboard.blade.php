<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white flex justify-between items-center">
                    <span>{{ __("You're logged in! 🌐 ") }}</span>
                    <a href="{{ route('task') }}"
                        class="inline-flex items-center px-4 py-2 bg-white dark:bg-indigo-700 border border-gray-600 rounded-md font-semibold text-xs text-gray-700 dark:text-white uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        wire:navigate>
                        Go to Event 🗓️
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
