<x-app-layout>
    <x-tab-header
        title="Edit Project"
    />

    <form method="POST" action="{{ route('projects.update', $project) }}">
        @csrf
        @method('PATCH')
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4 w-full">

            <label for="name" class="label">Project Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}" class="input w-full" placeholder="Some project" required>
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror

            <label for="description" class="label">Description</label>
            <textarea name="description" id="description" class="textarea w-full">{{ old('description', $project->description) }}</textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror

            <label for="hourly_rate" class="label">Hourly Rate</label>
            <input type="number"
                step="0.01"
                name="hourly_rate"
                id="hourly_rate"
                value="{{ old('hourly_rate', $project->hourly_rate) }}"
                class="input w-full"
            >
                @error('hourly_rate') <span class="text-red-500">{{ $message }}</span> @enderror

            <label for="team_id" class="label">Assign Team</label>
            <select name="team_id" id="team_id" class="select w-full" required>
                <option value="">-- Select Team --</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}"
                        {{ old('team_id', $project->team_id) == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
            @error('team_id') <span class="text-red-500">{{ $message }}</span> @enderror

            <label for="is_active" class="label">Active</label>
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }} class="toggle toggle-primary">

        </fieldset>
        <div class="flex gap-4 mt-4 flex-row-reverse">
            <button type="submit" class="btn btn-primary">Save Project</button>
            <a href="{{ route('projects.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>

</x-app-layout>