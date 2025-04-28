<div x-data="{ open: false }" class="relative ml-3">
    <div>
        <button @click="open = !open" class="relative p-1 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <span class="sr-only">View notifications</span>
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
            @if(auth()->user()->unreadNotifications->count() > 0)
                <span class="absolute top-0 right-0 block w-2 h-2 bg-red-400 rounded-full"></span>
            @endif
        </button>
    </div>

    <div x-show="open" 
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="absolute right-0 w-80 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
        <div class="py-1">
            @forelse(auth()->user()->notifications as $notification)
                <div class="px-4 py-2 {{ $notification->read_at ? 'bg-white' : 'bg-blue-50' }}">
                    <p class="text-sm text-gray-700">{{ $notification->data['message'] }}</p>
                    <p class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <div class="px-4 py-2">
                    <p class="text-sm text-gray-700">No notifications</p>
                </div>
            @endforelse
        </div>
        @if(auth()->user()->unreadNotifications->count() > 0)
            <div class="border-t border-gray-100">
                <button onclick="markNotificationsAsRead()" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                    Mark all as read
                </button>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    function markNotificationsAsRead() {
        fetch('{{ route("notifications.mark-as-read") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        }).then(() => {
            window.location.reload();
        });
    }
</script>
@endpush