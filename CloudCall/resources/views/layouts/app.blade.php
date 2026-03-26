<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CloudCall')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white font-sans">
    @include('partials.sidebar')
    <div class="ml-64 min-h-screen flex flex-col">
        @include('partials.header')
        <main class="flex-1 p-6 space-y-6">
            @yield('content')
        </main>
    </div>
</body>

</html>