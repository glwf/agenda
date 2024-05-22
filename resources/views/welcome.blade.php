<x-app-layout>
    @if (Route::has('login'))
        <livewire:welcome.navigation />
    @endif

    <section style="background-image: url('/storage/7.png');" class="backdrop-blur-xl backdrop-brightness-150 bg-opacity-30 bg-hero-image bg-cover bg-center bg-position:top h-screen flex items-center justify-center pt-16">
        <div class="container mx-auto px-6 shadow-black shadow md:shadow-lg">
          <h1 class="text-8xl font-bold text-indigo-800 bg-yellow-400 text-left ">Selamat Datang!</h1>
          <p class="text-xl text-gray-300 text-left mt-4 bg-gray-900">Silahkan lihat agenda kami.</p>
        </div>
      </section>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white flex justify-between items-center">
                    <span>Login / Registrasi untuk membuat acara</span>
                    <a href="{{ route('task') }}"
                        class="inline-flex items-center px-4 py-2 bg-white dark:bg-indigo-700 border border-gray-600 rounded-md font-semibold text-xs text-gray-700 dark:text-white uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        wire:navigate>
                        Go to Event 🗓️
                    </a>
                </div>
            </div>

            <div class="py-6">
                <div class="flex flex-col w-full">
                    <div class="-my-2 overflow-x-auto w-full">
                        <div class="py-2 align-middle inline-block min-w-full px-auto w-full">
                            <div class="relative shadow border-b border-gray-200 sm:rounded-lg w-full">
                <table class="min-w-full divide-y divide-gray-200 w-full rounded-xl">

                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                Judul
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                Lokasi
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                In Charge
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                Dihadiri
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                Tanggal
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                Mulai
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                Selesai
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-300">{{ $task->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-300">{{ $task->location }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-300">{{ $task->in_charge }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-300">{{ $task->attendees }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-300">{{ $task->start_date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-300">{{ $task->start_time }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-300">{{ $task->end_time }}</div>
                                </td>

                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $task->assignedBy?->name }}
                                    </div>
                                </td> --}}
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        </div
        </div>
    </div>

</x-app-layout>
