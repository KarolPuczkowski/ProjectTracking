<x-app-layout>
    <x-tab-header
        title="Edit Team"
    />
    
    <form method="POST" action="{{ route('teams.update', $team) }}">
        @csrf
        @method('PUT')
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4 w-full">

            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $team->name) }}" class="input w-full" required>
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror

            <label for="description" class="label">Description</label>
            <textarea name="description" id="description" class="textarea w-full">{{ old('description', $team->description) }}</textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror

        </fieldset>
        <div class="flex gap-4 mt-4 flex-row-reverse">
            <button type="submit" class="btn btn-primary">Save Team</button>
            <a href="{{ route('teams.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</x-app-layout>