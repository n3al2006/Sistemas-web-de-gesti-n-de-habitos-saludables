@extends('admin.layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold mb-6">Create New Habit</h2>

    <form action="{{ route('admin.habits.store') }}" method="POST">
        @csrf
        @include('admin.habits.form')
        
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create Habit
            </button>
            <a href="{{ route('admin.habits.index') }}" class="ml-2 text-gray-600 hover:text-gray-800">Cancel</a>
        </div>
    </form>
</div>
@endsection