@extends('layouts.app')

@section('title', 'Admin Dashboard — CloudCall')

@section('content')

@include('partials.admin-navbar')

<style>
    ::-webkit-scrollbar {
        width: 4px;
        height: 4px;
    }

    ::-webkit-scrollbar-track {
        background: transparent;
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(148, 163, 184, .2);
        border-radius: 99px;
    }

    @keyframes soft-pulse {

        0%,
        100% {
            opacity: 1
        }

        50% {
            opacity: .55
        }
    }

    .pulse-dot {
        animation: soft-pulse 2s ease infinite;
    }

    @keyframes bar-in {
        from {
            width: 0
        }
    }

    .bar-fill {
        animation: bar-in .8s ease forwards;
    }

    @keyframes fade-up {
        from {
            opacity: 0;
            transform: translateY(16px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card-animate {
        animation: fade-up .5s ease forwards;
        opacity: 0;
    }

    .card-animate:nth-child(1) {
        animation-delay: .05s;
    }

    .card-animate:nth-child(2) {
        animation-delay: .12s;
    }

    .card-animate:nth-child(3) {
        animation-delay: .19s;
    }

    .card-animate:nth-child(4) {
        animation-delay: .26s;
    }
</style>

<div class="min-h-screen bg-slate-950 relative overflow-hidden pt-16">

    {{-- Ambient background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_45%_at_50%_0%,rgba(56,189,248,0.055)_0%,transparent_70%)]"></div>
        <div class="absolute inset-0 bg-[linear-gradient(rgba(56,189,248,0.018)_1px,transparent_1px),linear-gradient(90deg,rgba(56,189,248,0.018)_1px,transparent_1px)] bg-[size:72px_72px] [mask-image:radial-gradient(ellipse_65%_55%_at_50%_15%,black,transparent)]"></div>
        <div class="absolute top-1/3 left-1/4 w-96 h-96 bg-sky-500/[0.035] rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/5 w-72 h-72 bg-violet-500/[0.03] rounded-full blur-3xl"></div>
    </div>

    {{-- Sub-header --}}
    <div class="relative z-10 border-b border-white/[0.05] bg-slate-950/70 backdrop-blur-xl px-8 h-14 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-[0.18em] uppercase text-sky-400 bg-sky-400/10 border border-sky-400/20 px-3 py-1 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-sky-400 pulse-dot"></span>
                Admin Panel
            </span>
            <h1 class="text-[15px] font-bold bg-gradient-to-r from-white via-slate-200 to-slate-400 bg-clip-text text-transparent tracking-tight">Dashboard Overview</h1>
        </div>
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 text-xs font-medium text-emerald-400 bg-emerald-400/10 border border-emerald-400/20 px-3 py-1 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                System Online
            </span>
            <span class="text-[11px] text-slate-500 font-mono">{{ now()->format('D, d M Y · H:i') }}</span>
        </div>
    </div>

    <div class="relative z-10 px-8 py-7 space-y-8">

        {{-- ── Metric Cards ── --}}
        <div class="grid grid-cols-4 gap-4">

            {{-- Total Users --}}
            <div class="card-animate relative bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-white/[0.06] p-5 overflow-hidden group hover:border-white/[0.1] transition-all duration-300">
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-slate-400/30 to-transparent"></div>
                <div class="flex items-start justify-between mb-4">
                    <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-500">Total Users</p>
                    <div class="w-8 h-8 rounded-xl bg-slate-800 border border-white/[0.07] flex items-center justify-center">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-white tracking-tight">{{ $totalUsers }}</p>
                <p class="text-[11px] text-slate-500 mt-1.5">{{ $agentCount }} agents · {{ $supervisorCount }} supervisors</p>
            </div>

            {{-- Active Sessions --}}
            <div class="card-animate relative bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-sky-400/[0.12] p-5 overflow-hidden group hover:border-sky-400/25 transition-all duration-300">
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-sky-400/40 to-transparent"></div>
                <div class="flex items-start justify-between mb-4">
                    <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-sky-500/80">Active Sessions</p>
                    <div class="w-8 h-8 rounded-xl bg-sky-400/10 border border-sky-400/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-sky-300 tracking-tight">{{ $activeSessions }}</p>
                <p class="text-[11px] text-sky-600 mt-1.5">Currently logged in</p>
            </div>

            {{-- Calls Today --}}
            <div class="card-animate relative bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-emerald-400/[0.12] p-5 overflow-hidden group hover:border-emerald-400/25 transition-all duration-300">
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-emerald-400/40 to-transparent"></div>
                <div class="flex items-start justify-between mb-4">
                    <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-emerald-500/80">Calls Today</p>
                    <div class="w-8 h-8 rounded-xl bg-emerald-400/10 border border-emerald-400/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-emerald-300 tracking-tight">{{ number_format($callsToday) }}</p>
                <p class="text-[11px] text-emerald-600 mt-1.5">Calls logged today</p>
            </div>

            {{-- Failed Jobs --}}
            <div class="card-animate relative bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-red-400/[0.12] p-5 overflow-hidden group hover:border-red-400/25 transition-all duration-300">
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-red-400/40 to-transparent"></div>
                <div class="flex items-start justify-between mb-4">
                    <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-red-400/80">Failed Jobs</p>
                    <div class="w-8 h-8 rounded-xl bg-red-400/10 border border-red-400/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-red-300 tracking-tight">{{ $errorCount }}</p>
                <p class="text-[11px] text-red-700 mt-1.5">In failed_jobs queue</p>
            </div>

        </div>

        {{-- ── Quick Nav to Users ── --}}
        <a href="{{ route('admin.users') }}"
            class="group relative flex items-center justify-between bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-white/[0.06] p-6 overflow-hidden hover:border-sky-400/25 hover:-translate-y-0.5 transition-all duration-300">
            <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-sky-400/30 to-transparent"></div>
            <div class="flex items-center gap-4">
                <div class="w-11 h-11 rounded-2xl bg-sky-400/10 border border-sky-400/20 flex items-center justify-center flex-shrink-0 group-hover:bg-sky-400/15 transition-colors duration-200">
                    <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-200 group-hover:text-white transition-colors duration-200">Manage Users</p>
                    <p class="text-[11px] text-slate-500 mt-0.5">View, suspend or activate agents &amp; supervisors</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-xs font-semibold text-slate-500">{{ $totalUsers }} users · {{ $suspendedCount }} suspended</span>
                <div class="text-slate-700 group-hover:text-sky-400/60 group-hover:translate-x-0.5 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                </div>
            </div>
        </a>

        {{-- ── User Distribution ── --}}
        <div class="relative bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-white/[0.06] p-6 overflow-hidden">
            <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-slate-400/20 to-transparent"></div>
            <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-5">User Distribution</p>
            <div class="grid grid-cols-4 gap-6">
                @php
                $safe = max($totalUsers, 1);
                @endphp
                @foreach([
                ['label' => 'Agents', 'pct' => round($agentCount / $safe * 100), 'color' => 'bg-sky-400', 'text' => 'text-sky-300'],
                ['label' => 'Supervisors', 'pct' => round($supervisorCount / $safe * 100), 'color' => 'bg-violet-400', 'text' => 'text-violet-300'],
                ['label' => 'Admins', 'pct' => max(0, round(($totalUsers - $agentCount - $supervisorCount) / $safe * 100)), 'color' => 'bg-amber-400', 'text' => 'text-amber-300'],
                ['label' => 'Suspended', 'pct' => round($suspendedCount / $safe * 100), 'color' => 'bg-red-400', 'text' => 'text-red-300'],
                ] as $bar)
                <div>
                    <div class="flex justify-between text-[11px] mb-2">
                        <span class="text-slate-500">{{ $bar['label'] }}</span>
                        <span class="{{ $bar['text'] }} font-semibold">{{ $bar['pct'] }}%</span>
                    </div>
                    <div class="h-1.5 rounded-full bg-white/[0.04] overflow-hidden">
                        <div class="h-full {{ $bar['color'] }} rounded-full bar-fill opacity-70" style="width:{{ $bar['pct'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection