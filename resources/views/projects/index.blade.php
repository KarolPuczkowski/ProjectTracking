<x-app-layout>
    <!-- tab header -->
    <x-tab-header
        title="Projects"
        actionRoute="projects.create"
        actionLabel="Create Project"
        ability="create"
        :abilityTarget="\App\Models\Project::class"
    />
    <!-- tab content -->
    <div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mb-4 shadow-lg">
                <div>{{ session('success') }}</div>
            </div>
        @endif
        <!-- Projects table -->
        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-200">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Hourly rate</th>
                        <th>Status</th>
                        <th>Team</th>
                        @can('create', App\Models\Project::class)
                            <th class="w-px text-center whitespace-nowrap">Actions</th>
                        @endcan
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
                            @can('update', $project)
                                <td class="whitespace-nowrap text-center">
                                    <div class="flex justify-center gap-x-2">
                                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-secondary btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline btn-error btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endcan
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

