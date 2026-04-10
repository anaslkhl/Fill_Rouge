@extends('layouts.app')
@section('title', 'Supervisor Dashboard — CloudCall')

@section('content')

<body class="bg-slate-950 text-slate-200 font-dm flex min-h-screen">

    <aside class="w-60 shrink-0 bg-slate-900 border-r border-slate-800 flex flex-col py-6 sticky top-0 h-screen">

        <div class="px-6 pb-7 border-b border-slate-800 font-syne font-extrabold text-xl tracking-tight text-white">
            Call<span class="text-blue-500">Hub</span>
        </div>

        <p class="px-6 pt-5 pb-2 text-xs uppercase tracking-widest text-slate-500 font-semibold">Monitor</p>

        <a href="#" class="flex items-center gap-3 px-6 py-2.5 text-sm text-blue-400 bg-blue-500/10 border-r-2 border-blue-500">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7" rx="1" />
                <rect x="14" y="3" width="7" height="7" rx="1" />
                <rect x="3" y="14" width="7" height="7" rx="1" />
                <rect x="14" y="14" width="7" height="7" rx="1" />
            </svg>
            Dashboard
        </a>
        <a href="#" class="flex items-center gap-3 px-6 py-2.5 text-sm text-slate-500 hover:bg-blue-500/5 hover:text-slate-200 transition-colors">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                <aside class="w-60 shrink-0 bg-slate-900 border-r border-slate-800 flex flex-col py-6 sticky top-0 h-screen">
    <circle cx="9" cy="7" r="4" />
                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            Agents
        </a>
        <a href="#" class="flex items-center gap-3 px-6 py-2.5 text-sm text-slate-500 hover:bg-blue-500/5 hover:text-slate-200 transition-colors">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
            </svg>
            Analytics
        </a>

        <p class="px-6 pt-5 pb-2 text-xs uppercase tracking-widest text-slate-500 font-semibold">Manage</p>

        <a href="#" class="flex items-center gap-3 px-6 py-2.5 text-sm text-slate-500 hover:bg-blue-500/5 hover:text-slate-200 transition-colors">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                <polyline points="22,6 12,13 2,6" />
            </svg>
            Assignments
        </a>
        <a href="#" class="flex items-center gap-3 px-6 py-2.5 text-sm text-slate-500 hover:bg-blue-500/5 hover:text-slate-200 transition-colors">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.8a16 16 0 0 0 5.9 5.9l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.39 17z" />
            </svg>
            Call Logs
        </a>
        <a href="#" class="flex items-center gap-3 px-6 py-2.5 text-sm text-slate-500 hover:bg-blue-500/5 hover:text-slate-200 transition-colors">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="3" />
                <path d="M19.07 4.93l-1.41 1.41M6.34 17.66l-1.41 1.41M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M12 2v2M12 20v2" />
            </svg>
            Settings
        </a>

        <div class="mt-auto px-6 pt-5 border-t border-slate-800">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center font-syne font-bold text-xs text-white shrink-0">
                    SV
                </div>
                <div>
                    <div class="text-sm font-medium text-slate-200">Supervisor</div>
                    <div class="text-xs text-slate-500">Supervisor</div>
                </div>
            </div>
        </div>
    </aside>

    {{-- ────────── Main ────────── --}}
    <main class="flex-1 overflow-y-auto p-10">

        {{-- Page Header --}}
        <div class="flex items-end justify-between mb-10">
            <div>
                <h1 class="font-syne font-extrabold text-3xl tracking-tight text-white">Operations Dashboard</h1>
                <p class="text-sm text-slate-500 mt-1">Real-time agent monitoring &amp; performance overview</p>
            </div>
            <span class="text-xs text-slate-400 bg-slate-900 border border-slate-800 px-4 py-2 rounded-full">
                {{ now()->format('l, F j, Y') }}
            </span>
        </div>

        {{-- ── Global Stat Cards ── --}}
        <div class="grid grid-cols-3 gap-5 mb-10">

            {{-- Total Calls --}}
            <div class="relative bg-slate-900 border border-slate-800 rounded-2xl p-6 overflow-hidden hover:border-blue-500 transition-colors">
                <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-t-2xl"></div>
                <div class="absolute top-5 right-5 w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.8a16 16 0 0 0 5.9 5.9l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.39 17z" />
                    </svg>
                </div>
                <p class="text-xs uppercase tracking-widest text-slate-500 font-semibold mb-3">Total Calls Today</p>
                <p class="font-syne font-extrabold text-5xl text-white leading-none">{{ $totalCalls }}</p>
            </div>

            {{-- Success Rate --}}
            <div class="relative bg-slate-900 border border-slate-800 rounded-2xl p-6 overflow-hidden hover:border-blue-500 transition-colors">
                <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-t-2xl"></div>
                <div class="absolute top-5 right-5 w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                </div>
                <p class="text-xs uppercase tracking-widest text-slate-500 font-semibold mb-3">Success Rate</p>
                <p class="font-syne font-extrabold text-5xl text-white leading-none">
                    {{ $successRate }}<span class="text-xl text-slate-400 font-normal">%</span>
                </p>
            </div>

            {{-- Avg Duration --}}
            <div class="relative bg-slate-900 border border-slate-800 rounded-2xl p-6 overflow-hidden hover:border-blue-500 transition-colors">
                <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-t-2xl"></div>
                <div class="absolute top-5 right-5 w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
                <p class="text-xs uppercase tracking-widest text-slate-500 font-semibold mb-3">Avg. Call Duration</p>
                <p class="font-syne font-extrabold text-5xl text-white leading-none">
                    {{ $avgDuration }}<span class="text-xl text-slate-400 font-normal">s</span>
                </p>
            </div>
        </div>

        {{-- ── Section: Agents Table ── --}}
        <div class="flex items-center gap-3 mb-4">
            <h2 class="font-syne font-bold text-lg text-white whitespace-nowrap">Agent Monitor</h2>
            <div class="flex-1 h-px bg-slate-800"></div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden mb-10">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-white/[0.02] border-b border-slate-800">
                        <th class="text-left px-5 py-4 text-xs uppercase tracking-widest text-slate-500 font-semibold">Agent</th>
                        <th class="text-left px-5 py-4 text-xs uppercase tracking-widest text-slate-500 font-semibold">Status</th>
                        <th class="text-left px-5 py-4 text-xs uppercase tracking-widest text-slate-500 font-semibold">Calls</th>
                        <th class="text-left px-5 py-4 text-xs uppercase tracking-widest text-slate-500 font-semibold">Success Rate</th>
                        <th class="text-left px-5 py-4 text-xs uppercase tracking-widest text-slate-500 font-semibold">Avg Duration</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agentsWithStats as $agent)
                    <tr class="border-b border-slate-800 last:border-b-0 hover:bg-blue-500/[0.03] transition-colors">

                        {{-- Agent Name --}}
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center font-syne font-bold text-xs text-white shrink-0">
                                    {{ strtoupper(substr($agent['name'], 0, 2)) }}
                                </div>
                                <span class="text-sm text-slate-200">{{ $agent['name'] }}</span>
                            </div>
                        </td>

                        {{-- Status Badge --}}
                        <td class="px-5 py-4">
                            @if($agent['status'] === 'online')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-500/10 text-green-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-400"></span>
                                Online
                            </span>
                            @elseif($agent['status'] === 'on_call')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-yellow-500/10 text-yellow-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-400"></span>
                                On Call
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-slate-500/10 text-slate-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                Offline
                            </span>
                            @endif
                        </td>

                        {{-- Calls --}}
                        <td class="px-5 py-4 text-sm text-slate-200">{{ $agent['total_calls'] }}</td>

                        {{-- Success Rate with bar --}}
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3 min-w-[130px]">
                                <div class="flex-1 h-1.5 bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full"
                                        style="width: {{ $agent['success_rate'] }}%"></div>
                                </div>
                                <span class="text-xs text-slate-300 whitespace-nowrap">{{ $agent['success_rate'] }}%</span>
                            </div>
                        </td>

                        {{-- Avg Duration --}}
                        <td class="px-5 py-4 text-sm text-slate-400">{{ $agent['avg_duration'] }}s</td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-slate-500 py-12 text-sm">No agents found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ── Section: Assignment ── --}}
        <div class="flex items-center gap-3 mb-4">
            <h2 class="font-syne font-bold text-lg text-white whitespace-nowrap">Client Assignment</h2>
            <div class="flex-1 h-px bg-slate-800"></div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-7">
            <div class="grid grid-cols-3 gap-5 items-end">

                {{-- Agent Dropdown --}}
                <div class="flex flex-col gap-2">
                    <label class="text-xs uppercase tracking-widest text-slate-500 font-semibold">Select Agent</label>
                    <select class="bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm px-4 py-2.5 w-full appearance-none cursor-pointer focus:outline-none focus:border-blue-500 transition-colors">
                        <option value="" disabled selected>Choose an agent…</option>
                        @foreach($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Clients Multi-select --}}
                <div class="flex flex-col gap-2">
                    <label class="text-xs uppercase tracking-widest text-slate-500 font-semibold">
                        Select Clients
                        <span class="normal-case text-slate-600 font-normal ml-1">(Ctrl / ⌘ for multi)</span>
                    </label>
                    <select multiple class="bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm px-2 py-2 w-full h-32 cursor-pointer focus:outline-none focus:border-blue-500 transition-colors">
                        @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                        @if($clients->isEmpty())
                        <option disabled class="text-slate-500">No clients available</option>
                        @endif
                    </select>
                </div>

                {{-- Assign Button --}}
                <div>
                    <button type="button"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-syne font-bold text-sm px-6 py-3 rounded-xl hover:opacity-90 active:scale-95 transition-all whitespace-nowrap cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Assign
                    </button>
                </div>

            </div>
        </div>

    </main>



