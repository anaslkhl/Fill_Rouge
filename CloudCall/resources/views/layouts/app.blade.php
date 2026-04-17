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
    @if(auth()->user()->role === 'admin')
    @include('partials.admin-navbar')
    @else
    @include('partials.sidebar')
    @endif
    <div class="ml-64 min-h-screen flex flex-col">
        @include('partials.header')
        <main class="flex-1 p-6 space-y-6 mr-[15rem]">
            @yield('content')
        </main>
    </div>
</body>

</html>