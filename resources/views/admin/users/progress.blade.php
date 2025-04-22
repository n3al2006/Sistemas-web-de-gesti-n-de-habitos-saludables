<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('User Progress') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- User Progress Table -->
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">User</th>
                                <th class="px-4 py-2 text-left">Habit</th>
                                <th class="px-4 py-2 text-left">Progress</th>
                                <th class="px-4 py-2 text-left">Last Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userProgress as $progress)
                            <tr>
                                <td class="px-4 py-2">{{ $progress->user->name }}</td>
                                <td class="px-4 py-2">{{ $progress->habit->name }}</td>
                                <td class="px-4 py-2">
                                    <div class="w-full h-2 bg-gray-200 rounded">
                                        <div class="h-2 bg-green-500 rounded" style="width: {{ $progress->completion_rate }}%"></div>
                                    </div>
                                    <span class="text-sm">{{ $progress->completion_rate }}%</span>
                                </td>
                                <td class="px-4 py-2">{{ $progress->last_activity->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $userProgress->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>