@extends('admin.layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Usuario: {{ $user->name }}</h2>
        <p class="text-gray-600">{{ $user->email }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h3 class="text-xl font-semibold mb-4">Resumen de Progreso</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-gray-50 p-4 rounded">
                <p class="text-gray-600">Hábitos Totales</p>
                <p class="text-2xl font-bold">{{ $allHabits->count() }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded">
                <p class="text-gray-600">Progreso Mensual</p>
                <p class="text-2xl font-bold">{{ $monthlyProgress }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <h3 class="text-xl font-semibold p-6 bg-gray-50">Hábitos del Usuario</h3>
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Frecuencia</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Progreso</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($allHabits as $habit)
                <tr>
                    <td class="px-6 py-4">{{ $habit->name }}</td>
                    <td class="px-6 py-4">
                        {{ $habit->habit_template_id ? 'Adoptado' : 'Personal' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $habit->frequency }} veces {{ $habit->frequency_type }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $habit->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $habit->is_active ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @if($habit->progress)
                            {{ $habit->progress->where('completed', true)->count() }} completados
                        @else
                            0 completados
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection