<?php
declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class Breadcrumbs
{
    protected array $items = [];

    public function add(string $label, ?string $url = null): self
    {
        $this->items[] = [
            'label' => $label,
            'url' => $url,
        ];
        return $this;
    }

    public function get(): array
    {
        return $this->items;
    }

    /**
     * Generate breadcrumbs for current route
     */
    public static function generate(): self
    {
        $instance = new self();

        $routeName = Route::currentRouteName(); // e.g., "projects.edit"
        $params = Route::current()->parameters();

        // Home always first
        $homeRoute = self::routeExists('dashboard') ? route('dashboard') : null;
        $instance->add('Home', $homeRoute);

        if (!$routeName) {
            return $instance;
        }

        $parts = explode('.', $routeName);

        // Single-segment route, e.g., "dashboard"
        if (count($parts) === 1) {
            $instance->add(Str::title($parts[0]));
            return $instance;
        }

        // Multi-segment: resource + action
        $resource = $parts[0]; // e.g., "projects"
        $action = $parts[1];   // e.g., "edit"

        // Add resource link if exists
        $resourceRoute = self::routeExists("$resource.index") ? route("$resource.index") : null;
        $instance->add(Str::title($resource), $resourceRoute);

        // Handle action
        match ($action) {
            'index' => null,
            'create' => $instance->add('Create ' . Str::singular(Str::title($resource))),
            'edit' => $instance->add('Edit ' . self::getModelTitle($params)),
            'show' => $instance->add(self::getModelTitle($params)),
            default => $instance->add(Str::title($action)),
        };

        return $instance;
    }

    /**
     * Get title from model if available
     */
    protected static function getModelTitle(array $params): string
    {
        // Assumes route param is like 'project' => $project
        $model = current($params);
        if (is_object($model) && method_exists($model, 'getTitle')) {
            return $model->getTitle();
        }
        if (is_object($model) && property_exists($model, 'name')) {
            return (string) $model->name;
        }
        return (string) $model;
    }

    /**
     * Check if route exists
     */
    protected static function routeExists(string $name): bool
    {
        return Route::has($name);
    }
}