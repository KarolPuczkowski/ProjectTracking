<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Teams</h2>
    </x-slot>

    <div class="p-6 bg-base-100 rounded-lg shadow-lg">
        <!-- Create Team Button -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('teams.create') }}" class="btn btn-primary">
                <span class="mr-2">+</span> Create Team
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mb-4 shadow-lg">
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <!-- Teams Table -->
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $team)
                        <tr>
                            <td>{{ $team->id }}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->description }}</td>
                            <td class="flex justify-center space-x-2">
                                <a href="{{ route('teams.edit', $team) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('teams.destroy', $team) }}" method="POST" onsubmit="return confirm('Delete this team?');">
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