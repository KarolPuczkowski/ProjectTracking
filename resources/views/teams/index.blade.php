<x-app-layout>
    <x-tab-header
        title="Teams"
        actionRoute="teams.create"
        actionLabel="Create Team"
    />
    <!-- tab content -->
    <div>
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mb-4 shadow-lg">
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <!-- Teams Table -->
        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-200">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="w-px text-center whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $team)
                        <tr>
                            <td>{{ $team->id }}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->description }}</td>
                            <td class="whitespace-nowrap text-center">
                                <div class="flex justify-center gap-x-2">
                                    <a href="{{ route('teams.edit', $team) }}" class="btn btn-secondary btn-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('teams.destroy', $team) }}" method="POST" onsubmit="return confirm('Delete this team?');">
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
                            <td colspan="4" class="text-center">No teams found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $teams->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>