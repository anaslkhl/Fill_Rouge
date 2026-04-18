<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CloudCall')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])
</head>

<body class="bg-slate-950 text-white font-sans">
    @auth
    @if(auth()->user()->role === 'admin')
    @include('partials.admin-navbar')
    @elseif (auth()->user()->role === 'agent')
    @include('partials.agent-navbar')
    @elseif(auth()->user()->role === 'supervisor')
    @include('partials.supervisor-navbar')
    @endif
    @endauth
    <div class="ml-64 min-h-screen flex flex-col">
        <main class="flex-1 p-6 space-y-6 mr-[15rem]">
            @yield('content')
        </main>
    </div>
</body>

</html>