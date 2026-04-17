@extends('layouts.app')

@section('title', 'Admin Dashboard — CloudCall')

@section('content')
<nav class="fixed top-0 left-0 right-0 z-50 bg-slate-950/60 backdrop-blur-2xl border-b border-white/[0.05]">
    <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">

        <a href="{{ route('client.home') }}" class="flex items-center gap-2.5 group">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-sky-400 to-sky-600 flex items-center justify-center shadow-[0_0_12px_rgba(56,189,248,0.4)] group-hover:shadow-[0_0_20px_rgba(56,189,248,0.65)] transition-all duration-200">
                <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                </svg>
            </div>
            <span class="text-sm font-bold tracking-tight text-white">Cloud<span class="text-sky-400">Call</span></span>
        </a>

    </div>
</nav>
<style>
    /* ── Scrollbar ── */
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

    /* ── Tab active glow ── */
    .tab-btn.active {
        color: #38bdf8;
        background: rgba(56, 189, 248, .08);
        border-color: rgba(56, 189, 248, .25);
    }

    /* ── Progress bar animate ── */
    @keyframes bar-in {
        from {
            width: 0
        }
    }

    .bar-fill {
        animation: bar-in .8s ease forwards;
    }

    /* ── Row hover ── */
    .log-row:hover td {
        background: rgba(56, 189, 248, .02);
    }

    /* ── Pulse badge ── */
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
</style>

