@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6">Notificaciones</h2>

    <div class="space-y-4">
        @forelse($notifications as $notification)
            <div class="bg-white rounded-lg shadow p-4 {{ $notification->is_read ? 'opacity-50' : '' }}">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-semibold">{{ $notification->title }}</h3>
                        <p class="text-gray-600">{{ $notification->message }}</p>
                        <p class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</p>
                    </div>
                    @if(!$notification->is_read)
                        <form action="{{ route('notifications.mark-as-read', $notification) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-sm text-emerald-600 hover:text-emerald-800">
                                Marcar como leída
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-600">No tienes notificaciones pendientes.</p>
        @endforelse
    </div>
</div>
@endsection