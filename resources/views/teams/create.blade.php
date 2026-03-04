<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Create Team</h2>
    </x-slot>

    <div class="p-6 bg-base-100 rounded-lg shadow-lg max-w-2xl mx-auto">
        <form method="POST" action="{{ route('teams.store') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div class="form-control w-full">
                <label for="name" class="label">
                    <span class="label-text font-medium">Name</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="input input-bordered w-full" required>
                @error('name')
                    <span class="text-error mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-control w-full">
                <label for="description" class="label">
                    <span class="label-text font-medium">Description</span>
                </label>
                <textarea name="description" id="description" class="textarea textarea-bordered w-full">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-error mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex space-x-2 mt-4">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('teams.index') }}" class="btn btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>