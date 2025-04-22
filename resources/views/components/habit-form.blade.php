@props(['habit' => null])

<div class="space-y-4">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" id="name" 
               value="{{ old('name', $habit?->name) }}"
               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="3"
                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('description', $habit?->description) }}</textarea>
    </div>

    <div>
        <label class="flex items-center">
            <input type="checkbox" name="is_recommended" value="1"
                   {{ old('is_recommended', $habit?->is_recommended) ? 'checked' : '' }}
                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-600">Show as recommended habit</span>
        </label>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
            {{ $habit ? 'Update Habit' : 'Create Habit' }}
        </button>
    </div>
</div>