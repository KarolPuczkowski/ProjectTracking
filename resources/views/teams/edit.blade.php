<x-app-layout>
    <x-slot name="header">
        <h2>Edit Team</h2>
    </x-slot>

    <div class="p-6 bg-white rounded shadow">
        <form method="POST" action="{{ route('teams.update', $team) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $team->name) }}" class="border p-2 w-full" required>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-1 font-medium">Description</label>
                <textarea name="description" id="description" class="border p-2 w-full">{{ old('description', $team->description) }}</textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update</button>
            <a href="{{ route('teams.index') }}" class="ml-2 px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</a>
        </form>
    </div>
</x-app-layout>