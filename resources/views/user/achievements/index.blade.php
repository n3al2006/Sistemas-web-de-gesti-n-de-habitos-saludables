<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('My Achievements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Achievement Stats -->
            <div class="p-6 mb-6 bg-white rounded-lg shadow">
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div>
                        <h3 class="text-lg font-semibold">Total Achievements</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ $earnedAchievements->count() }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Current Streak</h3>
                        <p class="text-3xl font-bold text-green-600">{{ $currentStreak }} days</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Completion Rate</h3>
                        <p class="text-3xl font-bold text-purple-600">{{ $completionRate }}%</p>
                    </div>
                </div>
            </div>

            <!-- Achievement Categories -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <!-- Streak Achievements -->
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h3 class="mb-4 text-lg font-semibold">Streak Achievements</h3>
                        <div class="space-y-4">
                            @foreach($streakAchievements as $achievement)
                                <div class="p-4 border rounded-lg {{ $achievement->earned ? 'bg-green-50' : 'bg-gray-50' }}">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <i class="text-2xl {{ $achievement->icon }}"></i>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="font-semibold">{{ $achievement->name }}</h4>
                                            <p class="text-sm text-gray-600">{{ $achievement->description }}</p>
                                            @if($achievement->earned)
                                                <span class="text-xs text-green-600">Earned {{ $achievement->pivot->earned_at->diffForHumans() }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Completion Achievements -->
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h3 class="mb-4 text-lg font-semibold">Completion Achievements</h3>
                        <div class="space-y-4">
                            @foreach($completionAchievements as $achievement)
                                <div class="p-4 border rounded-lg {{ $achievement->earned ? 'bg-green-50' : 'bg-gray-50' }}">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <i class="text-2xl {{ $achievement->icon }}"></i>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="font-semibold">{{ $achievement->name }}</h4>
                                            <p class="text-sm text-gray-600">{{ $achievement->description }}</p>
                                            @if($achievement->earned)
                                                <span class="text-xs text-green-600">Earned {{ $achievement->pivot->earned_at->diffForHumans() }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Diversity Achievements -->
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h3 class="mb-4 text-lg font-semibold">Diversity Achievements</h3>
                        <div class="space-y-4">
                            @foreach($diversityAchievements as $achievement)
                                <div class="p-4 border rounded-lg {{ $achievement->earned ? 'bg-green-50' : 'bg-gray-50' }}">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <i class="text-2xl {{ $achievement->icon }}"></i>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="font-semibold">{{ $achievement->name }}</h4>
                                            <p class="text-sm text-gray-600">{{ $achievement->description }}</p>
                                            @if($achievement->earned)
                                                <span class="text-xs text-green-600">Earned {{ $achievement->pivot->earned_at->diffForHumans() }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>