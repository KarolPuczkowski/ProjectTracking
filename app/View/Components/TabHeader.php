<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\Component;

class TabHeader extends Component
{
    public bool $showAction;

    public function __construct(
        public string $title,
        public ?string $actionRoute = null,
        public ?string $actionLabel = null,
        public ?string $ability = null,
        public mixed $abilityTarget = null
    ) {
        $this->showAction = $this->resolveAuthorization();
    }

    private function resolveAuthorization(): bool
    {
        if (!$this->actionRoute) {
            return false;
        }

        if (!$this->ability) {
            return true;
        }

        return Gate::allows($this->ability, $this->abilityTarget);
    }

    public function render(): View|Closure|string
    {
        return view('components.tab-header');
    }
}