{{-- resources/views/agent/incoming.blade.php --}}
@extends('layouts.app')
@section('title', 'Incoming Call')
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
                Incoming Call
            </span>
            <h1 class="text-2xl font-bold bg-gradient-to-br from-white via-slate-100 to-slate-400 bg-clip-text text-transparent tracking-tight">
                Incoming Call Request
            </h1>
            <p class="text-slate-500 text-sm mt-1">Accept and handle incoming client call requests.</p>
        </div>

        {{-- ── INCOMING CALL CARD ── --}}
        @if($call)
        <div class="relative bg-slate-900/90 backdrop-blur-sm rounded-3xl border border-white/[0.06] shadow-2xl overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-400/50 to-transparent"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_rgba(56,189,248,0.04)_0%,_transparent_60%)] pointer-events-none"></div>
            <div class="relative p-6">
                <div class="flex items-center gap-2.5 mb-5">
                    <span class="w-2 h-2 rounded-full bg-sky-400 shadow-[0_0_8px_2px_rgba(56,189,248,0.6)] animate-pulse"></span>
                    <h2 class="text-[0.68rem] font-bold tracking-[0.15em] uppercase text-slate-400">Active Request</h2>
                </div>

                <div class="flex items-center gap-5 px-5 py-5 rounded-2xl bg-white/[0.02] border border-white/[0.04] hover:bg-sky-500/[0.04] hover:border-sky-500/15 transition-all duration-200">

                    {{-- Avatar --}}
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-slate-700 to-slate-800 border border-sky-400/20 flex items-center justify-center text-sky-400 font-bold text-xl flex-shrink-0">
                        {{ strtoupper(substr($call->client->name ?? 'V', 0, 1)) }}
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 min-w-0">
                        <p class="text-base font-bold text-slate-100 truncate">{{ $call->client->name ?? '—' }}</p>
                        <div class="flex items-center gap-3 mt-1.5 flex-wrap">
                            <span class="text-xs text-slate-500 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 opacity-50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                                </svg>
                                {{ $call->client->phone ?? '—' }}
                            </span>
                            <span class="text-xs text-slate-400 bg-sky-400/10 border border-sky-400/15 px-2.5 py-0.5 rounded-full font-medium">
                                {{ $call->client->issue ?? 'General Inquiry' }}
                            </span>
                        </div>
                    </div>

                    {{-- Action --}}
                    @if($call->status === 'calling')
                    <form action="{{ route('call.start', $call->id) }}" method="POST" class="flex-shrink-0">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-br from-green-500 to-green-700 hover:brightness-110 text-white text-sm font-bold px-5 py-3 rounded-xl shadow-[0_4px_16px_rgba(22,163,74,0.4)] hover:shadow-[0_8px_24px_rgba(22,163,74,0.5)] hover:-translate-y-px transition-all duration-150">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                            </svg>
                            Accept Call
                        </button>
                    </form>
                    @elseif($call->status === 'ongoing')
                    <span class="inline-flex items-center gap-2 bg-sky-400/10 border border-sky-400/20 text-sky-300 text-sm font-bold px-5 py-3 rounded-xl">
                        <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
                        Ongoing
                    </span>
                    @endif
                </div>

                {{-- Client details panel --}}
                @if($call->client)
                <div class="mt-5 grid grid-cols-1 md:grid-cols-3 gap-3">
                    @if($call->client->email)
                    <div class="bg-white/[0.02] border border-white/[0.04] rounded-xl px-4 py-3">
                        <p class="text-[0.6rem] font-semibold tracking-[0.15em] uppercase text-slate-600 mb-1">Email</p>
                        <p class="text-xs text-slate-300 truncate">{{ $call->client->email }}</p>
                    </div>
                    @endif
                    @if($call->created_at)
                    <div class="bg-white/[0.02] border border-white/[0.04] rounded-xl px-4 py-3">
                        <p class="text-[0.6rem] font-semibold tracking-[0.15em] uppercase text-slate-600 mb-1">Requested at</p>
                        <p class="text-xs text-slate-300">{{ $call->created_at->format('M d, Y · H:i') }}</p>
                    </div>
                    @endif
                    <div class="bg-white/[0.02] border border-white/[0.04] rounded-xl px-4 py-3">
                        <p class="text-[0.6rem] font-semibold tracking-[0.15em] uppercase text-slate-600 mb-1">Status</p>
                        <p class="text-xs font-semibold text-sky-300 capitalize">{{ $call->status }}</p>
                    </div>
                </div>
                @endif

            </div>
        </div>

        {{-- Prompt to log result --}}
        <div class="flex items-center gap-3 bg-indigo-400/[0.05] border border-indigo-400/15 rounded-2xl px-5 py-4">
            <svg class="w-4 h-4 text-indigo-400 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
            </svg>
            <p class="text-xs text-slate-400">After the call is finished, go to <a href="{{ route('agent.log') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold underline underline-offset-2 transition-colors duration-150">Log Call Result</a> to save the outcome.</p>
        </div>

        @else

        {{-- No active call --}}
        <div class="relative bg-slate-900/90 rounded-3xl border border-white/[0.06] overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-400/30 to-transparent"></div>
            <div class="p-12 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-2xl bg-slate-800 border border-white/[0.06] flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                    </svg>
                </div>
                <p class="text-base font-semibold text-slate-400">No active client to call</p>
                <p class="text-sm text-slate-600 mt-1 max-w-xs">Incoming requests will appear here automatically. This page refreshes when a new call comes in.</p>
                <button onclick="location.reload()" class="mt-5 inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-sky-400 bg-white/[0.03] hover:bg-sky-400/[0.06] border border-white/[0.06] hover:border-sky-400/20 px-4 py-2 rounded-xl transition-all duration-200">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="23 4 23 10 17 10" />
                        <path d="M20.49 15a9 9 0 11-2.12-9.36L23 10" />
                    </svg>
                    Refresh
                </button>
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