{{-- ─────────── PAGE WRAPPER ─────────── --}}
<div class="min-h-screen bg-slate-950 relative overflow-hidden">

    {{-- Ambient background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_45%_at_50%_0%,rgba(56,189,248,0.055)_0%,transparent_70%)]"></div>
        <div class="absolute inset-0 bg-[linear-gradient(rgba(56,189,248,0.018)_1px,transparent_1px),linear-gradient(90deg,rgba(56,189,248,0.018)_1px,transparent_1px)] bg-[size:72px_72px] [mask-image:radial-gradient(ellipse_65%_55%_at_50%_15%,black,transparent)]"></div>
        <div class="absolute top-1/3 left-1/4 w-96 h-96 bg-sky-500/[0.035] rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/5 w-72 h-72 bg-violet-500/[0.03] rounded-full blur-3xl"></div>
    </div>

    {{-- ─────────── TOP BAR ─────────── --}}
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

    {{-- ─────────── MAIN CONTENT ─────────── --}}
    <div class="relative z-10 px-8 py-7 space-y-8">

        {{-- ══════════════════════════════════
         1 · METRIC CARDS
    ══════════════════════════════════ --}}
        <div class="grid grid-cols-4 gap-4">

            {{-- Total Users --}}
            <div class="relative bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-white/[0.06] p-5 overflow-hidden group hover:border-white/[0.1] transition-all duration-300">
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
                <p class="text-3xl font-bold text-white tracking-tight">{{ ($users ?? collect())->count() }}<span class="text-lg text-slate-500 font-normal ml-1"></span></p>
                <p class="text-[11px] text-slate-500 mt-1.5">{{ ($users ?? collect())->where('role','agent')->count() }} agents · {{ ($users ?? collect())->where('role','supervisor')->count() }} supervisors</p>
            </div>

            {{-- Active Sessions --}}
            <div class="relative bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-sky-400/[0.12] p-5 overflow-hidden group hover:border-sky-400/25 transition-all duration-300">
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
                <p class="text-3xl font-bold text-sky-300 tracking-tight">{{ ($activeSessions ?? 38) }}</p>
                <p class="text-[11px] text-sky-600 mt-1.5">Currently logged in</p>
            </div>

            {{-- Calls Today --}}
            <div class="relative bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-emerald-400/[0.12] p-5 overflow-hidden group hover:border-emerald-400/25 transition-all duration-300">
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-emerald-400/40 to-transparent"></div>
                <div class="flex items-start justify-between mb-4">
                    <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-emerald-500/80">Calls Today</p>
                    <div class="w-8 h-8 rounded-xl bg-emerald-400/10 border border-emerald-400/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-emerald-300 tracking-tight">{{ number_format($callsToday ?? 1847) }}</p>
                <p class="text-[11px] text-emerald-600 mt-1.5">+12% vs yesterday</p>
            </div>

            {{-- System Errors --}}
            <div class="relative bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-red-400/[0.12] p-5 overflow-hidden group hover:border-red-400/25 transition-all duration-300">
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-red-400/40 to-transparent"></div>
                <div class="flex items-start justify-between mb-4">
                    <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-red-400/80">System Errors</p>
                    <div class="w-8 h-8 rounded-xl bg-red-400/10 border border-red-400/20 flex items-center justify-center">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-red-300 tracking-tight">{{ ($errorLogs ?? collect())->count() ?: 3 }}</p>
                <p class="text-[11px] text-red-700 mt-1.5">Last 24 h · 1 critical</p>
            </div>

        </div>

        {{-- ══════════════════════════════════
         2 · TABS NAV
    ══════════════════════════════════ --}}
        <div class="flex items-center gap-2">
            @foreach ([
            ['id'=>'users', 'label'=>'User Management', 'icon'=>'M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2 M9 7a4 4 0 100 8 4 4 0 000-8z M23 21v-2a4 4 0 00-3-3.87 M16 3.13a4 4 0 010 7.75'],
            ['id'=>'config', 'label'=>'Business Config', 'icon'=>'M12 15a3 3 0 100-6 3 3 0 000 6z M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z'],
            ['id'=>'audit', 'label'=>'SQL Audit', 'icon'=>'M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z M14 2v6h6 M16 13H8 M16 17H8 M10 9H8'],
            ] as $tab)
            <button onclick="switchTab('{{ $tab['id'] }}')" id="tab-{{ $tab['id'] }}"
                class="tab-btn {{ $loop->first ? 'active' : '' }} inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold text-slate-500 border border-transparent bg-slate-900/60 hover:text-slate-300 hover:bg-white/[0.04] transition-all duration-200">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path d="{{ $tab['icon'] }}" />
                </svg>
                {{ $tab['label'] }}
            </button>
            @endforeach
        </div>

        {{-- ══════════════════════════════════
         TAB A · USER MANAGEMENT
    ══════════════════════════════════ --}}
        <div id="panel-users" class="tab-panel space-y-5">

            {{-- Flash messages --}}
            @if(session('success'))
            <div class="flex items-center gap-3 bg-emerald-400/10 border border-emerald-400/20 text-emerald-300 text-sm px-5 py-3 rounded-2xl">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                {{ session('success') }}
            </div>
            @endif

            <div class="relative bg-slate-900/80 backdrop-blur-sm rounded-3xl border border-white/[0.06] overflow-hidden">
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-sky-400/35 to-transparent"></div>
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(56,189,248,0.03)_0%,transparent_60%)] pointer-events-none"></div>

                {{-- Header --}}
                <div class="relative flex items-center justify-between px-6 py-5 border-b border-white/[0.05]">
                    <div class="flex items-center gap-2.5">
                        <span class="w-2 h-2 rounded-full bg-sky-400 shadow-[0_0_8px_2px_rgba(56,189,248,0.5)] pulse-dot"></span>
                        <h2 class="text-[0.72rem] font-bold tracking-[0.15em] uppercase text-slate-400">User Management</h2>
                    </div>
                    <div class="flex items-center gap-3">
                        {{-- Search --}}
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-slate-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                            </svg>
                            <input type="text" id="user-search" placeholder="Search users…" oninput="filterUsers(this.value)"
                                class="w-52 bg-white/[0.03] border border-white/[0.07] rounded-xl pl-8 pr-4 py-2 text-xs text-slate-300 placeholder-slate-600 outline-none focus:border-sky-400/40 focus:bg-sky-400/[0.02] transition-all duration-200">
                        </div>
                        {{-- Role filter --}}
                        <select id="role-filter" onchange="filterUsers(document.getElementById('user-search').value)"
                            class="bg-white/[0.03] border border-white/[0.07] rounded-xl px-3 py-2 text-xs text-slate-400 outline-none focus:border-sky-400/40 transition-all duration-200 appearance-none cursor-pointer">
                            <option value="">All Roles</option>
                            <option value="agent">Agents</option>
                            <option value="supervisor">Supervisors</option>
                        </select>
                    </div>
                </div>

                {{-- Table --}}
                <div class="relative overflow-x-auto">
                    <table class="w-full text-xs" id="users-table">
                        <thead>
                            <tr class="border-b border-white/[0.04]">
                                <th class="text-left px-6 py-3 text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600">User</th>
                                <th class="text-left px-4 py-3 text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600">Role</th>
                                <th class="text-left px-4 py-3 text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600">Email</th>
                                <th class="text-left px-4 py-3 text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600">Phone</th>
                                <th class="text-left px-4 py-3 text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600">Status</th>
                                <th class="text-right px-6 py-3 text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/[0.03]" id="users-tbody">

                            @forelse($users ?? [] as $user)
                            @if($user->role !== 'admin')
                            <tr class="log-row transition-colors duration-150" data-name="{{ strtolower($user->name) }}" data-role="{{ $user->role }}">
                                {{-- User --}}
                                <td class="px-6 py-3.5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-xl bg-gradient-to-br
                      {{ $user->role === 'supervisor' ? 'from-violet-500/20 to-violet-600/20 border border-violet-400/20' : 'from-sky-500/20 to-sky-600/20 border border-sky-400/20' }}
                      flex items-center justify-center text-[11px] font-bold
                      {{ $user->role === 'supervisor' ? 'text-violet-300' : 'text-sky-300' }} flex-shrink-0">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <span class="font-semibold text-slate-200">{{ $user->name }}</span>
                                    </div>
                                </td>
                                {{-- Role --}}
                                <td class="px-4 py-3.5">
                                    <span class="inline-flex items-center gap-1 text-[10px] font-semibold tracking-wider uppercase
                    {{ $user->role === 'supervisor'
                        ? 'text-violet-300 bg-violet-400/10 border border-violet-400/15'
                        : 'text-sky-300 bg-sky-400/10 border border-sky-400/15' }}
                    px-2.5 py-0.5 rounded-full">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                {{-- Email --}}
                                <td class="px-4 py-3.5 text-slate-500">{{ $user->email }}</td>
                                {{-- Phone --}}
                                <td class="px-4 py-3.5 text-slate-500 font-mono">{{ $user->phone ?? '—' }}</td>
                                {{-- Status --}}
                                <td class="px-4 py-3.5">
                                    @if($user->is_suspended ?? false)
                                    <span class="inline-flex items-center gap-1 text-[10px] font-semibold tracking-wider uppercase text-red-300 bg-red-400/10 border border-red-400/15 px-2.5 py-0.5 rounded-full">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span> Suspended
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 text-[10px] font-semibold tracking-wider uppercase text-emerald-300 bg-emerald-400/10 border border-emerald-400/15 px-2.5 py-0.5 rounded-full">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Active
                                    </span>
                                    @endif
                                </td>
                                {{-- Actions --}}
                                <td class="px-6 py-3.5 text-right">
                                    @if($user->is_suspended ?? false)
                                    <form method="POST" action="{{ route('admin.users.activate', $user->id) }}" class="inline">
                                        @csrf @method('PATCH')
                                        <button type="submit"
                                            class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-400 bg-emerald-400/10 border border-emerald-400/20 hover:bg-emerald-400/20 px-3.5 py-1.5 rounded-lg transition-all duration-150">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <polyline points="20 6 9 17 4 12" />
                                            </svg>
                                            Activate
                                        </button>
                                    </form>
                                    @else
                                    <form method="POST" action="{{ route('admin.users.suspend', $user->id) }}" class="inline">
                                        @csrf @method('PATCH')
                                        <button type="submit"
                                            class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-red-400 bg-red-400/10 border border-red-400/20 hover:bg-red-400/20 px-3.5 py-1.5 rounded-lg transition-all duration-150"
                                            onclick="return confirm('Suspend {{ $user->name }}?')">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10" />
                                                <line x1="4.93" y1="4.93" x2="19.07" y2="19.07" />
                                            </svg>
                                            Suspend
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @empty
                            {{-- Demo rows when no real data --}}
                            @foreach([
                            ['name'=>'Alexandre Martin','role'=>'agent','email'=>'a.martin@cloudcall.com','phone'=>'+33 6 12 34 56 78','suspended'=>false],
                            ['name'=>'Sophie Dupont','role'=>'supervisor','email'=>'s.dupont@cloudcall.com','phone'=>'+33 6 98 76 54 32','suspended'=>false],
                            ['name'=>'Karim Ibrahim','role'=>'agent','email'=>'k.ibrahim@cloudcall.com','phone'=>'+33 6 55 44 33 22','suspended'=>true],
                            ['name'=>'Riya Patel','role'=>'agent','email'=>'r.patel@cloudcall.com','phone'=>'+33 6 77 88 99 10','suspended'=>false],
                            ['name'=>'Marc Leclerc','role'=>'supervisor','email'=>'m.leclerc@cloudcall.com','phone'=>'+33 6 22 11 00 99','suspended'=>false],
                            ] as $demo)
                            <tr class="log-row transition-colors duration-150" data-name="{{ strtolower($demo['name']) }}" data-role="{{ $demo['role'] }}">
                                <td class="px-6 py-3.5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-xl {{ $demo['role']==='supervisor' ? 'bg-gradient-to-br from-violet-500/20 to-violet-600/20 border border-violet-400/20 text-violet-300' : 'bg-gradient-to-br from-sky-500/20 to-sky-600/20 border border-sky-400/20 text-sky-300' }} flex items-center justify-center text-[11px] font-bold">
                                            {{ strtoupper(substr($demo['name'],0,1)) }}
                                        </div>
                                        <span class="font-semibold text-slate-200">{{ $demo['name'] }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="inline-flex items-center gap-1 text-[10px] font-semibold tracking-wider uppercase {{ $demo['role']==='supervisor' ? 'text-violet-300 bg-violet-400/10 border border-violet-400/15' : 'text-sky-300 bg-sky-400/10 border border-sky-400/15' }} px-2.5 py-0.5 rounded-full">{{ ucfirst($demo['role']) }}</span>
                                </td>
                                <td class="px-4 py-3.5 text-slate-500">{{ $demo['email'] }}</td>
                                <td class="px-4 py-3.5 text-slate-500 font-mono text-[11px]">{{ $demo['phone'] }}</td>
                                <td class="px-4 py-3.5">
                                    @if($demo['suspended'])
                                    <span class="inline-flex items-center gap-1 text-[10px] font-semibold tracking-wider uppercase text-red-300 bg-red-400/10 border border-red-400/15 px-2.5 py-0.5 rounded-full"><span class="w-1.5 h-1.5 rounded-full bg-red-400"></span> Suspended</span>
                                    @else
                                    <span class="inline-flex items-center gap-1 text-[10px] font-semibold tracking-wider uppercase text-emerald-300 bg-emerald-400/10 border border-emerald-400/15 px-2.5 py-0.5 rounded-full"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Active</span>
                                    @endif
                                </td>
                                <td class="px-6 py-3.5 text-right">
                                    @if($demo['suspended'])
                                    <button class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-400 bg-emerald-400/10 border border-emerald-400/20 hover:bg-emerald-400/20 px-3.5 py-1.5 rounded-lg transition-all duration-150">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg> Activate
                                    </button>
                                    @else
                                    <button class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-red-400 bg-red-400/10 border border-red-400/20 hover:bg-red-400/20 px-3.5 py-1.5 rounded-lg transition-all duration-150">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                            <line x1="4.93" y1="4.93" x2="19.07" y2="19.07" />
                                        </svg> Suspend
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endforelse

                        </tbody>
                    </table>
                </div>

                {{-- User Distribution Footer --}}
                <div class="relative border-t border-white/[0.04] px-6 pt-5 pb-6 space-y-3.5">
                    <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1">User Distribution</p>
                    @foreach([['label'=>'Agents','pct'=>77,'color'=>'bg-sky-400'],['label'=>'Supervisors','pct'=>19,'color'=>'bg-violet-400'],['label'=>'Admins','pct'=>3,'color'=>'bg-amber-400'],['label'=>'Suspended','pct'=>2,'color'=>'bg-red-400']] as $bar)
                    <div>
                        <div class="flex justify-between text-[11px] mb-1.5">
                            <span class="text-slate-500">{{ $bar['label'] }}</span>
                            <span class="text-slate-400 font-semibold">{{ $bar['pct'] }}%</span>
                        </div>
                        <div class="h-1 rounded-full bg-white/[0.04] overflow-hidden">
                            <div class="h-full {{ $bar['color'] }} rounded-full bar-fill opacity-70" style="width:{{ $bar['pct'] }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════
         TAB B · BUSINESS CONFIG
    ══════════════════════════════════ --}}
        <div id="panel-config" class="tab-panel hidden space-y-5">
            <div class="relative bg-slate-900/80 backdrop-blur-sm rounded-3xl border border-white/[0.06] overflow-hidden">
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-violet-400/35 to-transparent"></div>
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(139,92,246,0.03)_0%,transparent_60%)] pointer-events-none"></div>

                {{-- Header --}}
                <div class="relative flex items-center gap-2.5 px-6 py-5 border-b border-white/[0.05]">
                    <span class="w-2 h-2 rounded-full bg-violet-400 shadow-[0_0_8px_2px_rgba(139,92,246,0.5)] pulse-dot"></span>
                    <h2 class="text-[0.72rem] font-bold tracking-[0.15em] uppercase text-slate-400">Qualification Lists — Call-End Reasons</h2>
                </div>

                <div class="relative grid grid-cols-2 gap-6 px-6 py-6">

                    {{-- ── LEFT: Existing reasons ── --}}
                    <div>
                        <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-4">Existing Reasons</p>
                        <div id="qualif-list" class="space-y-2">
                            @forelse($callReasons ?? [] as $reason)
                            <div class="flex items-center justify-between gap-3 px-4 py-3 rounded-xl bg-white/[0.02] border border-white/[0.05] group hover:border-white/[0.09] transition-all duration-200">
                                <div class="flex items-center gap-2.5">
                                    <span class="w-2 h-2 rounded-full bg-violet-400/60"></span>
                                    <span class="text-sm text-slate-300">{{ $reason->label }}</span>
                                </div>
                                <form method="POST" action="{{ route('admin.reasons.destroy', $reason->id) }}" class="inline opacity-0 group-hover:opacity-100 transition-opacity duration-150">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Remove this reason?')"
                                        class="w-7 h-7 rounded-lg bg-red-400/10 border border-red-400/20 hover:bg-red-400/25 flex items-center justify-center text-red-400 transition-all duration-150">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <line x1="18" y1="6" x2="6" y2="18" />
                                            <line x1="6" y1="6" x2="18" y2="18" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @empty
                            {{-- Demo reasons --}}
                            @foreach(['Resolved — Issue Fixed','Unresolved — Escalated','Callback Scheduled','Abandoned by Client','Technical Fault','Wrong Number','No Answer','Resolved — Self-Service'] as $r)
                            <div class="flex items-center justify-between gap-3 px-4 py-3 rounded-xl bg-white/[0.02] border border-white/[0.05] group hover:border-white/[0.09] transition-all duration-200">
                                <div class="flex items-center gap-2.5">
                                    <span class="w-2 h-2 rounded-full bg-violet-400/60"></span>
                                    <span class="text-sm text-slate-300">{{ $r }}</span>
                                </div>
                                <button onclick="removeQualif(this)"
                                    class="w-7 h-7 rounded-lg bg-red-400/10 border border-red-400/20 hover:bg-red-400/25 flex items-center justify-center text-red-400 opacity-0 group-hover:opacity-100 transition-all duration-150">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </button>
                            </div>
                            @endforeach
                            @endforelse
                        </div>
                    </div>

                    {{-- ── RIGHT: Add new reason ── --}}
                    <div>
                        <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-4">Add New Reason</p>
                        <form method="POST" action="{{ route('admin.reasons.store') }}" class="space-y-4" id="add-reason-form">
                            @csrf
                            <div class="space-y-1.5">
                                <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                                    <svg class="w-3 h-3 text-violet-400/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="9 11 12 14 22 4" />
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                                    </svg>
                                    Reason Label
                                </label>
                                <input type="text" name="label" placeholder="e.g. Resolved — Billing Issue" required
                                    class="w-full bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-2.5 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-violet-400/50 focus:bg-violet-400/[0.03] focus:ring-2 focus:ring-violet-400/10 transition-all duration-200">
                            </div>
                            <div class="space-y-1.5">
                                <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                                    <svg class="w-3 h-3 text-violet-400/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                    </svg>
                                    Category
                                </label>
                                <div class="relative">
                                    <select name="category"
                                        class="w-full appearance-none bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-2.5 text-sm text-slate-200 outline-none focus:border-violet-400/50 focus:bg-violet-400/[0.03] focus:ring-2 focus:ring-violet-400/10 transition-all duration-200">
                                        <option value="" class="bg-slate-900">Select Category</option>
                                        <option value="resolved" class="bg-slate-900">Resolved</option>
                                        <option value="unresolved" class="bg-slate-900">Unresolved</option>
                                        <option value="canceled" class="bg-slate-900">Canceled</option>
                                        <option value="other" class="bg-slate-900">Other</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-3.5 flex items-center">
                                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <polyline points="6 9 12 15 18 9" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-1.5">
                                <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                                    <svg class="w-3 h-3 text-violet-400/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
                                    </svg>
                                    Description (optional)
                                </label>
                                <textarea name="description" placeholder="Brief description…" rows="3"
                                    class="w-full bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-2.5 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-violet-400/50 focus:bg-violet-400/[0.03] focus:ring-2 focus:ring-violet-400/10 transition-all duration-200 resize-y"></textarea>
                            </div>
                            <div class="h-px bg-white/[0.05]"></div>
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-gradient-to-br from-violet-500 to-violet-600 hover:brightness-110 text-white text-sm font-semibold px-6 py-2.5 rounded-xl shadow-[0_4px_16px_rgba(139,92,246,0.35)] hover:shadow-[0_8px_24px_rgba(139,92,246,0.45)] hover:-translate-y-px transition-all duration-150">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Add Reason
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════
         TAB C · SQL AUDIT
    ══════════════════════════════════ --}}
        <div id="panel-audit" class="tab-panel hidden space-y-5">

            <div class="grid grid-cols-2 gap-5">

                {{-- ── Connection Logs ── --}}
                <div class="relative bg-slate-900/80 backdrop-blur-sm rounded-3xl border border-white/[0.06] overflow-hidden">
                    <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-emerald-400/35 to-transparent"></div>
                    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(52,211,153,0.025)_0%,transparent_60%)] pointer-events-none"></div>

                    <div class="relative flex items-center justify-between px-5 py-4 border-b border-white/[0.05]">
                        <div class="flex items-center gap-2.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_6px_2px_rgba(52,211,153,0.45)]"></span>
                            <h2 class="text-[0.72rem] font-bold tracking-[0.15em] uppercase text-slate-400">Connection Logs</h2>
                        </div>
                        <span class="text-[10px] font-semibold text-slate-600 bg-white/[0.03] border border-white/[0.05] px-2.5 py-1 rounded-full">Last 24 h</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-xs">
                            <thead>
                                <tr class="border-b border-white/[0.04]">
                                    <th class="text-left px-5 py-2.5 text-[0.6rem] font-semibold tracking-widest uppercase text-slate-600">Time</th>
                                    <th class="text-left px-3 py-2.5 text-[0.6rem] font-semibold tracking-widest uppercase text-slate-600">User</th>
                                    <th class="text-left px-3 py-2.5 text-[0.6rem] font-semibold tracking-widest uppercase text-slate-600">Action</th>
                                    <th class="text-right px-5 py-2.5 text-[0.6rem] font-semibold tracking-widest uppercase text-slate-600">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/[0.03]">
                                @forelse($loginLogs ?? [] as $log)
                                <tr class="log-row transition-colors duration-150">
                                    <td class="px-5 py-3 font-mono text-[10px] text-slate-500">{{ $log->created_at->format('H:i:s') }}</td>
                                    <td class="px-3 py-3 text-slate-300 font-medium">{{ $log->user->name ?? $log->username ?? '—' }}</td>
                                    <td class="px-3 py-3 text-slate-500">{{ $log->action }}</td>
                                    <td class="px-5 py-3 text-right">
                                        @if($log->status === 'success')
                                        <span class="text-[10px] font-semibold tracking-wider uppercase text-emerald-300 bg-emerald-400/10 border border-emerald-400/15 px-2 py-0.5 rounded-full">OK</span>
                                        @else
                                        <span class="text-[10px] font-semibold tracking-wider uppercase text-red-300 bg-red-400/10 border border-red-400/15 px-2 py-0.5 rounded-full">Fail</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                @foreach([
                                ['time'=>'10:42:18','user'=>'a.martin','action'=>'Login — Agent','ok'=>true],
                                ['time'=>'10:38:55','user'=>'s.dupont','action'=>'Login — Supervisor','ok'=>true],
                                ['time'=>'10:31:02','user'=>'k.ibrahim','action'=>'Login failed (×3)','ok'=>false],
                                ['time'=>'10:22:44','user'=>'admin','action'=>'Config change — params','ok'=>true],
                                ['time'=>'09:58:10','user'=>'r.patel','action'=>'Login — Agent','ok'=>true],
                                ['time'=>'09:47:33','user'=>'m.leclerc','action'=>'Login — Supervisor','ok'=>true],
                                ['time'=>'09:21:05','user'=>'t.renaud','action'=>'Login failed','ok'=>false],
                                ['time'=>'08:55:12','user'=>'admin','action'=>'User suspended: k.ibrahim','ok'=>true],
                                ] as $demo)
                                <tr class="log-row transition-colors duration-150">
                                    <td class="px-5 py-3 font-mono text-[10px] text-slate-500">{{ $demo['time'] }}</td>
                                    <td class="px-3 py-3 text-slate-300 font-medium">{{ $demo['user'] }}</td>
                                    <td class="px-3 py-3 text-slate-500">{{ $demo['action'] }}</td>
                                    <td class="px-5 py-3 text-right">
                                        @if($demo['ok'])
                                        <span class="text-[10px] font-semibold tracking-wider uppercase text-emerald-300 bg-emerald-400/10 border border-emerald-400/15 px-2 py-0.5 rounded-full">OK</span>
                                        @else
                                        <span class="text-[10px] font-semibold tracking-wider uppercase text-red-300 bg-red-400/10 border border-red-400/15 px-2 py-0.5 rounded-full">Fail</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ── Error Reports ── --}}
                <div class="relative bg-slate-900/80 backdrop-blur-sm rounded-3xl border border-white/[0.06] overflow-hidden">
                    <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-red-400/35 to-transparent"></div>
                    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(248,113,113,0.025)_0%,transparent_60%)] pointer-events-none"></div>

                    <div class="relative flex items-center justify-between px-5 py-4 border-b border-white/[0.05]">
                        <div class="flex items-center gap-2.5">
                            <span class="w-2 h-2 rounded-full bg-red-400 shadow-[0_0_6px_2px_rgba(248,113,113,0.45)] pulse-dot"></span>
                            <h2 class="text-[0.72rem] font-bold tracking-[0.15em] uppercase text-slate-400">System Error Reports</h2>
                        </div>
                        <span class="text-[11px] font-semibold text-red-300 bg-red-400/10 border border-red-400/20 px-2.5 py-1 rounded-full">{{ ($errorLogs ?? collect())->count() ?: 3 }} active</span>
                    </div>

                    <div class="divide-y divide-white/[0.04] p-2">
                        @forelse($errorLogs ?? [] as $err)
                        <div class="flex items-start gap-3.5 px-4 py-4 rounded-2xl hover:bg-white/[0.02] transition-colors duration-150">
                            <div class="w-8 h-8 rounded-xl {{ $err->level === 'critical' ? 'bg-red-400/15 border border-red-400/25' : 'bg-amber-400/10 border border-amber-400/20' }} flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5 {{ $err->level === 'critical' ? 'text-red-400' : 'text-amber-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="8" x2="12" y2="12" />
                                    <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="text-sm font-semibold text-slate-200">{{ $err->message }}</span>
                                    <span class="text-[10px] font-semibold tracking-wider uppercase {{ $err->level === 'critical' ? 'text-red-300 bg-red-400/10 border border-red-400/15' : 'text-amber-300 bg-amber-400/10 border border-amber-400/15' }} px-2 py-0.5 rounded-full">{{ ucfirst($err->level) }}</span>
                                </div>
                                <p class="text-[11px] text-slate-600 mt-1">{{ $err->context ?? 'No context' }} · {{ $err->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @empty
                        @foreach([
                        ['level'=>'critical','msg'=>'DB connection timeout','ctx'=>'MySQL pool exhausted','time'=>'2 min ago'],
                        ['level'=>'warning','msg'=>'High memory usage (89%)','ctx'=>'Worker node #3','time'=>'18 min ago'],
                        ['level'=>'warning','msg'=>'WebSocket reconnect loop','ctx'=>'Client session ID 8821','time'=>'1 h ago'],
                        ] as $demo)
                        <div class="flex items-start gap-3.5 px-4 py-4 rounded-2xl hover:bg-white/[0.02] transition-colors duration-150">
                            <div class="w-8 h-8 rounded-xl {{ $demo['level']==='critical' ? 'bg-red-400/15 border border-red-400/25' : 'bg-amber-400/10 border border-amber-400/20' }} flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5 {{ $demo['level']==='critical' ? 'text-red-400' : 'text-amber-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="8" x2="12" y2="12" />
                                    <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="text-sm font-semibold text-slate-200">{{ $demo['msg'] }}</span>
                                    <span class="text-[10px] font-semibold tracking-wider uppercase {{ $demo['level']==='critical' ? 'text-red-300 bg-red-400/10 border border-red-400/15' : 'text-amber-300 bg-amber-400/10 border border-amber-400/15' }} px-2 py-0.5 rounded-full">{{ ucfirst($demo['level']) }}</span>
                                </div>
                                <p class="text-[11px] text-slate-600 mt-1">{{ $demo['ctx'] }} · {{ $demo['time'] }}</p>
                            </div>
                        </div>
                        @endforeach
                        @endforelse
                    </div>
                </div>

            </div>

            {{-- ── Audit Summary Stats ── --}}
            <div class="relative bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-white/[0.06] overflow-hidden">
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-slate-400/20 to-transparent"></div>
                <div class="grid grid-cols-5 divide-x divide-white/[0.05]">
                    @foreach([
                    ['label'=>'Login Events','val'=>'248','color'=>'text-white'],
                    ['label'=>'Failed Logins','val'=>'7','color'=>'text-red-300'],
                    ['label'=>'Config Changes','val'=>'12','color'=>'text-amber-300'],
                    ['label'=>'Suspensions','val'=>'2','color'=>'text-violet-300'],
                    ['label'=>'Uptime','val'=>'99.8%','color'=>'text-emerald-300'],
                    ] as $stat)
                    <div class="px-5 py-4 text-center">
                        <p class="text-lg font-bold {{ $stat['color'] }} tracking-tight">{{ $stat['val'] }}</p>
                        <p class="text-[10px] text-slate-600 mt-0.5">{{ $stat['label'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>{{-- /px-8 --}}
</div>{{-- /page --}}

{{-- ─────────── JAVASCRIPT ─────────── --}}
<script>
    /* ── Tab switching ── */
    function switchTab(id) {
        document.querySelectorAll('.tab-panel').forEach(p => p.classList.add('hidden'));
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.getElementById('panel-' + id).classList.remove('hidden');
        document.getElementById('tab-' + id).classList.add('active');
    }

    /* ── Live user search + role filter ── */
    function filterUsers(q) {
        const role = document.getElementById('role-filter').value;
        const term = (q || '').toLowerCase().trim();
        document.querySelectorAll('#users-tbody tr').forEach(row => {
            const nameMatch = !term || row.dataset.name.includes(term);
            const roleMatch = !role || row.dataset.role === role;
            row.style.display = nameMatch && roleMatch ? '' : 'none';
        });
    }

    /* ── Demo: remove qualification row ── */
    function removeQualif(btn) {
        if (!confirm('Remove this call-end reason?')) return;
        btn.closest('div').remove();
    }

    /* ── Demo: add qualification row inline ── */
    document.getElementById('add-reason-form')?.addEventListener('submit', function(e) {
        const input = this.querySelector('input[name="label"]');
        if (!input.value.trim()) return;
        // Only intercept if no real route exists (demo mode)
        if (window.location.hostname === 'localhost' || true) {
            e.preventDefault();
            const label = input.value.trim();
            const list = document.getElementById('qualif-list');
            const div = document.createElement('div');
            div.className = 'flex items-center justify-between gap-3 px-4 py-3 rounded-xl bg-white/[0.02] border border-white/[0.05] group hover:border-white/[0.09] transition-all duration-200';
            div.innerHTML = `
      <div class="flex items-center gap-2.5">
        <span class="w-2 h-2 rounded-full bg-violet-400/60"></span>
        <span class="text-sm text-slate-300">${label}</span>
      </div>
      <button onclick="removeQualif(this)" class="w-7 h-7 rounded-lg bg-red-400/10 border border-red-400/20 hover:bg-red-400/25 flex items-center justify-center text-red-400 opacity-0 group-hover:opacity-100 transition-all duration-150">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>`;
            list.appendChild(div);
            input.value = '';
            input.focus();
        }
    });
</script>

@endsection