<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="skidev">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-100 text-base-content font-sans">

<!-- NAVBAR -->
<div class="navbar bg-base-100 shadow-sm px-6">
    <div class="flex-1 shrink-0 flex items-center">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current" />
        </a>
        <a class="text-xl font-semibold">{{ config('app.name') }}</a>
    </div>

    <div class="flex gap-2">
        @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">
                Login
            </a>
        @endauth
    </div>
</div>

<!-- HERO -->
<div class="hero min-h-[70vh]"
     style="background-image: url('https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=2000&q=80');">
    <div class="hero-overlay bg-base-300/60"></div>

    <div class="hero-content text-center text-base-content">
        <div class="max-w-xl backdrop-blur-md bg-base-100/80 p-8 rounded-box shadow-xl">

            <h1 class="text-5xl font-bold mb-4">
                Manage Projects Effortlessly
            </h1>

            <p class="mb-6 text-lg opacity-80">
                A lightweight Laravel platform to organize projects, teams and track resources.
                Built for productivity and clarity.
            </p>

            <div class="flex justify-center gap-4">

                <a href="{{ route('login') }}" class="btn btn-outline">
                    Login
                </a>
            </div>

        </div>
    </div>
</div>

<!-- FEATURES -->
<section class="py-16 bg-base-200">
    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-12">
            <h2 class="text-3xl font-semibold mb-2">
                Everything you need
            </h2>
            <p class="opacity-70">
                Built to keep your workflow simple and efficient
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h3 class="card-title">Project Management</h3>
                    <p class="opacity-70">
                        Organize projects, assign teams and track progress easily.
                    </p>
                </div>
            </div>

            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h3 class="card-title">Team Collaboration</h3>
                    <p class="opacity-70">
                        Connect your team members with clear responsibilities.
                    </p>
                </div>
            </div>

            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h3 class="card-title">Transparent Communication</h3>
                    <p class="opacity-70">
                        Show project progress to the client live.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- STATS -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-6">

        <div class="stats stats-vertical md:stats-horizontal shadow w-full bg-base-100">

            <div class="stat">
                <div class="stat-title">Projects Managed</div>
                <div class="stat-value">120+</div>
                <div class="stat-desc">Across multiple teams</div>
            </div>

            <div class="stat">
                <div class="stat-title">Active Users</div>
                <div class="stat-value">35</div>
                <div class="stat-desc">Collaborating daily</div>
            </div>

            <div class="stat">
                <div class="stat-title">Hours Tracked</div>
                <div class="stat-value">9k+</div>
                <div class="stat-desc">Total productivity</div>
            </div>

        </div>

    </div>
</section>

<!-- CALL TO ACTION -->
<section class="py-20 bg-base-200">
    <div class="max-w-4xl mx-auto text-center px-6">

        <h2 class="text-4xl font-bold mb-4">
            Ready to get started?
        </h2>

        <p class="opacity-70 mb-8">
            Create your first project and start organizing your workflow today.
        </p>

        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
            Login
        </a>

    </div>
</section>

<!-- FOOTER -->
<footer class="footer footer-center p-8 bg-base-300 text-base-content">
    <aside>
        <p class="opacity-70">
            © {{ date('Y') }} {{ config('app.name') }} — Built with Laravel & DaisyUI
        </p>
    </aside>
</footer>

</body>
</html>