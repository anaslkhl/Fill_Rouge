{{-- resources/views/agent/log-call.blade.php --}}
@extends('layouts.app')
@section('title', 'Log Call Result')
@section('content')

@include('partials.agent-navbar')

<div class="pl-64 min-h-screen bg-slate-950 relative overflow-hidden">

    {{-- Background effects --}}
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_70%_40%_at_50%_10%,_rgba(99,102,241,0.05)_0%,_transparent_70%)] pointer-events-none"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(99,102,241,0.015)_1px,transparent_1px),linear-gradient(90deg,rgba(99,102,241,0.015)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_20%,black,transparent)] pointer-events-none"></div>
    <div class="absolute top-1/4 right-1/4 w-80 h-80 bg-indigo-500/[0.04] rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/3 left-1/3 w-64 h-64 bg-sky-500/[0.03] rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-8 py-10 space-y-6">

        {{-- Page Header --}}
        <div class="mb-8">
            <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-[0.2em] uppercase text-indigo-400 bg-indigo-400/10 border border-indigo-400/20 px-3.5 py-1.5 rounded-full mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 animate-pulse"></span>
                Log Call Result
            </span>
            <h1 class="text-2xl font-bold bg-gradient-to-br from-white via-slate-100 to-slate-400 bg-clip-text text-transparent tracking-tight">
                Log Call Result
            </h1>
            <p class="text-slate-500 text-sm mt-1">Record the outcome, duration and any notes for the current call.</p>
        </div>

        @if($call)

        {{-- Active call context --}}
        <div class="relative bg-slate-900/90 rounded-2xl border border-white/[0.06] overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-400/30 to-transparent"></div>
            <div class="p-4 flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-slate-700 to-slate-800 border border-sky-400/20 flex items-center justify-center text-sky-400 font-bold text-base flex-shrink-0">
                    {{ strtoupper(substr($call->client->name ?? 'V', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-slate-200 truncate">{{ $call->client->name ?? '—' }}</p>
                    <div class="flex items-center gap-2 mt-0.5 flex-wrap">
                        <span class="text-xs text-slate-500 flex items-center gap-1">
                            <svg class="w-3 h-3 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                            </svg>
                            {{ $call->client->phone ?? '—' }}
                        </span>
                        <span class="text-xs text-slate-500 bg-white/[0.04] border border-white/[0.06] px-2 py-0.5 rounded-full">{{ $call->client->issue ?? 'General' }}</span>
                    </div>
                </div>
                <span class="text-[10px] font-semibold tracking-wider uppercase text-sky-300 bg-sky-400/10 border border-sky-400/15 px-2.5 py-1 rounded-full flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>
                    Active Call
                </span>
            </div>
        </div>

        {{-- ── LOG FORM ── --}}
        <div class="relative bg-slate-900/90 backdrop-blur-sm rounded-3xl border border-white/[0.06] shadow-2xl overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-indigo-400/50 to-transparent"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_rgba(99,102,241,0.04)_0%,_transparent_60%)] pointer-events-none"></div>

            <div class="relative p-6">
                <div class="flex items-center gap-2.5 mb-6">
                    <span class="w-2 h-2 rounded-full bg-indigo-400 shadow-[0_0_8px_2px_rgba(99,102,241,0.6)] animate-pulse"></span>
                    <h2 class="text-[0.68rem] font-bold tracking-[0.15em] uppercase text-slate-400">Call Details</h2>
                </div>

                <form action="{{ route('call.end', $call->id) }}" method="POST" class="space-y-5">
                    @csrf

                    {{-- Result --}}
                    <div class="space-y-2">
                        <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                            <svg class="w-3 h-3 text-indigo-400/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="9 11 12 14 22 4" />
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                            </svg>
                            Result
                        </label>
                        <div class="relative">
                            <select name="result" class="w-full appearance-none bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-3 text-sm text-slate-200 outline-none focus:border-indigo-400/50 focus:bg-indigo-400/[0.03] focus:ring-2 focus:ring-indigo-400/10 transition-all duration-200">
                                <option value="" class="bg-slate-900">Select Result</option>
                                <option value="resolved" class="bg-slate-900">✓ Resolved</option>
                                <option value="unresolved" class="bg-slate-900">⚠ Unresolved</option>
                                <option value="canceled" class="bg-slate-900">✕ Canceled</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-3.5 flex items-center">
                                <svg class="w-4 h-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </div>
                        </div>
                        @error('result')
                        <p class="text-xs text-red-400 pl-0.5">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Duration --}}
                    <div class="space-y-2">
                        <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                            <svg class="w-3 h-3 text-indigo-400/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                            Duration (minutes)
                        </label>
                        <input type="number" name="duration" min="0" placeholder="e.g. 5"
                            class="w-full bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-3 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-indigo-400/50 focus:bg-indigo-400/[0.03] focus:ring-2 focus:ring-indigo-400/10 transition-all duration-200">
                        @error('duration')
                        <p class="text-xs text-red-400 pl-0.5">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Notes --}}
                    <div class="space-y-2">
                        <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                            <svg class="w-3 h-3 text-indigo-400/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
                            </svg>
                            Notes
                        </label>
                        <textarea name="note" placeholder="Add any relevant notes about this call..." rows="4"
                            class="w-full bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-3 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-indigo-400/50 focus:bg-indigo-400/[0.03] focus:ring-2 focus:ring-indigo-400/10 transition-all duration-200 resize-y"></textarea>
                    </div>

                    <div class="h-px bg-white/[0.05]"></div>

                    <div class="flex items-center gap-3">
                        <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-br from-indigo-500 to-indigo-600 hover:brightness-110 text-white text-sm font-semibold px-6 py-3 rounded-xl shadow-[0_4px_16px_rgba(99,102,241,0.35)] hover:shadow-[0_8px_24px_rgba(99,102,241,0.45)] hover:-translate-y-px transition-all duration-150">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                                <polyline points="17 21 17 13 7 13 7 21" />
                                <polyline points="7 3 7 8 15 8" />
                            </svg>
                            Save Result
                        </button>
                        <a href="{{ route('agent.dashboard') }}" class="text-xs font-semibold text-slate-500 hover:text-slate-300 px-4 py-3 rounded-xl hover:bg-white/[0.04] transition-all duration-150">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        @else

        {{-- No active call --}}
        <div class="relative bg-slate-900/90 rounded-3xl border border-white/[0.06] overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-indigo-400/30 to-transparent"></div>
            <div class="p-12 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-2xl bg-slate-800 border border-white/[0.06] flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                </div>
                <p class="text-base font-semibold text-slate-400">No active call to log</p>
                <p class="text-sm text-slate-600 mt-1 max-w-xs">Accept an incoming request first before logging a call result.</p>
                <a href="{{ route('agent.incoming') }}" class="mt-5 inline-flex items-center gap-2 text-xs font-semibold text-sky-400 hover:text-sky-300 bg-sky-400/[0.06] hover:bg-sky-400/[0.1] border border-sky-400/20 hover:border-sky-400/30 px-4 py-2.5 rounded-xl transition-all duration-200">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                    </svg>
                    View Incoming Calls
                </a>
            </div>
        </div>

        @endif

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