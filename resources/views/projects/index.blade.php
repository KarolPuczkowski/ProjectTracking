<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Projects
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="flex justify-end mb-4">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">
                <span class="mr-2">+</span> Create Project
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mb-4 shadow-lg">
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Hourly rate</th>
                        <th>Status</th>
                        <th>Team</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->hourly_rate ?? '—' }}</td>
                            <td>
                                <span class="{{ $project->is_active ? 'text-green-600' : 'text-gray-400' }}">
                                    {{ $project->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ $project->team->name}}</td>
                            <td class="flex justify-center space-x-2">
                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?');">
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
                            <td colspan="4" class="text-center">No projects found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

