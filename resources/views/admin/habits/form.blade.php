<div class="space-y-6">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $habit->name ?? '') }}" 
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="3" 
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $habit->description ?? '') }}</textarea>
    </div>

    <div>
        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
        <input type="text" name="category" id="category" value="{{ old('category', $habit->category ?? '') }}" 
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label for="frequency" class="block text-sm font-medium text-gray-700">Frequency</label>
            <input type="number" name="frequency" id="frequency" value="{{ old('frequency', $habit->frequency ?? 1) }}" min="1" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label for="frequency_type" class="block text-sm font-medium text-gray-700">Frequency Type</label>
            <select name="frequency_type" id="frequency_type" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="daily" {{ (old('frequency_type', $habit->frequency_type ?? '') == 'daily') ? 'selected' : '' }}>Daily</option>
                <option value="weekly" {{ (old('frequency_type', $habit->frequency_type ?? '') == 'weekly') ? 'selected' : '' }}>Weekly</option>
                <option value="monthly" {{ (old('frequency_type', $habit->frequency_type ?? '') == 'monthly') ? 'selected' : '' }}>Monthly</option>
            </select>
        </div>
    </div>

    <div>
        <label class="inline-flex items-center">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $habit->is_active ?? true) ? 'checked' : '' }} 
                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <span class="ml-2 text-sm text-gray-600">Active</span>
        </label>
    </div>
</div>