<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Progress Analytics') }}
            </h2>
            <a href="{{ route('admin.users.export') }}" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">
                Export Data
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Overall Stats -->
            <div class="grid grid-cols-1 gap-4 mb-8 md:grid-cols-4">
                <div class="p-6 bg-white rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Total Users</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ $stats['total_users'] }}</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Active Today</h3>
                    <p class="text-3xl font-bold text-green-600">{{ $stats['active_today'] }}</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Total Habits</h3>
                    <p class="text-3xl font-bold text-purple-600">{{ $stats['total_habits'] }}</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Avg. Completion Rate</h3>
                    <p class="text-3xl font-bold text-yellow-600">{{ $stats['avg_completion_rate'] }}%</p>
                </div>
            </div>

            <!-- User Progress Table -->
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">User</th>
                                <th class="px-4 py-2 text-left">Active Habits</th>
                                <th class="px-4 py-2 text-left">Current Streak</th>
                                <th class="px-4 py-2 text-left">Completion Rate</th>
                                <th class="px-4 py-2 text-left">Last Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userProgress as $progress)
                            <tr>
                                <td class="px-4 py-2">
                                    <div>
                                        <div class="font-semibold">{{ $progress['user']->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $progress['user']->email }}</div>
                                    </div>
                                </td>
                                <td class="px-4 py-2">{{ $progress['total_habits'] }}</td>
                                <td class="px-4 py-2">
                                    <span class="px-2 py-1 text-sm text-green-800 bg-green-100 rounded-full">
                                        {{ $progress['streak'] }} days
                                    </span>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="flex items-center">
                                        <div class="w-full h-2 mr-2 bg-gray-200 rounded">
                                            <div class="h-2 bg-blue-500 rounded" style="width: {{ $progress['completion_rate'] }}%"></div>
                                        </div>
                                        <span class="text-sm">{{ $progress['completion_rate'] }}%</span>
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    {{ $progress['user']->habitProgress()->latest()->first()?->created_at->diffForHumans() ?? 'Never' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>