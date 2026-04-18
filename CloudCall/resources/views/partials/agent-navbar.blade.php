{{-- resources/views/partials/agent-navbar.blade.php --}}
{{-- Usage: @include('partials.agent-navbar') --}}
{{-- Pair with: <div class="pl-64"> ... page content ... </div> --}}

<aside class="fixed top-0 left-0 h-screen w-64 z-50 flex flex-col bg-slate-950 border-r border-white/[0.05]"
    style="background: linear-gradient(180deg, #0a0f1e 0%, #080c18 100%);">

    {{-- Subtle grid texture --}}
    <div class="absolute inset-0 pointer-events-none"
        style="background-image: linear-gradient(rgba(56,189,248,0.012) 1px, transparent 1px), linear-gradient(90deg, rgba(56,189,248,0.012) 1px, transparent 1px); background-size: 32px 32px; mask-image: radial-gradient(ellipse 80% 60% at 50% 0%, black, transparent);">
    </div>
    <div class="absolute top-0 inset-x-0 h-48 pointer-events-none"
        style="background: radial-gradient(ellipse 70% 40% at 50% 0%, rgba(56,189,248,0.06), transparent);">
    </div>

    {{-- LOGO --}}
    <div class="relative flex items-center gap-3 px-5 h-16 border-b border-white/[0.05] flex-shrink-0">
        <a href="{{ route('agent.dashboard') }}" class="flex items-center gap-2.5 group">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-sky-400 to-sky-600 flex items-center justify-center flex-shrink-0
                        shadow-[0_0_14px_rgba(56,189,248,0.4)] group-hover:shadow-[0_0_22px_rgba(56,189,248,0.65)] transition-all duration-200">
                <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                </svg>
            </div>
            <div>
                <span class="text-sm font-bold tracking-tight text-white leading-none">Cloud<span class="text-sky-400">Call</span></span>
                <p class="text-[9px] font-semibold tracking-[0.2em] uppercase text-slate-600 mt-0.5">Agent Portal</p>
            </div>
        </a>
    </div>

    {{-- NAV --}}
    <nav class="relative flex-1 overflow-y-auto px-3 py-4 space-y-0.5">

        <p class="text-[0.6rem] font-semibold tracking-[0.2em] uppercase text-slate-700 px-3 pb-2 pt-1">Main</p>

        {{-- Overview --}}
        <a href="{{ route('agent.dashboard') }}"
            class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 relative
                  {{ request()->routeIs('agent.dashboard')
                       ? 'text-sky-300 bg-sky-400/10 border border-sky-400/20 shadow-[inset_0_1px_0_rgba(56,189,248,0.1)]'
                       : 'text-slate-500 hover:text-slate-200 hover:bg-white/[0.04] border border-transparent' }}">
            @if(request()->routeIs('agent.dashboard'))
            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-0.5 h-5 bg-sky-400 rounded-r-full shadow-[0_0_6px_rgba(56,189,248,0.8)]"></span>
            @endif
            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors duration-200
                        {{ request()->routeIs('agent.dashboard') ? 'bg-sky-400/15' : 'bg-white/[0.03] group-hover:bg-white/[0.06]' }}">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1" />
                    <rect x="14" y="3" width="7" height="7" rx="1" />
                    <rect x="14" y="14" width="7" height="7" rx="1" />
                    <rect x="3" y="14" width="7" height="7" rx="1" />
                </svg>
            </div>
            Overview
        </a>

        {{-- Divider --}}
        <div class="h-px bg-white/[0.04] my-3 mx-1"></div>
        <p class="text-[0.6rem] font-semibold tracking-[0.2em] uppercase text-slate-700 px-3 pb-2">Calls</p>

        {{-- Incoming Call --}}
        <a href="{{ route('agent.incoming') }}"
            class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 relative
                  {{ request()->routeIs('agent.incoming')
                       ? 'text-sky-300 bg-sky-400/10 border border-sky-400/20 shadow-[inset_0_1px_0_rgba(56,189,248,0.1)]'
                       : 'text-slate-500 hover:text-slate-200 hover:bg-white/[0.04] border border-transparent' }}">
            @if(request()->routeIs('agent.incoming'))
            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-0.5 h-5 bg-sky-400 rounded-r-full shadow-[0_0_6px_rgba(56,189,248,0.8)]"></span>
            @endif
            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors duration-200
                        {{ request()->routeIs('agent.incoming') ? 'bg-sky-400/15' : 'bg-white/[0.03] group-hover:bg-white/[0.06]' }}">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                </svg>
            </div>
            Incoming Call
        </a>

        {{-- Log Call Result --}}
        <a href="{{ route('agent.log') }}"
            class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 relative
                  {{ request()->routeIs('agent.log')
                       ? 'text-indigo-300 bg-indigo-400/10 border border-indigo-400/20 shadow-[inset_0_1px_0_rgba(99,102,241,0.1)]'
                       : 'text-slate-500 hover:text-slate-200 hover:bg-white/[0.04] border border-transparent' }}">
            @if(request()->routeIs('agent.log'))
            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-0.5 h-5 bg-indigo-400 rounded-r-full shadow-[0_0_6px_rgba(99,102,241,0.8)]"></span>
            @endif
            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors duration-200
                        {{ request()->routeIs('agent.log') ? 'bg-indigo-400/15' : 'bg-white/[0.03] group-hover:bg-white/[0.06]' }}">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                    <polyline points="17 21 17 13 7 13 7 21" />
                    <polyline points="7 3 7 8 15 8" />
                </svg>
            </div>
            Log Call Result
        </a>

        {{-- Call History --}}
        <a href="{{ route('agent.history') }}"
            class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 relative
                  {{ request()->routeIs('agent.history')
                       ? 'text-emerald-300 bg-emerald-400/10 border border-emerald-400/20 shadow-[inset_0_1px_0_rgba(52,211,153,0.1)]'
                       : 'text-slate-500 hover:text-slate-200 hover:bg-white/[0.04] border border-transparent' }}">
            @if(request()->routeIs('agent.history'))
            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-0.5 h-5 bg-emerald-400 rounded-r-full shadow-[0_0_6px_rgba(52,211,153,0.8)]"></span>
            @endif
            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors duration-200
                        {{ request()->routeIs('agent.history') ? 'bg-emerald-400/15' : 'bg-white/[0.03] group-hover:bg-white/[0.06]' }}">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            Call History
        </a>

    </nav>

    {{-- FOOTER --}}
    <div class="relative flex-shrink-0 border-t border-white/[0.05] p-3">
        <div class="flex items-center gap-3 px-2 py-2 rounded-xl hover:bg-white/[0.03] transition-colors duration-200 cursor-default">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-sky-500/30 to-sky-700/30 border border-sky-400/20 flex items-center justify-center flex-shrink-0">
                <span class="text-[11px] font-bold text-sky-300">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-slate-300 truncate">{{ auth()->user()->name ?? 'Agent' }}</p>
                <p class="text-[10px] text-slate-600 truncate">{{ auth()->user()->email ?? '' }}</p>
            </div>
            <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_6px_rgba(52,211,153,0.7)] flex-shrink-0"></span>
        </div>

        <form method="GET" action="{{ route('user.logout') }}" class="mt-1">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-2.5 px-3 py-2 rounded-xl text-[11px] font-semibold text-slate-600 hover:text-red-400 hover:bg-red-400/[0.06] transition-all duration-200">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
                Sign out
            </button>
        </form>
    </div>

</aside>