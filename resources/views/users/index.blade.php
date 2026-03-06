<x-app-layout>
    <x-tab-header
        title="Users"
        actionRoute="users.create"
        actionLabel="Create User"
    />
    <!-- tab content -->
    <div>
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mb-4 shadow-lg">
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <!-- Userss Table -->
        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-200">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Team</th>
                        <th class="w-px text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->team?->name }}</td>
                            <td class="whitespace-nowrap text-center">
                                <div class="flex justify-center gap-x-2">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-secondary btn-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline btn-error btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
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