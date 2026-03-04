<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold">Users</h2>
    </x-slot>

    <div class="p-6 bg-base-100 rounded-lg shadow-lg">
        <!-- Create User Button -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <span class="mr-2">+</span> Create User
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mb-4 shadow-lg">
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <!-- Userss Table -->
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Team</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->team?->name }}</td>
                            <td class="flex justify-center space-x-2">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $users->links() }}
</x-app-layout>