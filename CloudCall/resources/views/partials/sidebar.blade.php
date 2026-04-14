@auth
@if(in_array(auth()->user()->role, ['admin', 'agent', 'supervisor']))
<aside class="fixed top-0 left-0 w-64 h-full bg-slate-900 p-6 text-white">

    <h2 class="text-2xl font-bold mb-6">CloudCall</h2>

    <nav class="space-y-4">

        @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-slate-800">Admin Dashboard</a>
        @endif

        @if(auth()->user()->role === 'agent')
        <a href="{{ route('dashboard.agent') }}" class="block py-2 px-4 rounded hover:bg-slate-800">Agent Dashboard</a>
        @endif

        @if(auth()->user()->role === 'supervisor')
        <a href="{{ route('dashboard.supervisor') }}" class="block py-2 px-4 rounded hover:bg-slate-800">Supervisor Dashboard</a>
        @endif

    </nav>

    <div class="mt-6 p-4 rounded-xl bg-slate-800 shadow-md">

        <div class="flex items-center gap-3 mb-3">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
            </span>

            <div>
                <p class="text-sm font-semibold capitalize">
                    {{ auth()->user()->name }}
                </p>
                <p class="text-xs text-gray-400 capitalize">
                    {{ auth()->user()->role }}
                </p>
            </div>
        </div>

        <div class="text-xs text-gray-400 space-y-1 mb-4">
            <p>Email: {{ auth()->user()->email }}</p>
            <p>Phone: {{ auth()->user()->phone ?? 'Not provided' }}</p>
        </div>

        <form method="POST" action="{{ route('user.logout') }}">
            @csrf
            <button type="submit"
                class="w-full bg-red-500 hover:bg-red-600 text-white text-sm py-2 rounded">
                Logout
            </button>
        </form>

    </div>

</aside>
@endif
@endauth
