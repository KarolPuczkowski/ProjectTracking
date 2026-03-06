<x-app-layout>
    <x-tab-header
        title="Edit user"
    />

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PATCH')

        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4 w-full">
            
            <label for="name" class="label">User name</label>
            <input type="text" name="name" id="name" value="{{ old('name'), $user->name }}" class="input w-full" placeholder="Some name" required>
            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror

            <label for="email" class="label">User email</label>
            <input type="email" disabled name="email" id="email" value="{{ old('email'), $user->email }}" class="input w-full" placeholder="example@gmail.com" required>
            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror

            <label for="role" class="label">Role</label>
            <select name="role" class="select w-full" required>
                @foreach($roles as $role)
                    <option value="{{ $role }}" {{ (old('role', $user->role ?? '') == $role) ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                @endforeach
            </select>
            @error('role') <span class="text-red-500">{{ $message }}</span>@enderror

            <label for="team_id" class="label">Team</label>
            <select name="team_id" class="select w-full" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ (old('team_id', $user->team_id ?? '') == $team->id) ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
            @error('team_id') <span class="text-red-500">{{ $message }}</span>@enderror
            
        </fieldset>
        <div class="flex gap-4 mt-4 flex-row-reverse">
            <button type="submit" class="btn btn-primary">Save User</button>
            <a href="{{ route('users.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</x-app-layout>