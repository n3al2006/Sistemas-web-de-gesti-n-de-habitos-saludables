<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Progress - HabitHub Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <nav class="bg-gray-800 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-bold">User Progress - {{ $user->name }}</h1>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600">
                    Back to Dashboard
                </a>
            </div>
        </nav>

        <div class="container mx-auto p-6">
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-2xl font-bold mb-4">Active Habits</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($user->habits as $habit)
                    <div class="border p-4 rounded-lg">
                        <h3 class="font-semibold">{{ $habit->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ $habit->description }}</p>
                        <p class="text-gray-500 mt-2">Frequency: {{ $habit->frequency }}</p>
                        <div class="mt-2">
                            <span class="text-sm font-medium {{ $habit->pivot->is_active ? 'text-green-600' : 'text-red-600' }}">
                                {{ $habit->pivot->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold mb-4">Progress History</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Habit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($user->progress()->with('habit')->orderBy('date', 'desc')->get() as $progress)
                            <tr>
                                <td class="px-6 py-4">{{ $progress->date->format('Y-m-d') }}</td>
                                <td class="px-6 py-4">{{ $progress->habit->name }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs rounded-full {{ $progress->completed ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $progress->completed ? 'Completed' : 'Incomplete' }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html> -->