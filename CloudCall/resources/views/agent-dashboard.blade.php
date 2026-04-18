{{-- resources/views/agent/dashboard.blade.php --}}
@extends('layouts.app')
@section('title', 'Agent Dashboard')
@section('content')

@include('partials.agent-navbar')

<div class="pl-64 min-h-screen bg-slate-950 relative overflow-hidden">

    {{-- Background effects --}}
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_70%_40%_at_50%_10%,_rgba(56,189,248,0.06)_0%,_transparent_70%)] pointer-events-none"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(56,189,248,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(56,189,248,0.02)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_20%,black,transparent)] pointer-events-none"></div>
    <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-sky-500/[0.04] rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-indigo-500/[0.04] rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-8 py-10 space-y-6">

        {{-- Page Header --}}
        <div class="mb-8">
            <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-[0.2em] uppercase text-sky-400 bg-sky-400/10 border border-sky-400/20 px-3.5 py-1.5 rounded-full mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>
                Agent Dashboard
            </span>
            <h1 class="text-2xl font-bold bg-gradient-to-br from-white via-slate-100 to-slate-400 bg-clip-text text-transparent tracking-tight">
                Welcome back, {{ auth()->user()->name ?? 'Agent' }}
            </h1>
            <p class="text-slate-500 text-sm mt-1">Here's an overview of your call activity.</p>
        </div>

        {{-- ── STATS ROW ── --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">

            {{-- Total --}}
            <div class="relative bg-slate-900/90 rounded-2xl border border-white/[0.06] p-5 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-400/30 to-transparent"></div>
                <div class="w-8 h-8 rounded-xl bg-sky-400/10 border border-sky-400/15 flex items-center justify-center mb-3">
                    <svg class="w-4 h-4 text-sky-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                    </svg>
                </div>
                <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1">Total Calls</p>
                <p class="text-3xl font-bold text-white tracking-tight">{{ $totalCalls }}</p>
            </div>

            {{-- Resolved --}}
            <div class="relative bg-slate-900/90 rounded-2xl border border-white/[0.06] p-5 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-emerald-400/30 to-transparent"></div>
                <div class="w-8 h-8 rounded-xl bg-emerald-400/10 border border-emerald-400/15 flex items-center justify-center mb-3">
                    <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                </div>
                <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1">Resolved</p>
                <p class="text-3xl font-bold text-emerald-400 tracking-tight">{{ $resolvedCalls }}</p>
            </div>

            {{-- Unresolved --}}
            <div class="relative bg-slate-900/90 rounded-2xl border border-white/[0.06] p-5 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-amber-400/30 to-transparent"></div>
                <div class="w-8 h-8 rounded-xl bg-amber-400/10 border border-amber-400/15 flex items-center justify-center mb-3">
                    <svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                </div>
                <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1">Unresolved</p>
                <p class="text-3xl font-bold text-amber-400 tracking-tight">{{ $unresolvedCalls }}</p>
            </div>

            {{-- Missed --}}
            <div class="relative bg-slate-900/90 rounded-2xl border border-white/[0.06] p-5 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-red-400/30 to-transparent"></div>
                <div class="w-8 h-8 rounded-xl bg-red-400/10 border border-red-400/15 flex items-center justify-center mb-3">
                    <svg class="w-4 h-4 text-red-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </div>
                <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1">Missed</p>
                <p class="text-3xl font-bold text-red-400 tracking-tight">{{ $missedCalls }}</p>
            </div>
        </div>

        {{-- ── QUICK ACTIONS ── --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

            {{-- Go to Incoming --}}
            <a href="{{ route('agent.incoming') }}" class="group relative bg-slate-900/90 rounded-2xl border border-white/[0.06] p-5 overflow-hidden hover:border-sky-400/25 hover:bg-sky-400/[0.03] transition-all duration-200">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-400/30 to-transparent"></div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-sky-400/10 border border-sky-400/20 flex items-center justify-center flex-shrink-0 group-hover:bg-sky-400/20 transition-colors duration-200">
                        <svg class="w-5 h-5 text-sky-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-slate-200">Incoming Call</p>
                        <p class="text-xs text-slate-500 mt-0.5">
                            @if($call)
                            <span class="text-sky-400 font-medium">Active request from {{ $call->client->name ?? 'client' }}</span>
                            @else
                            No active incoming call right now
                            @endif
                        </p>
                    </div>
                    @if($call)
                    <span class="w-2.5 h-2.5 rounded-full bg-sky-400 shadow-[0_0_8px_2px_rgba(56,189,248,0.6)] animate-pulse flex-shrink-0"></span>
                    @endif
                    <svg class="w-4 h-4 text-slate-600 group-hover:text-sky-400 group-hover:translate-x-0.5 transition-all duration-200 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                </div>
            </a>

            {{-- Go to Log Call --}}
            <a href="{{ route('agent.log') }}" class="group relative bg-slate-900/90 rounded-2xl border border-white/[0.06] p-5 overflow-hidden hover:border-indigo-400/25 hover:bg-indigo-400/[0.03] transition-all duration-200">
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-indigo-400/30 to-transparent"></div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-indigo-400/10 border border-indigo-400/20 flex items-center justify-center flex-shrink-0 group-hover:bg-indigo-400/20 transition-colors duration-200">
                        <svg class="w-5 h-5 text-indigo-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                            <polyline points="17 21 17 13 7 13 7 21" />
                            <polyline points="7 3 7 8 15 8" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-slate-200">Log Call Result</p>
                        <p class="text-xs text-slate-500 mt-0.5">Save result, duration and notes</p>
                    </div>
                    <svg class="w-4 h-4 text-slate-600 group-hover:text-indigo-400 group-hover:translate-x-0.5 transition-all duration-200 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                </div>
            </a>

        </div>

        {{-- ── RECENT CALLS PREVIEW ── --}}

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