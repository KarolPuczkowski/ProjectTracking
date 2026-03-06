<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

class ProjectPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'developer']);
    }

    public function view(User $user, Project $project): bool
    {
        return match ($user->role) {
            'admin' => true,
            'developer' => $project->team_id === $user->team_id,
            default => false,
        };
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Project $project): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Project $project): bool
    {
        return $user->role === 'admin';
    }
}