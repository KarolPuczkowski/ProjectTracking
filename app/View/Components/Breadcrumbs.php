<?php
namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\Breadcrumbs as BreadcrumbsService;

class Breadcrumbs extends Component
{
    public array $breadcrumbs;

    public function __construct()
    {
        // Use get() to retrieve items from the service
        $this->breadcrumbs = BreadcrumbsService::generate()->get();
    }

    public function render()
    {
        return view('components.breadcrumbs');
    }
}