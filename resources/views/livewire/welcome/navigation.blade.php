<div class="shadow-sm sm:fixed sm:top-0 sm:right-0 p-6 text-right fixed top-0 left-0 w-full z-10">
    @auth
        <a href="{{ url('/dashboard') }}" class="font-semibold text-white hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="font-semibold text-white hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Register</a>
        @endif
    @endauth
</div>
