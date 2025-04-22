<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Habits') }}
            </h2>
            <a href="{{ route('admin.habits.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                Create New Habit
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">Description</th>
                                <th class="px-4 py-2 text-left">Recommended</th>
                                <th class="px-4 py-2 text-left">Users</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($habits as $habit)
                            <tr>
                                <td class="px-4 py-2">{{ $habit->name }}</td>
                                <td class="px-4 py-2">{{ Str::limit($habit->description, 50) }}</td>
                                <td class="px-4 py-2">{{ $habit->is_recommended ? 'Yes' : 'No' }}</td>
                                <td class="px-4 py-2">{{ $habit->users_count ?? 0 }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.habits.edit', $habit) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $habits->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>