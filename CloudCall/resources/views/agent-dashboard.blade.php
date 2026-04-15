@extends('layouts.app')

@section('title', 'Agent Dashboard')
@section('content')

{{-- NAVBAR --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-slate-950/60 backdrop-blur-2xl border-b border-white/[0.05]">
    <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="#" class="flex items-center gap-2.5 group">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-sky-400 to-sky-600 flex items-center justify-center shadow-[0_0_12px_rgba(56,189,248,0.4)] group-hover:shadow-[0_0_20px_rgba(56,189,248,0.65)] transition-all duration-200">
                <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                </svg>
            </div>
            <span class="text-sm font-bold tracking-tight text-white">Cloud<span class="text-sky-400">Call</span></span>
        </a>

        <div class="hidden md:flex items-center gap-1">
            <span class="text-xs font-medium text-white bg-white/[0.06] px-3.5 py-2 rounded-lg">Dashboard</span>
            <a href="#history" class="text-xs font-medium text-slate-400 hover:text-white px-3.5 py-2 rounded-lg hover:bg-white/[0.05] transition-all duration-150">History</a>
        </div>

        <div class="flex items-center gap-3">
            {{-- Agent stats pill --}}
            <span class="hidden sm:inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-wider uppercase text-indigo-300 bg-indigo-400/10 border border-indigo-400/20 px-2.5 py-1 rounded-full">
                <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Agent
            </span>
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-slate-700 to-slate-800 border border-white/10 flex items-center justify-center text-xs font-bold text-slate-300">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <form method="POST" action="{{ route('user.logout') }}">
                @csrf
                <button type="submit" class="text-xs font-medium text-slate-500 hover:text-red-400 p-2 rounded-lg hover:bg-red-400/[0.06] transition-all duration-150">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>

{{-- PAGE --}}
<div class="min-h-screen bg-slate-950 pt-24 pb-16 px-4 relative overflow-hidden">

    {{-- Background effects --}}
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_70%_40%_at_50%_10%,_rgba(56,189,248,0.06)_0%,_transparent_70%)] pointer-events-none"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(56,189,248,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(56,189,248,0.02)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_20%,black,transparent)] pointer-events-none"></div>
    <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-sky-500/[0.04] rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-indigo-500/[0.04] rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-3xl mx-auto space-y-5">

        {{-- Page Header --}}
        <div class="mb-8">
            <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-[0.2em] uppercase text-sky-400 bg-sky-400/10 border border-sky-400/20 px-3.5 py-1.5 rounded-full mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>
                Agent Dashboard
            </span>
            <h1 class="text-2xl font-bold bg-gradient-to-br from-white via-slate-100 to-slate-400 bg-clip-text text-transparent tracking-tight">
                Welcome back, {{ auth()->user()->name ?? 'Agent' }}
            </h1>
            <p class="text-slate-500 text-sm mt-1">Manage incoming calls and track your activity below.</p>
        </div>

        {{-- ── STATS ROW ── --}}
        <div class="grid grid-cols-4 gap-3">
            <div class="relative bg-slate-900/90 rounded-2xl border border-white/[0.06] p-4 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-400/30 to-transparent"></div>
                <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1">Total Calls</p>
                <p class="text-2xl font-bold text-white tracking-tight">{{ $callLogs->count() }}</p>
            </div>
            <div class="relative bg-slate-900/90 rounded-2xl border border-white/[0.06] p-4 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-emerald-400/30 to-transparent"></div>
                <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1">Resolved</p>
                <p class="text-2xl font-bold text-emerald-400 tracking-tight">{{ $callLogs->where('result', 'resolved')->count() }}</p>
            </div>
            <div class="relative bg-slate-900/90 rounded-2xl border border-white/[0.06] p-4 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-emerald-400/30 to-transparent"></div>
                <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1">Unresolved</p>
                <p class="text-2xl font-bold text-emerald-400 tracking-tight">{{ $callLogs->where('result', 'unresolved')->count() }}</p>
            </div>
            <div class="relative bg-slate-900/90 rounded-2xl border border-white/[0.06] p-4 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-red-400/30 to-transparent"></div>
                <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1">Missed</p>
                <p class="text-2xl font-bold text-red-400 tracking-tight">{{ $callLogs->where('status', 'missed')->count() }}</p>
            </div>
        </div>

        {{-- ── INCOMING CALL CARD ── --}}
        @if($call)
        <div class="relative bg-slate-900/90 backdrop-blur-sm rounded-3xl border border-white/[0.06] shadow-2xl overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-400/50 to-transparent"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_rgba(56,189,248,0.04)_0%,_transparent_60%)] pointer-events-none"></div>
            <div class="relative p-6">
                <div class="flex items-center gap-2.5 mb-5">
                    <span class="w-2 h-2 rounded-full bg-sky-400 shadow-[0_0_8px_2px_rgba(56,189,248,0.6)] animate-pulse"></span>
                    <h2 class="text-[0.68rem] font-bold tracking-[0.15em] uppercase text-slate-400">Incoming Call Request</h2>
                </div>
                <ul class="space-y-3">
                    <li class="flex items-center gap-4 px-4 py-3.5 rounded-2xl bg-white/[0.02] border border-white/[0.04] hover:bg-sky-500/[0.04] hover:border-sky-500/15 transition-all duration-200">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-slate-700 to-slate-800 border border-sky-400/20 flex items-center justify-center text-sky-400 font-bold text-base flex-shrink-0">
                            {{ strtoupper(substr($call->client->name ?? 'V', 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-slate-100 truncate">{{ $call->client->name ?? 'vide' }}</p>
                            <div class="flex items-center gap-2 mt-1 flex-wrap">
                                <span class="text-xs text-slate-500 flex items-center gap-1">
                                    <svg class="w-3 h-3 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                                    </svg>
                                    {{ $call->client->phone ?? 'vide' }}
                                </span>
                                <span class="text-xs text-slate-500 bg-white/[0.04] border border-white/[0.06] px-2 py-0.5 rounded-full">{{ $call->client->issue ?? 'vide' }}</span>
                            </div>
                        </div>
                        <form action="{{ route('call.start', $call->id) }}" method="POST">
                            @csrf
                            @if($call->status === 'calling')
                            <button class="inline-flex items-center gap-1.5 bg-gradient-to-br from-green-600 to-green-700 hover:brightness-110 text-white text-xs font-semibold px-3.5 py-2 rounded-lg shadow-[0_4px_12px_rgba(22,163,74,0.35)] hover:shadow-[0_6px_18px_rgba(22,163,74,0.45)] hover:-translate-y-px transition-all duration-150">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                                </svg>
                                Call
                            </button>
                            @endif
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @else
        <div class="relative bg-slate-900/90 rounded-3xl border border-white/[0.06] overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-400/30 to-transparent"></div>
            <div class="p-6 flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-slate-800 border border-white/[0.06] flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-slate-400">No active client to call</p>
                    <p class="text-xs text-slate-600 mt-0.5">Incoming requests will appear here automatically.</p>
                </div>
            </div>
        </div>
        @endif

        {{-- ── LOG CALL RESULT CARD ── --}}
        <div class="relative bg-slate-900/90 backdrop-blur-sm rounded-3xl border border-white/[0.06] shadow-2xl overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-indigo-400/50 to-transparent"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_rgba(99,102,241,0.04)_0%,_transparent_60%)] pointer-events-none"></div>
            <div class="relative p-6">
                <div class="flex items-center gap-2.5 mb-5">
                    <span class="w-2 h-2 rounded-full bg-indigo-400 shadow-[0_0_8px_2px_rgba(99,102,241,0.6)] animate-pulse"></span>
                    <h2 class="text-[0.68rem] font-bold tracking-[0.15em] uppercase text-slate-400">Log Call Result</h2>
                </div>
                @if($call)
                <form action="{{ route('call.end', $call->id) }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="space-y-1.5">
                        <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                            <svg class="w-3 h-3 text-indigo-400/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="9 11 12 14 22 4" />
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                            </svg>
                            Result
                        </label>
                        <div class="relative">
                            <select name="result" class="w-full appearance-none bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-2.5 text-sm text-slate-200 outline-none focus:border-indigo-400/50 focus:bg-indigo-400/[0.03] focus:ring-2 focus:ring-indigo-400/10 transition-all duration-200">
                                <option value="" class="bg-slate-900">Select Result</option>
                                <option value="resolved" class="bg-slate-900">Resolved</option>
                                <option value="unresolved" class="bg-slate-900">Unresolved</option>
                                <option value="canceled" class="bg-slate-900">Canceled</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-3.5 flex items-center">
                                <svg class="w-4 h-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                            <svg class="w-3 h-3 text-indigo-400/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                            Duration
                        </label>
                        <input type="text" name="duration" placeholder="Duration (minutes)"
                            class="w-full bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-2.5 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-indigo-400/50 focus:bg-indigo-400/[0.03] focus:ring-2 focus:ring-indigo-400/10 transition-all duration-200">
                    </div>

                    <div class="space-y-1.5">
                        <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                            <svg class="w-3 h-3 text-indigo-400/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
                            </svg>
                            Notes
                        </label>
                        <textarea name="note" placeholder="Add any relevant notes..." rows="3"
                            class="w-full bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-2.5 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-indigo-400/50 focus:bg-indigo-400/[0.03] focus:ring-2 focus:ring-indigo-400/10 transition-all duration-200 resize-y"></textarea>
                    </div>

                    <div class="h-px bg-white/[0.05]"></div>

                    <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-br from-indigo-500 to-indigo-600 hover:brightness-110 text-white text-sm font-semibold px-6 py-2.5 rounded-xl shadow-[0_4px_16px_rgba(99,102,241,0.35)] hover:shadow-[0_8px_24px_rgba(99,102,241,0.45)] hover:-translate-y-px transition-all duration-150">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                            <polyline points="17 21 17 13 7 13 7 21" />
                            <polyline points="7 3 7 8 15 8" />
                        </svg>
                        Save Result
                    </button>
                </form>
                @else
                <div class="flex items-center gap-3 bg-slate-800/50 border border-white/[0.04] rounded-xl px-4 py-3">
                    <svg class="w-4 h-4 text-slate-600 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                    <p class="text-xs text-slate-500">No active call to log. Accept an incoming request first.</p>
                </div>
                @endif
            </div>
        </div>

        {{-- ── CALL HISTORY CARD ── --}}
        <div id="history" class="relative bg-slate-900/90 backdrop-blur-sm rounded-3xl border border-white/[0.06] shadow-2xl overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-emerald-400/40 to-transparent"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom-right,_rgba(52,211,153,0.03)_0%,_transparent_65%)] pointer-events-none"></div>
            <div class="relative p-6">

                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-center gap-2.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_2px_rgba(52,211,153,0.5)]"></span>
                        <h2 class="text-[0.68rem] font-bold tracking-[0.15em] uppercase text-slate-400">Call History</h2>
                    </div>
                    <span class="text-[10px] font-semibold text-slate-600 bg-white/[0.03] border border-white/[0.05] px-2.5 py-1 rounded-full">
                        {{ $callLogs->count() }} total
                    </span>
                </div>

                @if($callLogs->isEmpty())
                <div class="flex flex-col items-center justify-center py-10 text-center">
                    <div class="w-12 h-12 rounded-2xl bg-slate-800 border border-white/[0.05] flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <p class="text-sm text-slate-500 font-medium">No call history yet</p>
                    <p class="text-xs text-slate-600 mt-1">Your completed calls will appear here.</p>
                </div>
                @else
                <div class="space-y-2.5">
                    @foreach($callLogs as $log)
                    <div class="group flex items-center gap-4 px-4 py-3.5 rounded-2xl bg-white/[0.02] border border-white/[0.04] hover:bg-white/[0.04] hover:border-white/[0.08] transition-all duration-200">

                        {{-- Status icon --}}
                        <div class="flex-shrink-0">
                            @if($log->status === 'ended' && $log->result === 'resolved')
                            <div class="w-9 h-9 rounded-xl bg-emerald-400/10 border border-emerald-400/20 flex items-center justify-center">
                                <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </div>
                            @elseif($log->status === 'missed')
                            <div class="w-9 h-9 rounded-xl bg-red-400/10 border border-red-400/20 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </div>
                            @elseif($log->result === 'unresolved')
                            <div class="w-9 h-9 rounded-xl bg-amber-400/10 border border-amber-400/20 flex items-center justify-center">
                                <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="8" x2="12" y2="12" />
                                    <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>
                            </div>
                            @else
                            <div class="w-9 h-9 rounded-xl bg-slate-700/50 border border-white/[0.06] flex items-center justify-center">
                                <svg class="w-4 h-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                                </svg>
                            </div>
                            @endif
                        </div>

                        {{-- Client info --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <p class="text-sm font-semibold text-slate-200 truncate">{{ $log->client->name ?? '—' }}</p>
                                {{-- Status badge --}}
                                @if($log->status === 'missed')
                                <span class="text-[10px] font-semibold tracking-wider uppercase text-red-300 bg-red-400/10 border border-red-400/15 px-2 py-0.5 rounded-full">Missed</span>
                                @elseif($log->result === 'resolved')
                                <span class="text-[10px] font-semibold tracking-wider uppercase text-emerald-300 bg-emerald-400/10 border border-emerald-400/15 px-2 py-0.5 rounded-full">Resolved</span>
                                @elseif($log->result === 'unresolved')
                                <span class="text-[10px] font-semibold tracking-wider uppercase text-amber-300 bg-amber-400/10 border border-amber-400/15 px-2 py-0.5 rounded-full">Unresolved</span>
                                @elseif($log->result === 'canceled')
                                <span class="text-[10px] font-semibold tracking-wider uppercase text-slate-400 bg-slate-400/10 border border-slate-400/15 px-2 py-0.5 rounded-full">Canceled</span>
                                @endif
                            </div>
                            <div class="flex items-center gap-3 mt-1 flex-wrap">
                                <span class="text-[11px] text-slate-600 flex items-center gap-1">
                                    <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                                    </svg>
                                    {{ $log->client->phone ?? '—' }}
                                </span>
                                @if($log->duration)
                                <span class="text-[11px] text-slate-600 flex items-center gap-1">
                                    <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                    {{ $log->duration }} min
                                </span>
                                @endif
                                @if($log->note)
                                <span class="text-[11px] text-slate-600 truncate max-w-[160px]">{{ $log->note }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- Date --}}
                        <div class="text-right flex-shrink-0">
                            <p class="text-[11px] text-slate-500">{{ $log->created_at->format('M d') }}</p>
                            <p class="text-[10px] text-slate-600 mt-0.5">{{ $log->created_at->format('H:i') }}</p>
                        </div>

                    </div>
                    @endforeach
                </div>
                @endif

            </div>
        </div>

    </div>
</div>

{{-- FOOTER --}}
<footer class="bg-slate-950 border-t border-white/[0.05] px-6 py-8">
    <div class="max-w-3xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 text-[11px] text-slate-600">
        <span>&copy; 2026 CloudCall. All rights reserved.</span>
        <a href="mailto:support@cloudcall.com" class="text-sky-400/60 hover:text-sky-400 transition-colors duration-150">support@cloudcall.com</a>
    </div>
</footer>

@endsection