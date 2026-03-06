<x-app-layout>
    <x-tab-header
        title="Create new team"
    />
    <form method="POST" action="{{ route('teams.store') }}">
        @csrf
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4 w-full">
            <!-- <legend class="fieldset-legend">Create new project</legend> -->

            <label for="name" class="label">Team name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="input w-full" placeholder="Some name" required>
            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror

            <label for="description" class="label">Description</label>
            <textarea name="description" id="description" class="textarea w-full">{{ old('description') }}</textarea>
            @error('description')<span class="text-red-500">{{ $message }}</span>@enderror
            
        </fieldset>

        <div class="flex gap-4 mt-4 flex-row-reverse">
            <button type="submit" class="btn btn-primary">Create Team</button>
            <a href="{{ route('teams.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</x-app-layout>