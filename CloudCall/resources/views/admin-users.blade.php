@extends('layouts.app')

@section('title', 'User Management — CloudCall Admin')

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

    .log-row:hover td {
        background: rgba(56, 189, 248, .02);
    }
</style>

<div class="min-h-screen bg-slate-950 relative overflow-hidden pt-16">

    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_45%_at_50%_0%,rgba(56,189,248,0.055)_0%,transparent_70%)]"></div>
        <div class="absolute inset-0 bg-[linear-gradient(rgba(56,189,248,0.018)_1px,transparent_1px),linear-gradient(90deg,rgba(56,189,248,0.018)_1px,transparent_1px)] bg-[size:72px_72px] [mask-image:radial-gradient(ellipse_65%_55%_at_50%_15%,black,transparent)]"></div>
        <div class="absolute top-1/3 left-1/4 w-96 h-96 bg-sky-500/[0.035] rounded-full blur-3xl"></div>
    </div>

    {{-- Sub-header --}}
    <div class="relative z-10 border-b border-white/[0.05] bg-slate-950/70 backdrop-blur-xl px-8 h-14 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-1.5 text-slate-500 hover:text-slate-300 transition-colors duration-150 text-xs font-medium">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <polyline points="15 18 9 12 15 6" />
                </svg>
                Dashboard
            </a>
            <span class="text-slate-700">/</span>
            <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-[0.18em] uppercase text-sky-400 bg-sky-400/10 border border-sky-400/20 px-3 py-1 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-sky-400 pulse-dot"></span>
                User Management
            </span>
        </div>
        <span class="text-[11px] text-slate-500 font-mono">{{ now()->format('D, d M Y · H:i') }}</span>
    </div>

    <div class="relative z-10 px-8 py-7 space-y-5">

        {{-- Flash --}}
        @if(session('success'))
        <div class="flex items-center gap-3 bg-emerald-400/10 border border-emerald-400/20 text-emerald-300 text-sm px-5 py-3 rounded-2xl">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="20 6 9 17 4 12" />
            </svg>
            {{ session('success') }}
        </div>
        @endif

        {{-- Users Table --}}
        <div class="relative bg-slate-900/80 backdrop-blur-sm rounded-3xl border border-white/[0.06] overflow-hidden">
            <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-sky-400/35 to-transparent"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(56,189,248,0.03)_0%,transparent_60%)] pointer-events-none"></div>

            {{-- Header --}}
            <div class="relative flex items-center justify-between px-6 py-5 border-b border-white/[0.05]">
                <div class="flex items-center gap-2.5">
                    <span class="w-2 h-2 rounded-full bg-sky-400 shadow-[0_0_8px_2px_rgba(56,189,248,0.5)] pulse-dot"></span>
                    <h2 class="text-[0.72rem] font-bold tracking-[0.15em] uppercase text-slate-400">All Users</h2>
                    <span class="ml-1 text-[10px] font-semibold text-sky-400 bg-sky-400/10 border border-sky-400/20 px-2 py-0.5 rounded-full">{{ $totalUsers }} total</span>
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
                <table class="w-full text-xs">
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

                        @forelse($users as $user)
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
                                    {{ $user->role === 'supervisor' ? 'text-violet-300 bg-violet-400/10 border border-violet-400/15' : 'text-sky-300 bg-sky-400/10 border border-sky-400/15' }}
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
                                @if($user->is_suspended)
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
                                @if($user->is_suspended)
                                <form method="POST" action="{{ route('users.activate', $user->id) }}" class="inline">
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
                                <form method="POST" action="{{ route('users.suspend', $user->id) }}" class="inline">
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
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-600 text-sm">No users found.</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Distribution Footer --}}
            <div class="relative border-t border-white/[0.04] px-6 pt-5 pb-6 space-y-3.5">
                <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1">User Distribution</p>
                @php $safe = max($totalUsers, 1); @endphp
                @foreach([
                ['label' => 'Agents', 'pct' => round($agentCount / $safe * 100), 'color' => 'bg-sky-400'],
                ['label' => 'Supervisors', 'pct' => round($supervisorCount / $safe * 100), 'color' => 'bg-violet-400'],
                ['label' => 'Suspended', 'pct' => round($suspendedCount / $safe * 100), 'color' => 'bg-red-400'],
                ] as $bar)
                <div>
                    <div class="flex justify-between text-[11px] mb-1.5">
                        <span class="text-slate-500">{{ $bar['label'] }}</span>
                        <span class="text-slate-400 font-semibold">{{ $bar['pct'] }}%</span>
                    </div>
                    <div class="h-1 rounded-full bg-white/[0.04] overflow-hidden">
                        <div class="h-full {{ $bar['color'] }} rounded-full bar-fill opacity-70" style="width:{{ max($bar['pct'], 1) }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

<script>
    function filterUsers(q) {
        const role = document.getElementById('role-filter').value;
        const term = (q || '').toLowerCase().trim();
        document.querySelectorAll('#users-tbody tr[data-name]').forEach(row => {
            const nameMatch = !term || row.dataset.name.includes(term);
            const roleMatch = !role || row.dataset.role === role;
            row.style.display = (nameMatch && roleMatch) ? '' : 'none';
        });
    }
</script>

@endsection