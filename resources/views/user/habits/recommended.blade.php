<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recommended Habits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($recommendedHabits->isEmpty())
                        <p class="text-gray-500 text-center">No recommended habits available at the moment.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($recommendedHabits as $habit)
                                <div class="border p-4 rounded-lg shadow">
                                    <h3 class="font-semibold text-lg mb-2">{{ $habit->name }}</h3>
                                    <p class="text-gray-600 mb-4">{{ $habit->description }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-500">{{ ucfirst($habit->frequency) }}</span>
                                        <form action="{{ route('user.habits.adopt') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="habit_id" value="{{ $habit->id }}">
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                                Adopt Habit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>