<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x leading-tight">
            Developer Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div>
                <h1 class="text-2xl font-bold">Welcome developer, {{ Auth::user()->name }}!</h1>
                <p class="mt-1">Today is {{ now()->format('l, F j, Y') }}</p>
            </div>

        </div>
    </div>
</x-app-layout>