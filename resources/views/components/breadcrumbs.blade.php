<div class="breadcrumbs text-sm max-w-7xl w-full py-2 px-4 md:px-0 mx-auto">
    <ul>
        @foreach($breadcrumbs as $crumb)
            <li>
                @if($crumb['url'])
                    <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                @else
                    <span>{{ $crumb['label'] }}</span>
                @endif
                
            </li>
        @endforeach
    </ul>
</div>