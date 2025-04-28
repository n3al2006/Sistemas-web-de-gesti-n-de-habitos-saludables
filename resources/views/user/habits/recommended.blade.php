@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6">Hábitos Recomendados</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($recommendedHabits as $habit)
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-semibold mb-2">{{ $habit->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $habit->description }}</p>
                <div class="mb-4">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                        {{ $habit->category }}
                    </span>
                    <span class="text-sm text-gray-500">
                        {{ $habit->frequency }} veces {{ $habit->frequency_type }}
                    </span>
                </div>
                <form action="{{ route('user.habits.adopt', $habit->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-emerald-500 text-white px-4 py-2 rounded hover:bg-emerald-600">
                        Adoptar este hábito
                    </button>
                </form>
            </div>
        @empty
            <div class="col-span-3 text-center py-8">
                <p class="text-gray-500">No hay hábitos recomendados disponibles en este momento.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection