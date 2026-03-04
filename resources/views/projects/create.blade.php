<x-app-layout>
    <x-slot name="header">
        <h2>Create Project</h2>
    </x-slot>

    <div class="p-6 rounded shadow">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">Project Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="input input-bordered w-full" required>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-1 font-medium">Description</label>
                <textarea name="description" id="description" class="textarea textarea-bordered w-full">{{ old('description') }}</textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="hourly_rate" class="block mb-1 font-medium">Hourly Rate</label>
                <input type="number" name="hourly_rate" id="hourly_rate" value="{{ old('hourly_rate') ?? 0 }}"
                       class="input input-bordered w-full" min="0" step="0.01">
                @error('hourly_rate') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="team_id" class="block mb-1 font-medium">Assign Team</label>
                <select name="team_id" id="team_id" class="select select-bordered w-full" required>
                    <option value="">-- Select Team --</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ old('team_id') == $team->id ? 'selected' : '' }}>
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>
                @error('team_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Active Toggle -->
            <div class="mb-4 flex items-center space-x-2">
                <input type="checkbox" name="is_active" id="is_active" class="toggle toggle-primary"
                       value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label for="is_active" class="font-medium">Active</label>
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="btn btn-primary">Create Project</button>
                <a href="{{ route('projects.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>