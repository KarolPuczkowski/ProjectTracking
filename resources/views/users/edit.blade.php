<x-app-layout>
    <h1 class="text-xl font-bold mb-4">{{ isset($user) ? 'Edit User' : 'Create User' }}</h1>

    <form action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" method="POST">
        @csrf
        @if(isset($user)) @method('PATCH') @endif

        <input type="text" name="name" disabled value="{{ old('name', $user->name ?? '') }}" placeholder="Name" required>
        <input type="email" name="email" disabled value="{{ old('email', $user->email ?? '') }}" placeholder="Email" required>

        <select name="role" required>
            @foreach($roles as $role)
                <option value="{{ $role }}" {{ (old('role', $user->role ?? '') == $role) ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
            @endforeach
        </select>

        <select name="team_id">
            <option value="">No Team</option>
            @foreach($teams as $team)
                <option value="{{ $team->id }}" {{ (old('team_id', $user->team_id ?? '') == $team->id) ? 'selected' : '' }}>{{ $team->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mt-2">{{ isset($user) ? 'Update' : 'Create' }}</button>
    </form>
</x-app-layout>