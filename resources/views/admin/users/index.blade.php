@extends('admin.layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6">Gestión de Usuarios</h2>

    <!-- Top Users Section -->
    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-4">🏆 Top Usuarios del Mes</h3>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @foreach($topUsers as $index => $topUser)
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-2xl">{{ ['🥇', '🥈', '🥉', '4️⃣', '5️⃣'][$index] }}</span>
                    <span class="text-sm text-gray-500">#{{ $index + 1 }}</span>
                </div>
                <p class="font-semibold">{{ $topUser->name }}</p>
                <p class="text-sm text-gray-600">{{ $topUser->monthly_progress }} hábitos completados</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hábitos</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progreso Mensual</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Racha</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->habits->count() }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $user->monthly_progress }} completados
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="text-sm font-medium {{ $user->progress->count() > 10 ? 'text-green-600' : 'text-gray-600' }}">
                                🔥 {{ $user->progress->count() }} días
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.users.show', $user) }}" 
                           class="text-indigo-600 hover:text-indigo-900">Ver detalles</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection