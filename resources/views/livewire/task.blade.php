<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
        {{ __('Acara') }}
    </h2>
</x-slot>

<div class="py-6 justify-center dark:bg-gray-900">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-action-message class="flex justify-start mb-4" on="status-updated">
            {{ __('Status Updated Successfully') }}
        </x-action-message>
        <div wire:loading>
            <div class="flex justify-start mb-4">
                <div class="spinner">Updating</div>
            </div>
        </div>
        <div class="flex justify-end mb-4">
            <a href='{{ route('task.create') }}' wire:navigate><button
                    class ='inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                    + Event
                </button></a>

        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg pl-6">
            <div class="p-6 text-gray-900">
                <div class="flex flex-col w-full">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 w-full">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 w-full">
                            <div class="relative shadow border-b border-gray-200 sm:rounded-lg w-full">
                                <table class="min-w-full divide-y divide-gray-200 w-full">

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
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                                Tags
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-gray-300 uppercase tracking-wider">
                                                Action
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

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900 dark:text-gray-300">
                                                        @foreach ($task->tags as $tag)
                                                            {{ $tag->name }} @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">

                                                    <div class="text-sm text-gray-900 dark:text-gray-300">
                                                        <select wire:model="selectedStatus.{{ $task->id }}"
                                                            @if ($task->status->name === 'Accepted' || $task->status->name === 'Rejected') disabled @endif
                                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                            wire:change="updateStatus({{ $task->id }})">
                                                            @foreach ($statuses as $status)
                                                                <option value="{{ $status->id }}"
                                                                    {{ $task->status->name === $status->name ? 'selected' : '' }}
                                                                    {{ $status->name == 'Accepted' || $status->name == 'Rejected' ? 'disabled' : '' }}>
                                                                    {{ $status->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </td>
                                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $task->assignedBy?->name }}
                                                    </div>
                                                </td> --}}
                                                
                                                <td>
                                                    @if ($task->admin_user_id == auth()->user()->id)
                                                        <a href='{{ route('task.edit', $task->id) }}' wire:navigate>
                                                            <x-secondary-button>
                                                                Edit
                                                            </x-secondary-button>
                                                        </a>
                                                    @else
                                                        <a href='#' wire:navigate>
                                                            <x-secondary-button disabled>
                                                                Edit
                                                            </x-secondary-button>
                                                        </a>
                                                    @endif
                                                    @if ($task->admin_user_id == auth()->user()->id)
                                                        <button type="button"
                                                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                            wire:click="delete({{ $task->id }})"
                                                            wire:confirm="Are you sure you want to delete this task?">
                                                            Delete
                                                        </button>
                                                    @else
                                                        <button type="button" disabled
                                                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                            Delete
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>