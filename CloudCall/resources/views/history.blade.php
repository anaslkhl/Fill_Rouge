{{-- resources/views/agent/history.blade.php --}}
@extends('layouts.app')
@section('title', 'Call History')
@section('content')

@include('partials.agent-navbar')

<div class="pl-64 min-h-screen bg-slate-950 relative overflow-hidden">

    {{-- Background effects --}}
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_70%_40%_at_50%_10%,_rgba(52,211,153,0.04)_0%,_transparent_70%)] pointer-events-none"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(52,211,153,0.015)_1px,transparent_1px),linear-gradient(90deg,rgba(52,211,153,0.015)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_20%,black,transparent)] pointer-events-none"></div>
    <div class="absolute top-1/4 right-1/4 w-80 h-80 bg-emerald-500/[0.03] rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-8 py-10 space-y-6">

        {{-- Page Header --}}
        <div class="mb-8">
            <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-[0.2em] uppercase text-emerald-400 bg-emerald-400/10 border border-emerald-400/20 px-3.5 py-1.5 rounded-full mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                Call History
            </span>
            <h1 class="text-2xl font-bold bg-gradient-to-br from-white via-slate-100 to-slate-400 bg-clip-text text-transparent tracking-tight">
                Call History
            </h1>
            <p class="text-slate-500 text-sm mt-1">A complete record of all your handled calls.</p>
        </div>

        {{-- ── FILTER / STATS BAR ── --}}
        <div class="flex items-center gap-3 flex-wrap">
            <div class="flex items-center gap-2 bg-slate-900/90 border border-white/[0.06] rounded-xl px-4 py-2.5">
                <span class="text-[10px] font-semibold tracking-widest uppercase text-slate-600">Total</span>
                <span class="text-sm font-bold text-white">{{ $totalCalls }}</span>
            </div>
            <div class="flex items-center gap-2 bg-slate-900/90 border border-white/[0.06] rounded-xl px-4 py-2.5">
                <span class="w-2 h-2 rounded-full bg-emerald-400 flex-shrink-0"></span>
                <span class="text-[10px] font-semibold tracking-widest uppercase text-slate-600">Resolved</span>
                <span class="text-sm font-bold text-emerald-400">{{ $resolvedCalls }}</span>
            </div>
            <div class="flex items-center gap-2 bg-slate-900/90 border border-white/[0.06] rounded-xl px-4 py-2.5">
                <span class="w-2 h-2 rounded-full bg-amber-400 flex-shrink-0"></span>
                <span class="text-[10px] font-semibold tracking-widest uppercase text-slate-600">Unresolved</span>
                <span class="text-sm font-bold text-amber-400">{{ $unresolvedCalls }}</span>
            </div>
            <div class="flex items-center gap-2 bg-slate-900/90 border border-white/[0.06] rounded-xl px-4 py-2.5">
                <span class="w-2 h-2 rounded-full bg-red-400 flex-shrink-0"></span>
                <span class="text-[10px] font-semibold tracking-widest uppercase text-slate-600">Missed</span>
                <span class="text-sm font-bold text-red-400">{{ $missedCalls }}</span>
            </div>
        </div>

        {{-- ── CALL HISTORY CARD ── --}}
        <div class="relative bg-slate-900/90 backdrop-blur-sm rounded-3xl border border-white/[0.06] shadow-2xl overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-emerald-400/40 to-transparent"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom-right,_rgba(52,211,153,0.03)_0%,_transparent_65%)] pointer-events-none"></div>

            <div class="relative p-6">
                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-center gap-2.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_2px_rgba(52,211,153,0.5)]"></span>
                        <h2 class="text-[0.68rem] font-bold tracking-[0.15em] uppercase text-slate-400">All Calls</h2>
                    </div>
                    <span class="text-[10px] font-semibold text-slate-600 bg-white/[0.03] border border-white/[0.05] px-2.5 py-1 rounded-full">
                        {{ $totalCalls }} total
                    </span>
                </div>

                @if($callLogs->isEmpty())
                <div class="flex flex-col items-center justify-center py-16 text-center">
                    <div class="w-14 h-14 rounded-2xl bg-slate-800 border border-white/[0.05] flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                            @elseif($log->result === 'canceled')
                            <div class="w-9 h-9 rounded-xl bg-slate-700/50 border border-white/[0.06] flex items-center justify-center">
                                <svg class="w-4 h-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
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
                                <span class="text-[11px] text-slate-600 truncate max-w-[200px]" title="{{ $log->note }}">{{ $log->note }}</span>
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
<footer class="pl-64 bg-slate-950 border-t border-white/[0.05] px-8 py-6">
    <div class="max-w-4xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 text-[11px] text-slate-600">
        <span>&copy; 2026 CloudCall. All rights reserved.</span>
        <a href="mailto:support@cloudcall.com" class="text-sky-400/60 hover:text-sky-400 transition-colors duration-150">support@cloudcall.com</a>
    </div>
</footer>

@endsection