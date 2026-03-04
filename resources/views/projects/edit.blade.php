<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Project</h2>
    </x-slot>

    <div class="p-6 rounded shadow max-w-xl">
        <form method="POST" action="{{ route('projects.update', $project) }}" class="space-y-4">
            @csrf
            @method('PATCH')

            {{-- Project Name --}}
            <div>
                <label for="name" class="block mb-1 font-medium">Project Name</label>
                <input type="text"
                       name="name"
                       id="name"
                       value="{{ old('name', $project->name) }}"
                       required
                       class="input input-bordered w-full">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block mb-1 font-medium">Description</label>
                <textarea name="description"
                          id="description"
                          class="textarea textarea-bordered w-full">{{ old('description', $project->description) }}</textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Hourly Rate --}}
            <div>
                <label for="hourly_rate" class="block mb-1 font-medium">Hourly Rate</label>
                <input type="number"
                       step="0.01"
                       name="hourly_rate"
                       id="hourly_rate"
                       value="{{ old('hourly_rate', $project->hourly_rate) }}"
                       class="input input-bordered w-full">
                @error('hourly_rate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Assign Team --}}
            <div>
                <label for="team_id" class="block mb-1 font-medium">Assign Team</label>
                <select name="team_id" id="team_id" class="select select-bordered w-full" required>
                    <option value="">-- Select Team --</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}"
                            {{ old('team_id', $project->team_id) == $team->id ? 'selected' : '' }}>
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>
                @error('team_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Active --}}
            <div class="flex items-center gap-2">
                <input type="checkbox"
                       name="is_active"
                       id="is_active"
                       value="1"
                       {{ old('is_active', $project->is_active) ? 'checked' : '' }}
                       class="checkbox checkbox-primary">
                <label for="is_active" class="font-medium">Active</label>
            </div>

            {{-- Buttons --}}
            <div class="flex space-x-2">
                <button type="submit" class="btn btn-primary">Update Project</button>
                <a href="{{ route('projects.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>