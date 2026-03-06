<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">
        {{ $title }}
    </h2>

    @if($showAction)
        <a href="{{ route($actionRoute) }}" class="btn btn-accent min-w-[170px] justify-between">
            <span class="mr-2">+</span>
            {{ $actionLabel }}
        </a>
    @endif
</div>